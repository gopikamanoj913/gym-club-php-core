<?php
require('../config/autoload.php'); 
include("dbcon.php");
$dao=new DataAccess();
$id=$_GET['id'];
$date2=date('Y-m-d',time());
$sql = "update booking set status=3, cdate='$date2' where bid=".$id;
$conn->query($sql);



echo"<script> location.replace('viewbooking.php'); </script>";
?>