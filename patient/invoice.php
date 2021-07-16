<?php
session_start();
include_once '../assets/conn/dbconnect.php';
if (isset($_GET['appid'])) {
$appid=$_GET['appid'];
}
$res=mysqli_query($con, "SELECT a.*, b.*,c.* FROM patient a
JOIN appointment b
On a.patient_username = b.patient_username
JOIN doctor_schedule c
On b.schedule_Id=c.schedule_Id
WHERE b.appointment_Id  =".$appid);

$userRow=mysqli_fetch_array($res,MYSQLI_ASSOC);
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Print Reciept</title>
        
        <link rel="stylesheet" type="text/css" href="../assets/css/invoice.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <body>
        <div class="invoice-box">
            <table cellpadding="0" cellspacing="0">
                <tr class="top">
                    <td colspan="2">
                        <table>
                            <tr>
                                <td class="title">
                                    <img src="../assets/img/logo.png" style="width:100%; max-width:100px;"><span class="font-size: 20px">Care Medical Center</span>
                                </td>
                                
                                <td>
                                    Invoice #: <?php echo $userRow['appointment_Id'];?><br>
                                    Created: <?php echo date("d-m-Y");?><br>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                
                <tr class="information">
                    <td colspan="2">
                        <table>
                            <tr>
                                <td>
                                    <?php echo $userRow['patient_Address'];?>
                                </td>
                                
                                <td><?php echo $userRow['patient_username'];?><br>
                                    <?php echo $userRow['patient_First_Name'];?> <?php echo $userRow['patient_Last_Name'];?><br>
                                    <?php echo $userRow['patient_Email'];?>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr class="heading">
                    <td>
                        Appointment Details
                    </td>
                    
                    <td>
                        #
                    </td>
                </tr>
                
                <tr class="item">
                    <td>
                        Appointment ID
                    </td>
                    
                    <td>
                       <?php echo $userRow['appointment_Id'];?>
                    </td>
                </tr>
                
                <tr class="item">
                    <td>
                        Schedule ID
                    </td>
                    
                    <td>
                        <?php echo $userRow['schedule_Id'];?>
                    </td>
                </tr>

                <tr class="item">
                    <td>
                        Appointment Day
                    </td>
                    
                    <td>
                        <?php echo $userRow['schedule_Day'];?>
                    </td>
                </tr>
                

                 <tr class="item">
                    <td>
                        Appointment Date
                    </td>
                    
                    <td>
                        <?php echo $userRow['schedule_Date'];?>
                    </td>
                </tr>

                 <tr class="item">
                    <td>
                        Appointment Time
                    </td>
                    
                    <td>
                        <?php echo $userRow['start_Time'];?> untill <?php echo $userRow['end_Time'];?>
                    </td>
                </tr>

                 <tr class="item">
                    <td>
                        Patient Symptom
                    </td>
                    
                    <td>
                        <?php echo $userRow['appiontment_Symptom'];?> 
                    </td>
                </tr>
            </table>
        </div>
        <br><br>
        <div class="print">
        <button class="btn btn-primary" onclick="myFunction()">Print this page</button>
</div>
<script>
function myFunction() {
    window.print();
}
</script>
    </body>
</html>