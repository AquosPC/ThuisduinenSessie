<?php 
    Require "INC/PHP/Header.php";
?>
<head>
    <link rel="stylesheet" href="INC/CSS/Head.css">
    <link rel="stylesheet" href="INC/CSS/Admin.css">
    <title>THuisduinen - Bewoners</title>
</head>
<body class="pageBG">
    <?php
    require 'INC/PHP/db.php';
    $id = mysqli_escape_string($con, $_GET['id']);
    $query = "SELECT * FROM `nieuwsbrief` WHERE id=$id";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result)) {
        if ($row = mysqli_fetch_assoc($result)) { ?>
    <div class="maincard">
        <h2 class="textcenter">Weet u zeker dat u dit  wilt verwijderen?</h2>
        
        <div class="buttoncenter"><a href="http://localhost/ThuisduinenSessie/Nieuwsbrief.php"><button class="button">Nee, breng me terug!</button></div></a>
    </div>
    <div class="maincard">
        <h1 class="textcenter"><?php echo $row['Email'] ?></h1>
    </div>
    <div class="maincard deletediv buttoncenter">
        <form action="INC/PHP/Newsletter.delete.inc.php" method="post">
        <input hidden type="text" name="id" value="<?php echo $row['id'] ?>">
        <button class="delbutton" type="submit">Ja, ik wil dit graag verwijderen</button>
    </form>
    </div>
        <?php } }?>
</body>
<?php require("INC/PHP/footer.php") ?>