<?php 

require('../config/autoload.php'); 
include("header.php");
include("dbcon.php");
//session_start();
$emailErr="";
if(isset($_POST["btn_insert"]))
{

if ($_POST["uname"]=="-Select-")
 {
   $emailErr = "Name is required";
  }
else
{	
 $_SESSION['email']=$_POST['uname'];
        
       
//header('location:issueview.php');
   echo"<script>location.href = 'issueview.php';</script>  ";
}
}


?>
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>

 <form action="" method="POST" enctype="multipart/form-data">
 <div class="wrapper">
		<div class="container">
			<div class="row">
				<div class="span9">

						<div class="module">
							<div class="module-head">
								<h3>Issue Details</h3>
							</div>
							<div class="module-body">

User Name
<select name="uname">
<option>-Select-</option>
<?php

$sql="SELECT * FROM gym where status=1";
$result = $conn->query($sql);;
while($row = $result->fetch_assoc())
{
?>
  <option value='<?php echo $row["gymid"];?>'><?php echo $row["gymname"]; ?></option>
<?php
}
?>
  </select>
<span class="error">* <?php echo $emailErr;?></span>
</div>
							<div class="module-body">
<button type="submit" name="btn_insert"  >Submit</button>
								</div>
							</div>
					</div>
				</div>
			</div>
		 </div>
</form>


</body>

</html>


