<?php require("../db/db.php");
session_start();

if($_SESSION["admin"]=="true"){

}else{
  header("Location: /admin/");

}

$name = $_POST["name"];
$dept = $_POST["dept"];
$email = $_POST["email"];
$passwd =$_POST["passwd"];
$sql = "INSERT INTO staff (name,dept,email,passwd)
VALUES ('$name','$dept','$email','$passwd')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
  header("Location: /admin/home.php");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();