<?php
    include_once 'assets/conn/dbconnect.php';
    session_start();
    if (isset($_SESSION['patientSession']) != "") {
        header("Location: patient/patient.php");
    }
?>

<?php
    if (isset($_POST['login']))
    {
        $patient_username = mysqli_real_escape_string($con,$_POST['patient_username']);
        $password  = mysqli_real_escape_string($con,$_POST['password']);

        $res = mysqli_query($con,"SELECT * FROM patient WHERE patient_username = '$patient_username'");
        $row=mysqli_fetch_array($res,MYSQLI_ASSOC);
        if ($row['password'] == $password)
        {
            $_SESSION['patientSession'] = $row['patient_username'];
            ?>
            <script type="text/javascript">
                alert('Login Success');
            </script>
            <?php
                header("Location: patient/patient.php");
        } else {
            ?>
                <script>
                    alert('wrong input ');
                </script>
            <?php
        }
    }
?>


<?php
    if (isset($_POST['signup'])) {
    $patientFirstName = mysqli_real_escape_string($con,$_POST['patient_fname']);
    $patientLastName  = mysqli_real_escape_string($con,$_POST['patient_lname']);
    $patientEmail     = mysqli_real_escape_string($con,$_POST['patient_Email']);
    $PatientUsername        = mysqli_real_escape_string($con,$_POST['patient_username']);
    $password         = mysqli_real_escape_string($con,$_POST['password']);
    $month            = mysqli_real_escape_string($con,$_POST['month']);
    $day              = mysqli_real_escape_string($con,$_POST['day']);
    $year             = mysqli_real_escape_string($con,$_POST['year']);
    $patientDOB       = $year . "-" . $month . "-" . $day;
    $patientGender = mysqli_real_escape_string($con,$_POST['patient_Gender']);
    //INSERT
    $query = " INSERT INTO patient (  patient_username, password, patient_First_Name, patient_Last_Name,  patient_DOB, patient_Gender,   patient_Email )
    VALUES ( '$PatientUsername', '$password', '$patientFirstName', '$patientLastName', '$patientDOB', '$patientGender', '$patientEmail' ) ";
    $result = mysqli_query($con, $query);
    // echo $result;
    if( $result )
    {
    ?>
        <script type="text/javascript">
            alert('Register success. Please Login to make an appointment.');
        </script>
    <?php
    }
    else
    {
    ?>
        <script type="text/javascript">
            alert('User already registered. Please try again');
        </script>
    <?php
    }

    }
?>



<!doctype html>
<html lang="en">
  <head>
      <title>
          Home
      </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="./assets/js/script.js"></script>
  </head>
  <body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
  <div class="container">
  <a class="navbar-brand" href="index.php"><img src="assets/img/logo.png" style="width: 15%;"></img><span>Care Medical Centre</span></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav ml-auto">
      <li class="nav-link active">
          <a href="#" data-toggle="modal" data-target="#myModal">Sign Up</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Already have an account?</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#LoginModal">Login</a>
      </li>
        </ul>
      </li>
    </ul>
  </div>
  </div>
</nav>

<div class="jumbotron jumbotron-fluid hero" style="margin-top: 50px">
  <div class="container">
    <h3 class="display-1" style="padding-top: 130px;">
        Welcome
    </h3>
    <h1 class="display-4">Make Appointment Today!</h1>
  </div>
</div>

<div class="container">
<h4 style="color: red;">Select a <b>date below</b> to see schedule for that date<br>Please <b><a href="#" data-toggle="modal" data-target="#LoginModal">Login</a></b> to make an appointment</h4>
    <div class="input-group" style="margin-bottom:10px;">
        <div class="input-group-addon">
            <i class="fa fa-calendar">
            </i>
        </div>
        <div class="row">
            <div class="col-md-12">
                <input type="date" class="form-control" id="date" name="date" value="<?php echo date("Y-m-d")?>" onchange="showUser(this.value)"/>
            </div>
        </div>
    </div>
    <div id="txtHint"><b> </b></div>
