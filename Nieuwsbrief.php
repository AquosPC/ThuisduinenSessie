<?php 
    Require "INC/PHP/Header.php";
?>
<head>
    <link rel="stylesheet" href="INC/CSS/Head.css">
    <link rel="stylesheet" href="INC/CSS/Admin.css">
    <title>THuisduinen - Admin</title>
</head>
<body class="pageBG">
    <div class="maincard">
        <h2 class="textcenter">Nieuwsbrief index</h2>
    </div>
    <br>
    <br>
    <div class="maincard">
    <div>
    <?php
        require 'INC/PHP/db.php';
        $sql = "SELECT Email FROM `nieuwsbrief`";
        $result = $con->query($sql);
         ?>
    <a href="mailto:<?php while($row = $result->fetch_assoc()) { echo $row['Email']?>,<?php } ?>"><button class="center">Mail sturen</button></a>
    </div>
    <table class="divtable">
        <tbody>
            <tr>
                <td>Verwijderen</td>
                <td>Id</td>
                <td>E-mail</td>
            </tr>
            <?php   require 'INC/PHP/db.php';
            $sql = "SELECT * FROM `nieuwsbrief`";
            $result = $con->query($sql);
            while($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><a href="http://localhost/ThuisduinenSessie/DelNieuwsbrief.php?id=<?php echo $row['id']?>"><button>Verwijderen</button></a></td>
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['Email'] ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    </div>
</body>
<?php require("INC/PHP/footer.php") ?>