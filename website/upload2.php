<?php 

session_start();
include "conn.php";

if(isset($_POST['orin']) && isset($_POST['color']) && isset($_POST['side']) && isset($_POST['type'])) {
    
    if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
        header('Location: index.php#modal');
        exit();
    } else {
        echo "Yes, session started"; ?>
        <a href="logout.php">Logout</a>
        <a href="payment.php">payment</a>
        <a href="index.php#upload">upload</a>
        <?php 

        $copies = $_POST['copies'];
        $orin = $_POST['orin'];
        $color = $_POST['color'];
        $side = $_POST['side'];
        $type = $_POST['type'];
        $token =  mt_rand(1000, 9999);
        $time = date('Y-m-d H:i:s');
        $firstname = $_SESSION['firstname'];
        $mobile = $_SESSION['mobile'];
        $email = $_SESSION['email'];
        $status = true;

        // Generate unique Order ID
        $order_id = "ORD" . random_int(1000, 9999);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if ($_FILES["file"]["error"] == UPLOAD_ERR_OK) {
                $filee = file_get_contents($_FILES["file"]["tmp_name"]);
                $filee = $conn->real_escape_string($filee);

                // Insert into the database with order_id
                $sql = "INSERT INTO upload(order_id, file,copies,orin, color, side, type, email, firstname, mobile, status, token, time) 
                        VALUES('$order_id', '$filee', $copies ,'$orin', '$color', '$side', '$type', '$email', '$firstname', '$mobile', '$status', '$token', '$time')";

                if ($conn->query($sql) === TRUE) {
                    echo "PDF file uploaded successfully. Order ID: " . $order_id;
                } else {
                    echo "Error uploading PDF file: " . $conn->error;
                }
            } else {
                echo "Error uploading PDF file: " . $_FILES["file"]["error"];
            }
        }
    }
} else {
    echo "Error: Missing required fields.";
}
?>
