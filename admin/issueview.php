<?php 
require('../config/autoload.php'); 

include("header.php");	

?>
<?php  
include("dbcon.php");
?>

<?php
$dao=new DataAccess();
//session_start();
   $name=$_SESSION['email'] ;
   echo $name;
//$name="ab@gmail.com";

   if(isset($_POST["purchase"]))
{
     //header('location:adminhome.php');
	   echo"<script>location.href = 'category.php';</script>  ";
}
if(!isset($name))
   {
	   //header('location:login.php');
		echo"<script>location.href = 'login.php';</script>  ";
	   }
	   else
	   { 
	 
	   
	    ?>
       
        <div class="container_gray_bg" id="home_feat_1">
    <div class="container">
			<div class="row">
				<div class="span9">
					<div class="module-body">
						<H1><center> CART DETAILS </center> </H1>
                <table  border="1" class="table" style="margin-top:100px;">
      
                    <tr>
                        
                        <th>Sl No</th>
                        <th>Member Name</th>
                        <th>Plan Name</th>
                        <th>Date</th>
                        
                     
                       
                        <th>Issue</th>
                     
                      
                    </tr>
<?php
    
    $actions=array(
    
    
   // 'delete'=>array('label'=>'Issue','link'=>'issueitem.php','params'=>array('id'=>'cartid'),'attributes'=>array('class'=>'btn btn-success'))
    
    );

    $config=array(
        'srno'=>true,
        'hiddenfields'=>array('bid')
        
        
    );

   $condition="gid='".$name."' and status=2";
   
   $join=array(
       
    );  
	$fields=array('bid','email','pname','date','rate');

    $users=$dao->selectAsTable($fields,'booking as c',$condition,$join,$actions,$config);
    
    echo $users;
                                     
    ?>

             
                </table>

        
<form action="" method="POST" enctype="multipart/form-data">
	
	
<?php /*	
	<div class="module-body">
<button class="btn btn-success" type="submit" href="category.php" name="purchase" >Home</button>
</div>    */ 
?>    

</div>
</div>
            
            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->
</form>
<?php } ?>