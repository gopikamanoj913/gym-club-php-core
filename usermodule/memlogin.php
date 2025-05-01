<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login V17</title>
    <link rel="icon" type="image/png" href="login/images/icons/favicon.ico"/>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;  /* Light gray background */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background: #000;  /* Change background to black */
            color: #fff;  /* Change text color inside the container to white */
            padding: 40px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            width: 100%;
            max-width: 400px;
        }

        .login-title {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
            color: #ff8f00;  /* Keep the title text color orange */
        }

        .input-field {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
            color: #000;  /* Change input text color to black */
            background-color: #fff;  /* White background for input fields */
        }

        .input-field:focus {
            border-color: #ff8f00;  /* Focus border to match the orange color */
            outline: none;
        }

        .login-btn {
            width: 100%;
            padding: 14px;
            background-color: #ff8f00;  /* Button background color */
            color: #fff;  /* Text color for button */
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        .login-btn:hover {
            background-color: #cc7000;  /* Darker orange for hover effect */
        }

        .forgot-password {
            text-align: center;
            margin-top: 20px;
        }

        .forgot-password a {
            color: #ff8f00;  /* Change link color to orange */
            text-decoration: none;
        }

        .forgot-password a:hover {
            text-decoration: underline;
        }

        .signup {
            text-align: center;
            margin-top: 20px;
        }

        .signup a {
            color: #ff8f00;  /* Change sign-up link color to orange */
            text-decoration: none;
        }

        .signup a:hover {
            text-decoration: underline;
        }

    </style>
</head>
<body>

<?php require('../config/autoload.php'); ?>
<?php
$dao=new DataAccess();
$rules=array(
    'email'=>array('required'=>true),
    'pass'=>array('required'=>true)
);
$validator=new formValidator($rules);
if(isset($_POST['login']))
{
    if($validator->validate($_POST))
    {
    $data=array(
        'email'=>$_POST['email'],
        'pass'=>$_POST['pass']
        );
        $table='mreg';
        if($info=$dao->login($data,$table))
        {
        $_SESSION['email']=$info['email'];
        header('location:/GYM/usermodule/uindex.html');
        }
        else
        {
        echo "<script> alert('invalid email or password');</script>";
        }

    }
}
?>

    <div class="login-container">
        <h2 class="login-title">Account Login</h2>
        <form method="POST">
            <input id="email" class="input-field" type="text" name="email" placeholder="User name" required>
            <input class="input-field" type="password" name="pass" placeholder="Password" required>
            <button class="login-btn" name="login" type="submit">Sign in</button>

          

            <div class="signup">
                <a href="memregi.php">Sign Up</a>
            </div>
        </form>
    </div>

</body>
</html>
