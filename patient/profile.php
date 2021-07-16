<?php
session_start();
// include_once '../connection/server.php';
include_once '../assets/conn/dbconnect.php';
if(!isset($_SESSION['patientSession']))
{
header("Location: ../index.php");
}
$res=mysqli_query($con,"SELECT * FROM patient WHERE patient_username='".$_SESSION['patientSession']."'");
$userRow=mysqli_fetch_array($res,MYSQLI_ASSOC);
?>
<!-- update -->
<?php
if (isset($_POST['submit'])) {
//variables
$patientFirstName = $_POST['patient_First_Name'];
$patientLastName = $_POST['patient_Last_Name'];
$patientMaritialStatus = $_POST['patient_Maritial_Status'];
$patientDOB = $_POST['patient_DOB'];
$patientGender = $_POST['patient_Gender'];
$patientAddress = $_POST['patient_Address'];
$patientPhone = $_POST['patient_Phone'];
$patientEmail = $_POST['patient_Email'];
$patientId = $_POST['patient_Id'];
// mysqli_query("UPDATE blogEntry SET content = $udcontent, title = $udtitle WHERE id = $id");
$res=mysqli_query($con,"UPDATE patient SET patient_First_Name='$patientFirstName', patient_Last_Name='$patientLastName', patient_Maritial_Status='$patientMaritialStatus', patient_DOB='$patientDOB', patient_Gender='$patientGender', patient_Address='$patientAddress', patient_Phone=$patientPhone, patient_Email='$patientEmail' WHERE patient_username='".$_SESSION['patientSession']."'");
// $userRow=mysqli_fetch_array($res);
header( 'Location: profile.php' ) ;
}
?>
<?php
$male="";
$female="";
if ($userRow['patient_Gender']=='male') {
$male = "checked";
}elseif ($userRow['patient_Gender']=='female') {
$female = "checked";
}
$single="";
$married="";
$separated="";
$divorced="";
$widowed="";
if ($userRow['patient_Maritial_Status']=='single') {
$single = "checked";
}elseif ($userRow['patient_Maritial_Status']=='married') {
$married = "checked";
}elseif ($userRow['patient_Maritial_Status']=='separated') {
$separated = "checked";
}elseif ($userRow['patient_Maritial_Status']=='divorced') {
$divorced = "checked";
}elseif ($userRow['patient_Maritial_Status']=='widowed') {
$widowed = "checked";
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

<div class="container" style="margin-top: 120px; background-color: whitesmoke;">
    <div class="row">
        <div class="col-md-7">
            <h1 style="text-transform: uppercase;">
            <?php echo $userRow['patient_First_Name']; ?> <?php echo $userRow['patient_Last_Name']; ?>
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
                Patient Maritial Status
            </td>
            <td>
            <?php echo $userRow['patient_Maritial_Status']; ?>
            </td>
        </tr>
        <tr>
            <td>
                Patient DOB
            </td>
            <td>
            <?php echo $userRow['patient_DOB']; ?>
            </td>
        </tr>
        <tr>
            <td>
                Patient Gender
            </td>
            <td>
            <?php echo $userRow['patient_Gender']; ?>
            </td>
        </tr>
        <tr>
            <td>
                Patient Address
            </td>
            <td>
            <?php echo $userRow['patient_Address']; ?>
            </td>
        </tr>
        <tr>
            <td>
                Patient Phone
            </td>
            <td>
            <?php echo $userRow['patient_Phone']; ?>
            </td>
        </tr>
        <tr>
            <td>
                Patient Email
            </td>
            <td>
            <?php echo $userRow['patient_Email']; ?>
            </td>
        </tr>
    </table>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel"></h4>
				</div>
				<div class="modal-body">
				<!-- form start -->
				    <form action="<?php $_PHP_SELF ?>" method="post" >
						<table class="table table-user-information">
							<tbody>
								<tr>
								    <td>Username:</td>
									<td><?php echo $userRow['patient_username']; ?></td>
								</tr>
								<tr>
									<td>First Name:</td>
									<td><input type="text" class="form-control" name="patient_First_Name" value="<?php echo $userRow['patient_First_Name']; ?>"  /></td>
								</tr>
								<tr>
									<td>Last Name</td>
									<td><input type="text" class="form-control" name="patient_Last_Name" value="<?php echo $userRow['patient_Last_Name']; ?>"  /></td>
								</tr>
								<tr>
									<td>Maritial Status:</td>
									<td>
                                        <div class="radio">
											<label><input type="radio" name="patient_Maritial_Status" value="single" <?php echo $single; ?>>Single</label>
										</div>
										<div class="radio">
											<label><input type="radio" name="patient_Maritial_Status" value="married" <?php echo $married; ?>>Married</label>
										</div>
										<div class="radio">
											<label><input type="radio" name="patient_Maritial_Status" value="separated" <?php echo $separated; ?>>Separated</label>
										</div>
										<div class="radio">
											<label><input type="radio" name="patient_Maritial_Status" value="divorced" <?php echo $divorced; ?>>Divorced</label>
										</div>
										<div class="radio">
											<label><input type="radio" name="patient_Maritial_Status" value="widowed" <?php echo $widowed; ?>>Widowed</label>
										</div>
									</td>
								</tr>
								<tr>
                                    <td>DOB</td>
                                	<td>
											<div class="form-group ">					
											    <div class="input-group">
													<div class="input-group-addon">
														<i class="fa fa-calendar"></i>
													</div>
													<input class="form-control" id="patient_DOB" name="patient_DOB" placeholder="MM/DD/YYYY" type="text" value="<?php echo $userRow['patient_DOB']; ?>"/>
												</div>
											</div>
									</td>
                                </tr>
                                <tr>
									<td>Gender</td>
									<td>
										<div class="radio">
											<label><input type="radio" name="patient_Gender" value="male" <?php echo $male; ?>>Male</label>
										</div>
										<div class="radio">
										    <label><input type="radio" name="patientG_ender" value="female" <?php echo $female; ?>>Female</label>
										</div>
									</td>
								</tr>					
								<tr>
									<td>Phone number</td>
									<td><input type="text" class="form-control" name="patient_Phone" value="<?php echo $userRow['patient_Phone']; ?>"  /></td>
								</tr>
								<tr>
	    							<td>Email</td>
    							    <td><input type="text" class="form-control" name="patient_Email" value="<?php echo $userRow['patient_Email']; ?>"  /></td>
								</tr>
								<tr>
									<td>Address</td>
									<td><textarea class="form-control" name="patient_Address"  ><?php echo $userRow['patient_Address']; ?></textarea></td>
								</tr>
								<tr>
									<td>
                                        <input type="submit" name="submit" class="btn btn-info" value="Update Info">
                                    </td>
								</tr>
							</tbody>
						</table>
					</form>
				</div>
			</div>
		</div>
	</div>
	<br /><br/>
</div>
						

<?php
  include ('footer.php');
?>