<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Title </title>
</head>

<body>
    <form method="post" enctype="multipart/form-data">
        <input name="upload[]" type="file" multiple="multiple">
        <input type="submit" name="submit" value="check">
    </form>
</body>

</html>


<?php
if(isset($_POST['submit'])) {
//$files = array_filter($_FILES['upload']['name']); //something like that to be used before processing files.

// Count # of uploaded files in array
$total = count($_FILES['upload']['name']);

// Loop through each file
for( $i=0 ; $i < $total ; $i++ ) {

  //Get the temp file path
  $tmpFilePath = $_FILES['upload']['tmp_name'][$i];
    $fileName = $_FILES['upload']['name'][$i];
    $fileTmpName = $_FILES['upload']['tmp_name'][$i];
    $fileSize = $_FILES['upload']['size'][$i];
    $fileError = $_FILES['upload']['error'][$i];
    $fileType = $_FILES['upload']['type'][$i];
    
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    
    $allowed = array('jpeg', 'jpg', 'png');
    
                    if(in_array($fileActualExt, $allowed)) {
                        if($fileError === 0) {
                            if($fileSize < 1000000) {
                                $fileNameNew = uniqid('', true).".".$fileActualExt;
                                $fileDestination = 'upload/'.$fileNameNew;
                                move_uploaded_file($fileTmpName, $fileDestination);
                                $_SESSION['images'] = '<img src="'.$fileDestination.'" width="200" height="200">';
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
}
?>
