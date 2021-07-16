<?php
include_once '../assets/conn/dbconnect.php';
$id = $_POST['id'];
$delete = mysqli_query($con,"DELETE FROM doctor_schedule WHERE schedule_Id=$id");
?>