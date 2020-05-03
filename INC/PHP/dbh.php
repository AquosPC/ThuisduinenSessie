<?php

$servername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "thuisduinensessie";

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
}

mysqli_set_charset($conn, "UTF8");