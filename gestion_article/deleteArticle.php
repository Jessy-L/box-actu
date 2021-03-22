<?php

$idArticle = htmlspecialchars($_GET["idArticle"]);

require("../bdd/bddconfig.php");

try {
    $objBdd = new PDO("mysql:host=$bddserver;dbname=$bddname;charset=utf8", $bddlogin, $bddpass);
    $objBdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $recup = $objBdd->query("DELETE FROM `article` WHERE `article`.`idArticle` = $idArticle");
} catch (Exception $prmE) {
    die("Erreur : " . $prmE->getMessage());
}


// $serveur = $_SERVER['HTTP_HOST'];
// $chemin = rtrim(dirname(htmlspecialchars($_SERVER['PHP_SELF'])), '/\\');
// $page = 'index.php';
// header("Location: http://$serveur$chemin/$page");


header("Location: ../index.php");
