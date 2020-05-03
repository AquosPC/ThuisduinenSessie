<?php 
    Require "INC/PHP/Header.php";
?>
<head>
    <link rel="stylesheet" href="INC/CSS/Head.css">
    <title>THuisduinen - Home</title>
</head>
<body class="pageBG">
    <div>
    <div class="maincard">
        <h2 class="bold">Thuisduinen2050</h2>
        <h3 class="bold">Alles voor en door bewoners</h3>
        <p class="semibold">
            Huisduinen is een van de populairste woonlocaties in de gemeente Den Helder en de rust en ruimte van de natuurgebieden worden door bewoners vanuit heel Den Helder gebruikt voor natuurbeleving en recreatie. 
            In de loop der jaren is de vraag ontstaan hoe  de bewoners van Huisduinen kunnen bijdragen aan een toekomstbestendige ontwikkeling van hun woon- en leefomgeving, waarbij de identiteit en het gebiedseigen karakter behouden blijft. 
            Vanuit dit initiatief is 'Thuisduinen2050' ontstaan. 
        </p>
        <p class="semibold">
            Huisduinen als 'kenniswerkplaats' 
        </p>
        <p>
            Inholland heeft samen met de Stichting Huisduiner Belang een kenniswerkplaats opgericht waarin studenten aan de slag gaan met vraagstukken uit Huisduinen die te maken hebben met Samenwerking en Communicatie, Voeding en Gezondheid, Energie en Duurzaamheid, Transport en Infrastructuur en Zorg en Welzijn.
                <br><br>
            In de eerste helft van schooljaar 2019-2020 gaan zesentwintig studenten van Hogeschool Inholland en negen studenten ROC Kop van Noord-Holland aan de slag met vier projecten in de kenniswerkpaats, een nieuwe vorm van onderwijs. 
            In deze methodiek werken studenten samen met docenten, bedrijven én bewoners aan oplossingen voor actuele interprofessionele vraagstukken in de samenleving. 
            Het mes snijdt aan verschillende kanten tegelijk!
                <br><br>
            Heb jij als bewoner ook ideeën voor een project of wil jij partciperen in bestaande projecten? Neem dan contact met ons op via ons contactformulier.
        </p>
    </div>
    <div class="parallaxwithtext">
        <div class="divwithtext">
        <h1 class="darkoutline">Bezienswaardigheden</h1>
        <p class="darkoutline"> Naast het strand, duinen en natuur is Huisduinen vooral bekend van Fort Kijkduin. 
            Het fort, daterend van 1811, is onderdeel van de Stelling Den Helder, een verdedigingslinie die werd gebouwd onder Napoleon. 
            Het fort is tegenwoordig een museum, dat de geschiedenis vertelt van de periode dat het een fort was. 
            In het fort bevindt zich ook een Noordzee-aquarium.
        </p>
        <p class="darkoutline">Klik hier voor een filmpje</p>
        </div>
    </div>
    <div class="maincard">
    <?php   require 'INC/PHP/db.php';
            $sql = "SELECT * FROM `newsposts`";
            $result = $con->query($sql);
            while($row = $result->fetch_assoc()) { ?>
            <div class="Blogdiv textstyle">
                <div class="Blogimage">
                    <img  class="center" src="http://localhost/ThuisduinenSessie/Assets/Blogimage/<?php echo $row['Image']?>" alt="Education">
                </div>
                <div>
                    <h2><?php echo $row['Title'] ?></h2>
                    <p><?php echo $row['Date'] ?></p>
                </div>
                <div>
                    <p><?php echo $row['Summary'] ?></p>
                    <a href="http://localhost/ThuisduinenSessie/News.php?id=<?php echo $row['id']?>"><button class="button">Meer Lezen</button></a>
                </div>
            </div>
            <hr>
            <?php } ?>
            </div>
    </body>
    <?php require("INC/PHP/footer.php") ?>