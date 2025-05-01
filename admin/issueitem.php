

<?php	
include("dbcon.php");
$cartid = $_GET['id'];
$date1=date('Y-m-d',time());
$sql = "update cart set status=3,issuedate='$date1' where cartid=".$cartid;

$conn->query($sql);

 //header('location:issueview.php');
echo"<script>location.href = 'issueview.php';</script>  ";



?>

