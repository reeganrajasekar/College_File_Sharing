<?php require("../db/db.php");
session_start();

if($_SESSION["admin"]=="true"){

}else{
  header("Location: /admin/");

}

$name = $_POST["name"];
$dept = $_POST["dept"];
$sem = $_POST["sem"];
$staffid =$_POST["staffid"];
$sql = "INSERT INTO subject (name,dept,sem,staffid)
VALUES ('$name','$dept','$sem','$staffid')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
  header("Location: /admin/subject.php");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();