<?php 
    Require "INC/PHP/Header.php";
?>
<head>
    <link rel="stylesheet" href="INC/CSS/Head.css">
    <title>THuisduinen - Adminpaneel</title>
</head>
<body class="pageBG">
    <div>
        <p>
            Delete this!<br>
            test6@test.nl<br>
            test6<br>
            Delete this!
        </p>
    <div class="maincard">
        <div class="logincard center textcenter">
            <form action="INC/PHP/_login.php" method="POST">
            <input type="email" name="email" placeholder="Email invoeren" required="required">
            <br>
            <input type="password" name="password" placeholder="Wachtwoord invoeren" required="required">
            <br>
            <input class="button" type="submit" name="login-submit" value="Inloggen">

            <a href="INC/PHP/">
            </form>

        </div>
    </div>
    </div>
</body>
<?php require("INC/PHP/footer.php") ?>