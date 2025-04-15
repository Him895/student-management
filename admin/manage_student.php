<?php 
include 'connection17.php'; // Include the database connection file
session_start(); // Start the session

if(!isset($_SESSION['admin'])){
    header("location: login.php"); // Redirect to login page if not logged in
    exit();
}

// add student
if (isset($_POST['add'])){
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $roll_no = $conn->real_escape_string($_POST['roll_no']);
    $class = $conn->real_escape_string($_POST['class']);

    $sql = "INSERT INTO students (name, email, roll_no, class) 
        VALUES ('$name', '$email', '$roll_no', '$class')";

if ($conn->query($sql)) {
    echo "<script>alert('Student added successfully');</script>";
} else {
    echo "<script>alert('Error adding student: " . $conn->error . "');</script>";
}


}



  // Delete student (GET method)
  if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $conn->query("DELETE FROM students WHERE id = $id");
}
// Fetch all students
$result = $conn->query("SELECT * FROM students ORDER BY id DESC");
if (!$result) {
    die("Query failed: " . $conn->error);
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
    <h2>Manage student</h2>
    <p><a href="dashboard.php">Back to dashboard</a></p>
    <form action="" method="post">
        <label for="">Name</label>
        <input type="text" name="name" required><br><br>

        <label for="">Email</label>
        <input type="email" name="email" required><br><br>

        <label for="">Roll</label>
        <input type="text" name="roll_no" required><br><br>

        <label for="">Class</label>
        <input type="text" name="class" required><br><br>

        <button type="submit"name="add">ADD Student</button>
    </form>
    <!--student table-->
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Roll</th>
                <th>Class</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= htmlspecialchars($row['name']) ?></td>
                    <td><?= htmlspecialchars($row['email']) ?></td>
                    <td><?= htmlspecialchars($row['roll_no']) ?></td>
                    <td><?= htmlspecialchars($row['class']) ?></td>
                    <td class="action-links">
                        
                    <a href="manage_student.php?delete=<?=$row['id']?>" onclick="return confirm('Delete this student')">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>


</body>
</html>