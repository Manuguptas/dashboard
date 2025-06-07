<?php
$conn = new mysqli("localhost", "root", "", "virtualclassroom");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!-- 
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profilePic` varchar(255) NOT NULL,
  `signup_date` date NOT NULL,
  `user_closed` varchar(3) NOT NULL,
  `num_posts` int(11) NOT NULL,
  `phoneNumber` int(50) NOT NULL,
  `bio` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1; -->
