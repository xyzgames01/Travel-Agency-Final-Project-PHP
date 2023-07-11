<?php

//I found I had to include a session_start() after the session_destroy() and session_unset() functions, to clear the session. 

session_destroy();
session_unset();
session_start();

//redirect the user back to login page for re-authentication

header("Location: login.php");

?>