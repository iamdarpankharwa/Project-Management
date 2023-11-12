<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Project Management</title>
    <link rel="stylesheet" href="CSS/style.css" type="text/css">
  </head>
  <body>

  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #A9CCE3;">
  <a class="navbar-brand" href="#">PMS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home <span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="add.php">Add User</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Tasks
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="assign.php">Assign Task</a>
          <a class="dropdown-item" href="remove.php">Remove Task</a>
          <a class="dropdown-item" href="view.php">View Task</a>
          
          
        </div>
      </li>
      
    </ul>
    
  </div>
</nav>
<main role="main" class="container">
      <h1 class="mt-5">Fill out following details</h1>
      <p class="lead">
      <form method="POST" action="add.php">
  <div class="form-group">
    <label for="exampleFormControlInput1">Username</label>
    <input type="text" class="form-control" id="uname" name="uname" placeholder="Enter username">
  </div>
  <div class="form-group">
  <label for="exampleFormControlInput1">Designation</label>
    <input type="text" class="form-control" id="desg" name="desg" placeholder="Enter designation">
  </div>
  <input type="submit" name="submit"></input>
</form>
    </p>

    <?php
    $hostname = "localhost:3306";
    $username = "root";
    $password = "";
    $database = "project-mgmt";
    
    // Connect to the MySQL server
    $conn = new mysqli($hostname, $username, $password, $database);
    
    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    if(isset($_POST['submit']))
    {
    // Replace 'new_database_name' with the name you want to give to your new database
    //$databaseName = "project-mgmt";
    if (isset($_POST['uname'])) {
    $uname = $_POST['uname'];
} else {
    // Handle the case where 'uname' is not set
}

if (isset($_POST['desg'])) {
    $desg = $_POST['desg'];
} else {
    // Handle the case where 'desg' is not set
}
    if($uname!=NULL and $desg!=NULL){
    $query = "insert into users (username,designation) values ('".$uname."','".$desg."');";
    $execute = mysqli_query($conn, $query);
    if ($execute) {
        echo "<script>
            alert('" . $uname. " has been added');
          </script>";
    }}

  }
  else
  {
    
  }
    ?>
      
</main>






<script src="https://kit.fontawesome.com/5099b17d5e.js" crossorigin="anonymous"></script>
<script src="https://smtpjs.com/v3/smtp.js"></script>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>