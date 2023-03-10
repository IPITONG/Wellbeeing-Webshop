<?php

session_start();

require_once('products.php');
require_once('createDb.php');

$database = new createDb(dbname: "Productdb", tablename: "Producttb");

if (isset($_POST['add'])) {
    if (isset($_SESSION['cart'])) {
        $item_array_id = array_column($_SESSION['cart'], "product_id");
        if (in_array($_POST['product_id'], $item_array_id)) {
            echo "<script>alert('Product is al toegevoegd')</script>";
            echo "<script>window.location = 'Webshop.php'</script>";
        } else {
            $count = count($_SESSION['cart']);
            $item_array = array(
                'product_id' => $_POST['product_id']
            );
            $_SESSION['cart'][$count] = $item_array;
        }
    } else {
        $item_array = array(
            'product_id' => $_POST['product_id']
        );
        $_SESSION['cart'][0] = $item_array;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

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
    <!-- header section ends -->

    <!-- home section starts  -->

    <section class="home" id="home">

        <div class="content">
            <h3>Smart Beehives</h3>
            <span> Natuurlijke honing en bloemen </span>
            <p>"Proef de pure smaak van de natuur met onze 100% natuurlijke honing en ondersteun de bijenpopulatie met
                onze hoogwaardige bijenkorven, verkrijgbaar op onze webshop. Bestel nu!"</p>
            <a href="#products" class="btn">shop nu</a>
        </div>

    </section>

    <!-- home section ends -->

    <!-- about section starts  -->

    <section class="about" id="about">

        <h1 class="heading"> <span> Over </span> ons </h1>

        <div class="row">

            <div class="video-container">
                <video src="img/ezgif.com-gif-maker.mp4" loop autoplay muted></video>
                <h3>de beste honing</h3>
            </div>

            <div class="content">
                <h3>Waarom zou je onze producten kiezen?</h3>
                <p>Als u op zoek bent naar hoogwaardige bijenkorven en natuurlijke honing, dan is onze webshop de
                    perfecte keuze voor u. Wij geloven dat het ondersteunen van de bijenpopulatie essentieel is voor
                    onze planeet en daarom bieden wij alleen de beste producten aan die op eerlijke en duurzame manieren
                    worden geproduceerd. <br> <br>
                    Onze bijenkorven zijn gemaakt van de beste materialen om de bijen een veilige en comfortabele
                    thuishaven te bieden. Onze honing is 100% natuurlijk en wordt verzameld van gezonde bijenkolonies
                    zonder toevoeging van enige chemicali??n of kunstmatige smaakstoffen. Wij garanderen dat onze honing
                    de pure smaak van de natuur behoudt. <br>
                    Daarnaast bieden wij een uitstekende klantenservice en snelle levering, zodat u binnen de kortste
                    keren kunt genieten van onze prachtige producten. Wij hebben ook een aantal waardevolle informatie
                    over het houden van bijen en het produceren van honing, zodat u kunt leren hoe u uw eigen
                    bijenkolonie kunt starten of uw eigen honing kunt produceren.</p>
                <p>Kies voor onze webshop voor de beste bijenkorven en natuurlijke honing op de markt, terwijl u ook
                    bijdraagt aan het ondersteunen van de bijenpopulatie en een duurzamere planeet.</p>
                <a href="index.html" target="_blank" class="btn">Lees meer op onze website</a>
            </div>

        </div>

    </section>

    <!-- about section ends -->

    <!-- icons section starts  -->

    <section class="icons-container">

        <div class="icons">
            <img src="img/icon-1.png" alt="">
            <div class="info">
                <h3>Gratis verzenden</h3>
                <span>op elke bestelling</span>
            </div>
        </div>

        <div class="icons">
            <img src="img/icon-2.png" alt="">
            <div class="info">
                <h3>10 dagen niet goed geld terug</h3>
                <span>geld terug garantie</span>
            </div>
        </div>

        <div class="icons">
            <img src="img/icon-3.png" alt="">
            <div class="info">
                <h3>Aanbod en geschenken</h3>
                <span>Bij alle producten</span>
            </div>
        </div>

        <div class="icons">
            <img src="img/icon-4.png" alt="">
            <div class="info">
                <h3>veilig betalen</h3>
                <span>beschermd door paypal</span>
            </div>
        </div>

    </section>

    <!-- icons section ends -->

    <!-- prodcuts section starts  -->

    <section class="products" id="products">

        <h1 class="heading"> Onze <span>producten</span> </h1>

        <div class="box-container">
            <?php
                $result = $database->getData();
                    while ($row = mysqli_fetch_assoc($result)) {
                    products($row['product_name'], $row['product_price'], $row['product_image'], $row['id']);
                }
            ?>

            <!-- <div class="box">
                <span class="discount">-10%</span>
                <div class="image">
                    <img src="img/blank-profile-picture-973460_1280.webp" alt="">
                    <div class="icons">
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="cart-btn">Toevoegen</a>
                        <a href="#" class="fas fa-share"></a>
                    </div>
                </div>
                <div class="content">
                    <h3>Beehive</h3>
                    <div class="price"> $12.99 <span>$15.99</span> </div>
                </div>
            </div>

            <div class="box">
                <span class="discount">-15%</span>
                <div class="image">
                    <img src="img/blank-profile-picture-973460_1280.webp" alt="">
                    <div class="icons">
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="cart-btn">Toevoegen</a>
                        <a href="#" class="fas fa-share"></a>
                    </div>
                </div>
                <div class="content">
                    <h3>Beehive</h3>
                    <div class="price"> $12.99 <span>$15.99</span> </div>
                </div>
            </div>

            <div class="box">
                <span class="discount">-5%</span>
                <div class="image">
                    <img src="img/blank-profile-picture-973460_1280.webp" alt="">
                    <div class="icons">
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="cart-btn">Toevoegen</a>
                        <a href="#" class="fas fa-share"></a>
                    </div>
                </div>
                <div class="content">
                    <h3>Beehive</h3>
                    <div class="price"> $12.99 <span>$15.99</span> </div>
                </div>
            </div>

            <div class="box">
                <span class="discount">-20%</span>
                <div class="image">
                    <img src="img/blank-profile-picture-973460_1280.webp" alt="">
                    <div class="icons">
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="cart-btn">Toevoegen</a>
                        <a href="#" class="fas fa-share"></a>
                    </div>
                </div>
                <div class="content">
                    <h3>Beehive</h3>
                    <div class="price"> $12.99 <span>$15.99</span> </div>
                </div>
            </div>

            <div class="box">
                <span class="discount">-17%</span>
                <div class="image">
                    <img src="img/blank-profile-picture-973460_1280.webp" alt="">
                    <div class="icons">
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="cart-btn">Toevoegen</a>
                        <a href="#" class="fas fa-share"></a>
                    </div>
                </div>
                <div class="content">
                    <h3>Beehive</h3>
                    <div class="price"> $12.99 <span>$15.99</span> </div>
                </div>
            </div>

            <div class="box">
                <span class="discount">-3%</span>
                <div class="image">
                    <img src="img/blank-profile-picture-973460_1280.webp" alt="">
                    <div class="icons">
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="cart-btn">Toevoegen</a>
                        <a href="#" class="fas fa-share"></a>
                    </div>
                </div>
                <div class="content">
                    <h3>Beehive</h3>
                    <div class="price"> $12.99 <span>$15.99</span> </div>
                </div>
            </div>

            <div class="box">
                <span class="discount">-18%</span>
                <div class="image">
                    <img src="img/blank-profile-picture-973460_1280.webp" alt="">
                    <div class="icons">
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="cart-btn">Toevoegen</a>
                        <a href="#" class="fas fa-share"></a>
                    </div>
                </div>
                <div class="content">
                    <h3>Beehive</h3>
                    <div class="price"> $12.99 <span>$15.99</span> </div>
                </div>
            </div>

            <div class="box">
                <span class="discount">-10%</span>
                <div class="image">
                    <img src="img/blank-profile-picture-973460_1280.webp" alt="">
                    <div class="icons">
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="cart-btn">Toevoegen</a>
                        <a href="#" class="fas fa-share"></a>
                    </div>
                </div>
                <div class="content">
                    <h3>Beehive</h3>
                    <div class="price"> $12.99 <span>$15.99</span> </div>
                </div>
            </div>

            <div class="box">
                <span class="discount">-5%</span>
                <div class="image">
                    <img src="img/blank-profile-picture-973460_1280.webp" alt="">
                    <div class="icons">
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="cart-btn">Toevoegen</a>
                        <a href="#" class="fas fa-share"></a>
                    </div>
                </div>
                <div class="content">
                    <h3>Beehive</h3>
                    <div class="price"> $12.99 <span>$15.99</span> </div>
                </div>
            </div> -->

        </div>

    </section>

    <!-- prodcuts section ends -->

    <!-- review section starts  -->

    <section class="review" id="review">

        <h1 class="heading"><span>review</span> </h1>

        <div class="box-container">

            <div class="box">
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p>"Ik ben zo blij dat ik deze webshop heb gevonden! Ze hebben een geweldige selectie van producten en
                    de prijzen zijn ongelooflijk.<br> Bovendien was de levering snel en soepel. Ik zou deze webshop aan
                    iedereen aanbevelen."</p>
                <div class="user">
                    <img src="img/pic-1.png" alt="">
                    <div class="user-info">
                        <h3>Jan Smit</h3>
                        <span>Tevreden</span>
                    </div>
                </div>
                <span class="fas fa-quote-right"></span>
            </div>

            <div class="box">
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p>"Ik ben zo onder de indruk van de service die ik heb ontvangen van deze webshop. Ze gingen boven en
                    buiten om ervoor te zorgen dat mijn bestelling correct was en dat ik tevreden was met mijn aankoop.
                    Ik zal terugkeren voor toekomstige aankopen."</p>
                <div class="user">
                    <img src="img/pic-2.png" alt="">
                    <div class="user-info">
                        <h3>Maria van der Linden</h3>
                        <span>Tevreden</span>
                    </div>
                </div>
                <span class="fas fa-quote-right"></span>
            </div>

            <div class="box">
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p>"Dit is echt mijn favoriete webshop voor online shoppen. De gebruikersinterface is gemakkelijk te
                    navigeren en de producten zijn van hoge kwaliteit. Bovendien zijn de verzendkosten gratis, wat een
                    geweldige bonus is."</p>
                <div class="user">
                    <img src="img/pic-3.png" alt="">
                    <div class="user-info">
                        <h3>Michael Thompson</h3>
                        <span>Tevreden</span>
                    </div>
                </div>
                <span class="fas fa-quote-right"></span>
            </div>

        </div>

    </section>

    <!-- review section ends -->

    <!-- contact section starts  -->

    <section class="contact" id="contact">
        <div class="container">
            <h1><span>Contact</span></h1>
            <form action="https://formsubmit.co/511976@student.fontys.nl" method="POST">
                <div class="row">
                    <div class="col-25">
                        <label for="fname">Naam:</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="fname" name="firstname" placeholder="Uw naam..">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="lname">Achternaam:</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="lname" name="lastname" placeholder="Uw achternaam..">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="country">Land:</label>
                    </div>
                    <div class="col-75">
                        <select id="country" name="country">
                            <option value="nederland">Nederland</option>
                            <option value="duitsland">Duitsland</option>
                            <option value="usa">USA</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="subject">Onderwerp:</label>
                    </div>
                    <div class="col-75">
                        <textarea id="subject" name="subject" placeholder="Onderwerp.." style="height:200px"></textarea>
                    </div>
                </div>
                <div class="row">
                    <input type="submit" value="Verstuur">
                </div>
            </form>
        </div>

    </section>

    <!-- contact section ends -->

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
                <a href="#home" class="link">Home</a>
                <a href="#about" class="link">Over ons</a>
                <a href="#products" class="link">Producten</a>
                <a href="#contact" class="link">Contact</a>
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