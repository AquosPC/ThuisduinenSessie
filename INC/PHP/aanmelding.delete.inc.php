<?php
require 'db.php';

$id = mysqli_escape_string($con, $_POST['id']);

$sql = "DELETE FROM `activiteiten` WHERE `activiteiten`.`id` = ".$_POST['id'];
                $result = $con->query($sql);
                header('Location: ../../Aanmeldingen.php?Delete=Succes');
                exit();
?>