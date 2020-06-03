<?php 
    Require "INC/PHP/Header.php";
?>
<head>
    <link rel="stylesheet" href="INC/CSS/Head.css">
    <link rel="stylesheet" href="INC/CSS/Admin.css">
    <title>THuisduinen - Adminpaneel</title>
</head>
<body class="pageBG">
    <div>
    <div class="maincard">
        <h2 class="bold">Welkom, beheerder</h2>
    </div>
    <div class="Adminbuttonsdiv">
    <a href="Newsadmin.php">
    <div>
        <img src="Assets/Nieuwslogo.svg" alt="News">
        <h2 class="">Nieuws</h2>
    </div>
    </a>
    <a href="makeNewUser.php">
        <div>
            <img src="Assets/Users.svg" alt="Nieuwe gebruiker">
            <h2 class="">Gebruiker aanmaken</h2>
        </div>
    </a>
    <a href="beheerAgenda/index.php">
        <div>
            <img src="Assets/calenderlogo.svg" alt="Beheer agenda">
            <h2 class="">Beheer agenda</h2>
        </div>
    <a href="Nieuwsbrief.php">
        <div>
            <img src="Assets/nieuwsbrieflogo.svg" alt="Nieuwsbrief">
            <h2 class="">Nieuwsbrief</h2>
        </div>
    </a>
</div>

</body>
<?php require("INC/PHP/footer.php") ?>