<?php 
    Require "INC/PHP/Header.php";
?>
<head>
    <link rel="stylesheet" href="INC/CSS/Head.css">
    <title>THuisduinen - Gberuiker aanmaken</title>
</head>
<body class="pageBG">
   
<div class="maincard">
    <div class="logincard center textcenter">
    <!-- gebruiker toevoegen form -->
<form action="INC/PHP/_makeNewUser.php" method="POST" enctype="multipart/form-data">
    <h1>Voer hier een nieuwe gebruiker toe:</h1>
        <input class="gebruikerAanmaken" name="firstName" cols="30" rows="2" placeholder="Voornaam">
            <br>
        <input class="gebruikerAanmaken"  name="lastName" cols="30" rows="2" placeholder="Achternaam">
            <br>
        <input class="gebruikerAanmaken"  name="email" cols="30" rows="2" placeholder="Email" required="required">
            <br>
        <input type="password" class="gebruikerAanmaken"  name="password" cols="50" rows="2" placeholder="Wachtwoord" required="required"></input>
            <br>
        <input type="password" class="gebruikerAanmaken"  name="passcheck" cols="30" rows="2" placeholder="Bevestig Wachtwoord" required="required"></input>
            <br>
        <select  class="gebruikerAanmaken2"  name="role" placeholder="Rol" required="required">
            <option value="2">Medewerker</option>
            <option value="1">Beheer</option>
        </select>
            <br>
        <input class="" type="submit" name="upload" value="Maak gebruiker aan">   
        <button onclick="window.location.href ='Admin.php'"class="" ><span class="">Admin pagina</span></button>
</form>
</div>
</div>
</body>
<?php require("INC/PHP/footer.php") ?>