<?php
require("./db/db.php");
$name = $_POST["name"];
$dept = $_POST["dept"];
$sem = $_POST["sem"];
$email = $_POST["email"];
$passwd = $_POST["passwd"];

$sql = "INSERT INTO student (name,dept,sem,email,passwd,allow)
VALUES ('$name','$dept','$sem','$email','$passwd','false')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
  header("Location: /");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
  header("Location: /");

}

$conn->close();



?>