<?php 
session_start();// starts, uses current session

$_SESSION["logged_in"] = false;// sets session logged in to false
unset($_SESSION["username"]);// delets session username
unset($_SESSION["userid"]);//delets session userid
unset($_SESSION["userpic"]);//delets session userpic
unset($_SESSION["email"]);//delets session email

session_destroy();// shuts down the session

setcookie("username", $un, time() -3600);// deletes the cookie username

header("Location: login.php?logout=true");// redirect ot login.php

?>
                
                