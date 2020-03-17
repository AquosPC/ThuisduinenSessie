<?php
session_start();
if (ISSET($_POST['name'])) {

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "thuisduinensessie";
$link = mysqli_connect("$servername","$username","","$dbname");
if (!$link) {	
	die('Could not connect: ' . mysqli_connect_error()); }
else {
	//echo 'It works!';
}

// Persoonlijke informatie.
$var1 = mysqli_real_escape_string($link, $_POST['name']);
$var2 = mysqli_real_escape_string($link, $_POST['mail']);
$var3 = mysqli_real_escape_string($link, $_POST['text']);



// Inserts data into the database.
$sql = "INSERT INTO `contactform` (userName, userEmail, userMessage)
VALUES ('$var1', '$var2', '$var3')";

$result = mysqli_query($link, $sql);

// Echo's back so the user knows that the data has been uploaded.
$message = "U bericht is verzonden!";
echo "<script type='text/javascript'>alert('$message');</script>";

header( "Refresh:0.01; ../../Contact.php");

// Closes the connection.
mysqli_close($link);
}
?>