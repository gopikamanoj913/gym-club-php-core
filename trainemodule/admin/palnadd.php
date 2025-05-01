<?php 
require('../config/autoload.php'); 
include("header.php");

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

$file = new FileUpload();
$elements = array("pname" => "", "duration" => "", "rate" => "", "dis" => "");
$form = new FormAssist($elements, $_POST);
$dao = new DataAccess();

$labels = array('pname' => "Plan Name", "duration" => "Duration", "rate" => "Rate", "dis" => "Description");

$rules = array(
    "pname" => array("required" => true, "minlength" => 1, "maxlength" => 10, "alphaonly" => true),
    "duration" => array("required" => true, "minlength" => 1, "maxlength" => 10, "integeronly" => true),
    "rate" => array("required" => true),
    "dis" => array("required" => true),
);

$validator = new FormValidator($rules, $labels);
$msg = ""; // Initialize message variable

if (isset($_POST["btn_insert"])) {
    if ($validator->validate($_POST)) {
        $data = array(
            'pname' => $_POST['pname'],
            'duration' => $_POST['duration'],
            'rate' => $_POST['rate'],
            'dis' => $_POST['dis']
        );

        // Insert data into the database
        if ($dao->insert($data, "plan")) {
            echo "<script>alert('New record created successfully');</script>";
            header('Location: addplan.php');
            exit; // Ensure no further code is executed after redirection
        } else {
            $msg = "Registration failed: " . $dao->getLastError(); // Display database error
        }
    } else {
        $msg = "Validation failed: " . implode(", ", $validator->errors()); // Display validation errors
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Plan</title>
    <link rel="stylesheet" href="path/to/bootstrap.css"> <!-- Include Bootstrap CSS if needed -->
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6">
                <label for="pname">PLAN NAME:</label>
                <?= $form->textBox('pname', array('class' => 'form-control')); ?>
                <?= $validator->error('pname'); ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="duration">PLAN DURATION (In month):</label>
                <?= $form->textBox('duration', array('class' => 'form-control')); ?>
                <?= $validator->error('duration'); ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="rate">RATE:</label>
                <?= $form->textBox('rate', array('class' => 'form-control')); ?>
                <?= $validator->error('rate'); ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="dis">DESCRIPTION:</label>
                <?= $form->textBox('dis', array('class' => 'form-control')); ?>
                <?= $validator->error('dis'); ?>
            </div>
        </div>

        <button type="submit" name="btn_insert">Submit</button>
        <span style="color:red;"><?= $msg; ?></span> <!-- Display error message here -->
    </form>
</body>
</html>
