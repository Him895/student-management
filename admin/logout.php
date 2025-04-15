<?php 
session_start(); // Start the session
session_destroy(); // Destroy the session
header("location: login.php"); // Redirect to login page
exit(); // Exit the script
?>