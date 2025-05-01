<?php 

require('../config/autoload.php'); 
include("header.php");	?>
<?php 


include("dbcon.php");
?>

<?php
//session_start();
$dao=new DataAccess();
   $date1=$_SESSION['fdate'] ;
 $date2=$_SESSION['fdate'] ;
   if(isset($_POST["purchase"]))
{
     header('location:oghead.php');
}

	 
	   
	    ?>
       
       
       
       
 <div class="container_gray_bg" id="home_feat_1">
    <div class="container">
    	<div class="row">
            <div class="col-md-12">
            
            <H1><center> BOOKING DETAILS </center> </H1>
                <table  border="1" class="table" style="margin-top:100px;">
                    <tr>
                        
                        <th>Sl No</th>
                        <th>Room No</th>
                        <th>From Date</th>
                         <th>To Date</th>
                     
                      
                      
                    </tr>
<?php
    
    $actions=array(
    
    
    
    
    );

    $config=array(
        'srno'=>true,
        'hiddenfields'=>array('bid')
        
        
    );

   $condition="date='".$date1."' and status=2";
   
   $join=array(
       
    );  
	$fields=array('bid','pname','gname','date');

    $users=$dao->selectAsTable($fields,'booking as c',$condition,$join,$actions,$config);
    
    echo $users;
                                     
    ?>

             
                </table>
            </div>    


        
<form action="" method="POST" enctype="multipart/form-data">

<button> <a href="rptbookingdate.php">HOME </a> </button>


</form>
</div>

            
            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->

