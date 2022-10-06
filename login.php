
<?php require("./db/db.php");

$email = $_POST['email'];
$passwd = $_POST['passwd'];
$sql = "select * from student where email='$email'";
$result = $conn->query($sql);
session_start();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        if($row["passwd"]==$passwd){
            if ($row['allow']=='true') {
                $_SESSION["sem"] = $row["sem"];
                $_SESSION["dept"] = $row["dept"];
                $_SESSION["name"] = $row["name"];
                $_SESSION["id"] = $row["id"];
                $_SESSION["student"]="true";
                header("Location: /home.php");
            } else {
                header("Location: /?data=You are in the Waiting List");
            }
            
            die();
        }
        else{
            header("Location: /?data=Username or Password Wrong");
        }
    }
}else{
    header("Location: /?data=Username or Password Wrong");
}
?>