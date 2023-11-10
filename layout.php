<?php
require_once 'connection.php';
session_start();
$user_id = $_SESSION['userID'];



?>

<head>
    <title>GreenZ</title>
    <meta charset="utf-8">

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="css//style.css">

</head>

<body class="goto-here">

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="index.php">GreenZ</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="shop.php" class="nav-link">Shop</a></li>
                    <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
                    <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>

                    <li class="nav-item cta cta-colored">
                        <a href="cart.php" class="nav-link">
                            <i class="fas fa-shopping-cart"></i>
                            [<?php if (isset($_SESSION['userID'])) {

                                $sql = "SELECT COUNT(*) AS cartCount FROM cart WHERE userID = '$user_id'";
                                $result = $connect->query($sql);
                                $row = $result->fetch_assoc();
                                echo $row['cartCount'];
                            } else {
                                echo 0;
                            }
                            ?>]
                        </a>
                    </li>

                    <?php if (isset($_SESSION['userID'])) {


                        ?>
                        <li class="nav-item"><a href="logout.php" class="nav-link">LogOut</a></li>


                    <?php } else {



                        ?>

                        <li class="nav-item"><a href="Login.php" class="nav-link">Login</a></li>

                    <?php }



                    ?>

                </ul>
            </div>
        </div>
    </nav>