<?php require('../config/autoload.php'); ?>

<?php
$dao=new DataAccess();



?>
<?php include('header.php'); ?>


<div class="container_gray_bg" id="home_feat_1">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table border="1" class="table" style="margin-top:100px;">
                    <tr>
                        <th>PLAN ID</th>
                        <th>PLAN NAME</th>
                        <th>DURATION</th>
                        <th>RATE</th>
                        <th>DISCRIPTION</th>
                        <th>EDIT/DELETE</th>
                     
                    </tr>
                    <?php
    
    $actions=array(
    'edit'=>array('label'=>'Edit','link'=>'editstudents.php','params'=>array('id'=>'pid'),'attributes'=>array('class'=>'btn btn-success')),
    
    'delete'=>array('label'=>'Delete','link'=>'editstudents.php','params'=>array('id'=>'pid'),'attributes'=>array('class'=>'btn btn-success'))
    
    );

    $config=array(
        'srno'=>true,
        'hiddenfields'=>array('pid'),
        'actions_td'=>false,
        //  'images'=>array(
        //                 'field'=>'gymimage',
        //                 'path'=>'../uploads/',
        //                 'attributes'=>array('style'=>'width:100px;'))
        
        
    );

   
   $join=array(
       
    );  $fields=array('pid','pname','duration','rate','dis');

    $users=$dao->selectAsTable($fields,'plan as s',1,$join,$actions,$config);
    
    echo $users;
                    
                    
                   
    
?>

                </table>
            </div>





        </div><!-- End row -->
    </div><!-- End container -->
</div><!-- End container_gray_bg -->