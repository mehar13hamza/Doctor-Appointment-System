<?php
session_start();
include_once '../assets/conn/dbconnect.php';
$session= $_SESSION['patientSession'];
$res=mysqli_query($con,"SELECT * FROM patient WHERE patient_username='".$_SESSION['patientSession']."'");
$userRow=mysqli_fetch_array($res,MYSQLI_ASSOC);
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


<div class="container" style="margin-top: 130px;">
    <h1>
        Contact Us
    </h1>
</div>
<div class="container contact-form">
            <form class="form" role="form" method="POST" accept-charset="UTF-8">
                <h3>Drop Us a Message</h3>
               <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="txtName" class="form-control" placeholder="<?php echo $userRow['patient_First_Name']; ?>" value="<?php echo $userRow['patient_First_Name'];?>" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="txtEmail" class="form-control" placeholder="<?php echo $userRow['patient_Email'];?>" value="<?php echo $userRow['patient_Email'];?>" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="txtPhone" class="form-control" placeholder="<?php echo $userRow['patient_Phone']; ?>" value="<?php echo $userRow['patient_Phone']; ?>" required/>
                        </div>  
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <textarea name="txtMsg" class="form-control" placeholder="Your Message *" style="width: 100%; height: 150px;" required></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group">
                            <input type="submit" class="form-control btn btn-danger" name="contact" id="contact" value="Send Message" />
                    </div>
                        </div>
                    </div>
                </div>
            </form>
</div>
<?php
  include ('footer.php');
?>
<?php
    if (isset($_POST['contact'])) {
    $patientName = mysqli_real_escape_string($con,$_POST['txtName']);
    $patientEmail     = mysqli_real_escape_string($con,$_POST['txtEmail']);
    $patientPhone              = mysqli_real_escape_string($con,$_POST['txtPhone']);
    $patientMessage             = mysqli_real_escape_string($con,$_POST['txtMsg']);
    //INSERT
    $query = " INSERT INTO contact (  patient_name, patient_email, patient_phone, patient_message)
    VALUES ( '$patientName', '$patientEmail', '$patientPhone', '$patientMessage') ";
    $result = mysqli_query($con, $query);
    // echo $result;
    if( $result )
    {
    ?>
        <script type="text/javascript">
            alert('Form Submitted Successfully.');
        </script>
    <?php
    }
    else
    {
    ?>
        <script type="text/javascript">
            alert('Error');
        </script>
    <?php
    }

    }
?>