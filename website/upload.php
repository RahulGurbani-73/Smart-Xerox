<?php
session_start();
include "conn.php";
use PhpOffice\PhpWord\IOFactory;

// Redirect if the user is not logged in
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header('Location: index.php#modal');
    exit();
}

if (!isset($_SESSION['user_id'])) {
    die("Error: User not logged in.");
}

$user_id = $_SESSION['user_id'];

function getPdfPages($filePath)
{
    $output = shell_exec("pdfinfo " . escapeshellarg($filePath) . " 2>&1");
    if (preg_match('/Pages:\s+(\d+)/i', $output, $matches)) {
        return (int)$matches[1];
    }
    return 1; // Default to 1 if not found
}

// Function to get DOC/DOCX page count
function getWordPages($filePath)
{
    $phpWord = IOFactory::load($filePath);
    $sections = $phpWord->getSections();
    return count($sections) > 0 ? count($sections) : 1; // Default to 1
}

// Function to get Image pages (each image is considered 1 page)
function getImagePages($filePath) {
    if (!file_exists($filePath)) {
        return 1; // Default to 1 page if the file does not exist
    }
    return 1; // Images are always 1 page
}

echo "Yes, session started";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate required fields
    $requiredFields = ['orin', 'color', 'side', 'type', 'copies', 'size'];
    foreach ($requiredFields as $field) {
        if (!isset($_POST[$field]) || empty($_POST[$field])) {
            die("Error: Missing required field: $field");
        }
    }

    $copies = intval($_POST['copies']);
    $printOrientation = $_POST['orin'] ?? 'Unknown';
    $printColor = $_POST['color'] ?? 'Black&White';
    $printSide = $_POST['side'] ?? 'Oneside';
    $printType = $_POST['type'] ?? 'Normal';
    $fileSize = $_POST['size'] ?? 'A4';
    $token = mt_rand(1000, 9999);
    $time = date('Y-m-d H:i:s');
    $firstname = $_SESSION['firstname'] ?? 'Guest';
    $mobile = $_SESSION['mobile'] ?? 'Unknown';
    $email = $_SESSION['email'] ?? 'Unknown';
    $status = 1;
    $order_id = $_POST['order_id'] ?? "ORD" . random_int(1000, 9999);
    $payment_status="Pending";

    $fileName = $_FILES['files']['name'];
    $fileType = strtolower(pathinfo($_FILES['files']['name'][0], PATHINFO_EXTENSION));
    $filePath = $_FILES['files']['tmp_name'][0]; // Ensure file path is retrieved correctly


    $pages = 1;
    if ($fileType == 'pdf') {
        $pages = getPdfPages($filePath);
    } elseif ($fileType == 'doc' || $fileType == 'docx') {
        $pages = getWordPages($filePath);
    } elseif (in_array($fileType, ['jpg', 'png', 'jpeg'])) {
        $pages = getImagePages($filePath);
    }

    

    $basePrice = 3; // ₹3 per page

    // Color Pricing
    $colorPrice = ($printColor == 'Color') ? 10 : 3;

    // Double-sided Pricing
    $sideMultiplier = ($printSide == 'Twoside') ? 2 : 1;

    // Binding Pricing
    $bindingPrice = 0;
    if ($printType == 'Spiral') {
        $bindingPrice = 50;
    } elseif ($printType == 'Staple') {
        $bindingPrice = 40;
    }

    // Calculate total price
    $totalPrice = ($pages * $basePrice * $sideMultiplier) + ($pages * $colorPrice) + $bindingPrice;
    $totalPrice *= $copies;


    // Validate file upload
    if (!isset($_FILES["files"]) || empty($_FILES["files"]["name"][0])) {
        die("Error: No files uploaded.");
    }

    $uploadDir = "uploads/";
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    // Allowed file types
    $allowedTypes = ['pdf', 'doc', 'docx', 'jpg', 'png', 'jpeg'];
    $maxFileSize = 5 * 1024 * 1024; // 5MB

    // Create folder based on specifications
    $folderName = "{$printOrientation}_{$printColor}_{$printSide}_{$printType}_{$fileSize}";
    $targetDir = $uploadDir . $folderName . '/';

    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    // Ensure a common storage directory for all uploaded files
    $fileUploadsDir = "uploads/";
    if (!is_dir($fileUploadsDir)) {
        mkdir($fileUploadsDir, 0777, true);
    }

    foreach ($_FILES["files"]["tmp_name"] as $key => $tmp_name) {
        $fileName = basename($_FILES["files"]["name"][$key]);
        $fileSizeActual = $_FILES["files"]["size"][$key];
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        if (!in_array($fileExt, $allowedTypes)) {
            echo "Error: Invalid file type ($fileExt) for file: $fileName<br>";
            continue;
        }

        if ($fileSizeActual > $maxFileSize) {
            echo "Error: File too large ($fileSizeActual bytes) for file: $fileName<br>";
            continue;
        }

        $targetFilePath = $targetDir . time() . "_" . $fileName;
        $commonFilePath = $fileUploadsDir . time() . "_" . $fileName;

        if (move_uploaded_file($tmp_name, $targetFilePath)) {
            copy($targetFilePath, $commonFilePath); // Save a copy in the common uploads folder

            $stmt = $conn->prepare("INSERT INTO upload (order_id, file, copies, orin, color, side, type, size, totalPrice, email, firstname, mobile, status, token, time, payment_status) 
                                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

            $stmt->bind_param(
                "ssisssssssssssss",
                $order_id,
                $targetFilePath,
                $copies,
                $printOrientation,
                $printColor,
                $printSide,
                $printType,
                $fileSize,
                $totalPrice,
                $email,
                $firstname,
                $mobile,
                $status,
                $token,
                $time,
                $payment_status
            );

            if ($stmt->execute()) {
                echo "File uploaded successfully: $fileName<br>";
            } else {
                echo "Database error: " . $stmt->error . "<br>";
            }

            $stmt->close();
        } else {
            echo "Failed to upload: $fileName<br>";
        }
    }

    if (isset($_SESSION['user_id'])) { // Ensure the user is logged in before inserting
        $user_id = $_SESSION['user_id'];
        
        $order_id = mysqli_real_escape_string($conn, $_POST['order_id']);
        $payment_status = 1; // Assuming 1 means "Paid"
    
        $sql4 = "INSERT INTO payment (order_id, totalPrice, payment_status, user_id, token) 
                 VALUES ('$order_id', $totalPrice, '$payment_status', '$user_id', '$token')";
    
        if (mysqli_query($conn, $sql4)) {
            echo "";
        } else {                                                                                                                             
            echo "Error inserting payment record: " . mysqli_error($conn);
        }
    }
    
    
} else {
    echo "Error: Invalid request.";
}

$conn->close();
