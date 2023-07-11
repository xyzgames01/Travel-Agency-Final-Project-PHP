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
    <script defer src="js/contact.js"></script>
    <title>Travel Agency</title>
</head>

<body id="contact-background">
    <?php
        include 'webmodules/navbar.php';
        $image_name = "wallpaperflare.com_wallpaper\ \(2\).jpg";
        $size = "65";
        include 'webmodules/jumbotron.php';
    ?>


    <div class="container">
        <div class="row" style="width:100%;">
            <div class="col-lg-12 text-center mt-5 text-black">
                <h1 class="fw-normal slogan bg-white border border-2 rounded-pill border-dark">Contact</h1>
            </div>
        </div>
    </div>

    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="row mt-1">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>525 Otterway, Frederica, DE 19946</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>xyzzach01@gmail.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+1 443 477 7872</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <?php
            if(!empty($_POST["name"])){
                $userName= $_POST["name"];
                $userEmail= $_POST["email"];
                $userSubject= $_POST["subject"];
                $userMessage= $_POST["message"];
                $toEmail= "xyzzach01@gmail.com";
                
                $mailHeaders = "Name: " . $userName . "\r\n Email: " . $userEmail . "\r\n Subject: " . $userSubject . "\r\n Message: " . $userMessage . "\r\n";

                if(mail($toEmail, $userSubject, $mailHeaders)){
                    $message = "Your Info success";
                }

            }
            
            ?>

            <form action="contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <?php if(!empty($message)){
                echo('<div class="alert alert-success" role="alert">
                <h1>Message Sent Successfully</h1>
                </div>');
              } ?>
              <div class="d-flex justify-content-center my-3"><button class="btn btn-primary" name="send" type="submit">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section>

    <?php
        include 'webmodules/footer.php';
    ?>

</body>

</html>