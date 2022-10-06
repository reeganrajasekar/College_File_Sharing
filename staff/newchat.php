<?php
require("../db/db.php");
session_start();

$name = $_SESSION["name"];
$dept = $_SESSION["dept"];
$sem = $_SESSION["sem"];
$chat = $_POST["data"];

$sql = "INSERT INTO chat (name,dept,sem,chat,subname)
VALUES ('$name','$dept','$sem','$chat','')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
  header("Location: /staff/chat.php");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
  header("Location: /staff/chat.php");
    die();

}

$conn->close();



?>