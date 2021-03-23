<?php


session_start();

require('../bdd/bddconfig.php');

//Tester si les variables POST existent
$paramOK = false;
if (isset($_POST["pseudo"])) {
    $pseudo = strtolower(htmlspecialchars($_POST["pseudo"]));
    if (isset($_POST["password"])) {
        $password = htmlspecialchars($_POST["password"]);
        $paramOK = true;
    }
}

//si pseudo et password sont bien reçus
if ($paramOK == true) {

    $objBdd = new PDO("mysql:host=$bddserver;dbname=$bddname;charset=utf8", $bddlogin, $bddpass);
    $objBdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //vérifier si le pseudo passord est correct (base de données) : voir après
    $PDOlistpseudos = $objBdd->prepare("SELECT * FROM user WHERE pseudo = :pseudo ");
    $PDOlistpseudos->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
    $PDOlistpseudos->execute();
    //S'il y a un résultat à la requête 
    $row_userweb = $PDOlistpseudos->fetch();
    if ($row_userweb != false) {
        //il existe un pseudo identique dans la base

        // vérif du password :
        if (password_verify($password, $row_userweb['password'])) {
            //authentification réussie
            //création de la variable de session : 


            $session_data = array(
                'iduser' => $row_userweb['iduser'],
                'nom' => $row_userweb['nom'],
                'prenom' => $row_userweb['prenom'],
                'pseudo' => $row_userweb['pseudo'],
                'email' => $row_userweb['email'],
                'type' => $row_userweb['type']
            );
            //régénérer le session id

            

            session_regenerate_id();
            //enregistrer les données dans une variable de session
            $_SESSION['logged_in'] = $session_data;
            $PDOlistpseudos->closeCursor();
        } else {
            //Mauvais password
            session_destroy();
            die('Authentification incorrecte');
        }
    } else {
        //Mauvais pseudo
        session_destroy();
        die('Authentification incorrecte');
    }
} else {
    die('Vous devez fournir un pseudo et un mot de passe');
}

// $serveur = $_SERVER['HTTP_HOST'];
// $chemin = rtrim(dirname(htmlspecialchars($_SERVER['PHP_SELF'])), '/\\');
// $page = 'index.php';
// header("Location: http://$serveur$chemin/$page");


header("Location: ../index.php");