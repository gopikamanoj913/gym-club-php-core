

<?php 

 require('../config/autoload.php'); 
include("header.php");
$dao=new DataAccess();
$file=new FileUpload();
$info=$dao->getData('*','plan','pid='.$_GET['id']);

$elements=array(
    "pname"=>$info[0]['pname'],"duration"=>$info[0]['duration'],"rate"=>$info[0]['rate'],"dis"=>$info[0]['dis'],);



$form=new FormAssist($elements,$_POST);






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

    
    $condition='pid='.$_GET['id'];
  
    if($dao->update($data,'plan',$condition))
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
        <?php echo $form->textBox('pname', array('class' => 'form-control')); ?>
        <span class="error-message"><?php echo $validator->error('pname'); ?></span>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        PLAN DURATION (In month):
        <?php echo $form->textBox('duration', array('class' => 'form-control')); ?>
        <span class="error-message"><?php echo $validator->error('duration'); ?></span>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        RATE:
        <?php echo $form->textBox('rate', array('class' => 'form-control')); ?>
        <span class="error-message"><?php echo $validator->error('rate'); ?></span>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        DESCRIPTION:
        <?php echo $form->textBox('dis', array('class' => 'form-control')); ?>
        <span class="error-message"><?php echo $validator->error('dis'); ?></span>
    </div>
</div>


<button type="submit" name="btn_insert">Submit</button>
</form>


</body>

</html>


