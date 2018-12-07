<?php
include('conn.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Title </title>
    <link rel="stylesheet" href="css/registreren.css">
</head>

<body>
    <?php
    include('header.php');
    ?>
        <?php
        if(isset($_SESSION['id']))
{
header("location:hoofdpagina.php");
return;
}
if(isset($_POST["submit"])){
    $password = $_POST['password'];
    $pswd = $_POST['pswd'];
    $hash = password_hash($password, PASSWORD_DEFAULT);
    if ($password == $pswd) {
    $stmt = $conn->prepare("INSERT INTO user (voornaam, tussenvoegsel, achternaam, bedrijfsnaam, adresbedrijf, email, password, cnaam, cnummer)
    VALUES (:vn, :tv, :an, :bn, :ab, :email, :ww, :cnaam, :cnummer)");
    $stmt->bindParam(':vn', $_POST["voornaam"]);
    $stmt->bindParam(':tv', $_POST["tussenvoegsel"]);
    $stmt->bindParam(':an', $_POST["achternaam"]);
    $stmt->bindParam(':bn', $_POST["bedrijfsnaam"]);
    $stmt->bindParam(':ab', $_POST["adresbedrijf"]);
    $stmt->bindParam(':email', $_POST["email"]);
    $stmt->bindParam(':ww', $hash);
    $stmt->bindParam(':cnaam', $_POST["cnaam"]);
    $stmt->bindParam(':cnummer', $_POST["cnummer"]);

    $stmt->execute();
    echo "<script type= 'text/javascript'>alert('Je account is aangemaakt');</script>";
    header("location:index.php?action=login");
    return;
    } else {
    echo "<script type= 'text/javascript'>alert('wachtwoorden komen niet overeen');</script>";
    }
}

if(isset($_POST['login'])) {
    $pwd = $_POST['pwd'];
    $mail = $_POST['mail'];
    $stmt = $conn->prepare("SELECT * FROM user WHERE email = :mail LIMIT 1");
    $stmt->execute([ ':mail' => $mail ]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

if( ! $row)
{
echo "<script type= 'text/javascript'>alert('Verkeerde gegevens ingevuld');</script>";
}
else
    {
    $count = $stmt->rowCount();
                if($count > 0)
                {
                    if(password_verify($pwd, $row['password']))
                    {
                        $_SESSION['id'] = $row['id'];
                        header("location:hoofdpagina.php");
                        return;
                    }
                    else
                    {
                        echo "<script type= 'text/javascript'>alert('Verkeerde gegevens ingevuld');</script>";
                    }
                }
    }
}
        if(isset($_GET['action']) == 'login')
        {
        ?>

            <h1>Login</h1>
            <form method="post">
                <label>email:</label>
                <input type="text" name="mail" id="mail" required placeholder=""><br>
                <label>password:</label>
                <input type="password" name="pwd" id="pwd" required placeholder=""><br>
                <input type="submit" name="login" value="login"><br>
                <br><br><br><br>
                <br><br><br><br>
                <a href="index.php">Account aanmaken</a>
            </form>
            <?php    
        }
        else {
        ?>
            <h1>Account aanmaken</h1>
            * = required
            <form method="post">
                <label>voornaam:</label>
                <input type="text" name="voornaam" id="voornaam" required>*<br>
                <label>tussenvoegsel:</label>
                <input type="text" name="tussenvoegsel" id="tussenvoegsel"><br>
                <label>achternaam:</label>
                <input type="text" name="achternaam" id="achternaam" required>*<br>
                <label>bedrijfsnaam:</label>
                <input type="text" name="bedrijfsnaam" id="bedrijfsnaam" required>*<br>
                <label>adresbedrijf:</label>
                <input type="text" name="adresbedrijf" id="adresbedrijf" required>*<br>
                <label>email</label>
                <input type="email" name="email" id="email" required="required">*<br>
                <label>Wachtwoord: </label>
                <input type="password" name="password" required="required">*<br>
                <label>Wachtwoord herhalen: </label>
                <input type="password" name="pswd" required="required">*<br>
                <input type="hidden" name="cnaam" id="cnaam" value="0">
                <input type="hidden" name="cnummer" id="cnummer" value="0">
                <input type="submit" value="Account aanmaken " name="submit"><br>
                <br><br><br><br>
                <br><br><br><br>
                <a href="index.php?action=login">Login</a>
            </form>
            <?php
}
            ?>
</body>

</html>
