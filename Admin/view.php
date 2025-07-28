<?php  
include "conn.php";

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Define file storage method: 'path' or 'blob'
$file_storage_method = 'path'; 

// Define the upload directory
$uploadDir = "C:/xampp/htdocs/Smart_Xerox/website/";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['token'])) {
    $token = mysqli_real_escape_string($conn, $_POST['token']);
    $sql = "SELECT file FROM upload WHERE token = '$token' ORDER BY time DESC";
    $result = mysqli_query($conn, $sql);

    if ($result === false) {
        echo "Error retrieving file: " . mysqli_error($conn);
    } else {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $fileName = $row['file']; // Stored file name in database
            
            if ($file_storage_method === 'blob') {
                // File stored as binary data (BLOB)
                header('Content-Type: application/pdf');
                header('Content-Disposition: attachment; filename="downloaded_file.pdf"');
                echo $fileName;
                exit;
            } else {
                // File stored as a path
                $filePath = $uploadDir . $fileName; // Correct full file path

                if (file_exists($filePath)) {
                    // Detect file type and set headers
                    $mimeType = mime_content_type($filePath);
                    header("Content-Type: $mimeType");
                    header('Content-Disposition: attachment; filename="' . basename($filePath) . '"');
                    header('Content-Length: ' . filesize($filePath));

                    readfile($filePath);
                    exit;
                } else {
                    echo "Error: File not found! Debug Path: " . $filePath;
                }
            }
        } else {
            echo "No matching file found.";
        }
    }
} else {
    echo "Invalid request.";
}

mysqli_close($conn);
?>
