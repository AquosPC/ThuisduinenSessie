<?php
require 'db.php';

$id = mysqli_escape_string($con, $_POST['id']);

$sql = "DELETE FROM `newsposts` WHERE `newsposts`.`id` = ".$_POST['id'];
                $result = $con->query($sql);
                header('Location: ../../Newsadmin.php?Delete=Succes');
                exit();
?>