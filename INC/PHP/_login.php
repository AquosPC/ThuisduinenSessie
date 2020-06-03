<?php

if(isset($_POST['login-submit'])){

    require 'dbh.php';

    $email = $_POST['email'];
    $password = $_POST['password'];
    // fields empty check
    if(empty($email) || empty($password)){
        header("location: ../../Login.php?error=emptyfields");
        exit();
    }
    else{
        $sql = "SELECT email, password, role FROM users WHERE password=? OR email=?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../../Login.php?error=sqlError");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "ss", $email, $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result)){
                $pwdCheck = password_verify($password, $row['password']);
                //password check
                if ($pwdCheck == $row['password']){
                    session_start();
                    $_SESSION['role'] = $row['role'];
                    $_SESSION['firstName'] = $row['firstName'];
                    $_SESSION['lastName'] = $row['lastName'];
                    // role check 
                    if($row['role'] == 1){
                        header("location: ../../Admin.php");
                    }
                    else if($row['role'] == 2){
                        header("location: ../../Index.php");
                    }
                    exit(); 
                }
                else{
                    header("location: ../../Login.php?error=wronguserorpass");
                    exit();
                }
            }
            else{
                header("location: ../../Login.php?test");
                exit();
            }
        }
    }
}
else{
    header("location: ../../Login.php");
    exit();
}
