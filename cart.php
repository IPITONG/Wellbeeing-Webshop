<?php

session_start();

require_once("createDb.php");
require_once("products.php");

$db = new createDb("Productdb", "Producttb");

if (isset($_POST['remove'])) {
    if ($_GET['action'] == 'remove') {
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value["product_id"] == $_GET['id']) {
                unset($_SESSION['cart'][$key]);
            }
        }
    }
}

?>

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

    <link rel="stylesheet" href="style.css">
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

        <!--Navigation shoppingcart-->
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
    <h2>Winkelmand</h2>
    <div class="container-fluid">
        <div class="row px-5">
            <div class="col-md-7">
                <div class="shopping-cart">
                    <h2>Winkelmand</h2>
                    <hr>

                    <?php

                    $total = 0;
                    if (isset($_SESSION['cart'])) {
                        $product_id = array_column($_SESSION['cart'], 'product_id');

                        $result = $db->getData();
                        while ($row = mysqli_fetch_assoc($result)) {
                            foreach ($product_id as $id) {
                                if ($row['id'] == $id) {
                                    cartProducts($row['product_image'], $row['product_name'], $row['product_price'], $row['id']);
                                    $total = $total + (int) $row['product_price'];
                                }
                            }
                        }
                    } else {
                        echo "<h5>Winkelmand is leeg</h5>";
                    }

                    ?>

                </div>
            </div>
            <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">

                <div class="pt-4">
                    <h1>Bestellingdetails</h1>
                    <hr>
                    <div class="row price-details">
                        <div class="col-md-6">
                            <?php
                            if (isset($_SESSION['cart'])) {
                                $count = count($_SESSION['cart']);
                                if ($count == 1) {
                                    echo "<h6>Prijs ($count product)</h6>";
                                }
                                if ($count > 1) {
                                    echo "<h6>Prijs ($count producten)</h6>";
                                }
                            } else {
                                echo "<h6>Prijs (0 producten)</h6>";
                            }
                            ?>
                            <h6>Verzendkosten</h6>
                            <hr>
                            <h6>Totale kosten</h6>
                        </div>
                        <div class="col-md-6">
                            <h6>€ <?php echo $total; ?></h6>
                            <h6 class="text-success">GRATIS</h6>
                            <hr>
                            <h6>€ <?php
                            echo $total;
                            ?></h6>
                            <br>
                            <a href="thankyou.php" button type="submit" class="btn btn-success mx-2" name="bestellen">Bestellen</button></a>
                            <br>
                            <br>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>

</html>