<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bedankt!</title>

    <link rel="stylesheet" href="style.css">
</head>

<body class="bg-light">
    <header>
    <head>
    <link rel="apple-touch-icon" sizes="180x180"
        href="https://i484476.hera.fhict.nl/Wellbeeing%20webshop/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32"
        href="https://i484476.hera.fhict.nl/Wellbeeing%20webshop/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16"
        href="https://i484476.hera.fhict.nl/Wellbeeing%20webshop/img/favicon-16x16.png">
    <title> Wellbeeing Webshop</title>
    <script src="https://kit.fontawesome.com/4b14647f69.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <!-- header section starts  -->

    <header class="header">
        <img class="headerimage" src="img/Logo wellbeeing 7.0 - cut.png">
        <a href="#" class="logo"> Well<span>bee</span>ing Webshop.</a>

        <nav class="navbar">
            <div id="close-navbar" class="fas fa-times"></div>
            <a href="index.html" target="_blank">WEBSITE</a>
            <a href="#home">HOME</a>
            <a href="#about">OVER ONS</a>
            <a href="#products">PRODUCTEN</a>
            <a href="#review">REVIEWS</a>
            <a href="#contact">CONTACT</a>

        </nav>

        <div class="icons">
            <div><a href="cart.php" id="account-btn" class="fas fa-cart-plus"></a></div>
            <div id="menu-btn" class="fas fa-bars"></div>
        </div>
    </header>
                <?php

                if (isset($_SESSION['cart'])) {
                    $count = count($_SESSION['cart']);
                    echo "<span id=\"cart_count\" class=\"text-warning bg-light\">$count</span>";
                } else {
                    echo "<span id=\"cart_count\" class=\"text-warning bg-light\">0</span>";
                }

                ?>
            </h5>
        </a>
    <br>
    <br>
    <br>
    <h2>Bedankt voor uw bestelling!</h2>
    <br>
    <a href="Webshop.php" button type="submit" class="btn btn-primary mx-2" name="terug">Terug naar webshop</button></a>
</body>

<section class="footer">

        <div class="box-container">
            <div class="scroll-down" onclick="scroll"></div>
            <div class="box">
                <h3> </i> Wellbeeing </h3>
                <p>Bavli, Stan, Allert, Daniel, Semmy.</p>
                <div class="share">
                    <a href="#" class="fab fa-facebook-f"></a>
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-instagram"></a>
                    <a href="#" class="fab fa-linkedin"></a>
                </div>
            </div>
            <div class="box">
                <h3>navigatie links</h3>
                <a href="#home" class="link">home</a>
                <a href="#about" class="link">over ons</a>
                <a href="#products" class="link">producten</a>
                <a href="#contact" class="link">contact</a>
            </div>
        </div>
        <div class="credit"> gemaakt door <span>Semmy Verdonschot</span> | Wellbeeing. 2023 </div>

        <img src="img/payment.png" alt="">


    </section>