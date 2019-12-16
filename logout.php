<?php
require_once("config.php");
require_once("functions.php");

//Log the user out

if(isUserLoggedIn())
{
	destroySession("ThisUser");
}
header("Location:login.php");
die();
?>