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


                        <th>Traine ID</th>
                        <th>Traine NAME</th>
                        <th>GYM</th>
                        <th>Traine Image</th>
                        <th>Phone</th>
                        <th>Password</th>
                        <th>EDIT/DELETE</th>


                    </tr>
                    <?php
    
    $actions=array(
    'edit'=>array('label'=>'Edit','link'=>'edittraine.php','params'=>array('id'=>'tid'),'attributes'=>array('class'=>'btn btn-success')),
    
    'delete'=>array('label'=>'Delete','link'=>'deletetrainer.php','params'=>array('id'=>'tid'),'attributes'=>array('class'=>'btn btn-success'))
    
    );

    $config=array(
        'srno'=>true,
        'hiddenfields'=>array('tid'),
        'actions_td'=>false,
         'images'=>array(
                        'field'=>'timage',
                        'path'=>'../uploads/',
                        'attributes'=>array('style'=>'width:100px;'))
        
        
    );

   
   $join=array(
       
    );  $fields=array('tid','tname','gymid','timage','tphone','tpass');

    $users=$dao->selectAsTable($fields,'addtraine as s','status=1',$join,$actions,$config);
    
    echo $users;
                    
                    
                   
    
?>

                </table>
            </div>





        </div><!-- End row -->
    </div><!-- End container -->
</div><!-- End container_gray_bg -->