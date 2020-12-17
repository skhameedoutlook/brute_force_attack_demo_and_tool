<?php

$user = $_POST["username"];
$password = $_POST["password"];

if(strlen($password) < 3 || strlen($password) > 4) {
	die("Password Should Contain 3-4 lowercase characters.");
}
if(!ctype_lower($password)) {
	die("Password contains non-lowercase characters");
}

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

$sql = "INSERT INTO attack_demo_users_1(user, password) VALUES('$user', '$password')";
//echo $sql;
if ($conn->query($sql) === TRUE) {
  echo "Registered successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

?>