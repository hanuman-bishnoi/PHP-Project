<?php
$conn = new mysqli("localhost:3307", "root", "");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected to MySQL successfully!";
}
?>