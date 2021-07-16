<?php
include_once '../assets/conn/dbconnect.php';
$patient_username = $_POST['ic'];
$delete = mysqli_query($con,"DELETE FROM patient WHERE patient_username='$patient_username'");
?>