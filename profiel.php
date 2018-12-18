<?php
include('conn.php');
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
                <form method="post" action="p.php">
                    <label>Voornaam:</label>
                    <input type="text" name="voornaam" id="voornaam" value="<?php echo $voornaam; ?>"><br>
                    <label>Tussenvoegsel:</label>
                    <input type="text" name="tussenvoegsel" id="tussenvoegsel" value="<?php echo $tussenvoegsel; ?>"><br>
                    <label>Achternaam:</label>
                    <input type="text" name="achternaam" id="achternaam" value="<?php echo $achternaam; ?>"><br>
                    <label>Bedrijfsnaam:</label>
                    <input type="text" name="bedrijfsnaam" id="bedrijfsnaam" value="<?php echo $bedrijfsnaam; ?>"><br>
                    <label>Adresbedrijf:</label>
                    <input type="text" name="adresbedrijf" id="adresbedrijf" value="<?php echo $adresbedrijf; ?>"><br>
                    <label>Email:</label>
                    <input type="email" name="email" id="email" value="<?php echo $email; ?>"><br>
                    <label>Creditcardnaam:</label>
                    <input type="text" name="creditcardnaam" id="creditcardnaam" value="<?php echo $cnaam; ?>"><br>
                    <label>Creditcardnummer:</label>
                    <input type="number" name="creditcardnummer" id="creditcardnummer" value="<?php echo $cnummer; ?>"><br><br>
                    <input type="submit" name="wijzigen" id="wijzigen" value="wijzigen">
                </form>
                <hr>
                <form method="post">
                    <label>Wachtwoord:</label>
                    <input type="password" name="wacht" id="wacht"><br>
                    <label>Wachtwoord herhalen:</label>
                    <input type="password" name="woord" id="woord"><br>
                    <input type="submit" name="veranderen" value="wijzigen">
                </form>
                <?php
                if(isset($_POST['veranderen']))
                {
                    $wacht = $_POST['wacht'];
                    $ww = $hash = password_hash($wacht, PASSWORD_DEFAULT);;
                    $woord = $_POST['woord'];
                    if ($wacht == $woord)
                    {
                        $sql = "UPDATE user SET password=:ww WHERE id='$id'";
                        // Prepare statement
                        //$stmt = $conn->prepare($sql);

                        // execute the query
                        $stmt->execute([':ww' => $ww]);

                        // echo a message to say the UPDATE succeeded
                        echo "<script type= 'text/javascript'>alert('Gegevens geupdate');</script>";
                    } else {
                        echo "<script type= 'text/javascript'>alert('Wachtwoorden komen niet overeen');</script>";
                    }
                }
                ?>
            </div>
        </div>
</body>

</html>
