<?php
require("../db/db.php");
$name = $_POST["name"];
$dept = $_POST["dept"];
$sem = $_POST["sem"];
$subname = $_POST["staff"];

$sql = "INSERT INTO assignment (name,dept,sem,subname)
VALUES ('$name','$dept','$sem','$subname')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
  header("Location: /staff/assignment.php");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
  header("Location: /staff/assignment.php");


}

$conn->close();



?>