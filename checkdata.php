<?php

$user = $_POST["username"];
$password = $_POST["password"];

$servername = "localhost";
$username = "root";
$password = "";
$db = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$user = $_POST["username"];
$password = $_POST["password"];

$sql = "SELECT user, password FROM attack_demo_users_1 WHERE user='$user' AND password='$password'";
$result = $conn->query($sql);
//echo $sql;
if ($result->num_rows > 0) {
  echo "found";
} else {
  echo "notfound";
}

?>

