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

                       <th>ID</th>
                        <th>NAME</th>
                        <th>E MAIL</th>
                        <th>GYM</th>
                        <th>COMMENT</th>
                        <th>DELETE</th>
                        


                    </tr>
                    <?php
    
    $actions=array(
    // 'edit'=>array('label'=>'Edit','link'=>'editgym.php','params'=>array('id'=>'cid'),'attributes'=>array('class'=>'btn btn-success')),
    
    'delete'=>array('label'=>'Delete','link'=>'deletegym.php','params'=>array('id'=>'cid'),'attributes'=>array('class'=>'btn btn-success'))
    
    );

    $config=array(
        'srno'=>true,
        'hiddenfields'=>array('cid'),
        'actions_td'=>false,
        //  'images'=>array(
        //                 'field'=>'gymimage',
        //                 'path'=>'../uploads/',
        //                 'attributes'=>array('style'=>'width:100px;'))
        
        
    );

   
   $join=array(
       
    );  $fields=array('cid','name','email','gym','comment');

    $users=$dao->selectAsTable($fields,'contact as s',1,$join,$actions,$config);
    
    echo $users;
                    
                    
                   
    
?>

                </table>
            </div>





        </div><!-- End row -->
    </div><!-- End container -->
</div><!-- End container_gray_bg -->