<?php
	require_once("auth_check.php");
?> 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap5.css">
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/bootstrap5.js"></script>
    <title>Travel Agency</title>
</head>

<body id="info-background">
    <?php
        include 'webmodules/navbar.php';
        $image_name = "jumbotron3.jpg";
        $size = "45";
        include 'webmodules/jumbotron.php';
    ?>


    <div class="container d-flex flex-column justify-content-center align-items-center">
        <div class="row" style="width:100%;">
            <div class="col-lg-12 text-center mt-5 text-black">
                <h1 class="slogan border border-2 rounded-pill border-dark">About Us</h1>
            </div>
        </div>
        <div class="row text-start mt-5 mb-3" style="width: 100%">
            <div class="col-lg-12 text-start text-black">
                <p>Agent Travel 007 is a premier travel agency dedicated to providing exceptional travel services to our
                    clients. Our team of experienced travel agents has a wealth of knowledge about different
                    destinations and can help you plan your dream vacation to any corner of the globe. Whether you are
                    looking for a romantic getaway, a family vacation, or an adventure-filled trip, we have the
                    expertise and resources to make it happen.</p>
            </div>
        </div>
        <div class="row text-start mb-3" style="width: 100%">
            <div class="col-lg-12 text-start text-black">
                <p>At Agent Travel 007, we believe that travel should be accessible to everyone, and we strive to make
                    it possible for our clients to experience the world without breaking the bank. Our team works hard
                    to find the best deals and packages for our clients, and we are always available to answer any
                    questions and offer advice on travel-related matters.</p>
            </div>
        </div>
        <div class="row text-start mb-3" style="width: 100%">
            <div class="col-lg-12 text-start text-black">
                <p>
                    We understand that every traveler is unique, and that's why we offer customized travel plans
                    tailored to your specific needs and preferences. We take the time to listen to your travel goals and
                    desires, and then craft a travel itinerary that meets your expectations and exceeds your wildest
                    dreams.
                </p>
            </div>
        </div>
        <div class="row text-start mb-3" style="width: 100%">
            <div class="col-lg-12 text-start text-black">
                <p>
                    At Agent Travel 007, we are committed to providing exceptional customer service and ensuring that
                    every aspect of your travel experience is smooth and stress-free. From booking your flights and
                    accommodations to arranging for transportation and activities, we handle every detail so that you
                    can focus on making memories that will last a lifetime.
                </p>
            </div>
        </div>
        <div class="row text-start mb-3" style="width: 100%">
            <div class="col-lg-12 text-start text-black">
                <p>
                    Thank you for considering Agent Travel 007 as your travel partner. We look forward to helping you
                    create unforgettable travel experiences that will leave you with memories to cherish for years to
                    come.
                </p>
            </div>
        </div>
    </div>

    <?php
        include 'webmodules/footer.php';
    ?>

</body>

</html>