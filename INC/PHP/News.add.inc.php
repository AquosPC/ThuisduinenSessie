<?php
            require('db.php');
                $Date = mysqli_real_escape_string($con, $_POST['Date']);
                $Title = mysqli_real_escape_string($con, $_POST['Title']);
                $Summary = mysqli_real_escape_string($con, $_POST['Summary']);
                $Description = mysqli_real_escape_string($con, $_POST['Description']);

                $file = $_FILES['file'];

                $filename = $_FILES['file']['name'];
                $fileTmpname = $_FILES['file']['tmp_name'];
                $fileSize = $_FILES['file']['size'];
                $fileError = $_FILES['file']['error'];
                $fileType = $_FILES['file']['type'];

                $Title = $_POST['Title'];
                $date = $_POST['Date'];

                $fileExt = explode('.', $filename);
                $fileActualExt = strtolower(end($fileExt));

                $allowed = array('jpg', 'jpeg', 'png');

                if (in_array($fileActualExt, $allowed)) {
                if ($fileError === 0) {
                if ($fileSize < 10000000) {
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDestination = '../../Assets/Blogimage/'.$fileNameNew;
                move_uploaded_file($fileTmpname, $fileDestination);
                $query = "INSERT into `newsposts` (Date, Title, Summary, Description, Image) VALUES ('$Date', '$Title', '$Summary', '$Description', '$fileNameNew')";
                mysqli_query($con, $query);
                header("Location: ../../Index.php?post=Succesfull");
                }
                else {
                    header("Location: ../../Index.php?post=Failed");
                }}}
        ?>