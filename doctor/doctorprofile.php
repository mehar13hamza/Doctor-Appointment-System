<?php
session_start();
include_once '../assets/conn/dbconnect.php';
if(!isset($_SESSION['doctorSession']))
{
header("Location: ../index.php");
}
$usersession = $_SESSION['doctorSession'];
$res=mysqli_query($con,"SELECT * FROM doctor WHERE doctor_Id=".$usersession);
$userRow=mysqli_fetch_array($res,MYSQLI_ASSOC);


if (isset($_POST['submit'])) {
$doctorFirstName = $_POST['doctor_FirstName'];
$doctorLastName = $_POST['doctor_LastName'];
$doctorPhone = $_POST['doctor_Phone'];
$doctorEmail = $_POST['doctor_Email'];
$doctorAddress = $_POST['doctor_Address'];

$res=mysqli_query($con,"UPDATE doctor SET doctor_FirstName='$doctorFirstName', doctor_LastName='$doctorLastName', doctor_Phone='$doctorPhone', doctor_Email='$doctorEmail', doctor_Address='$doctorAddress' WHERE doctor_Id=".$_SESSION['doctorSession']);

header( 'Location: doctorprofile.php' ) ;
}
?>
<!doctype html>
<html lang="en">
  <head>
    <title>
        Doctor's Profile
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
  <a class="navbar-brand" href="doctordashboard.php"><img src="../assets/img/logo.png" style="width: 15%"></img> Care Medical Centre</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  
  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav ml-auto">
      <li class="nav-link active">
          <a href="doctordashboard.php" style="color: white;"><i class="fa fa-fw fa-dashboard"></i>Dashboard</a>
      </li>
      <li class="nav-link active">
          <a href="addschedule.php" style="color: white;"><i class="fa fa-fw fa-table"></i>Doctor Schedule</a>
      </li>
      <li class="nav-link active">
          <a href="patientlist.php" style="color: white;"><i class="fa fa-fw fa-edit"></i>Patient List</a>
      </li>
      <li class="nav-link active">
          <a href="contact_qureies.php" style="color: white;"><i class="fa fa-fw fa-edit"></i>Contact Us Quries</a>
      </li>
      
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> <?php echo $userRow['doctor_FirstName']; ?> <?php echo $userRow['doctor_LastName']; ?></a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="doctorprofile.php">Profile</a>
          <hr>
          <a class="dropdown-item" href="logout.php?logout">Logout</a>
        </div>
      </li>
    </ul>
  </div>
  </div>
</nav>
<div class="container" style="margin-top: 120px; background-color: whitesmoke;">
    <div class="row">
        <div class="col-md-7">
            <h1 style="text-transform: uppercase;">
            <?php echo $userRow['doctor_FirstName']; ?> <?php echo $userRow['doctor_LastName']; ?>
            </h1>
        </div>
        <div class="col-md-3">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" style="margin-top: 20px;">
                Edit Profile
            </button>
        </div>
    </div>
    <hr>
    <table class="table table-border">
        <tr>
            <td>
            Doctor ID
            </td>
            <td>
            <?php echo $userRow['doctor_Id']; ?>
            </td>
        </tr>
        <tr>
            <td>
            Username
            </td>
            <td>
            <?php echo $userRow['doctor_username']; ?>
            </td>
        </tr>
        <tr>
            <td>
            Address
            </td>
            <td>
            <?php echo $userRow['doctor_Address']; ?>
            </td>
        </tr>
        <tr>
            <td>
            Contact Number
            </td>
            <td>
            <?php echo $userRow['doctor_Phone']; ?>
            </td>
        </tr>
        <tr>
            <td>
            Email
            </td>
            <td>
                <?php echo $userRow['doctor_Email']; ?>
            </td>
        </tr>
        <tr>
            <td>
            Birthdate
            </td>
            <td>
                <?php echo $userRow['doctor_DOB']; ?>
            </td>
        </tr>
    </table>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <form action="<?php $_PHP_SELF ?>" method="post" >
                                    <table class="table table-user-information">
                                                <tbody>
                                                    <tr>
                                                        <td>Usernaem:</td>
                                                        <td><?php echo $userRow['doctor_username']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>First Name:</td>
                                                        <td><input type="text" class="form-control" name="doctor_FirstName" value="<?php echo $userRow['doctor_FirstName']; ?>"  /></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Last Name</td>
                                                        <td><input type="text" class="form-control" name="doctor_LastName" value="<?php echo $userRow['doctor_LastName']; ?>"  /></td>
                                                    </tr> 
                                                    <tr>
                                                        <td>Phone number</td>
                                                        <td><input type="text" class="form-control" name="doctor_Phone" value="<?php echo $userRow['doctor_Phone']; ?>"  /></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Email</td>
                                                        <td><input type="text" class="form-control" name="doctor_Email" value="<?php echo $userRow['doctor_Email']; ?>"  /></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Address</td>
                                                        <td><textarea class="form-control" name="doctor_Address"  ><?php echo $userRow['doctor_Address']; ?></textarea></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="submit" name="submit" class="btn btn-info" value="Update Info"></td>
                                                </tr>
                                            </tbody>
                                </table>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</body>
</html>