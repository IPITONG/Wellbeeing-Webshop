<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Winkelmand</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="../css/homepage.css">
</head>

<body class="bg-light">
    <header>
        <img class="logo"
            src="https://blightningpower.github.io/Wellbeeing_webshop/img/Logo%20wellbeeing%207.0%20-%20cut.png"
            alt="Wellbeeinglogo">
        <h1 class="WellbeeingHeaderTitle"><span class="WellbeeingTitleWord">Wellbeeing</span>Webshop</h1>
        <!--Navigation searchbar-->
        <div class="searchbar">
            <label>
                <input class="searchBarfield" type="text" placeholder="Zoeken..">
                <img class="searchBarIcon" src="https://i484476.hera.fhict.nl/OPP_Webshop/Public/img/searchbarIcon.png"
                    alt="searchBarIcon">
            </label>
        </div>

        <div class="navbarButton">
            <a href="../html/index.html">Website</a>
            <a href="homepage.php">Webshop</a>
            <a href="signUp.php">Aanmelden</a>
            <a href="logIn.php">Inloggen</a>
        </div>
        <a href="cart.php" class="shoppingCartButton"><img class="shoppingCartImage"
                src="https://i484476.hera.fhict.nl/OPP_Webshop/Public/img/shoppingCartIcon.png" alt="ShoppingCart" />
            <h5 class="px-5 cart">
                <i class="fas fa-shopping-cart"></i> Winkelmand
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
        <div class="navHeader">
            <a href="#">Alle producten</a>
            <a href="#">Smart Beehives</a>
            <a href="#">Bloemenzaden</a>
            <a href="#">Honing</a>
        </div>
    </header>
    <br>
    <br>
    <br>
    <h2>Bedankt voor uw bestelling!</h2>
    <br>
    <a href="Webshop.php" button type="submit" class="btn btn-primary mx-2" name="terug">Terug naar webshop</button></a>
</body>