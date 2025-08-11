<?php
session_start();
include 'conn.php'; // Ensure this file contains database connection details

if (!isset($_SESSION['logged_in'])) {
    die("<script>alert('User not logged in!'); window.location.href='login.php';</script>");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['logged_in'];
    $pincode = mysqli_real_escape_string($conn, $_POST['pincode']);
    $locality = mysqli_real_escape_string($conn, $_POST['locality']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $state = mysqli_real_escape_string($conn, $_POST['state']);
    $landmark = mysqli_real_escape_string($conn, $_POST['landmark']);
    $alt_phone = mysqli_real_escape_string($conn, $_POST['alt_phone']);

    // Check if the user exists in the user table
    $user_check = mysqli_query($conn, "SELECT user_id FROM user WHERE user_id='$user_id'");
    if (mysqli_num_rows($user_check) == 0) {
        die("<script>alert('Invalid user!'); window.history.back();</script>");
    }

    // Check if the user already has an address
    $check_query = mysqli_query($conn, "SELECT * FROM user_addresses WHERE user_id='$user_id'");
    
    if (mysqli_num_rows($check_query) > 0) {
        // Update existing address
        $query = "UPDATE user_addresses SET pincode='$pincode', locality='$locality', address='$address', city='$city', state='$state', landmark='$landmark', alt_phone='$alt_phone' WHERE user_id='$user_id'";
    } else {
        // Insert new address
        $query = "INSERT INTO user_addresses (user_id, pincode, locality, address, city, state, landmark, alt_phone) VALUES ('$user_id', '$pincode', '$locality', '$address', '$city', '$state', '$landmark', '$alt_phone')";
    }

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Address saved successfully!'); window.location.href='payment.php';</script>";
    } else {
        echo "<script>alert('Error saving address. Please try again.'); window.history.back();</script>";
    }
}
?>
