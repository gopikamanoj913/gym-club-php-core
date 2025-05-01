<?php 

 require('../config/autoload.php'); 
include("header.php");
$dao=new DataAccess();
$file=new FileUpload();
$info=$dao->getData('*','gym','gymid='.$_GET['id']);
$elements=array(
        "gymname"=>$info[0]['gymname'],"location"=>$info[0]['location'],"did"=>$info[0]['did'],"phone"=>$info[0]['phone'],"gymimage"=>$info[0]['gymimage'],"pass"=>$info[0]['pass']);


$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();

$labels=array('gymname'=>"Gym Name","location"=>"Gym location","did"=>"District id","phone"=>"Phone number","gymimage"=>"Gym image");

$rules=array(
    "gymname"=>array("required"=>true,"minlength"=>3,"maxlength"=>30,"alphaspaceonly"=>true),
    "location"=>array("required"=>true,"minlength"=>2,"maxlength"=>20,"alphaonly"=>true),
 "did"=>array("required"=>true),
"phone"=>array("required"=>true),
"gymimage"=> array('filerequired'=>true)
"pass"=> array('filerequired'=>true)

     
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_insert"]))
{

if($validator->validate($_POST))
{
	

$data=array(

        'gymname'=>$_POST['gymname'],
        'location'=>$_POST['location'],
        
	'did'=>$_POST['did'],
        'phone'=>$_POST['phone'],
         'gymimage'=>$fileName,
         'pass'=>$_POST['pass'],
    );

    if($fileName=$file->doUploadRandom($_FILES['gymimage'],array('.jpg','.png','.jpeg'),100000,1,'../uploads'))
    {
        $flag=true;
    }
    if(isset($flag))
    {	$data['gymimage']=$fileName;

    }
    $condition='gymid='.$_GET['id'];



    if($dao->update($data,'gym',$condition))
  
  
    {
        echo "<script> alert('New record created successfully');</script> ";
header('location:viewgym.php');
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
<style>
        
        .error-message {
            color: red; 
        }
       
       
    </style>
</head>
<body>

 <form action="" method="POST" enctype="multipart/form-data">
 
 <div>
        <label>GYM NAME:</label>
        <?php echo $form->textBox('gymname', array('class' => 'form-control')); ?>
        <span class="error-message"><?php echo $validator->error('gymname'); ?></span>
    </div>

    <div>
        <label>GYM LOCATION:</label>
        <?php echo $form->textBox('location', array('class' => 'form-control')); ?>
        <span class="error-message"><?php echo $validator->error('location'); ?></span>
    </div>

    <div>
        <label>DISTRICT:</label>
        <?php
        $options = $dao->createOptions('dname', 'did', "district");
        echo $form->dropDownList('did', array('class' => 'form-control'), $options);
        ?>
        <span class="error-message"><?php echo $validator->error('did'); ?></span>
    </div>

    <div>
        <label>PHONE:</label>
        <?php echo $form->textBox('phone', array('class' => 'form-control')); ?>
        <span class="error-message"><?php echo $validator->error('phone'); ?></span>
    </div>

    <div>
        <label>IMAGE:</label>
        <?php echo $form->fileField('gymimage', array('class' => 'form-control')); ?>
        <span class="error-message"><?php echo $validator->error('gymimage'); ?></span>
    </div>

    <button type="submit" name="btn_insert">Submit</button>
</form>


</body>

</html>


