<!DOCTYPE HTML>
<html>
<head>
<title>User Toevoegen</title>
<link rel="stylesheet" type="text/css" href="">
<link rel="stylesheet" type="text/css" href="">
</head>
<header>
</header>
<body>
<div class="">
	<!-- gebruiker toevoegen form -->
<form action="INC/PHP/_makeNewUser.php" method="POST" enctype="multipart/form-data">
    <h1>Voer hier een nieuwe gebruiker toe:</h1>
		<div>
			<textarea class="gebruikerAanmaken" name="firstName" cols="30" rows="2" placeholder="Voornaam"></textarea>
		</div>
        <div class="txtb">
			<textarea class="gebruikerAanmaken"  name="lastName" cols="30" rows="2" placeholder="Achternaam"></textarea>
        </div>
        <div class="txtb">
			<textarea class="gebruikerAanmaken"  name="email" cols="30" rows="2" placeholder="Email"></textarea>
		</div>
		<br>
        <div class="txtb">
			<input type="password" class="gebruikerAanmaken"  name="password" cols="50" rows="2" placeholder="Wachtwoord"></input>
		</div>
		<br>
        <div class="txtb">
			<input type="password" class="gebruikerAanmaken"  name="passcheck" cols="30" rows="2" placeholder="Bevestig Wachtwoord"></input>
		</div>
		<br>
		<div class="txtb">
			<select  class="gebruikerAanmaken2"  name = "role">
				<option value="2">Medewerker</option>
				<option value="1">Beheer</option>
			</select>
		</div>
		<br>
		<div>
			<input class="returnUserAanmaken" type="submit" name="upload" value="Maak gebruiker aan">	
		</div>
</form>
	<div>
		<button onclick="window.location.href ='users.php'"class="faqBewerken2" ><span class="returnUserAanmaken">Ga terug</span></button>
	</div>
</div>


</body>

