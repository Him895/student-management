<?php 
session_start(); // Start the session

if(!isset($_SESSION['admin'])) {
    header("location: login.php"); // Redirect to login page if not logged in
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<body>
    <div class="container">
        <h1>Welcome, <?= $_SESSION['admin'] ?></h1>
        <a href="manage_student.php" class="back-link">Manage Students</a>
        <br><br>
        <a href="logout.php" class="logout-link">Logout</a>
    </div>
</body>

</body>
</html>