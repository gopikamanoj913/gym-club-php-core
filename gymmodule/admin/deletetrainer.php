<?php	
include("dbcon.php");
$cid = $_GET['id'];
$sql = "update addtraine set status=2 where tid=".$cid;

$conn->query($sql);

 header('location:viewtraine.php');
?>