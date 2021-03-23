<?php 


$nom = htmlspecialchars($_POST["nom"]);
$prenom = htmlspecialchars($_POST["prenom"]);

$pseudo = htmlspecialchars($_POST["pseudo"]);

$email = htmlspecialchars($_POST["email"]);
$password_clair =  htmlspecialchars(strval($_POST["password"]));
$confirm_password = htmlspecialchars(strval($_POST["cpassword"]));

$type = "utilisateur";


if($password_clair == $confirm_password){

    $hash_password = password_hash($password_clair, PASSWORD_BCRYPT);

    //Connexion à la base et insertion du nouvel utilisateur

    require '../bdd/bddconfig.php';
    try {
        $objBdd = new PDO("mysql:host=$bddserver;dbname=$bddname;charset=utf8", $bddlogin, $bddpass);
        $objBdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $PDOinsertuserweb = $objBdd->prepare("INSERT INTO user (nom, prenom, pseudo, email, password, type) VALUES (:nom, :prenom, :pseudo, :email, :password, :type)");
            $PDOinsertuserweb->bindParam(':nom', $nom, PDO::PARAM_STR);
            $PDOinsertuserweb->bindParam(':prenom', $prenom, PDO::PARAM_STR);
            $PDOinsertuserweb->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
            $PDOinsertuserweb->bindParam(':email', $email, PDO::PARAM_STR);
            $PDOinsertuserweb->bindParam(':password', $hash_password, PDO::PARAM_STR);
            $PDOinsertuserweb->bindParam(':type', $type, PDO::PARAM_STR);

            $PDOinsertuserweb->execute();
            //récupérer la valeur de l'ID du nouveau bassin créé
            echo $lastId = $objBdd->lastInsertId();


    } catch (Exception $prmE) {
        die('Erreur : ' . $prmE->getMessage());
    }

}


// $serveur = $_SERVER['HTTP_HOST'];
// $chemin = rtrim(dirname(htmlspecialchars($_SERVER['PHP_SELF'])), '/\\');
// $page = 'index.php';
// header("Location: http://$serveur$chemin/$page");


header("Location: ../index.php");