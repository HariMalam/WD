<?php
session_start();

// Redirect to login page if user is not logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../authentication/login.php');
    exit;
}

// Handle logout request
if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: ../authentication/login.php'); // Redirect to login page after logout
    exit;
}

// Redirect to another project after checking session
header('Location: ../../frontpage.php'); // Update the path as needed
exit;
?>