</div>


<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h2 class="section-title">HOW IT WORKS</h2>
        </div>
        <div class="col-lg-3 col-sm-6 mb-4">
            <div class="card border-0 shadow rounded-xs pt-5">
                <div class="card-body"> <i class="fa fa-object-ungroup icon-lg icon-primary icon-bg-primary icon-bg-circle mb-3"></i>
                    <h4 class="mt-4 mb-3">See A <br>Doctor</h4>
                    <p>Book an appointment on your desired time</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 mb-4">
            <div class="card border-0 shadow rounded-xs pt-5">
                <div class="card-body"> <i class="fa fa-users icon-lg icon-yellow icon-bg-yellow icon-bg-circle mb-3"></i>
                    <h4 class="mt-4 mb-3">Create Your Account</h4>
                    <p>Create a new account it's simple and easy</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 mb-4">
            <div class="card border-0 shadow rounded-xs pt-5">
                <div class="card-body"> <i class="fa fa-desktop icon-lg icon-purple icon-bg-purple icon-bg-circle mb-3"></i>
                    <h4 class="mt-4 mb-3">Instatant<br> Processing</h4>
                    <p>Booking for an appointment in seconds</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 mb-4">
            <div class="card border-0 shadow rounded-xs pt-5">
                <div class="card-body"> <i class="fa fa-cloud icon-lg icon-cyan icon-bg-cyan icon-bg-circle mb-3"></i>
                    <h4 class="mt-4 mb-3">Book <br>Appointment</h4>
                    <p>Booking an appointment has never been so easy</p>
                </div>
            </div>
        </div>
    </div>
