<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THuisduinen</title>
    <link rel="stylesheet" href="https://localhost/ThuisduinenSessie/INC/CSS/Header.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu:500&display=swap" rel="stylesheet"> 
    <script src="https://localhost/ThuisduinenSessie/INC/JS/Sticky.js"></script>
</head>
<body>
    <div id="navbar">
    <img class="Logo" src="https://localhost/ThuisduinenSessie/Assets/thuisduinen2050-1000px.png" alt="Logo">
    <nav class="flex-nav nav">
        <div class="navdiv">
            <a class="navlinks" href="http://localhost/ThuisduinenSessie/">Welkom</a>
            <a class="navlinks" href="http://localhost/ThuisduinenSessie/AboutUs.php">Over ons</a>
            <a class="navlinks" href="http://localhost/ThuisduinenSessie/Bewoners.php">Bewoners</a>
            <a class="navlinks" href="http://localhost/ThuisduinenSessie/">Projecten</a>
            <a class="navlinks" href="http://localhost/ThuisduinenSessie/">Contact</a>
        </div>
    </nav>
    </div>
    <?php 
    $i = rand(0, 2);
    if ($i === 0){
        ?>
        <div class="headimg parallax"></div>
        <?php
    }elseif ($i === 1){
        ?>
        <div class="headimg1 parallax1"></div>
        <?php
    }elseif ($i === 2){
        ?>
        <div class="headimg2 parallax2"></div>
        <?php
    }else{
        print($i);
        }
    ?>
</body>
</html>