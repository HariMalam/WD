<?php
session_start();
include_once 'config.php';

// Redirect to protected page if user is already logged in
if (isset($_SESSION['user_id'])) {
    header('Location: ../protected/index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $enteredUsername = $_POST['username'];
    $enteredPassword = $_POST['password'];

    $query = "SELECT * FROM  WHERE username = :username";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':username', $enteredUsername);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($enteredPassword, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header('Location: ../protected/index.php');
        exit;
    } else {
        header('Location: login_fail.php');
        exit;
    }
}
?>

<!-- Your login form code here -->
