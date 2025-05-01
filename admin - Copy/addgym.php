<?php 

 require('../config/autoload.php'); 
include("header.php");

$file=new FileUpload();
$elements=array(
        "gymname"=>"","location"=>"","did"=>"","phone"=>"","gymimage"=>"");


$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();

$labels=array('gymname'=>"Gym Name","location"=>"Gym location","did"=>"District id","phone"=>"Phone number","gymimage"=>"Gym image");

$rules=array(
    "gymname"=>array("required"=>true,"minlength"=>3,"maxlength"=>30,"alphaspaceonly"=>true),
    "location"=>array("required"=>true,"minlength"=>2,"maxlength"=>20,"alphaonly"=>true),
 "did"=>array("required"=>true),
"phone"=>array("required"=>true),
"gymimage"=> array('filerequired'=>true)
     
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_insert"]))
{

if($validator->validate($_POST))
{
	
if($fileName=$file->doUploadRandom($_FILES['gymimage'],array('.jpg','.png','.jpeg'),100000,5,'../uploads'))
		{
echo"haiclear";
$data=array(

        'gymname'=>$_POST['gymname'],
        'location'=>$_POST['location'],
        
	'did'=>$_POST['did'],
        'phone'=>$_POST['phone'],
          'gymimage'=>$fileName,
    );
  
    if($dao->insert($data,"gym"))
    {
        echo "<script> alert('New record created successfully');</script> ";
header('location:addgym.php');
    }
    else
        {$msg="Registration failed";} ?>

<span style="color:red;"><?php echo $msg; ?></span>

<?php
    
}
else
echo $file->errors();
}

}


?>
<html>
<head>
</head>
<body>

 <form action="" method="POST" enctype="multipart/form-data">
 
<div class="row">
                    <div class="col-md-6">
GYM NAME:

<?= $form->textBox('gymname',array('class'=>'form-control')); ?>
<?= $validator->error('gymname'); ?>

</div>
</div>

<div class="row">
                    <div class="col-md-6">
GYM LOCATION:

<?= $form->textBox('location',array('class'=>'form-control')); ?>
<?= $validator->error('location'); ?>

</div>
</div>




<div class="row">
                    <div class="col-md-6">
DISTRICT:

<?php
                    $options = $dao->createOptions('dname','did',"district");
                    echo $form->dropDownList('did',array('class'=>'form-control'),$options); ?>
<?= $validator->error('did'); ?>

</div>
</div>

<div class="row">
                    <div class="col-md-6">
PHONE:

<?= $form->textBox('phone',array('class'=>'form-control')); ?>
<?= $validator->error('phone'); ?>

</div>
</div>

<div class="row">
                    <div class="col-md-6">
IMAGE:

<?= $form->fileField('gymimage',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('gymimage'); ?></span>

</div>
</div>

<button type="submit" name="btn_insert">Submit</button>
</form>


</body>

</html>


