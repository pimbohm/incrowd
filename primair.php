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
                    <h2>Kies een primaire kleur</h2>
                    <select name="primair">
        <option></option>
        <option>oranje</option>
        <option>blauw</option>
        <option>rood</option>
        <option>geel</option>
    </select>
                    <?php echo ' of vul hier je kleurencode in. '?>
                    <input type="text" name="code" id="code">
                    <input type="submit" name="ok" value="kiezen">
                </form>
                <hr>
                <?php
    if(isset($_POST["ok"])) {
        $primair = $_POST['primair'];
        $code = $_POST['code'];
        if ($primair == 'oranje') {
            echo 'oranje';
        }
        elseif ($primair == 'blauw') {
            echo 'blauw';
        }
        elseif ($primair == 'rood') {
            echo 'rood';
        }
        if ($primair == 'geel') {
            echo 'geel';
        }
        else {
            echo $code;
        }
        $_SESSION['pk'] = $primair;
        $_SESSION['cd'] = $code;
    }
    ?>
            </div>
        </div>
</body>

</html>
