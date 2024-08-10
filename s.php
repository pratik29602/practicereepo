<?php
echo "Welcome to PHP";

// Database credentials
$servername = "localhost";
$username = "root";
$password = "pratik@123";
$dbname = "phptutorial";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['register'])) {
    $name = $_POST['username'];
    $email = $_POST['email'];
    $user_password = $_POST['password'];
    echo("practicing");
    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO student2 (name, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $user_password);

    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Upload the data to the database</h1>
    <form action="#" method="POST">
        <div>
            <label>Username</label>
            <input type="text" name="username" required>
        </div>
        <br>

        <div>
            <label>Email</label>
            <input type="email" name="email" required>
        </div>
        <br>

        <div>
            <label>Password</label>
            <input type="password" name="password" required>
        </div>
        <br>

        <div>
            <input type="submit" name="register" value="Register">
        </div>
    </form>
</body>

</html>
