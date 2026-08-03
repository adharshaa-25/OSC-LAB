<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "remarksdb";
$port = 3308;

$conn = mysqli_connect($servername, $username, $password, $database, $port);

if ($conn) {
    echo "Connection successfull";
}
else{
   echo "Connection failed";
}

?>