<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> hoofdpagina </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/stijling.css" type="text/css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div id="header">
                <?php
            include('boven.php')
            ?>
            </div>
        </div>
        <div class="row">
            <div id="inhoud">
                <div id="volgende">
                    <a href="sk.php"><img src="img/volgende.jpg"></a>
                </div>
                <div id="vorige">
                    <a href="font.php"><img src="img/vorige.jpg"></a>
                </div>
                <form method="post">
                    <h2>Kies een primaire kleur</h2>
                    <select name="primair">
                    <option></option>
                    <option>oranje</option>
                    <option>blauw</option>
                    <option>rood</option>
                    <option>geel</option>
                    </select>

                    <?php 
                echo ' of vul hier je kleurencode in '
                ?>
                    <input type="text" name="code" id="code" placeholder="#ffffff" maxlength="7">
                    <input type="submit" name="ok" value="selecteren">
                </form>
                <hr>
                <?php
                if(isset($_POST["ok"])) 
                {
                    $primair = $_POST['primair'];
                    $code = $_POST['code'];
                    
                    if ($primair != '') 
                    {
                    $_SESSION['pk'] = $primair;
                    $pk = $_SESSION['pk'];
                    }
                    
                    else 
                    {
                    $_SESSION['pk'] = $code;
                    $cd = $_SESSION['pk'];
                    }
                
                }
                if (isset($_SESSION['pk'])) 
                {
                    echo $_SESSION['pk'];
                }
                ?>
                    <br>
                    <a href="pkreset.php" onclick="return confirm('Weet u zeker dat u de primaire kleur wil verwijderen?');" style="color: #00ced1">Verwijder de gekozen primaire kleur.</a>
            </div>
        </div>
    </div>
</body>

</html>
