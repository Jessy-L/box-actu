<?php
session_start();

$titre = htmlspecialchars($_POST["titre"]);
$contenu = htmlspecialchars($_POST["contenu"]);
$user_idUser = null;

require('../bdd/bddconfig.php');

try {

    $objBdd = new PDO("mysql:host=$bddserver;dbname=$bddname;charset=utf8", $bddlogin, $bddpass);
    $objBdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $PDOinsert = $objBdd->prepare("INSERT INTO `article` (titre, contenu, user_idUser) VALUES (:titre, :contenu, :user_idUser )");
    $PDOinsert->bindParam(':titre', $titre, PDO::PARAM_STR);
    $PDOinsert->bindParam(':contenu', $contenu, PDO::PARAM_STR);
    $PDOinsert->bindParam(':user_idUser', $user_idUser, PDO::PARAM_STR);
    $PDOinsert->execute();



    header("Location: ../index.php");
} catch (Exception $prmE) {
    die('Erreur : ' . $prmE->getMessage());
}


// $serveur = $_SERVER['HTTP_HOST'];
// $chemin = rtrim(dirname(htmlspecialchars($_SERVER['PHP_SELF'])), '/\\');
// $page = 'index.php';
// header("Location: http://$serveur$chemin/$page");


header("Location: ../index.php");
