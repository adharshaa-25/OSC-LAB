<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "logindb";
$port = 3308;

$conn = mysqli_connect($servername, $username, $password, $database, $port);

if (!$conn)
{
    die("Connection Failed: " . mysqli_connect_error());
}

?>