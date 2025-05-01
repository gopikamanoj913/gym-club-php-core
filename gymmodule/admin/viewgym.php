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

                        <th>GYM ID</th>
                        <th>GYM NAME</th>
                        <th>LOCATION</th>
                        <th>DISTRICT</th>
                        <th>PHONE</th>
                        <th>GYM IMAGE</th>
                        <th>PASSWORD</th>

                        <th>EDIT/DELETE</th>


                    </tr>
                    <?php
    
    $actions=array(
    'edit'=>array('label'=>'Edit','link'=>'editgym.php','params'=>array('id'=>'gymid'),'attributes'=>array('class'=>'btn btn-success')),
    
    'delete'=>array('label'=>'Delete','link'=>'deletegym.php','params'=>array('id'=>'gymid'),'attributes'=>array('class'=>'btn btn-success'))
    
    );

    $config=array(
        'srno'=>true,
        'hiddenfields'=>array('gymid'),
        'actions_td'=>false,
         'images'=>array(
                        'field'=>'gymimage',
                        'path'=>'../uploads/',
                        'attributes'=>array('style'=>'width:100px;'))
        
        
    );

   
   $join=array(
       
    );  $fields=array('gymid','gymname','location','did','phone','gymimage','pass');

    $users=$dao->selectAsTable($fields,'gym as s','status=1',$join,$actions,$config);
    
    echo $users;
                    
                    
                   
    
?>

                </table>
            </div>





        </div><!-- End row -->
    </div><!-- End container -->
</div><!-- End container_gray_bg -->