<?php
include('conn.php')
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Title </title>
    <link rel="stylesheet" href="css/in.css">
</head>

<body>
    <?php
include('pim.php');    
include('side.php');
?>
        <div id="alles">
            <div class="mip">
                <form method="post" enctype="multipart/form-data">
                    <input type="file" name="file">
                    <input type="submit" name="submit" value="upload"><br>
                </form>
                <?php
                if(isset($_POST['submit'])) {
                    $file = $_FILES['file'];
                    //print_r($file);
                    $fileName = $_FILES['file']['name'];
                    $fileTmpName = $_FILES['file']['tmp_name'];
                    $fileSize = $_FILES['file']['size'];
                    $fileError = $_FILES['file']['error'];
                    $fileType = $_FILES['file']['type'];
    
                    $fileExt = explode('.', $fileName);
                    $fileActualExt = strtolower(end($fileExt));
    
                    $allowed = array('jpeg', 'jpg', 'png');
                    
                    if(in_array($fileActualExt, $allowed)) {
                        if($fileError === 0) {
                            if($fileSize < 1000000) {
                                $fileNameNew = uniqid('', true).".".$fileActualExt;
                                $fileDestination = 'upload/'.$fileNameNew;
                                move_uploaded_file($fileTmpName, $fileDestination);
                                echo 'Your file is succesfully uploaded';
                                $_SESSION['foto'] = '<img src="'.$fileDestination.'" width="200" height="200">';
                            } else {
                                echo 'Your file is too big';
                            }
                        } else {
                            echo 'There was an error uploading your file';
                        }
                    } else {
                        echo 'You cannnot upload files of this type';
                    }
                }   
                if (isset($_SESSION['foto'])) 
                {
                    echo '<br>'.$_SESSION['foto'];
                }
                ?>
            </div>
        </div>
</body>

</html>
