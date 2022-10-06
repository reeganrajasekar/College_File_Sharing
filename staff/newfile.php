<?php require("../db/db.php");
session_start();

if($_SESSION["staff"]=="true"){

}else{
  header("Location: /staff/");

}

$statusMsg = '';

$staff =$_SESSION["id"];
$dept = $_SESSION["dept"];
$sem = $_POST["sem"];
$name = $_POST["name"];
$sub = $_POST["sub"];


$status = $statusMsg = ''; 
if(isset($_POST["submit"])){ 
    $status = 'error'; 
    if(!empty($_FILES["image"]["name"])) { 
        // Get file info 
        $fileName = basename($_FILES["image"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
        echo($fileType);
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif','pdf'); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['image']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image)); 
         
            // Insert image content into database 
            $sql  = "INSERT into file (staff,name,dept,sem,subject,total,file,ftype)
             VALUES ('$staff','$name','$dept','$sem','$sub','0','$imgContent','$fileType')"; 
             
            if($conn->query($sql) === TRUE){ 
                $status = 'success'; 
                $statusMsg = "File uploaded successfully.";
                header("Location: /staff/home.php");
            }else{ 
                echo "Error: " . $sql . "<br>" . $conn->error;
                $statusMsg = "File upload failed, please try again."; 
            }  
        }else{ 
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
        } 
    }else{ 
        $statusMsg = 'Please select an image file to upload.'; 
    } 
} 
 
// Display status message 
echo $statusMsg; 
?>