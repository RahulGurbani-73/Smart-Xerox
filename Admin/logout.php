<?php 
session_start();


session_unset();


session_destroy();

// Redirect to index.php
header("Location: index.php");
?>