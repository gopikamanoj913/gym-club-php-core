<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport">
    <meta http-equiv="X-UA-Compatible">
    <title>Document</title>
    <link rel="stylesheet" href="ui.css">
    
    <script>
    function showtotal() 
        {
            alert(str);
	           var price=document.getElementById("price").value;  
	           var qty=document.getElementById("qty").value; 
	           var total=price*qty; 
	           //alert(total);
	               document.getElementById("total").value = total;
        }   
    </script>
  
</head>

<body>

<?php

require('../config/autoload.php'); 
//include("header.php");	
include("dbcon.php");

?>

<?php 
$lid = "";
$lname = "";
$name="";
$dao=new DataAccess();
?>



<?php
   echo $_SESSION['email'];

if(isset($_POST["btn_insert"]))
{
if(!isset($_SESSION['email']))
   {
	   header('location:login.php');
  }
  else
  { 
    $email=$_SESSION['email'];
    $lid = $_GET['id'];
    $q="select * from laptop where lid=".$lid ;
    $info1=$dao->query($q);
    $lname=$info1[0]["lname"];
    $price=$info1[0]["price"];
    $qty=$_POST["qty"];
    $tot=($price)*($qty);
    $totprice=$tot;
    $_SESSION['amount']=$totprice;
    $bdate=date('Y-m-d',time());

    $status=1;

    $sql = "INSERT INTO booking(email,lid,lname,price,qty,totprice,bdate,status) 
    VALUES ('$email','$lid','$lname','$price','$qty','$totprice','$bdate','$status')";
                                   
    $conn->query($sql);
    echo $sql;
 echo"<script >location.href = 'viewcart.php'</script>";

}

}

?>

<?php
$dao=new DataAccess();
?>

<?php	$iid=$_GET['id']; 
	 $q="select * from laptop where lid=".$iid ;
    $info=$dao->query($q);
  
?>
 
   

<form action="" method="POST" enctype="multipart/form-data">

 <div class="upper">
        <div class="upper-left">
<?php 
if(isset($_SESSION['email']))
{ 
   $name=$_SESSION['email'];
   
?>

 <h7 class="title-w3-agileits title-black-wthree"><?php  echo $name ?></h7>

<?php } ?>
            <h3>Product Info</h3>
            <img style="width:300; height:300" src=<?php echo BASE_URL."uploads/".$info[0]["image"]; ?> alt=" " class="img-responsive" />
        
        </div>
        <div class="content">
            <h3>Detailed Info</h3>
            <div style="display: block;">
                <label for="name">Name:</label><br>
                <input id="lname" name="lname" type="text" value="<?php echo $info[0]["lname"];?>"  readonly style="margin-top: 8px;"><br>

                <label for="Total">Price</label><br>
                <input id="price" name="price" type="text" value="<?php echo $info[0]["price"];?>"  readonly style="margin-top: 8px;"><br>
                
                <label for="quantity">quantity</label><br>
                <input id="qty" name="qty" type="text" onkeyup="showtotal()"  style="margin-top: 8px;"><br>

                <!-- <label for="totalprice">totalprice</label><br>
                <input id="total" name="total" type="text"  style="margin-top: 8px;"><br> -->
                
                <!-- <label for="">booking date</label><br>
                <input id="orderdate" name="orderdate" type="date"   style="margin-top: 8px;"><br> -->
            </div>
        </div>
    </div>
    <div class="lower">
        <div class="btn-grp">
                <button class="buttons" name="btn_insert" id="btn-1">booking</button>
                
                      
        </div>
    </div>
    </form>
</body>

</html>