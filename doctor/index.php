<?php
include_once '../assets/conn/dbconnect.php';

session_start();
if (isset($_SESSION['doctorSession']) != "") {
header("Location: doctordashboard.php");
}
if (isset($_POST['login']))
{
$doctorId = mysqli_real_escape_string($con,$_POST['doctor_Id']);
$password  = mysqli_real_escape_string($con,$_POST['password']);

$res = mysqli_query($con,"SELECT * FROM doctor WHERE doctor_Id = '$doctorId'");

$row=mysqli_fetch_array($res,MYSQLI_ASSOC);
if ($row['password'] == $password)
{
$_SESSION['doctorSession'] = $row['doctor_Id'];
?>
<script type="text/javascript">
alert('Login Success');
</script>
<?php
header("Location: doctordashboard.php");
} else {
?>
<script type="text/javascript">
    alert("Wrong input");
</script>
<?php
}
}
?>
<!doctype html>
<html lang="en">
  <head>
    <title>
        Doctor's Login
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../assets/js/script.js"></script>
  </head>
  <body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
  <div class="container">
  <a class="navbar-brand" href="index.php"><img src="../assets/img/logo.png" style="width: 15%;"></img><span>Care Medical Centre</span></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  </div>
</nav>

<div class="container" style="margin-top: 200px;">
    <div class="row">
        <div class="col-md-3">
        
        </div>
        <div class="col-md-6" style="background-color: whitesmoke; padding: 20px;">
            <h1 class="text-center">
                Sign In
            </h1>
            <form class="form" role="form" method="POST" accept-charset="UTF-8">
                <input name="doctor_Id" class="form-control" type="text" placeholder="Doctor ID" required>
                <input name="password" class="form-control" type="password" placeholder="Password" required>
                <button class="btn btn-info btn-block login form-control" type="submit" name="login">Login</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>