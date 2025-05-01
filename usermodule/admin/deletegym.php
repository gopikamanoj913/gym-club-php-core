<?php	
include("dbcon.php");
$cid = $_GET['id'];
$sql = "update gym set status=2 where gymid=".$cid;

$conn->query($sql);

 header('location:viewgym.php');
?>