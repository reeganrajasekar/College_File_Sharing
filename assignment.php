
<?php require("./db/db.php");
session_start();
$sem = $_SESSION['sem'];
$dept = $_SESSION['dept'];
$name = $_SESSION['name'];
$id = $_SESSION['id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body style="background-color:whitesmoke">
<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><b>Student</b></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav ms-auto" style="font-size:18px">
        <li class="nav-item">
          <a class="nav-link " href="/home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="/assignment.php">Assignment</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/chat.php">Chat</a>
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
          <div class="row">
            <div class="col-11">
              <h3 style="color:#0d6efd;">Documents</h3>
            </div>
          </div>
          <div class="row">
          <?php 
            $sql = "SELECT * FROM assignment where dept='$dept' and sem='$sem'";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
               
                if (isset($_COOKIE[$row["id"]])) {?>
                  <div class="col-6">
                  <div class="card" style="margin-bottom:10px;">
                <?php } else { ?>
                  <div class="col-6">
                  <div class="card" style="margin-bottom:10px">
                <?php }
                
                ?>
              
                    <div class="card-body">
                        <p>File Name : <?php echo $row['name']?></p>
                        <h3 class="float-end" style="width:100px;color:#0d6efd;border:2px solid #0d6efd;text-align:center" data-bs-toggle="modal" data-bs-target="#myModal">+</h3>
                    </div>
                </div>
              </div>
              <?php
              }
            } else {
              echo "0 Files";
            }
            ?>
      </div>
    </div>
        </div>
    </div>

</div>


<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">File</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="/upload.php" enctype="multipart/form-data"  class="container" method="POST">
            <div class="form-floating mb-3">
              <input value="<?php echo $name ?>" type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="name">
              <label for="floatingInput">Name</label>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="sub">
              <label for="floatingInput">Subject</label>
            </div>
              <input type="hidden" value="<?php echo $dept ?>"  class="form-control" id="floatingPassword" placeholder="Password" name="dept">
              
              <input type="hidden" value="<?php echo $sem ?>" class="form-control" id="floatingInput" placeholder="name@example.com" name="sem">
              <input type="hidden" value="<?php echo $id ?>" class="form-control" id="floatingInput" placeholder="name@example.com" name="subname">
              
    
            <div class="form-floating mb-3">
              <input type="file" name="image" class="form-control" id="floatingPassword" placeholder="Password">
              <label for="floatingPassword">File</label>
            </div>
            <div class="d-grid">
              <input type="submit" class="btn btn-primary btn-login text-uppercase fw-bold" name="submit" value="Upload">
            </div>
        </form>
      </div>

    </div>
  </div>
</div>


    
</body>
</html>