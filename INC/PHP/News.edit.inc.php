<?php
            require('db.php');
                $id = mysqli_escape_string($con, $_POST['id']);
                
                $Date = mysqli_real_escape_string($con, $_POST['Date']);
                $Title = mysqli_real_escape_string($con, $_POST['Title']);
                $Summary = mysqli_real_escape_string($con, $_POST['Summary']);
                $Description = mysqli_real_escape_string($con, $_POST['Description']);

                

                if ($file == NULL) {
                    $sql = "UPDATE newsposts SET Date='".$Date."',Title='".$Title."',Summary='".$Summary."',Description='".$Description."' WHERE id=".$_POST['id'];
                    $result = $con->query($sql);
                    header("Location: ../../Index.php?TextOnly=Changed");
                } else {
                    $file = $_FILES['file'];
                    $filename = $_FILES['file']['name'];
                    $fileTmpname = $_FILES['file']['tmp_name'];
                    $fileSize = $_FILES['file']['size'];
                    $fileError = $_FILES['file']['error'];
                    $fileType = $_FILES['file']['type'];

                    $fileExt = explode('.', $filename);
                    $fileActualExt = strtolower(end($fileExt));

                    $allowed = array('jpg', 'jpeg', 'png');

                    if (in_array($fileActualExt, $allowed)) {
                    if ($fileError === 0) {
                    if ($fileSize < 10000000) {
                    $fileNameNew = uniqid('', true).".".$fileActualExt;
                    $fileDestination = '../../Assets/Blogimage/'.$fileNameNew;
                    move_uploaded_file($fileTmpname, $fileDestination);
                    $sql = "UPDATE newspost SET Date='".$Date."',Title='".$Title."',Summary='".$Summary."',Description='".$Description."',Image='".$fileNameNew."' WHERE id=".$_POST['id'];
                    $result = $con->query($sql);
                    header("Location: ../../Index.php?post=Succesfull");
                    }}}
                }
        ?>