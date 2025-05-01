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
                         <th> ID</th>
                        <th>FIRST NAME</th>
                        <th>LAST NAME</th>
                        <th>EMAIL</th>
                        <th>PHONE</th>
                        <th>PASSWORD</th>
                        <th>EDIT/DELETE</th>
                    


                    </tr>
                    <?php
    
    $actions=array(
    'edit'=>array('label'=>'Edit','link'=>'editstudents.php','params'=>array('id'=>'mid'),'attributes'=>array('class'=>'btn btn-success')),
    
    'delete'=>array('label'=>'Delete','link'=>'editstudents.php','params'=>array('id'=>'mid'),'attributes'=>array('class'=>'btn btn-success'))
    
    );

    $config=array(
        'srno'=>true,
        'hiddenfields'=>array('mid'),
        'actions_td'=>false,
         'images'=>array(
                        'field'=>'gymimage',
                        'path'=>'../uploads/',
                        'attributes'=>array('style'=>'width:100px;'))
        
        
    );

   
   $join=array(
       
    );  $fields=array('mid','fname','lname','email','mphone','pass');

    $users=$dao->selectAsTable($fields,'mreg as s',1,$join,$actions,$config);
    
    echo $users;
                    
                    
                   
    
?>

                </table>
            </div>





        </div><!-- End row -->
    </div><!-- End container -->
</div><!-- End container_gray_bg -->