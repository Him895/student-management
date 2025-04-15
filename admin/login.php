<?php 
session_start(); // Start the session
include 'connection17.php'; // Include the database connection file


$error = ""; // Initialize error message

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $conn->real_escape_string($_POST['username']);
    $password = md5($_POST['password']); // Hash the password

    $sql  = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if($result->num_rows === 1){
        $_SESSION['admin'] = $username; // Store username in session
        header("location: dashboard.php"); // Redirect to dashboard
        exit();
    } else {
        $error = "Invalid username or password"; // Set error message
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Admin login</h2>
    <form action="" method="post">

        <label for="">Username</label>
        <input type="text" name="username"  required><br><br>

        <label for="">Password</label>
        <input type="password" name="password" required><br><br>

        <input type="submit" name="login" value="Login"><br><br>
    </form>
    <p style="color:red;"><?= $error ?></p>
</body>
</html>