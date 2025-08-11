<?php 
session_start();


if (isset($_SESSION['firstname']) && isset($_SESSION['lastname']) && isset($_SESSION['sem']) && isset($_SESSION['enroll'])) {
?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	
	<h1>Hello, <?php echo $_SESSION['firstname']; ?></h1>
	<h1>semester--> <?php echo $_SESSION['sem']; ?></h1>
	<h1>enrollment--> <?php echo $_SESSION['enroll']; ?></h1>
	
	<a href="logout.php">Logout</a>
	<a href="index.php#upload">upload</a>
</body>
</html>

<?php 
} else {
	
	header("Location: index.php");
	exit();
}
?>
