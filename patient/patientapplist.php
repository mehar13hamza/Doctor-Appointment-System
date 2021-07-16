<?php
session_start();
include_once '../assets/conn/dbconnect.php';
$session = $_SESSION[ 'patientSession'];
$res=mysqli_query($con, "SELECT a.*, b.*,c.* FROM patient a
	JOIN appointment b
		On a.patient_username = b.patient_username
	JOIN doctor_schedule c
		On b.schedule_Id=c.schedule_Id
	WHERE b.patient_username ='$session'");
	if (!$res) {
		die( "Error running $sql: " . mysqli_error());
	}
  $userRow=mysqli_fetch_array($res);
  
  $res2=mysqli_query($con,"SELECT * FROM patient WHERE patient_username ='$session'");

if ($res2===false) {
	echo mysql_error();
} 

$userRow2=mysqli_fetch_array($res2,MYSQLI_ASSOC);
?>
<html lang="en">
  <head>
    <title>
        Home
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
  <a class="navbar-brand" href="patient.php"><img src="../assets/img/logo.png" style="width: 15%;"></img><span>Care Medical Centre</span></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav ml-auto">
      <li class="nav-link active">
          <a href="patient.php" style="color: white;">Home</a>
      </li>
      <li class="nav-link active">
          <a href="patientapplist.php?patientId=<?php echo $userRow['patient_username']; ?>" style="color: white;">Appointment</a>
      </li>
      <li class="nav-link active">
          <a href="contact.php" style="color: white;">Contact US</a>
      </li>
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> <?php echo $userRow2['patient_First_Name']; ?> <?php echo $userRow2['patient_Last_Name']; ?></a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="profile.php?patient_Id=<?php echo $userRow['patient_username']; ?>">Profile</a>
          <hr>
          <a class="dropdown-item" href="patientlogout.php?logout">Logout</a>
        </div>
      </li>
    </ul>
  </div>
  </div>
</nav>

<div class="container" style="margin-top: 120px">
    <h1 style="font-size: 50px; text-transform: uppercase;">
        Your appointments
    </h1>
    <div class="row">
        <div class="col md 10">
        <div class="card">
        <div class="card-header bg-primary text-light">
            List of Appointment
        </div>
        <div class="card-body">
            <table class="table" >
                <thead>
                <tr>
                        <th>
                            Appointment Id
                        </th>
                        <th>
                            Patient Username
                        </th>
                        <th>
                            Patient Last Name
                        </th>
                        <th>
                            Schedule Day
                        </th>
                        <th>
                            Schedule Date
                        </th>
                        <th>
                            Start Time
                        </th>
                        <th>
                            End Time
                        </th>
                        <th>
                            Action
                        </th>
                    </tr>
                </thead>
            <?php
                $res = mysqli_query($con, "SELECT a.*, b.*,c.*
                FROM patient a
                JOIN appointment b
                On a.patient_username = b.patient_username
                JOIN doctor_schedule c
                On b.schedule_Id=c.schedule_Id
                WHERE b.patient_username ='$session'");
            
            if (!$res) {
            die("Error running $sql: " . mysqli_error());
            }
            
            
            while ($userRow = mysqli_fetch_array($res)) {
            echo "<tbody>";
            echo "<tr>";
            echo "<td>" . $userRow['appointment_Id'] . "</td>";
            echo "<td>" . $userRow['patient_username'] . "</td>";
            echo "<td>" . $userRow['patient_Last_Name'] . "</td>";
            echo "<td>" . $userRow['schedule_Day'] . "</td>";
            echo "<td>" . $userRow['schedule_Date'] . "</td>";
            echo "<td>" . $userRow['start_Time'] . "</td>";
            echo "<td>" . $userRow['end_Time'] . "</td>";
            echo "<td class='text-center'><a href='#' id='".$userRow['appointment_Id']."' class='delete'>Delete</a>";
            echo "<td><a href='invoice.php?appid=".$userRow['appointment_Id']."' target='_blank'>Print</a></td>";
            }
            
            echo "</tr>";
                ?>       
            </table>
        </div>
        </div>
        </div>
    </div>
</div>
<br><br><br><br><br><br><br>
<script type="text/javascript">
$(function() {
$(".delete").click(function(){
var element = $(this);
var appid = element.attr("id");
var info = 'id=' + appid;
if(confirm("Are you sure you want to delete this?"))
{
 $.ajax({
   type: "POST",
   url: "deleteappointment.php",
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

<?php
  include ('footer.php');
?>