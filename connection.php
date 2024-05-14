<?php

$hostName = "localhost";
$username = "root";
$password = "";
define("DB_NAME", "users");

$con = mysqli_connect($hostName, $username, $password, DB_NAME);

if (!$con) {
    die("Try To Connect To Your DataBase" . mysqli_connect_error());
}
