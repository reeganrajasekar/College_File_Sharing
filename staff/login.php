<?php
require("../db/db.php");
$email = $_POST['email'];
$passwd = $_POST['passwd'];
$sql = "select * from staff";
$result = $conn->query($sql);
session_start();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        if($row["email"]==$email){
            if($row["passwd"]==$passwd){
                $_SESSION["staff"] = "true";
                $_SESSION["id"] = $row["id"];
                $_SESSION["dept"] = $row["dept"];
                $_SESSION["name"] = $row["name"];
                header("Location: /staff/home.php");
                die();
            }
            else{
                echo("Password Wrong");
            }
        }
    }
}
?>