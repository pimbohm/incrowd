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
                <form method="post">
                    <input type="text" name="na" id="na">
                    <input type="submit" name="ok" value="kiezen">
                </form>
                <?php
                if (isset($_POST['ok'])) {
                    $na = $_POST['na'];
                    $_SESSION['na'] = $na;
                }
                if (isset($_SESSION['na'])) 
                {
                    echo $_SESSION['na'];
                }
                ?>
            </div>
        </div>
</body>

</html>
