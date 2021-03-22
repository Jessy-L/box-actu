<?php
session_start();

if(!isset($_SESSION['logged_in']["login"])){
    $_SESSION["connexion"] = 0;
}else{
    $_SESSION["connexion"] = $_SESSION['logged_in']["id"];
}

?>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/accueil.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/connexion.css">
    <title>SITE FAQ</title>
</head>

<body>

    <?php
    require_once('header.php')
    ?>
    <div class="corps_page">
        <?php
        require_once('nav.php')
        ?>

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
</body>

</html>