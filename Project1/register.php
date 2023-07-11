<?php

//Start PHP session

session_start();

require_once("webmodules/mysqli_connection.php");

function sanitize($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


if(strtoupper($_SERVER['REQUEST_METHOD']) === 'POST') {
	if (!empty($_POST['pass']) && !empty($_POST['user']) && !empty($_POST['username'])) {

		$validationed = false;
		$err_msg = "";

		$user = sanitize($_POST['user']);
        $username = sanitize($_POST['username']);
        $passwd = password_hash(sanitize($_POST['pass']), PASSWORD_DEFAULT);

        $user = mysqli_real_escape_string($db_conn, $user);

        $sql = "SELECT * FROM users WHERE login='$user';";

        $result  = mysqli_query($db_conn,$sql);
		$num_rows = mysqli_num_rows($result);

        if (!$num_rows) {
            $sql = "INSERT INTO users (login, hash, username) VALUES ('$user', '$passwd', '$username')";
		
        
            if(mysqli_query($db_conn, $sql)){
                echo "Records added successfully.";
                $validationed = true;
            } else{
                echo "Unable to create account $sql. " . mysqli_error($link);
    
            }
        }
				

		if ($validationed === false) {
            $err_msg = "Unable To create account. Username already Exists";
		} else {
            mysqli_close($db_conn);
			header("Location: login.php");
			exit();
		}
	}
} else {
	session_destroy();
	session_unset();
	session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap5.css">
    <script src="js/bootstrap5.js"></script>
    <title>Login Page</title>
</head>

<body class="p-3 mb-2 bg-dark text-dark">

    <h1 class="text-center text-white mt-4">Create an Account!</h1>

    <div class="container d-flex justify-content-center align-items-center flex-column w-25 border border-3 rounded-3 border-white mt-5 bg-white">
        <form action="register.php" method="post">
        <h3 class="text-center text-dark pt-2">Register</h3>
        <?php
		    if(isset($err_msg)) {
			  echo('<div class="alert alert-danger" role="alert">');
			  echo('  <strong>' . $err_msg . '</strong>');
			  echo('</div>');
			}
		?>
        <div class="row">
        <label class="mx-2">User Name</label>
        <input class="w-50 mx-3 border-2 rounded-3 border-dark" type="username" name="user">
        <label class="mx-2">Display Name</label>
        <input class="w-50 mx-3 border-2 rounded-3 border-dark" type="username" name="username">
        <label class="mx-2">Password</label>
        <input class="w-50 mx-3 border-2 rounded-3 border-dark" type="password" name="pass">
		<div class="d-flex justify-content-center align-items-center mb-2">
			<button class="btn btn-warning w-50 mt-2 mx-3 border-2 rounded border-dark" id="submit">Register</button>
		</div>
        
        <hr class=" border-2 border-dark">
        <span class="mb-2 text-center">Have an account? <a href="login.php">LOGIN!</a> </span>
        </div>
        </form>
    </div>

</body>

</html>