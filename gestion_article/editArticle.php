<?php

$titre = htmlspecialchars(strval($_POST["titre"]));
$contenu = htmlspecialchars(strval($_POST["contenu"]));
$idArticle = 3;

echo $idArticle;


require("../bdd/bddconfig.php");

try {
    $objBdd = new PDO("mysql:host=$bddserver;dbname=$bddname;charset=utf8", $bddlogin, $bddpass);
    $objBdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $recup = $objBdd->query("UPDATE `article` SET `titre` = '$titre' ,`contenu` = '$contenu' WHERE article.idArticle = $idArticle");
} catch (Exception $prmE) {
    die("Erreur : " . $prmE->getMessage());
}


// $serveur = $_SERVER['HTTP_HOST'];
// $chemin = rtrim(dirname(htmlspecialchars($_SERVER['PHP_SELF'])), '/\\');
// $page = 'index.php';
// header("Location: http://$serveur$chemin/$page");


header("Location: ../index.php");
