
<?php	
require('../config/autoload.php'); 
$dao = new DataAccess();
include("dbcon.php");

$gid=$_SESSION['gid'];
$q="select * from gym where gymid=".$gid ;
$info1=$dao->query($q);
$gname=$info1[0]["gymname"];


$gid=$_SESSION['pid'];
$q1="select * from plan where pid=".$gid ;
$info2=$dao->query($q1);
$pname=$info2[0]["pname"];
$rate=$info2[0]["rate"];
$_SESSION['amount']=$rate;

$gid =$_SESSION['gid'];
$pid =$_SESSION['pid'];

//$rate=$_SESSION['rate'];
$email=$_SESSION['email'];
$date=date('Y-m-d',time());

//echo $cart_id;

$sql = "INSERT INTO booking(gid,pid,email,rate,date,pname,gname) 
VALUES('$gid','$pid','$email','$rate','$date','$pname','$gname')";
                               


$conn->query($sql);
echo $sql;
header('location:Payment.php');



?>

