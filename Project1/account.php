
<?php
	require_once("auth_check.php");

    require_once("webmodules/mysqli_connection.php");

    function sanitize($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
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

<body>
    <?php
        include 'webmodules/navbar.php';
        
        $image_name = "wallpaperflare.com_wallpaper\ \(2\).jpg";
        $size = "65";
        include 'webmodules/jumbotron.php';

    ?>
    <div class="container d-flex justify-content-center flex-column align-items-center">
        <div class="row" style="width:100%;">
            <div class="col-lg-12 text-center mt-5 text-black">
                <h1 class="slogan border border-2 rounded-pill border-dark"><?php  echo "Welcome, " . $_SESSION["user_name"];?></h1>
            </div>
        </div>
    </div>

    <?php


        $user= sanitize($_SESSION["login_name"]);
        $user = mysqli_real_escape_string($db_conn, $user);
        $display_name = "";
        $address = "";
        $phone = "";
        $validation = false;
        $err_msg = "";
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if(!empty($_POST["display"])){
                $display_name = sanitize( $_POST["display"]);
                $display_name = mysqli_real_escape_string($db_conn, $display_name);
                $sql = "UPDATE users SET username ='". $display_name ."' WHERE login='". $user ."';";
                if (mysqli_query($db_conn, $sql)) {
                    $validation = true;
                    $_SESSION['user_name'] = $display_name;
                    
                } else {
                echo('<div class="alert alert-danger" role="alert">');
                echo "<h1>Error updating record: " . mysqli_error($db) . "</h1>";
                echo('</div>');  
                }
                
            }else{
                $err_msg = "Display Name Not Set" ;
            }

            if(!empty($_POST["address"])){
                $address = mysqli_real_escape_string($db_conn, sanitize( $_POST["address"]));
                $sql = "UPDATE users SET address ='". $address ."' WHERE login='". $user ."';";
                if (mysqli_query($db_conn, $sql)) {
                    $validation = true;
                    $_SESSION['address'] = $address;
                   
                } else {
                echo('<div class="alert alert-danger" role="alert">');
                echo "<h1>Error updating record: " . mysqli_error($db) . "</h1>";
                echo('</div>');  
                }
            }
            if(!empty($_POST["phone"])){
                $phone = mysqli_real_escape_string($db_conn, sanitize( $_POST["phone"]));
                $sql = "UPDATE users SET phone ='". $phone ."' WHERE login='". $user ."';";
                if (mysqli_query($db_conn, $sql)) {
                    $_SESSION['phone'] = $phone;
                    $validation = true;
                } else {
                echo('<div class="alert alert-danger" role="alert">');
                echo "<h1>Error updating record: " . mysqli_error($db) . "</h1>";
                echo('</div>');  
                }
            }
            
        }
    ?>

    <div class="container slogan d-flex align-items-center flex-column border rounded my-5">
        <form action="account.php" method="post" role="form">
            <?php
                if($validation){
                    echo('<div class="alert alert-success" role="alert">
                    <h1>Record updated successfully</h1>
                    </div>');
                }
            ?>
            <label  class="mt-2"  for="display">Display Name</label>
            <br>
            <input class="border-2 rounded-3 border-dark" type="text" name="display" value="<?php echo $_SESSION['user_name'] ?>">
            <br>
            <label for="address">Address</label>
            <br>
            <input class="border-2 rounded-3 border-dark" type="text" name="address" value="<?php echo $_SESSION['address'] ?>">
            <br>
            <label for="phone">Phone Number</label>
            <br>
            <input class="border-2 rounded-3 border-dark" type="tel" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" value="<?php echo $_SESSION['phone'] ?>">
            <br>
            <button type="submit" class="btn btn-primary my-2">Save changes</button>    
        </form>
    </div>

    

    <?php
        include 'webmodules/footer.php';
    ?>
</body>

</html>