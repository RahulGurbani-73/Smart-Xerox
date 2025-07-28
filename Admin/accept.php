<?php
// Include database connection
include "conn.php";

$numbers = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
$characters = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 2);
$token = $numbers.$characters;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["token"])) {
    $token = mysqli_real_escape_string($conn, $_POST["token"]);
    
    // Update the status of the order to 'Accepted'
    $sql = "UPDATE upload SET status='Accepted' WHERE token='$token'";

    $sql1 = "UPDATE upload SET payment_status='Paid' WHERE token='$token'";
    mysqli_query($conn,$sql1);

    $sql2 = "UPDATE payment SET payment_status='Paid' WHERE token='$token'";
    mysqli_query($conn,$sql2);

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Order Accepted Successfully!'); window.location.href='admin.php';</script>";
    } else {
        echo "<script>alert('Error accepting order: " . mysqli_error($conn) . "'); window.location.href='admin.php';</script>";
    }


}
?>
