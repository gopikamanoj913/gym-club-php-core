<?php 

 require('../config/autoload.php'); 
include("header.php");

$file=new FileUpload();
$elements=array(
        "tname"=>"","gymid"=>"","tphone"=>"","timage"=>"","tsex"=>"",);


$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();

$labels=array('tname'=>"Traine Name","gymid"=>"Gym","timage"=>"Traine Image","tphone"=>"Phone number");

$rules=array(
    "tname"=>array("required"=>true,"minlength"=>3,"maxlength"=>30,"alphaspaceonly"=>true),
 "gymid"=>array("required"=>true),
"tphone"=> array('required'=>true,"minlength"=>10,"maxlength"=>10,"integeronly"=>true),
"timage"=>array("filerequired"=>true),
"tsex"=>array("required"=>true,"exist"=>array("m","f")),

     
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_insert"]))
{

if($validator->validate($_POST))
{
	
if($fileName=$file->doUploadRandom($_FILES['timage'],array('.jpg','.png','.jpeg'),100000,1,'../uploads'))
		{

$data=array(

        'tname'=>$_POST['tname'],
	    'gymid'=>$_POST['gymid'],
        'tphone'=>$_POST['tphone'],
        'timage'=>$fileName,
        'tsex'=>$_POST['tsex'],
    );
  
    if($dao->insert($data,"addtraine"))
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
                TRAINE NAME:

                <?= $form->textBox('tname',array('class'=>'form-control')); ?>
                <?= $validator->error('tname'); ?>

            </div>
        </div>


        <div class="row">
            <div class="col-md-6">
                GYM:

                <?php
                    $options = $dao->createOptions('gymname','gymid',"gym");
                    echo $form->dropDownList('gymid',array('class'=>'form-control'),$options); ?>
                <?= $validator->error('gymid'); ?>

            </div>
        </div>

        <div class="row">
        <div class="col-md-6">
        SEX:

        <?php
                    $options=array('Male'=>"m","Female"=>"f");
                    echo $form->radioGroup('tsex',array(),$options); ?>
        <?= $validator->error('tsex'); ?>

</div>
</div>

        <div class="row">
            <div class="col-md-6">
                PHONE:

                <?= $form->textBox('tphone',array('class'=>'form-control')); ?>
                <?= $validator->error('tphone'); ?>

            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                IMAGE:

                <?= $form->fileField('timage',array('class'=>'form-control')); ?>
                <span style="color:red;"><?= $validator->error('timage'); ?></span>

            </div>
        </div>

        <button type="submit" name="btn_insert">Submit</button>
    </form>


</body>

</html>