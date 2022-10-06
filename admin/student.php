<?php require("../db/db.php");
session_start();

if($_SESSION["admin"]=="true"){

}else{
  header("Location: /admin/");

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subjects</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body style="background-color:whitesmoke">
<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><b>Admin</b></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav ms-auto" style="font-size:18px">
        <li class="nav-item">
          <a class="nav-link" href="/admin/home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/admin/subject.php">Subject</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="/admin/student.php">Student</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/admin/subject.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container" style="background-color:whitesmoke;padding-top:20px">
  <div class="jumbotron">
    <div class="row">
      <div class="col-11">
        <h3 style="color:#0d6efd;">New Student</h3>
      </div>
    </div>
    <div class="row">
    <?php 
            $sql = "SELECT * FROM student where allow='false'";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                ?>
                <div class="col-6">
                    <div class="card" style="margin-bottom:10px">
                        <div class="card-body">
                            <p>Name : <?php echo $row["name"]?></p>
                            <p>Dept : <?php echo $row["dept"]?></p>
                            <p>Sem : <?php echo $row["sem"]?></p>
                            <div class="row">
                                <div class="col-10"></div>
                                <div class="col-2"><a href="/admin/allowstudent.php?id=<?php echo$row['id']?>"><button class="btn btn-primary">Allow</button></a></div>
                            </div>
                        </div>
                    </div>
                  </div>
                  <?php
              }
            } else {
              echo "0 students ";
            }
            ?>
      </div>
    </div>
  </div>

</div>


<div class="container" style="background-color:whitesmoke;padding-top:20px">
  <div class="jumbotron">
    <div class="row">
      <div class="col-11">
        <h3 style="color:#0d6efd;">Students</h3>
      </div>
    </div>
    <div class="row">
    <?php 
            $sql = "SELECT * FROM student where allow='true'";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                ?>
                <div class="col-6">
                    <div class="card" style="margin-bottom:10px">
                        <div class="card-body">
                            <p>Name : <?php echo $row["name"]?></p>
                            <p>Dept : <?php echo $row["dept"]?></p>
                            <p>Sem : <?php echo $row["sem"]?></p>
                        </div>
                    </div>
                  </div>
                  <?php
              }
            } else {
              echo "0 students ";
            }
            ?>
      </div>
    </div>
  </div>

</div>

    
</body>
</html>