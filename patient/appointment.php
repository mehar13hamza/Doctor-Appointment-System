<?php
session_start();
include_once '../assets/conn/dbconnect.php';
$session= $_SESSION['patientSession'];

if (isset($_GET['schedule_Date']) && isset($_GET['appointment_Id'])) {
	$appdate =$_GET['schedule_Date'];
	$appid = $_GET['appointment_Id'];
}

$res = mysqli_query($con,"SELECT a.*, b.* FROM doctor_schedule a INNER JOIN patient b
WHERE a.schedule_Date='$appdate' AND schedule_Id=$appid AND b.patient_username='".$session."'");
$userRow=mysqli_fetch_array($res,MYSQLI_ASSOC);

if (isset($_POST['appointment'])) {
$patient_username = mysqli_real_escape_string($con,$userRow['patient_username']);
$scheduleid = mysqli_real_escape_string($con,$appid);
$symptom = mysqli_real_escape_string($con,$_POST['symptom']);
$comment = mysqli_real_escape_string($con,$_POST['comment']);
$avail = "not availble";


$query = "INSERT INTO appointment (patient_username, schedule_Id, appiontment_Symptom , appiontment_Comment)
VALUES ( '$patient_username', '$scheduleid', '$symptom', '$comment') ";

$sql = "UPDATE doctor_schedule SET book_status = '$avail' WHERE schedule_Id = $scheduleid";
$scheduleres=mysqli_query($con,$sql);
if ($scheduleres) {
	$btn= "disable";
} 


$result = mysqli_query($con,$query);
if( $result )
{
?>
<script type="text/javascript">
alert('Appointment made successfully.');
</script>
<?php
header("Location: patientapplist.php");
}
else
{
	echo mysqli_error($con);
?>
<script type="text/javascript">
alert('Appointment booking fail. Please try again.');
</script>
<?php
header("Location: patient.php");
}
}
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
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> <?php echo $userRow['patient_First_Name']; ?> <?php echo $userRow['patient_Last_Name']; ?></a>
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

    <div class="container" style="margin-top: 150px">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Patient Information
                </div>
                <div class="card-body">
                    <p class="card-text">
                        <ul>
                            <li>
                                Patient Name: <?php echo $userRow['patient_First_Name'] ?> <?php echo $userRow['patient_Last_Name'] ?>
                            </li>
                            <li>
                                Patient IC: <?php echo $userRow['patient_username'] ?>
                            </li>
                            <li>
                                Contact Number: <?php echo $userRow['patient_Phone'] ?>
                            </li>
                            <li>
                                Address: <?php echo $userRow['patient_Address'] ?> 
                            </li>
                        </ul>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                Appointment Information
                </div>
                <div class="card-body">
                    <p class="card-text">
                        <ul>
                            <li>
                                Day: <?php echo $userRow['schedule_Day'] ?>
                            </li>
                            <li>
                                Date: <?php echo $userRow['schedule_Date'] ?>
                            </li>
                            <li>
                                Time: <?php echo $userRow['start_Time'] ?> - <?php echo $userRow['end_Time'] ?>
                            </li><br>
                        </ul>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-12">
        <form class="form" role="form" method="POST" accept-charset="UTF-8">
            <div class="form-group">
                <label for="recipient-name" class="control-label">Symptom:</label>
                <input type="text" class="form-control" name="symptom" required>
            </div>
            <div class="form-group">
                <label for="message-text" class="control-label">Comment:</label>
                <textarea class="form-control" name="comment" required></textarea>
            </div>
            <div class="form-group">
                <input type="submit" name="appointment" id="submit" class="btn btn-primary" value="Make Appointment">
            </div>
		</form>
        </div>
    </div>
    </div>
<?php
  include ('footer.php');
?>