<?php 

require('../config/autoload.php'); 
include("header.php");

$file = new FileUpload();
$elements = array(
    "pname" => "",
    "duration" => "",
    "rate" => "",
    "dis" => ""
);

$form = new FormAssist($elements, $_POST);
$dao = new DataAccess();

$labels = array(
    'pname' => "Plan Name",
    'duration' => "Duration (months)",
    'rate' => "Rate",
    'dis' => "Description"
);

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

        if ($dao->insert($data, "plan")) {
            echo "<script>alert('New record created successfully');</script>";
            header('location:addplan.php');
            exit; // Always exit after redirecting
        } else {
            $msg = "Registration failed";
        }
    } else {
        $msg = "Validation failed. Please check your input.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Plan</title>
    <style>
        .error { color: red; }
        input[type="text"] { width: 100%; padding: 10px; margin: 5px 0; border: 1px solid #ccc; border-radius: 4px; }
        button { padding: 10px 15px; background-color: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background-color: #0056b3; }
    </style>
</head>
<body>

<form action="" method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-6">
            <label>PLAN NAME:</label>
            <?= $form->textBox('pname', array('class' => 'form-control', 'value' => htmlspecialchars($_POST['pname'] ?? ''))); ?>
            <span class="error"><?= $validator->error('pname'); ?></span>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <label>PLAN DURATION (In month):</label>
            <?= $form->textBox('duration', array('class' => 'form-control', 'value' => htmlspecialchars($_POST['duration'] ?? ''))); ?>
            <span class="error"><?= $validator->error('duration'); ?></span>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <label>RATE:</label>
            <?= $form->textBox('rate', array('class' => 'form-control', 'value' => htmlspecialchars($_POST['rate'] ?? ''))); ?>
            <span class="error"><?= $validator->error('rate'); ?></span>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <label>DESCRIPTION:</label>
            <?= $form->textBox('dis', array('class' => 'form-control', 'value' => htmlspecialchars($_POST['dis'] ?? ''))); ?>
            <span class="error"><?= $validator->error('dis'); ?></span>
        </div>
    </div>

    <button type="submit" name="btn_insert">Submit</button>
</form>

<span class="error"><?= $msg; ?></span>

</body>
</html>
