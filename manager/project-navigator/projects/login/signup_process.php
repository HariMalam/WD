<?php
$host = 'localhost';
$dbname = 'login'; // Your database name
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $firstname = $_POST['firstname'];
        $surname = $_POST['surname'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        $birthdate = $_POST['birthdate'];
        $gender = $_POST['gender'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $signupDatetime = date('Y-m-d H:i:s'); // Current date and time
    
        // Check if mobile number is already registered
        $queryMobileCheck = "SELECT id FROM users WHERE mobile = :mobile";
        $stmtMobileCheck = $conn->prepare($queryMobileCheck);
        $stmtMobileCheck->bindParam(':mobile', $mobile);
        $stmtMobileCheck->execute();
        
        // Check if username is already registered
        $queryUsernameCheck = "SELECT id FROM users WHERE username = :username";
        $stmtUsernameCheck = $conn->prepare($queryUsernameCheck);
        $stmtUsernameCheck->bindParam(':username', $username);
        $stmtUsernameCheck->execute();
        
        if ($stmtMobileCheck->rowCount() > 0) {
            echo "Phone number is already registered.";
        } elseif ($stmtUsernameCheck->rowCount() > 0) {
            echo "Username is not available.";
        } else {
            $query = "INSERT INTO users (firstname, surname, mobile, email, birthdate, gender, username, password, signup_datetime) VALUES (:firstname, :surname, :mobile, :email, :birthdate, :gender, :username, :password, :signup_datetime)";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':firstname', $firstname);
            $stmt->bindParam(':surname', $surname);
            $stmt->bindParam(':mobile', $mobile);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':birthdate', $birthdate);
            $stmt->bindParam(':gender', $gender);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':signup_datetime', $signupDatetime);
            
            if ($stmt->execute()) {
                header('Location: signup_success.html');
                exit;
            } else {
                echo "Signup failed.";
            }
        }
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
