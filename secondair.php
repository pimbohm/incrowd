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
                    <h2>Kies een secondaire kleur</h2>
                    <select name="secondair">
        <option></option>
        <option>oranje</option>
        <option>blauw</option>
        <option>rood</option>
        <option>geel</option>
    </select>
                    <?php echo ' of vul hier je kleurencode in. '?>
                    <input type="text" name="code2" id="code2">
                    <input type="submit" name="ok" value="kiezen">
                </form>
                <hr>
                <?php
    if(isset($_POST["ok"])) {
        $secondair = $_POST['secondair'];
        $code2 = $_POST['code2'];
        if ($secondair == 'oranje') {
            echo 'oranje';
        }
        elseif ($secondair == 'blauw') {
            echo 'blauw';
        }
        elseif ($secondair == 'rood') {
            echo 'rood';
        }
        if ($secondair == 'geel') {
            echo 'geel';
        }
        else {
            echo $code2;
        }
        $_SESSION['sk'] = $secondair;
        $_SESSION['cd2'] = $code2;
    }
    ?>
            </div>
        </div>
</body>

</html>
