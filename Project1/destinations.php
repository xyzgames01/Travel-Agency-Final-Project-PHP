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
        $image_name = "wallpaperflare.com_wallpaper\ \(7\).jpg";
        $size = "45";
        include 'webmodules/jumbotron.php';
    ?>
     
    <div class="container d-flex flex-column justify-content-center align-items-center">
        <div class="row" style="width:100%;">
            <div class="col-lg-12 text-center mt-5 text-black">
                <h1 class="slogan border border-2 rounded-pill border-dark">Our Destinations</h1>
            </div>
        </div>
        <div class="row text-center mt-5 mb-5" style="width: 100%">
            <?php
                require "webmodules/mysqli_connection.php";
                $sql = "SELECT * FROM product LEFT OUTER JOIN product_list ON product.id=product_list.id;";
                $result = mysqli_query($db_conn, $sql) or die("Error With SQL query");
                
                while($row = mysqli_fetch_assoc($result)){
                    $formatted_price = number_format(floatval($row['price']));
                    echo"<div class='col-md-4 mt-5 d-flex justify-content-center align-items-center'>
                    <div class='card' style='width: 20rem; height: 35rem;'>
                        <img src='images/{$row['image']}' class='card-img-top' alt='Venice'>
                        <div class='card-body d-flex flex-column'>
                            <h5 class='card-title'>{$row['title']}</h5>
                            <h6 class='card-subtitle mb-2 text-muted'>Starting from {$formatted_price}$ per night</h6>
                            <p class='card-text d-flex flex-grow-1'>{$row['description']}</p>
                            <div class='mt-auto'>
                                <a href='products.php' class='card-link'>Book now</a>
                                <a href='#' class='card-link'>Learn more</a>
                            </div>
                        </div>
                    </div>
                </div>";
                }
            ?>
        </div>
    </div>

    <?php
    include 'webmodules/footer.php'
    ?>

</body>

</html>