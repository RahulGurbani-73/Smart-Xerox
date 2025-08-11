<?php 
session_start();

// Unset and destroy session
session_unset();
session_destroy();

// Show alert before redirecting
echo "<script>
    alert('Logout Successful');
    window.location.href = 'index.php'; // Redirect after alert
</script>";

// Exit to prevent further execution
exit();
?>
