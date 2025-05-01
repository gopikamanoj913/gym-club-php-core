<!DOCTYPE html>
<html lang="zxx">

<?php 

// Absolute path to autoload.php
require('../config/autoload.php'); 
$dao = new DataAccess();
?>


<head>
    <meta charset="UTF-8">
    <meta name="description" content="Gym Template">
    <meta name="keywords" content="Gym, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gym | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500,600,700&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/barfiller.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Section Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="canvas-close">
            <i class="fa fa-close"></i>
        </div>
        <div class="canvas-search search-switch">
            <i class="fa fa-search"></i>
        </div>
        <nav class="canvas-menu mobile-menu">
            <ul>
            <li><a href="./uindex.html">Home</a></li>
              
                          
                <li><a href="./contact.php">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="canvas-social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-youtube-play"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
        </div>
    </div>
    <!-- Offcanvas Menu Section End -->

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="logo">
                        <a href="./index.html">
                            <img src="img/logo.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="nav-menu">
                        <ul>
                        <li><a href="./uindex.html">Home</a></li>
               
               
            
                            <li><a href="./contact.php">Contact</a></li>
                           
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="top-option">
                        <div class="to-search search-switch">
                            <i class="fa fa-search"></i>
                        </div>
                        <div class="to-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-youtube-play"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="canvas-open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Breadcrumb Section Begin -->
 
    <!-- Breadcrumb Section End -->

    <!-- Team Section Begin -->
    <section class="pricing-section spad">
        <div class="container">

                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Our Gym</span>
                        <h2>Choose your Gym</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
            <div class="row">
            <?php
                    // Query to fetch team data
                    $q = "SELECT * FROM gym WHERE status=1";
                    $info = $dao->query($q);
                    $i = 0;
                    while ($i < count($info)) {
                ?>
                <div class="col-lg-4 col-md-8">
                    <div class="ps-item">
                        <h3>  <?php echo $info[$i]["location"]; ?></h3>
                        <div class="pi-price">
                            <h2><?php echo $info[$i]["gymname"]; ?></h2>
                            <li><?php echo $info[$i]["phone"]; ?></li>
                        
                        </div>
                        <ul> 
                        <div class="ts-item set-bg" data-setbg="<?php echo BASE_URL . 'uploads/' . $info[$i]["gymimage"]; ?>">
                          
                            <li></li>
                           
                            
                        </ul>
                        <a href="team.php?id=<?= $info[$i]["gymid"]?>" class="primary-btn pricing-btn">Enroll now</a>
                        <a href="#" class="thumb-icon"><i class="fa fa-picture-o"></i></a>
                    </div>
                </div>
                <?php
                    $i++;
                    }
                ?>
                
</section>
    <!-- Footer Section Begin -->
    <footer class="footer-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-logo">
                        <a href="./index.html">
                            <img src="img/footer-logo.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="footer-text">
                        <p>&copy; 2024 All rights reserved | Template by <a href="#">Free Website Templates</a></p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-youtube-play"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Script Section Begin -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/magnific-popup.js"></script>
    <script src="js/slicknav.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
