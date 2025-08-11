<?php

include "conn.php";
session_start();



if (isset($_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['mobile'], $_POST['enroll'], $_POST['sem'], $_POST['password'])) {

    function validate($data) {
        return htmlspecialchars(stripslashes(trim($data)));
    }

    $firstname = validate($_POST['firstname']);
    $lastname = validate($_POST['lastname']);
    $email = validate($_POST['email']);
    $mobile = validate($_POST['mobile']);
    $enroll = validate($_POST['enroll']);
    $sem = validate($_POST['sem']);
    $password = validate($_POST['password']);

    if (empty($firstname) || empty($lastname) || empty($email) || empty($mobile) || empty($enroll) || empty($sem) || empty($password)) {
        header("Location: index.php?error=All fields are required");
        exit();
    }

    // Hash the password
    $password = md5($password); // Consider using password_hash($password, PASSWORD_BCRYPT) for better security

    // Check if email already exists
    $stmt = $conn->prepare("SELECT user_id FROM user WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        header("Location: index.php?error=Email is already registered");
        exit();
    }

    // Corrected INSERT query (No need to insert user_id manually)
    $stmt = $conn->prepare("INSERT INTO user (firstname, lastname, email, mobile, enroll, sem, password) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $firstname, $lastname, $email, $mobile, $enroll, $sem, $password);

    if ($stmt->execute()) {
        $user_id = $stmt->insert_id; // Get the last inserted user_id
        
        header("Location: index.php?success=Your account has been created successfully&user_id=$user_id");
        exit();
    } else {
        header("Location: index.php?error=Unknown error occurred");
        exit();
    }

} else {
    header("Location: index.php");
    exit();
}
?>
