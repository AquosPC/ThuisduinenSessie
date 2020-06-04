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
        <h2 class="textcenter">Nieuws Index</h2>
    </div>
    <div>
        <a href="Addnews.php"><button class="button center">Nieuw artikel toevoegen</button></a>
    </div>
    <br>
    <br>
    <div class="maincard">
    <table class="divtable">
        <tbody>
            <tr>
                <td>Bekijken</td>
                <td>Aanpassen</td>
                <td>Verwijderen</td>
                <td>Id</td>
                <td>Titel</td>
                <td>Datum</td>
            </tr>
            <?php   require 'INC/PHP/db.php';
            $sql = "SELECT * FROM `newsposts`";
            $result = $con->query($sql);
            while($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><a href="http://localhost/ThuisduinenSessie/News.php?id=<?php echo $row['id']?>"><button>Bekijken</button></a></td>
                <td><a href="http://localhost/ThuisduinenSessie/Editnews.php?id=<?php echo $row['id']?>"><button>Aanpassen</button></a></td>
                <td><a href="http://localhost/ThuisduinenSessie/Delnews.php?id=<?php echo $row['id']?>"><button>Verwijderen</button></a></td>
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['Title'] ?></td>
                <td><?php echo $row['Date'] ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    </div>
            <a href="http://localhost/ThuisduinenSessie/admin.php"><button class="button">Admin pagina</button></a>
</body>
<?php require("INC/PHP/footer.php") ?>