<?php
$host = 'localhost';
$dbname = 'login'; // Your database name
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $enteredUsername = $_POST['username'];
        $enteredPassword = $_POST['password'];

        $query = "SELECT * FROM users WHERE username = :username AND password = :password";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':username', $enteredUsername);
        $stmt->bindParam(':password', $enteredPassword);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Redirect to the home page
            header('Location: Time-Table/index.html');
            exit;
        } else {
            header('Location: login_fail.html');
        }
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
