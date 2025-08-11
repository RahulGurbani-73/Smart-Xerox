<?php
session_start(); 
include "conn.php"; 
if (isset($_POST['email']) && isset($_POST['password'])) 
{
    
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $email = validate($_POST['email']); 
    $password = validate($_POST['password']); 

    
    if (empty($email)) {
        header("Location: index.php?error=email is required"); 
    }
    
    else if (empty($password)) {
        header("Location: index.php?error=Password is required"); 
        exit();
    } else {
        $password = md5($password); 

        $sql = "SELECT * FROM user WHERE email='$email' AND password='$password'"; 
        $result = mysqli_query($conn, $sql); 

        if (mysqli_num_rows($result) === 1) 
        {
            $_SESSION['logged_in'] = true; 
            $row = mysqli_fetch_assoc($result); 

            
            if ($row['email'] === $email && $row['password'] === $password) {
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['firstname'] = $row['firstname']; 
                $_SESSION['lastname'] = $row['lastname']; 
                $_SESSION['email'] = $row['email']; 
                $_SESSION['mobile'] = $row['mobile']; 
                $_SESSION['sem'] = $row['sem']; 
                $_SESSION['enroll'] = $row['enroll']; 

                header("Location: http://localhost/Smart_Xerox/website/index.php"); 
                exit();
            } else {
                header("Location: index.php?error=Incorrect User name or password"); 
                exit();
            }
            //header("Location: home.php"); 
        } else {
            header("Location: index.php"); 
            exit();
        }
    }
} else {
    header("Location: index.php"); 
}
