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
        Huisduinen als 'kenniswerkplaats': Hoe maak je een dorp zelfvoorzienend en volledig duurzaam? 
        </p>
        <p>
        Het is een vraagstuk waar bewoners van Huisduinen in samenwerking met studenten van InHolland en ROC Kop van Noord-Holland mee aan de slag zijn gegaan. 
        Vanuit dit initiatief zijn verschillende projecten voor 'Thuisduinen2050' tot stand gekomen waarbij jongeren, samen met bewoners van Huisduinen, projecten uitdragen in het kader van duurzaamheid en zelfvoorziening. 
        De projecten zijn onderverdeeld in vier thema’s: energie en duurzaamheid, voeding en gezondheid, infrastructuur en logistiek en zorg en welzijn. Vanuit elk thema zijn verschillende projecten ontstaan.
                <br><br>
                Bij Thuisduinen werk je meteen vanuit de praktijk: bewoners en studenten werken samen om projecten uit te werken, uit te voeren, te toetsen en aan te scherpen. 
                Samen maken wij van Thuisduinen het eerste zelfvoorzienende dorp van Nederland. 
                <br><br>
                Benieuwd naar de huidige projecten? Kijk dan op onze <a class="link" href="http://localhost/ThuisduinenSessie/Projecten.php">projectenpagina</a>. 
                <br><br>
                Heb jij als bewoner ook ideeën voor een project of wil jij partciperen in bestaande projecten? Neem dan contact met ons op via ons <a class="link" href="http://localhost/ThuisduinenSessie/Contact.php">contactformulier</a>. 
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
    <div>
        <h2 style="text-align: center;">Wilt u meer weten over activiteiten? Bekijk onze agenda!<br>
            Wilt u eventueel meedoen aan een activiteit of bijeenkomst?<br>
            Bekijk onze contact pagina en meld u aan.<br>
        </h2>
        <a href="http://localhost/ThuisduinenSessie/agenda/index.php"><button class="button2">Agenda</button></a>
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