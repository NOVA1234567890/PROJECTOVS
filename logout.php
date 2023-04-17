<?php
session_start(); // Start session

// Clear all session data
$_SESSION = array();

// Destroy session
session_destroy();

// Redirect to login page
header("Location: login.php");
exit;
?>
