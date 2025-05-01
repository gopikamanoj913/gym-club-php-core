



<!DOCTYPE html>
<html lang="en">



<head>

    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Au Register Forms by Colorlib</title>

    <!-- Icons font CSS-->
    <link href="reg/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="reg/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="reg/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="reg/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="reg/css/main.css" rel="stylesheet" media="all">

    

</head>

<body style= "background-image:url('GYM/uploads/9de7b89ecfa8380f6b7813f279c1ef94_8cf2a39b35dddf9f0.png') ; background-color: beige;">

<style type="text/css">
            .valErr{
                color:red!important;
            }
        </style>

<?php
require('../config/autoload.php'); 
$dao=new DataAccess();
$elements=array(
        "fname"=>"","lname"=>"","email"=>"","mphone"=>"","pass"=>"");


$form=new FormAssist($elements,$_POST);
//$file=new FileUpload();
$labels=array('fname'=>"First Name","lname"=>"Last Name","email"=>"Email Id","mphone"=>"Phone Number","pass"=>"Password");

$rules=array(
    "fname"=>array("required"=>true,"minlength"=>3,"maxlength"=>30,"alphaspaceonly"=>true),
    "lname"=>array("required"=>true,"minlength"=>3,"maxlength"=>30,"alphaonly"=>true),
    "email"=>array("required"=>true,"email"=>true,"unique"=>array("field"=>"email","table"=>"mreg")),
    "mphone"=>array("required"=>true,"integeronly"=>true,"minlength"=>10,"maxlength"=>10),
    "pass"=>array("required"=>true),
    "cpass"=>array("required"=>true),
    
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST['register']))
{
    if($validator->validate($_POST))
    {
        // code for insertion 
		
        $data=array(
				'fname'=>$_POST['fname'],
				'lname'=>$_POST['lname'],
				'mphone'=>$_POST['mphone'],
				'email'=>$_POST['email'],
				'pass'=>$_POST['pass'],
                'cpass'=>$_POST['cpass'],
				'status'=>1
			);
			if($dao->insert($data,'mreg'))
			{
				$msg="Inserted Successfully";
			}
			else
				$msg="insertion failed";
		}
		
		
		
		
    }

if(isset($_POST['home']))
{
echo "<script> alert('New zxx created successfully');</script> ";
   echo"<script> location.replace('displaycategory.php'); </script>";

}

?>




    <div class="page-wrapper bg-gra-01 p-t-180 p-b-100 font-poppins">
        <div class="wrapper wrapper--w780">
            <div class="card card-3">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 style="    font-size: 33px;
    align-content: center;
    color: #FB5B21;
    font-weight: 600;
    padding-left: 231px;
    height: 1px;
"></h2>
                    <form method="POST">
                    <h1 style="  font-size: 33px;
    align-content: center;
    color: #FB5B21;
    font-family: math;
   
" >JOIN US</h1>
                    
				
					<p><?php if(isset($msg)) echo $msg; ?></p>
                    <form method="POST" action="your_action_url.php">
    <div class="input-group">
        <label for="fname">First Name</label>
        <input type="text" name="fname" placeholder="First Name" id="fname">
        <span class="valErr"><?php echo $validator->error('fname'); ?></span>
    </div>

    <div class="input-group">
        <label for="lname">Last Name</label>
        <input type="text" name="lname" placeholder="Last Name" id="lname">
        <span class="valErr"><?php echo $validator->error('lname'); ?></span>
    </div>

    <div class="input-group">
        <label for="email">Email</label>
        <input type="email" name="email" placeholder="Email" id="email">
        <span class="valErr"><?php echo $validator->error('email'); ?></span>
    </div>

    <div class="input-group">
        <label for="mphone">Phone Number</label>
        <input type="text" name="mphone" placeholder="Phone Number" id="mphone">
        <span class="valErr"><?php echo $validator->error('mphone'); ?></span>
    </div>

    <div class="input-group">
        <label for="pass">Password</label>
        <input type="password" name="pass" placeholder="Password" id="pass">
        <span class="valErr"><?php echo $validator->error('pass'); ?></span>
    </div>

    <div class="input-group">
        <label for="cpass">Confirm Password</label>
        <input type="password" name="cpass" placeholder="Confirm Password" id="cpass">
         <span class="valErr">
        </span> 
    <!-- </div>  -->

    <div class="p-t-10">
        <button style="font-family: math;" class="btn btn--pill btn--green" name="register" type="submit">REGISTER</button>
    </div>

    <div class="p-t-10">
        
        <a href="memlogin.php" class="btn btn--pill btn--green">LOG IN</a>
    </div>
</form>

                               
                             
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="reg/vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="reg/vendor/select2/select2.min.js"></script>
    <script src="reg/vendor/datepicker/moment.min.js"></script>
    <script src="reg/vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="reg/js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->