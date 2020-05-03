<?php 
    Require "INC/PHP/Header.php";
?>
<head>
    <link rel="stylesheet" href="INC/CSS/Head.css">
    <title>THuisduinen - Bewoners</title>
</head>
<body class="pageBG">
<?php
    $date = date('Y/m/d', time());
?>
    <div class="maincard">
        <h2 class="textcenter">Maak een nieuw post</h2>
        <hr> 
    </div>
    <form action="INC/PHP/News.add.inc.php" method="post" enctype="multipart/form-data">
    <div class="maincard">
        <input  type="text" name="Date" value="<?php echo $date ?>">
        <h2 class="textcenter">Titel</h2>
        <input class="center inputstyle" type="text" name="Title" id="Title">
        <h2 class="textcenter">Inleiding</h2>
        <textarea class="center inputstyle noresize" name="Summary" id="Summary" cols="10" rows="5"></textarea>
        <h2 class="textcenter">Beschrijving</h2>
        <textarea class="center inputstyle noresize" name="Description" id="Description" cols="30" rows="10"></textarea>
        <h2 class="textcenter">Foto Uploaden</h2>
        <div class="center">
        <input class="center inputstyle" type="file" name="file"/>
        </div>
        <br>
        <hr>
        <button class="button centerbutton" type="submit">Post</button>
    </div>
    </form>
</body>
<?php require("INC/PHP/footer.php") ?>