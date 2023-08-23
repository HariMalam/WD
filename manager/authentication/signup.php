<?php
include_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstname = $_POST['firstname'];
    $surname = $_POST['surname'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $birthdate = $_POST['birthdate'];
    $gender = $_POST['gender'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    $query = "INSERT INTO users (username, password, firstname, surname, mobile, email, birthdate, gender) VALUES (:username, :password, :firstname, :surname, :mobile, :email, :birthdate, :gender)";
    $stmt = $conn->prepare($query);

    // Bind parameters
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $hashedPassword);
    $stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':surname', $surname);
    $stmt->bindParam(':mobile', $mobile);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':birthdate', $birthdate);
    $stmt->bindParam(':gender', $gender);

    if ($stmt->execute()) {
        header('Location: ../signup_success.html');
        exit;
    } else {
        echo "Signup failed.";
    }
}
?>
