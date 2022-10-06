<?php require("../db/db.php");
session_start();

if($_SESSION["admin"]=="true"){

}else{
  header("Location: /admin/");

}

$id = $_GET["id"];
$sql = "update student set allow='true' where id='$id'";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
  header("Location: /admin/student.php");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();