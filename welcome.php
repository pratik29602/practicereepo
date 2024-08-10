<?php
echo "Welcome to PHP";

// Database connection
$conn = mysqli_connect("localhost", "root", "pratik@123", "phptutorial");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['register'])) {
    echo "I am connected";

    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO student2 (name, email, password) VALUES ('$name', '$email', '$password')";
    
    $data = mysqli_query($conn, $sql);
    
    if ($data) {
        echo "New record created successfully";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
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
