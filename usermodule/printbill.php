<script>
function printData() {
   var divToPrint = document.getElementById("printTable");
   newWin = window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}
</script>

<?php  
 //session_start();
 include("dbcon.php");
 require('../config/autoload.php');
 $dao = new DataAccess();
 $name = $_SESSION['email'];
 $q = "SELECT * FROM mreg where email='$name'";

 $info = $dao->query($q);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice - GYM CLUB</title>
    <style>
        /* General page styles */
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
            max-width: 1000px;
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
            background-color: #FF5722; /* Dark Orange */
            color: white;
        }

        .btn:hover {
            background-color: #e64a19; /* Darker Orange */
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 12px;
            color: #888;
        }

        .details {
            margin-bottom: 20px;
        }

        .details span {
            font-weight: bold;
        }

        /* For printing */
        @media print {
            body {
                background-color: white;
                padding: 0;
            }

            .container {
                box-shadow: none;
                padding: 0;
            }

            .btn {
                display: none;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>GYM CLUB </h1>

        <div class="details">
            <div><span>Name: </span><?php echo $info[0]['fname']; ?></div>
            <div><span>Email: </span><?php echo $info[0]["email"]; ?></div>
            <div><span>Phone: </span><?php echo $info[0]["mphone"]; ?></div>
            <div><span>Date: </span><?php echo date("Y/m/d"); ?></div>
        </div>

        <table id="printTable">
            <thead>
                <tr>
                    <th>GYM NAME</th>
                    <th>PLAN NAME</th>
                    <th>RATE</th>
                    <th>DATE</th>
                    <th>TOTAL</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM booking WHERE status=1 and email='$name'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $j = 1;
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>".$row['gname']."</td>
                            <td>".$row['pname']."</td>
                            <td>".$row['rate']."</td>
                            <td>".$row['date']."</td>
                            <td>".$row['rate']."</td>
                        </tr>";
                        $j++;
                    }
                }

                // Calculate total
                $sql123 = "SELECT sum(rate) as t FROM booking WHERE status=1 and email='$name'";
                $result123 = $conn->query($sql123);
                $row = $result123->fetch_assoc();
                $total = $row['t'];
                echo "<tr><td colspan='4' style='text-align:right; font-weight:bold;'>Total:</td><td>".$total."</td></tr>";
                ?>
            </tbody>
        </table>

        <?php
        // Update status to completed after displaying the invoice
        $date1 = date("Y/m/d");
        $sql11 = "UPDATE booking SET status=2 WHERE status=1 and email='$name'";
        if ($conn->query($sql11) === TRUE) {
            echo "<script> alert('Payment Successful');</script>";
        }
        ?>

        <div style="text-align: center; margin-top: 20px;">
            <input type="button" onclick="printData();" value="PRINT" class="btn" />
            <li><a href="uindex.html">Log out</a></li>
     
        </div>

        <footer class="footer">
            Invoice was created on a computer and is valid without the signature and seal.
        </footer>
    </div>

</body>
</html>
