<?php

//Development of Database Info
$db_host = "localhost"; //name of host server
$db_user = "root";  //name of sql user 
$db_pass = "";      //passsword of sql
$db_name = "meet_players";   //name of the database

//Creating Connection
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

//Checking connection
if (mysqli_connect_errno()) {
    echo "Connection Failed" . mysqli_connect_errno();
    exit();
} else {
    // echo "Connection Succesful<br>";
}
require_once("class.user.php");
session_start();
//loggedInUser can be used globally if constructed
if (isset($_SESSION["ThisUser"]) && is_object($_SESSION["ThisUser"])) {
    $loggedInUser = $_SESSION["ThisUser"];
}


date_default_timezone_set("America/New_York");      //default time zone set to ameican time
