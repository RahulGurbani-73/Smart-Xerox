<?php
include 'conn.php'; // Database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $payment_type = $_POST["payment_type"];
    $token = $_POST["token"];

    $status = ($payment_type === "Cash") ? "Cash" : "Paid";

    $stmt = $conn->prepare("UPDATE orders SET payment_status = ? WHERE token = ?");
    $stmt->bind_param("ss", $status, $token);

    if ($stmt->execute()) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false]);
    }

    $stmt->close();
    $conn->close();
}
?>
