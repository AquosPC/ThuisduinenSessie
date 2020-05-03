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
    require 'INC/PHP/db.php';
    $id = mysqli_escape_string($con, $_GET['id']);
    $query = "SELECT * FROM `newsposts` WHERE id=$id";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result)) {
        if ($row = mysqli_fetch_assoc($result)) {
?>
    <div class="maincard">
        <h2 class="textcenter">Deze Artikel aanpassen</h2>
        <hr> 
    </div>
    <form action="INC/PHP/News.edit.inc.php" method="post" enctype="multipart/form-data">
    <div class="maincard">
        <input  type="text" hidden name="id" value="<?php echo $row['id'] ?>">
        <input  type="text" hidden name="Date" value="<?php echo $row['Date'] ?>">
        <h2 class="textcenter">Titel</h2>
        <input class="center inputstyle" type="text" name="Title" id="Title" value="<?php echo $row['Title'] ?>">
        <h2 class="textcenter">Inleiding</h2>
        <textarea class="center inputstyle noresize" name="Summary" id="Summary" cols="10" rows="5" ><?php echo $row['Summary'] ?></textarea>
        <h2 class="textcenter">Beschrijving</h2>
        <textarea class="center inputstyle noresize" name="Description" id="Description" cols="30" rows="10" ><?php echo $row['Description'] ?></textarea>
        <h2 class="textcenter">Foto aanpassen</h2>
        <div class="center">
        <input class="center inputstyle" type="file" name="file">
        </div>
        <br>
        <hr>
        <button class="button centerbutton" type="submit">Post</button>
    </div>
    </form>
</body>
        <?php }} require("INC/PHP/footer.php") ?>