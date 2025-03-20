<?php
$host = "localhost:3307"; // Port explicitly added
$user = "root";
$password = "";
$dbname = "task_manager";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>