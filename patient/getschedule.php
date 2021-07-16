<?php
session_start();
include_once '../assets/conn/dbconnect.php';
$q = $_GET['q'];
$res = mysqli_query($con,"SELECT * FROM doctor_schedule WHERE schedule_Date='$q'");
if (!$res) {
die("Error running $sql: " . mysqli_error());
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <?php
        if (mysqli_num_rows($res)==0) {
        echo "<div class='alert alert-danger' role='alert'>Doctor is not available at the moment. Please try again later.</div>";
        
        } else {
        echo "   <table class='table table-hover' style='background-color: white;'>";
            echo " <thead>";
                echo " <tr>";
                    echo " <th>App Id</th>";
                    echo " <th>Day</th>";
                    echo " <th>Date</th>";
                    echo "  <th>Start Time</th>";
                    echo "  <th>End Time</th>";
                    echo " <th>Availability</th>";
                    echo "  <th>Book Now!</th>";
                echo " </tr>";
            echo "  </thead>";
            echo "  <tbody>";
                while($row = mysqli_fetch_array($res)) {
                ?>
                <tr>
                    <?php
                    echo "<td>" . $row['schedule_Id'] . "</td>";
                    echo "<td>" . $row['schedule_Day'] . "</td>";
                    echo "<td>" . $row['schedule_Date'] . "</td>";
                    echo "<td>" . $row['start_Time'] . "</td>";
                    echo "<td>" . $row['end_Time'] . "</td>";
                    echo "<td> <span class='label'>". $row['book_status'] ."</span></td>";
                    if ($row['book_status']!='available') {
                        echo "<td><a href='#' class='btn btn-danger btn-xs' role='button' disabled>Already Booked</a></td>";
                    } 
                    else {
                            echo "<td><a href='appointment.php?&appointment_Id=".$row['schedule_Id']."&schedule_Date=".$q."' class='btn btn-primary btn-xs' role='button'>Book Now</a></td>";
                        }
                    ?>
                    
                    </script>
                </tr>
                
                <?php
                }
                }
                ?>
            </tbody>
        </body>
    </html>