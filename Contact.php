<?php 
    Require "INC/PHP/Header.php";
?>
<head>
    <link rel="stylesheet" href="INC/CSS/Head.css">
    <title>THuisduinen - Contact</title>
</head>
<body class="pageBG">
    <div class="contactcard">
        <h2 class="textcenter">Contact</h2>
        <iframe class="center map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d19233.529035394116!2d4.709952436055914!3d52.9449838633869!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47cf478ccc81cf01%3A0x1143d4e397a20e23!2sHuisduinen!5e0!3m2!1snl!2snl!4v1581948604164!5m2!1snl!2snl" width="95%" height="450px" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
    </div>
    <hr>
    <div class="contactcard center textcenter">
        <h2>Contact formulier</h2>
        <h3>
            Wilt u meer weten over Thuisduinen 2050 of heeft u vragen over een specifiek project? 
            <br><br>
            Neem dan contact met ons op via onderstaand contactformulier. 
        </h3>
        <br>
        <br>
        <form action="INC/PHP/_contact.php" method="post">
            <input type="text" name="name" id="Name" placeholder="Naam"><br><br>
            <input type="email" name="mail" id="Mail"placeholder="E-mail"><br><br>
            <textarea name="text" id="text" cols="50" rows="10" placeholder="Bericht" ></textarea><br><br>
            <input class="button" type="submit" value="Verstuur">
        </form>
        <hr>
        <br>
        <br>
        <h3>
            Wilt u ook onze nieuwsbrief ontvangen?
            <br>
            vul hier uw email in!
        </h3>
        <br>
        <br>
        <form action="INC/PHP/_Nieuwsbrief.php" method="post">
            <input type="email" name="mail" id="Mail"placeholder="E-mail"><br><br>
            <input class="button" type="submit" value="Verstuur">
        </form>
         <hr>
        <br>
        <br>
        <h3>
            Wilt u bij een overeenkomst zijn? Kijk in de agenda en
            <br>
            meld u hieronder aan!
        </h3>
        <br>
        <br>
        <form action="INC/PHP/_contact2.php" method="post">
            <input type="text" name="naam" id="Mail"placeholder="Naam"><br><br>
            <input type="email" name="mail" id="Mail"placeholder="E-mail"><br><br>
            <input type="text" name="nameOfActivity" id="nameOfActivity" placeholder="Naam van de activiteit"><br><br>
            <input type="text" name="date" id="date" placeholder="Datum van de activiteit"><br><br>
            <input type="text" name="amountOfPeople" id="amountOfPeople" placeholder="Met hoeveel personen komt u?"><br><br>
            <input class="button" type="submit" value="Verstuur">
        </form>
    </div>
</body>
<?php require("INC/PHP/footer.php") ?>