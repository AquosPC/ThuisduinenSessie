<?php 
    Require "INC/PHP/Header.php";
?>
<head>
    <link rel="stylesheet" href="INC/CSS/Head.css">
    <link rel="stylesheet" href="INC/CSS/Admin.css">
    <title>THuisduinen - Bewoners</title>
</head>
<body class="pageBG">
    <div class="maincard">
        <h2 class="textcenter">Aanmeldingen</h2>
    </div>
    <br>
    <br>
    <div class="maincard">
    <table class="divtable">
        <tbody>
            <tr>
                <td>Verwijderen</td>
                <td>Id</td>
                <td>Naam</td>
                <td>Email</td>
                <td>Activiteit</td>
                <td>Aantalpersonen</td>
            </tr>
            <?php   require 'INC/PHP/db.php';
            $sql = "SELECT * FROM `activiteiten`";
            $result = $con->query($sql);
            while($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><a href="http://localhost/ThuisduinenSessie/DelAanmelding.php?id=<?php echo $row['id']?>"><button>Verwijderen</button></a></td>
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['Naam'] ?></td>
                <td><?php echo $row['Email'] ?></td>
                <td><?php echo $row['NaamVanActiviteit'] ?></td>
                <td><?php echo $row['AantalPersonen'] ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    </div>
     <a href="http://localhost/ThuisduinenSessie/admin.php"><button class="button">Admin pagina</button></a>
</body>
<?php require("INC/PHP/footer.php") ?>