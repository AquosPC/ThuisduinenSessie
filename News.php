<?php 
    Require "INC/PHP/Header.php";
    require 'INC/PHP/db.php';
    $id = mysqli_escape_string($con, $_GET['id']);
    $query = "SELECT * FROM `newsposts` WHERE id=$id";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result)) {
        if ($row = mysqli_fetch_assoc($result)) {
?>
<head>
    <link rel="stylesheet" href="INC/CSS/Head.css">
    <title>THuisduinen - <?php echo $row['Title']?></title>
</head>
<body class="pageBG">
    <div class="maincard">
            <div class="center">
                    <img class="Newsimage" src="http://localhost/ThuisduinenSessie/Assets/education-12.960x0.jpg" alt="Education">
                </div>
                <div>
                    <h2><?php echo $row['Title'] ?></h2>
                    <p><?php echo $row['Date'] ?></p>
                </div>
                <div>
                    <p><?php echo $row['Text'] ?></p>
                </div>
    <?php } } ?>
    </div>
</body>
<?php require 'INC/PHP/footer.php' ?>