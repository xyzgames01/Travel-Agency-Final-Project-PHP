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


//These logins are stored in the database.  The passwords are stored in the table as hashes and NOT clear text passwords.
//logins = "test", "odyssey", "sheppard", "rmckay"
//passwords = "123", "sgPB3865", "PuddleJump", "16431879196842"
//usernames = "Test User", "Paul Emerson", "John Sheppard", "Rodney McKay"
//
//The hashes were generated with:   $hash = password_hash($password, PASSWORD_DEFAULT);
//
//The value of $hash is then used to set the field hash in the table users.
//
//This can be done with a user update form.
//


//Check if the form has been submitted

if(strtoupper($_SERVER['REQUEST_METHOD']) === 'POST') {
	if (isset($_POST['pass']) && isset($_POST['user'])) {

		//Predefine variables
		$validationed = false;
		$err_msg = "";

		//Username and password has been submitted by the user
		//Receive and sanitize the submitted information

		$user = sanitize($_POST['user']);
		$passwd = sanitize($_POST['pass']);
		
		$user = mysqli_real_escape_string($db_conn, $user);
				
		$sql = "SELECT * FROM users WHERE login='" . $user . "';";
		
		$result = mysqli_query($db_conn, $sql) or die(mysqli_error($db_conn));
		$row_count=mysqli_num_rows($result);
		//If the record is found, check password.
		if ($row_count > 0) {
			$row = mysqli_fetch_assoc($result);
			if (password_verify($passwd, $row['hash'])) {
				$_SESSION['login_name'] = $row['login'];
				$_SESSION['login_time'] = time();
				$_SESSION['user_name'] = $row['username'];
				$_SESSION['address'] = $row['address'];
				$_SESSION['phone'] = $row['phone'];
				$validationed = true;
			}
		}

		if ($validationed === false) {
			// If the check completes without finding a valid login, set the error message.
			$err_msg = "Invalid User";
		} else {
			//This is the redirect to the main page of the website.  
			//The way the code is constructed is that no output has occurred yet, so that the redirect works.
			//index.php (or index.html) is normally the main page in a directory that hold webpages. 

			$_SESSION['authenticated'] = true;
			
			header("Location: index.php");
			exit();
		}
	}
} else {
	//This section has the effect of logging the user out if they click on the login page.
	//Comment this section out if you do not want that behavior 
	session_destroy();
	session_unset();
	session_start();
}

//The rest is the login form.  It uses a custom loginform.css that I will also include in the files.

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

	<h1 class="text-center text-white mt-4">Log In!</h1>


    <div class="container d-flex justify-content-center align-items-center flex-column w-25 border border-3 rounded-3 border-dark mt-5 bg-white">
        <form action="login.php" method="post">
        <h3 class="text-center text-dark pt-2">Login</h3>
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
        <label class="mx-2">Password</label>
        <input class="w-50 mx-3 border-2 rounded-3 border-dark" type="password" name="pass">
		<div class="d-flex justify-content-center align-items-center mb-2">
			<button class="btn btn-warning w-50 mt-2 mx-3 border-2 rounded border-dark" id="submit">Log in</button>
		</div>
        
        <hr class=" border-2 border-dark">
        <span class="mb-2 text-center">Need an account? <a href="register.php">REGISTER!</a> </span>
        </div>
        </form>
    </div>

</body>

</html>