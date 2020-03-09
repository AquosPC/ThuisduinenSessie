<?php
session_start();
if (ISSET($_POST['vnaam'])) {

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ThuisduinenSessie";
$link = mysqli_connect("$servername","$username","","$dbname");
if (!$link) {	
	die('Could not connect: ' . mysqli_connect_error()); }
else {
	//echo 'It works!';
}

// Persoonlijke informatie.
$var1 = mysqli_real_escape_string($link, $_POST['vnaam']);
$var2 = mysqli_real_escape_string($link, $_POST['tussenvoegsel']);
$var3 = mysqli_real_escape_string($link, $_POST['anaam']);
$var4 = mysqli_real_escape_string($link, $_POST['straatnaam']);
$var5 = mysqli_real_escape_string($link, $_POST['nummer']);
$var6 = mysqli_real_escape_string($link, $_POST['postcode']);
$var7 = mysqli_real_escape_string($link, $_POST['plaatsnaam']);
$var8 = mysqli_real_escape_string($link, $_POST['toevoeging']);
$var9 = mysqli_real_escape_string($link, $_POST['aanhef']);
$var10 = mysqli_real_escape_string($link, $_POST['onderwerp']);
$var11 = mysqli_real_escape_string($link, $_POST['message']);
$var12 = mysqli_real_escape_string($link, $_POST['email']);
$var13 = mysqli_real_escape_string($link, $_POST['telefoon_nummer']);



// Inserts data into the database.
$sql = "INSERT INTO `contactform` (firstName, insertion, lastName, streetName, houseNummer, zipcode, city, addOn, salutation, topic, message, email, tellNumber)
VALUES ('$var1', '$var2', '$var3', '$var4', '$var5', '$var6', '$var7', '$var8', '$var9', '$var10', '$var11', '$var12', '$var13')";

$result = mysqli_query($link, $sql);

// Echo's back so the user knows that the data has been uploaded.
$message = "Your message has been sent!";
echo "<script type='text/javascript'>alert('$message');</script>";

header( "Refresh:0.01; ../Contact.php");

// Closes the connection.
mysqli_close($link);
}
?>