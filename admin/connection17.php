<?php
//connecting to the database//
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student2";

$conn = new mysqli($servername, $username, $password,$dbname);
if ($conn->connect_error) {
    die("". $conn->connect_error);
}
?>