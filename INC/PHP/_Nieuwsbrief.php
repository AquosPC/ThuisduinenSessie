<?php 
require('db.php');
$Mail = mysqli_real_escape_string($con, $_POST['mail']);
$query = "INSERT into `nieuwsbrief` (Email) VALUES ('$Mail')";
mysqli_query($con, $query);
header( "Refresh:0.01; ../../Contact.php");
?>