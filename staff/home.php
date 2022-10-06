
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
          <a class="nav-link active" href="/staff/home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/staff/assignment.php">Assignments</a>
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
          <div class="row">
            <div class="col-11">
              <h3 style="color:#0d6efd;">Files :</h3>
            </div>
            <div class="col-1">
              <h3 style="color:#0d6efd;border:2px solid #0d6efd;text-align:center" data-bs-toggle="modal" data-bs-target="#myModal">+</h3>
            </div>
          </div>
          <div class="row">
          <?php 
            $sql = "SELECT * FROM file where staff='$id'";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                ?>

            <div class="col-6">
              <div class="card" style="margin-bottom:10px">
                  <div class="card-body">
                      <p>File Name : <?php echo $row["name"]?></p>
                      <p>Dept : <?php echo $row["dept"]?>   / Sem : <?php echo $row["sem"]?></p>
                      <p>Subject : <?php echo $row["subject"]?></p>
                      <p>Total Visit : <?php echo $row["total"]?></p>
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
        <form action="/staff/newfile.php" enctype="multipart/form-data"  class="container" method="POST">
            <div class="form-floating mb-3">
              <input value="<?php echo $id ?>" disabled type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="staff">
              <label for="floatingInput">Staff ID</label>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="sub">
              <label for="floatingInput">Subject</label>
            </div>
            <div class="form-floating mb-3">
              <input type="text" value="<?php echo $dept ?>" disabled class="form-control" id="floatingPassword" placeholder="Password" name="dept">
              <label for="floatingPassword">Dept</label>
            </div>
            <div class="form-floating mb-3">
              <input type="number" class="form-control" id="floatingInput" placeholder="name@example.com" name="sem">
              <label for="floatingInput">Sem</label>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingPassword" placeholder="Password" name="name">
              <label for="floatingPassword">Name</label>
            </div>
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