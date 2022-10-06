<?php require("../db/db.php");
session_start();
$id = $_SESSION['id'];
$dept = $_SESSION['dept'];
if($_SESSION["staff"]=="true"){

}else{
  header("Location: /staff/");

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body style="background-color:whitesmoke">
<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><b>Staff</b></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav ms-auto" style="font-size:18px">
        <li class="nav-item">
          <a class="nav-link " href="/staff/home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="/staff/assignment.php">Assignments</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="/staff/chat.php">Chat</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="/">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container" style="background-color:whitesmoke;padding-top:20px">
  <div >
    <?php 
      $sql = "SELECT * FROM upload where id=$id";
      $result = $conn->query($sql);
      
      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          ?>
    <div class="row">
      <div class="col-11">
        <h3 style="color:#0d6efd;"><?php echo $row['name']?></h3>
      </div>
    </div>
    <div class="container">
        <p>File Name : <span style="color:#0d6efd"><?php echo $row['name']?></span></p>
        <p>Dept : <span style="color:#0d6efd"><?php echo $row['dept']?></span></p>
        <p>Sem : <span style="color:#0d6efd"><?php echo $row['sem']?></span></p>
 
            <center><iframe src="data:application/pdf;base64,<?php echo base64_encode($row['file']); ?>#toolbar=1" width="90%" height="1000px"></center>         
        
    </div>
        <?php
        }
      } else {
        echo "0 Files";
      }
      ?>
    <br><br>
  </div>
</div>


    
</body>
</html>