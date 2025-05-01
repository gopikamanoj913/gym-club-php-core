<?php 

 require('../config/autoload.php'); 
include("header.php");
$dao=new DataAccess();
$file=new FileUpload();
$info=$dao->getData('*','addtraine','tid='.$_GET['id']);
$elements=array(
        "tname"=>$info[0]['tname'],"gymid"=>$info[0]['gymid'],"tphone"=>$info[0]['tphone'],"timage"=>$info[0]['timage'],"tsex"=>$info[0]['tsex'],);


$form=new FormAssist($elements,$_POST);





$labels=array('tname'=>"Traine Name","gymid"=>"Gym","timage"=>"Traine Image","tphone"=>"Phone number");

$rules=array(
"tname"=>array("required"=>true,"minlength"=>3,"maxlength"=>30,"alphaspaceonly"=>true),
"gymid"=>array("required"=>true),
"tphone"=> array('required'=>true,"minlength"=>10,"maxlength"=>10,"integeronly"=>true),
"timage"=>array("filerequired"=>true),
"tsex"=>array("required"=>true,"exist"=>array("m","f")),
"tpass"=>array("required"=>true)  
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_insert"]))
{

if($validator->validate($_POST))
{
	


$data=array(

        'tname'=>$_POST['tname'],
	    'gymid'=>$_POST['gymid'],
        'tphone'=>$_POST['tphone'],
        'timage'=>$fileName,
        'tsex'=>$_POST['tsex'],
        'tpass'=>$_POST['tpass'],
    );
  
    if($fileName=$file->doUploadRandom($_FILES['timage'],array('.jpg','.png','.jpeg'),100000,1,'../uploads'))
    {
        $flag=true;
    }
    if(isset($flag))
			{	$data['timage']=$fileName;
		
			}
            $condition='tid='.$_GET['id'];
            if($dao->update($data,'addtraine',$condition))
    {
        echo "<script> alert('New record created successfully');</script> ";
header('location:viewtraine.php');
    }
    else
        {$msg="Registration failed";} ?>

<span style="color:red;"><?php echo $msg; ?></span>

<?php
    

echo $file->errors();
}

}


?>
<html>

<head>
</head>

<body>

    <form action="" method="POST" enctype="multipart/form-data">

    <div>
    <label>TRAINE NAME:</label>
    <?php echo $form->textBox('tname', array('class' => 'form-control')); ?>
    <span class="error-message"><?php echo $validator->error('tname'); ?></span>
</div>

<div>
    <label>GYM:</label>
    <?php
    $options = $dao->createOptions('gymname', 'gymid', "gym");
    echo $form->dropDownList('gymid', array('class' => 'form-control'), $options);
    ?>
    <span class="error-message"><?php echo $validator->error('gymid'); ?></span>
</div>

<div>
    <label>SEX:</label>
    <?php
    $options = array('Male' => "m", 'Female' => "f");
    echo $form->radioGroup('tsex', array(), $options);
    ?>
    <span class="error-message"><?php echo $validator->error('tsex'); ?></span>
</div>

<div>
    <label>PHONE:</label>
    <?php echo $form->textBox('tphone', array('class' => 'form-control')); ?>
    <span class="error-message"><?php echo $validator->error('tphone'); ?></span>
</div>

<div>
    <label>IMAGE:</label>
    <?php echo $form->fileField('timage', array('class' => 'form-control')); ?>
    <span class="error-message"><?php echo $validator->error('timage'); ?></span>
</div>



<button type="submit" name="btn_insert">Submit</button>

    </form>


</body>

</html>