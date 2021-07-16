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
?>
<!doctype html>
<html lang="en">
  <head>
    <title>
        Contact Us Quries
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
<div class="container-fluid" style="margin-top: 120px">
    <div class="row">
        <div class="col md 10">
        <h1>
          Contact Us Quries
        </h1>
        <div class="card">
        <div class="card-header bg-primary text-light">
            List of Quries
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                        <th>
                            ID
                        </th>
                        <th>
                            Patient Name
                        </th>
                        <th>
                            Patient Email
                        </th>
                        <th>
                            Contact No
                        </th>
                        <th>
                            Message
                        </th>
                    </tr>
                </thead>
                <?php 
                            $res=mysqli_query($con,"SELECT * FROM contact");
                                  if (!$res) {
                                    printf("Error: %s\n", mysqli_error($con));
                                    exit();
                                }
                            while ($contact=mysqli_fetch_array($res)) {
                                
                                echo "<tbody>";
                                echo "<tr>";
                                    echo "<td>" . $contact['contact_id'] . "</td>";
                                    echo "<td>" . $contact['patient_name'] . "</td>";
                                    echo "<td>" . $contact['patient_email'] . "</td>";
                                    echo "<td>" . $contact['patient_phone'] . "</td>";
                                    echo "<td>" . $contact['patient_message'] . "</td>";
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
function chkit(uid, chk) {
   chk = (chk==true ? "1" : "0");
   var url = "checkdb.php?userid="+uid+"&chkYesNo="+chk;
   if(window.XMLHttpRequest) {
      req = new XMLHttpRequest();
   } else if(window.ActiveXObject) {
      req = new ActiveXObject("Microsoft.XMLHTTP");
   }
   req.open("GET", url, true);
   req.send(null);
}
</script>
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

</body>
</html>