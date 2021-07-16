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
// insert


if (isset($_POST['submit'])) {
$date = mysqli_real_escape_string($con,$_POST['date']);
$scheduleday  = mysqli_real_escape_string($con,$_POST['schedule_day']);
$starttime     = mysqli_real_escape_string($con,$_POST['start_time']);
$endtime     = mysqli_real_escape_string($con,$_POST['end_time']);
$bookavail         = mysqli_real_escape_string($con,$_POST['book_status']);

//INSERT
$query = " INSERT INTO doctor_schedule (  schedule_Date, schedule_Day, start_Time, end_Time,  book_status)
VALUES ( '$date', '$scheduleday', '$starttime', '$endtime', '$bookavail' ) ";

$result = mysqli_query($con, $query);
// echo $result;
if( $result )
{
?>
<script type="text/javascript">
alert('Schedule added successfully.');
</script>
<?php
}
else
{
?>
<script type="text/javascript">
alert('Added fail. Please try again.');
</script>
<?php
}
}
?>
<!doctype html>
<html lang="en">
  <head>
    <title>
        Doctor's Schedule
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
<h1 class="text-center">
            Doctor Schedule
            </h1>
    <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
            
            <div class="card">
                <div class="card-header bg-primary text-light">
                    Add Schedule
                </div>  
                <div class="card-body"> 
                    <div class="row">
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-12  col-xs-12" style="border:3px solid red; padding: 20px; border-radius: 5px;">
                            <form class="form-horizontal" method="post">
                                 <div class="form-group form-group-lg">
                                  <label class="control-label   requiredField" for="date">
                                   Date
                                   <span class="asteriskField">
                                    *
                                   </span>
                                  </label>
                                  <div class="">
                                   <div class="input-group">
                                    <div class="input-group-addon">
                                     <i class="fa fa-calendar">
                                     </i>
                                    </div>
                                    <input class="form-control" id="date" name="date" type="date" required/>
                                   </div>
                                  </div>
                                 </div>
                                 <div class="form-group form-group-lg">
                                  <label class="control-label   requiredField" for="schedule_day">
                                   Day
                                   <span class="asteriskField">
                                    *
                                   </span>
                                  </label>
                                  <div class="col-sm-12">
                                   <select class="select form-control" id="scheduleday" name="schedule_day" required>
                                    <option value="Monday">
                                     Monday
                                    </option>
                                    <option value="Tuesday">
                                     Tuesday
                                    </option>
                                    <option value="Wednesday">
                                     Wednesday
                                    </option>
                                    <option value="Thursday">
                                     Thursday
                                    </option>
                                    <option value="Friday">
                                     Friday
                                    </option>
                                    <option value="Saturday">
                                     Saturday
                                    </option>
                                    <option value="Sunday">
                                     Sunday
                                    </option>
                                   </select>
                                  </div>
                                 </div>
                                 <div class="form-group form-group-lg">
                                  <label class="control-label   requiredField" for="start_time">
                                   Start Time
                                   <span class="asteriskField">
                                    *
                                   </span>
                                  </label>

                                  <div class="col-sm-12">
                                   <div class="input-group clockpicker"  data-align="top" data-autoclose="true">
                                    <div class="input-group-addon">
                                     <i class="fa fa-clock-o">
                                     </i>
                                    </div>
                                    <input class="form-control" id="start_time" name="start_time" type="time" required/>
                                   </div>
                                  </div>
                                 </div>
                                 <div class="form-group form-group-lg">
                                  <label class="control-label   requiredField" for="end_time">
                                   End Time
                                   <span class="asteriskField">
                                    *
                                   </span>
                                  </label>
                                  <div class="col-sm-12">
                                   <div class="input-group clockpicker"  data-align="top" data-autoclose="true">
                                    <div class="input-group-addon">
                                     <i class="fa fa-clock-o">
                                     </i>
                                    </div>
                                    <input class="form-control" id="end_time" name="end_time" type="time" required/>
                                   </div>
                                  </div>
                                 </div>
                                 <div class="form-group form-group-lg">
                                  <label class="control-label   requiredField" for="bookavail">
                                   Availabilty
                                   <span class="asteriskField">
                                    *
                                   </span>
                                  </label>
                                  <div class="col-sm-12">
                                   <select class="select form-control" id="book_status" name="book_status" required>
                                    <option value="available">
                                     available
                                    </option>
                                    <option value="notavail">
                                     notavail
                                    </option>
                                   </select>
                                  </div>
                                 </div>
                                 <div class="form-group">
                                  <div class="col-sm-12 col-sm-offset-2">
                                   <button class="btn btn-primary form-control" name="submit" type="submit">
                                    Submit
                                   </button>
                                  </div>
                                 </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid" style="margin-top: 120px">
    <div class="row">
        <div class="col md 10">
            <div class="card">
                <div class="card-header bg-primary text-light">
                    List of Schedules
                </div>
            <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                        <th>
                            Schedue ID
                        </th>
                        <th>
                            Schedule Date
                        </th>
                        <th>
                            Schedule Day
                        </th>
                        <th>
                            Start Time
                        </th>
                        <th>
                            End Time
                        </th>
                        <th>
                            Booking
                        </th>
                        <th>
                            Action
                        </th>
                    </tr>
                </thead>
                <?php 
                            $result=mysqli_query($con,"SELECT * FROM doctor_schedule");
                            

                                  
                            while ($doctorschedule=mysqli_fetch_array($result)) {
                                
                              
                                echo "<tbody>";
                                echo "<tr>";
                                    echo "<td>" . $doctorschedule['schedule_Id'] . "</td>";
                                    echo "<td>" . $doctorschedule['schedule_Date'] . "</td>";
                                    echo "<td>" . $doctorschedule['schedule_Day'] . "</td>";
                                    echo "<td>" . $doctorschedule['start_Time'] . "</td>";
                                    echo "<td>" . $doctorschedule['end_Time'] . "</td>";
                                    echo "<td>" . $doctorschedule['book_status'] . "</td>";
                                    echo "<form method='POST'>";
                                    echo "<td class='text-center'><a href='#' id='".$doctorschedule['schedule_Id']."' class='delete'>Delete</a>
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
var id = element.attr("id");
var info = 'id=' + id;
if(confirm("Are you sure you want to delete this?"))
{
 $.ajax({
   type: "POST",
   url: "deleteschedule.php",
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