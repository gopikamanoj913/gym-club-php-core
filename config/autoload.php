<?php 

// Define the base URL for your project (For web access)
define("BASE_URL", "http://localhost/GYM/");

// Define the absolute file system path for your project
define("BASE_PATH", "c:\\wamp64\\www\\\GYM\\");

// Set your timezone (Make sure it's the correct one for your location)
date_default_timezone_set('Asia/Kolkata');

// Start the session (Ensure this is called only once in your application)
session_start();

// Include necessary configuration and class files
require(BASE_PATH . 'config/database.php');  // Your database config file
require(BASE_PATH . 'classes/database.php'); // Database class (if custom)
require(BASE_PATH . 'classes/FormAssist.class.php'); // Custom Form Assist class (if needed)
require(BASE_PATH . 'classes/FormValidator.class.php'); // Custom Form Validator class (if needed)
require(BASE_PATH . 'classes/DataAccess.class.php'); // Data Access class for DB queries

?>
