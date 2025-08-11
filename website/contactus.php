<?php

session_start();


include "conn.php";


if(isset($_POST['firstname']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['feedback']))
{
    
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
     }
 
     
     $firstname = validate($_POST['firstname']);
     $email = validate($_POST['email']);
     $subject = validate($_POST['subject']);
     $feedback = validate($_POST['feedback']);

     
     if (empty($firstname))
     { 
        header("Location: index.php?error=email is required");
	    exit();
	}
    
   
   else if(empty($email))
   {       
       header("Location: index.php?error=Password is required");
       exit();
   }
   
   else if(empty($subject))
     {   
        header("Location: index.php?error=subject is required");
	    exit();
	}
    
    else if(empty($feedback))
    {   
        header("Location: index.php?error=feedback is required");
	    exit();
	}
    else
    {
        
        

        
        $sql2 = "INSERT INTO contactus(firstname,email,subject,feedback) VALUES('$firstname','$email','$subject','$feedback')";
        $result2 = mysqli_query($conn,$sql2);

        
        if ($result2)
        {
            
            header("Location: index.php?success=your request sent");
	        exit();
        }
        else
        {
	        
	        header("Location: index.php?error=unknown error occurred");
		    exit();
        }
    }
}
else
{
	
	header("Location: index.php");
	exit();
}
?>