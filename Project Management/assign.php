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
        <a class="nav-link" href="add.php">Add User</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Tasks
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item active" href="assign.php">Assign Task</a>
          <a class="dropdown-item" href="remove.php">Remove Task</a>
          <a class="dropdown-item" href="view.php">View Task</a>
          
          
        </div>
      </li>
      
    </ul>
    
  </div>
</nav>
<main role="main" class="container mt-5">
    <h4>Select User: <h4>
      <form method = "POST">
        <select style="width:30%" name="user">
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
$sql = "select * from users";
$result = $conn->query($sql);
if($result->num_rows > 0)
{
    
    while($row=$result->fetch_assoc())
    {
        echo '<option value ="'.$row["UID"].'">'.$row["username"].'</option>';
    }
}

    ?>
  </select>    
  <h4>Assign Task: </h4>
  <div class="form-group">
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="task"></textarea>
  </div>
  <input type="submit" name="submit" class="bg-success"></input>
</form>   
</main>
<?php

if (isset($_POST['task'])) {
  $task = $_POST['task'];
} 
else {
  
}
if(isset($_POST['submit']))
{
$getuserid = $_POST['user'];
$query = "insert into tasks(task, UID) values ('".$task."','".$getuserid."');";
$execute = mysqli_query($conn, $query);
if($task!=NULL and $getuserid!=NULL)
{
    if ($execute) {
        echo "<script>
            alert('Task is assigned successfully');
          </script>";
    }
}
else
{

}
}
else
{

}
?>






<script src="https://kit.fontawesome.com/5099b17d5e.js" crossorigin="anonymous"></script>
<script src="https://smtpjs.com/v3/smtp.js"></script>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>