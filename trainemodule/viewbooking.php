<?php 
require('../config/autoload.php'); 

$dao = new DataAccess();
$name = $_SESSION['gid'];

// Ensure that the session email is set
if (!isset($name)) {
    echo "User not logged in.";
    exit;
}

// Fetching data from the database
$condition = "gid='".$name."' and status=2";
$fields = array('bid', 'pname', 'gname', 'email', 'rate', 'date');
$actions = array(
   'edit' => array(
        'label' => 'Completed',
        'link' => 'complete.php',
       'params' => array('id' => 'bid'),
       'attributes' => array('class' => 'btn btn-danger')
   ),
);

$config = array(
    'srno' => true,
    'hiddenfields' => array('bid'),
);

$users = $dao->selectAsTable($fields, 'booking as b', $condition, NULL, $actions, $config);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking View</title>
    <style>
        /* Simple CSS for the page */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
        }

        table th, table td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #FF5722; /* Dark Orange */
            color: white;
            font-weight: bold;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }

        .btn {
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-align: center;
        }

        .btn-danger {
            background-color: #FF5722; /* Dark Orange */
            color: white;
        }

        .btn-danger:hover {
            background-color: #e64a19; /* Darker Orange */
        }

        .actions {
            text-align: center;
        }

        /* Responsive design for small screens */
        @media (max-width: 768px) {
            table {
                font-size: 14px;
            }

            .container {
                padding: 10px;
            }

            h1 {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Booking View</h1>

        <!-- Table for displaying the bookings -->
        <table>
            <tr>
                <th>Plan ID</th>
                <th>Plan Name</th>
                <th>Gym Name</th> 
                <th>Email</th> 
                <th>Rate</th>
                <th>Date</th>
                
                
            </tr>

            <?php
            // Displaying the bookings retrieved from the database
            echo $users;
            ?>

        </table>
    </div>

</body>
</html>
