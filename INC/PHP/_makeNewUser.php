<?php

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['upload'])){
    uploadUser();
}

function uploadUser(){
    // als de upload knop wordt ingedrukt
    if(isset($_POST['upload'])){

        // connectie met de db
        $db = mysqli_connect("localhost", "root", "", "thuisduinensessie");

        // de data van het form lezen
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passcheck = $_POST['passcheck'];
        $role = $_POST['role'];
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // check password
        if ($password !== $passcheck) {
            // redirect
            header('Location: ../../makeNewUser.php');
            exit();
        }

        $sql = "INSERT INTO users (firstName, lastName, email, password, role) 
        VALUES ('$firstName', '$lastName', '$email', '$hashed_password', '$role')";
        mysqli_query($db, $sql); // stores in de table

        //redirect
        header('Location: ../../Admin.php');
    }
}




?>