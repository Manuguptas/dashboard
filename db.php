<?php
$conn = new mysqli("localhost", "root", "", "virtualclassroom");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
