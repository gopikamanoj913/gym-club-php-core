<?php 

 require('../config/autoload.php'); 
include("header.php");

$file=new FileUpload();
$elements=array(
        "pname"=>"","duration"=>"","rate"=>"","dis"=>"");


$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();

$labels=array('pname'=>"Plan Name","duration"=>"Duration","rate"=>"Rate","dis"=>"Discription");

$rules=array(
    "pname"=>array("required"=>true,"minlength"=>1,"maxlength"=>10,"alphaonly"=>true),
    "duration"=>array("required"=>true,"minlength"=>1,"maxlength"=>10,"integeronly"=>true),
    "rate"=>array("required"=>true),
    "dis"=>array("required"=>true),

     
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_insert"]))
{

if($validator->validate($_POST))
{
	
// if($fileName=$file->doUploadRandom($_FILES['gymimage'],array('.jpg','.png','.jpeg'),100000,5,'../uploads'))
// 		{
// echo"haiclear";
$data=array(

        'pname'=>$_POST['pname'],
        'duration'=>$_POST['duration'],
        'rate'=>$_POST['rate'],
        'dis'=>$_POST['dis']
       
    );
  
    if($dao->insert($data,"plan"))
    {
        echo "<script> alert('New record created successfully');</script> ";
header('location:addplan.php');
    }
    else
        {$msg="Registration failed";} ?>

<span style="color:red;"><?php echo $msg; ?></span>

<?php
    
}
else
echo $file->errors();
}




?>
<html>
<head>
</head>
<body>

 <form action="" method="POST" enctype="multipart/form-data">
 
<div class="row">
                    <div class="col-md-6">
PLAN NAME:

<?= $form->textBox('pname',array('class'=>'form-control')); ?>
<?= $validator->error('pname'); ?>

</div>
</div>

<div class="row">
                    <div class="col-md-6">
PLAN DURATION (In month):

<?= $form->textBox('duration',array('class'=>'form-control')); ?>
<?= $validator->error('duration'); ?>

</div>
</div>




<div class="row">
                    <div class="col-md-6">
RATE:

<?= $form->textBox('rate',array('class'=>'form-control')); ?>
<?= $validator->error('rate'); ?>

</div>
</div>

<div class="row">
                    <div class="col-md-6">
DISCRIPTION:

<?= $form->textBox('dis',array('class'=>'form-control')); ?>
<?= $validator->error('dis'); ?>

</div>
</div>


<button type="submit" name="btn_insert">Submit</button>
</form>


</body>

</html>


