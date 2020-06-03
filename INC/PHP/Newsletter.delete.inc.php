<?php
require 'db.php';

$id = mysqli_escape_string($con, $_POST['id']);

$sql = "DELETE FROM `nieuwsbrief` WHERE `nieuwsbrief`.`id` = ".$_POST['id'];
                $result = $con->query($sql);
                header('Location: ../../Nieuwsbrief.php?Delete=Succes');
                exit();
?>