</div>


        <!-- modal container start -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sign up</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class="modal-body">
                        
                        <!-- form start -->
                        <div class="container" id="wrap">
                            <div class="row">
                                <div class="col-md-12">
                                    
                                    <form action="<?php $_PHP_SELF ?>" method="POST" accept-charset="utf-8" class="form" role="form">
                                        <h4>It's free and always will be.</h4>
                                        <div class="row">
                                            <div class="col-xs-6 col-md-6">
                                                <input type="text" name="patient_fname" value="" class="form-control input-lg" placeholder="Enter First Name" required />
                                            </div>
                                            <div class="col-xs-6 col-md-6">
                                                <input type="text" name="patient_lname" value="" class="form-control input-lg" placeholder="Enter Last Name" required />
                                            </div>
                                        </div>
                                        
                                        <input type="text" name="patient_Email" value="" class="form-control input-lg" placeholder="Enter your Email"  required/>
                                        <input type="text" name="patient_username" value="" class="form-control input-lg" placeholder="Enter Username"  required/>
                                        
                                        
                                        <input type="password" name="password" value="" class="form-control input-lg" placeholder="Enter Password"  required/>
                                        
                                        <input type="password" name="confirm_password" value="" class="form-control input-lg" placeholder="Confirm Password"  required/>
                                        <label>Birth Date</label>
                                        <div class="row">
                                            
                                            <div class="col-xs-4 col-md-4">
                                                <select name="month" class = "form-control input-lg" required>
                                                    <option value="">Month</option>
                                                    <option value="01">Jan</option>
                                                    <option value="02">Feb</option>
                                                    <option value="03">Mar</option>
                                                    <option value="04">Apr</option>
                                                    <option value="05">May</option>
                                                    <option value="06">Jun</option>
                                                    <option value="07">Jul</option>
                                                    <option value="08">Aug</option>
                                                    <option value="09">Sep</option>
                                                    <option value="10">Oct</option>
                                                    <option value="11">Nov</option>
                                                    <option value="12">Dec</option>
                                                </select>
                                            </div>
                                            <div class="col-xs-4 col-md-4">
                                                <select name="day" class = "form-control input-lg" required>
                                                    <option value="">Day</option>
                                                    <option value="01">1</option>
                                                    <option value="02">2</option>
                                                    <option value="03">3</option>
                                                    <option value="04">4</option>
                                                    <option value="05">5</option>
                                                    <option value="06">6</option>
                                                    <option value="07">7</option>
                                                    <option value="08">8</option>
                                                    <option value="09">9</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                    <option value="13">13</option>
                                                    <option value="14">14</option>
                                                    <option value="15">15</option>
                                                    <option value="16">16</option>
                                                    <option value="17">17</option>
                                                    <option value="18">18</option>
                                                    <option value="19">19</option>
                                                    <option value="20">20</option>
                                                    <option value="21">21</option>
                                                    <option value="22">22</option>
                                                    <option value="23">23</option>
                                                    <option value="24">24</option>
                                                    <option value="25">25</option>
                                                    <option value="26">26</option>
                                                    <option value="27">27</option>
                                                    <option value="28">28</option>
                                                    <option value="29">29</option>
                                                    <option value="30">30</option>
                                                    <option value="31">31</option>
                                                </select>
                                            </div>
                                            <div class="col-xs-4 col-md-4">
                                                <select name="year" class = "form-control input-lg" required>
                                                    <option value="">Year</option>
                                                    
                                                    <option value="1981">1981</option>
                                                    <option value="1982">1982</option>
                                                    <option value="1983">1983</option>
                                                    <option value="1984">1984</option>
                                                    <option value="1985">1985</option>
                                                    <option value="1986">1986</option>
                                                    <option value="1987">1987</option>
                                                    <option value="1988">1988</option>
                                                    <option value="1989">1989</option>
                                                    <option value="1990">1990</option>
                                                    <option value="1991">1991</option>
                                                    <option value="1992">1992</option>
                                                    <option value="1993">1993</option>
                                                    <option value="1994">1994</option>
                                                    <option value="1995">1995</option>
                                                    <option value="1996">1996</option>
                                                    <option value="1997">1997</option>
                                                    <option value="1998">1998</option>
                                                    <option value="1999">1999</option>
                                                    <option value="2000">2000</option>
                                                    <option value="2001">2001</option>
                                                    <option value="2002">2002</option>
                                                    <option value="2003">2003</option>
                                                    <option value="2004">2004</option>
                                                    <option value="2005">2005</option>
                                                    <option value="2006">2006</option>
                                                    <option value="2007">2007</option>
                                                    <option value="2008">2008</option>
                                                    <option value="2009">2009</option>
                                                    <option value="2010">2010</option>
                                                    <option value="2011">2011</option>
                                                    <option value="2012">2012</option>
                                                    <option value="2013">2013</option>
                                                </select>
                                            </div>
                                        </div>
                                        <label>Gender : </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="patient_Gender" value="male" required/> Male
                                        </label>
                                        <label class="radio-inline" >
                                            <input type="radio" name="patient_Gender" value="female" required/> Female
                                        </label>
                                        <br />
                                        
                                        <button class="btn btn-lg btn-primary btn-block signup-btn" type="submit" name="signup" id="signup">Create my account</button>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<div class="modal fade" id="LoginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form" role="form" method="POST" accept-charset="UTF-8" >
            <div class="form-group">
                <input type="text" class="form-control" name="patient_username" placeholder="Username" required>
            </div>
            <div class="form-group">
                <label class="sr-only" for="password">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>
            <div class="form-group">
                <button type="submit" name="login" id="login" class="btn btn-primary btn-block form-control">Sign in</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

        <script>

function showUser(str) {
    
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","getuser.php?q="+str,true);
        console.log(str);
        xmlhttp.send();
    }
}
</script>
<script type="text/javascript">
    $('#myModal').on('shown.bs.modal', function () {
    $('#myInput').focus()
    })
</script>
<script>
    $(document).ready(function(){
        var date_input=$('input[name="date"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'yyyy-mm-dd',
            container: container,
            todayHighlight: true,
            autoclose: true,
        })

    })

</script>
<?php
  include ('footer.php');
?>
