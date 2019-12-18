<?php
require_once("config.php");
require_once("functions.php");

//Log the user out
$pro_id=$_GET['pro_id'];
if(isUserLoggedIn())
{
	$delete_op=deleterProfile($pro_id);
}
if ($delete_op == 1) {
    header("Location: selectProfile.php");
    die();

}
?>