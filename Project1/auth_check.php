<?php

//Start PHP session

session_start();

$authenticated = false;

//Use the session variable to check to see if the user has logged in.
//This will only be set on the login page.  If is isn't set or does not hold a true value, the user isn't logged in.
//The reason this file is at the top of every page is, if a user bookmarks or types the URL of a page and returns to it later,
//the page would be displayed even if they were not logged in. Including this file at the top of ever page prevents this.

if(isset($_SESSION['authenticated'])) {
	if ($_SESSION['authenticated'] === true) {
		$authenticated = true;
	}
}

//If $authenticated is equal to false, the user wasn't logged in, clear the session and redirect them to the login page.

if($authenticated == false) {

    session_destroy();
    session_unset();
	session_start();

    //redirect the user back to login page for authentication
	
	header("Location: login.php");
}

?>