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
                    <a href="request.php"><img src="img/volgende.jpg"></a>
                </div>
                <div id="vorige">
                    <a href="pk.php"><img src="img/vorige.jpg"></a>
                </div>
                <form method="post">
                    <h2>Kies een secundaire kleur</h2>
                    <select name="secondair">
                    <option></option>
                    <option>oranje</option>
                    <option>blauw</option>
                    <option>rood</option>
                    <option>geel</option>
                    </select>
                    <?php 
                    echo 'of vul hier een kleurencode in';
                    ?>
                    <input type="text" name="code2" id="code2" placeholder="#ffffff" maxlength="7">
                    <input type="submit" name="ok" value="selecteren">
                </form>
                <hr>

                <?php
                    if(isset($_POST["ok"])) 
                    {                    
                        $secondair = $_POST['secondair'];
                        $code2 = $_POST['code2'];
                    
                        if ($secondair != '') {
                        $_SESSION['sd'] = $secondair;
                        $sd = $_SESSION['sd'];
                        }
                        else {
                        $_SESSION['sd'] = $code2;
                        $sd = $_SESSION['sd'];
                        }
                    }   
                
                    if (isset($_SESSION['sd'])) 
                    {
                        echo $_SESSION['sd'];
                    }
                    ?>

                    <br>
                    <a href="skreset.php" onclick="return confirm('Weet u zeker dat u de secundaire kleur wil verwijderen?');" style="color: #00ced1">Verwijder de gekozen secundaire kleur.</a>
            </div>
        </div>
    </div>
</body>

</html>
