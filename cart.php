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
    <link rel="stylesheet" href="cart.css">
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
    
</head>
<body class="bg-light">
    <header>
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
    <!-- header section ends -->

    </header>
    <h2> <br>
    <br></h2>
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
            <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25 padding-bottom: 194px;
    padding-top: 30px;">

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
                            <h6>€ <?php echo $total; ?> </h6>
                            <h6 class="text-success">GRATIS</h6>
                            <hr>
                             <h6>€ <?php
                            echo $total;
                            ?></h6>
                            <br>
                            <a href="thankyou.php" button type="submit" class="btn btn-success mx-2" name="bestellen">Bestellen</button></a>
                            <h2> <br>
    <br></h2>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    
    <!-- footer section starts  -->

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

    <!-- footer section ends -->

    <script>
        let navbar = document.querySelector('.header .navbar')

        document.querySelector('#menu-btn').onclick = () => {
            navbar.classList.add('active');
        }

        document.querySelector('#close-navbar').onclick = () => {
            navbar.classList.remove('active');
        };

    </script>

</body>

</html>