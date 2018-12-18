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
                <h2>Kies een lettertype</h2>
                <form method="post" action="">
                    <select name="lettertype">
        <option></option>
        <option>Light</option>
        <option>Regular</option>
        <option>Bold</option>
    </select>
                    <input type="submit" name="ok" value="kiezen">
                </form>
                <hr>
                <?php
    if(isset($_POST["ok"])) {
        echo($_POST["lettertype"]);
        $_SESSION['lt'] = $_POST["lettertype"];
        $lt = $_SESSION['lt'];
    }
    ?>
            </div>
        </div>

</body>

</html>
