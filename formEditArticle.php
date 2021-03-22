<?php
$idArticle = 4;
require("bdd/bddconfig.php");

try {
    $objBdd = new PDO("mysql:host=$bddserver;dbname=$bddname;charset=utf8", $bddlogin, $bddpass);
    $objBdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $recup = $objBdd->query("SELECT * FROM article WHERE idarticle = $idArticle");
    $valeur = $recup->fetch();
} catch (Exception $prmE) {
    die("Erreur : " . $prmE->getMessage());
}
?>

<main>
    <form method="POST" action="gestion_article/editArticle.php">
        <div>
            <label for="titre">Titre de l'article</label>
            <input type="text" name="titre" value="<?php echo $valeur["titre"] ?>">
        </div>
        <div>
            <label for="contenu">Contenu de l'article</label>
            <textarea name="contenu" id="" cols="30" rows="10"><?php echo $valeur["contenu"] ?></textarea>
        </div>

        <div>
            <input type="submit" value="envoyer">
        </div>

    </form>
    <a href="gestion_article/deleteArticle.php?idArticle=<?php echo $idArticle ?>">Supprimer cet article</a>
</main>