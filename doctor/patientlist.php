<?php
session_start();
include_once '../assets/conn/dbconnect.php';
// include_once 'connection/server.php';
if(!isset($_SESSION['doctorSession']))
{
header("Location: ../index.php");
}
$usersession = $_SESSION['doctorSession'];
$res=mysqli_query($con,"SELECT * FROM doctor WHERE doctor_Id=".$usersession);
$userRow=mysqli_fetch_array($res,MYSQLI_ASSOC);
?>
<!doctype html>
<html lang="en">
  <head>
    <title>
        Patient's List
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
<div class="container-fluid" style="margin-top: 80px">
    <div class="row">
        <div class="col md 10">
            <h1>
            Patient's List
            </h1>
            <div class="card">
                <div class="card-header bg-primary text-light">
                    List of Patient's
                </div>  
                <div class="card-body"> 
                <table class="table">
                <thead>
                <tr>
                        <th>
                            Patient Username
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            Password
                        </th>
                        <th>
                            Contact No.
                        </th>
                        <th>
                            Gender
                        </th>
                        <th>
                            Status
                        </th>
                        <th>
                            Birth date
                        </th>
                        <th>
                            Address
                        </th>
                        <th>
                            Action
                        </th>
                    </tr>
                </thead>
                <?php 
                            $result=mysqli_query($con,"SELECT * FROM patient");
                            while ($patientRow=mysqli_fetch_array($result)) {
                                echo "<tbody>";
                                echo "<tr>";
                                    echo "<td>" . $patientRow['patient_username'] . "</td>";
                                    echo "<td>" . $patientRow['patient_Last_Name'] . "</td>";
                                    echo "<td>" . $patientRow['password'] . "</td>";
                                    echo "<td>" . $patientRow['patient_Phone'] . "</td>";
                                    echo "<td>" . $patientRow['patient_Gender'] . "</td>";
                                    echo "<td>" . $patientRow['patient_Maritial_Status'] . "</td>";
                                    echo "<td>" . $patientRow['patient_DOB'] . "</td>";
                                    echo "<td>" . $patientRow['patient_Address'] . "</td>";
                                    echo "<form method='POST'>";
                                    echo "<td class='text-center'><a href='#' id='".$patientRow['patient_username']."' class='delete'>Delete</a>
                            </td>";        
                            } 
                                echo "</tr>";
                           echo "</tbody>";
                       echo "</table>";
                       ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(function() {
$(".delete").click(function(){
var element = $(this);
var ic = element.attr("id");
var info = 'ic=' + ic;
if(confirm("Are you sure you want to delete this?"))
{
 $.ajax({
   type: "POST",
   url: "deletepatient.php",
   data: info,
   success: function(){
 }
});
  $(this).parent().parent().fadeOut(300, function(){ $(this).remove();});
 }
return false;
});
});
</script>
</body>
</html>