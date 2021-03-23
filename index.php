<?php
session_start();

if (!isset($_SESSION['logged_in']["pseudo"])) {
    $_SESSION["connexion"] = 0;
} else {
    $_SESSION["connexion"] = $_SESSION['logged_in']["iduser"];
}



?>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php  
        require_once('link.php')
    ?>
    <title>BOX ACTU</title>
</head>

<body>

    <?php
        require_once('header.php')
    ?>

    
    <?php require_once('nav.php') ?>

    <div class="corps_page">

        <?php
        if (!isset($_GET['page']) || !file_exists($_GET['page'] . '.php')) {
            require_once('accueil.php');
        } else {
            require_once($_GET['page'] . ".php");
        }
        ?>
    </div>

    <?php
        require_once('footer.php')
    ?>


    <?php
        require_once('script_js.php')
    ?>
</body>

</html>