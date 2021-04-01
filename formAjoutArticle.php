<?php 


if (!isset($_SESSION['logged_in']["type"])) {
    $_SESSION["type"] = "utilisateur";
} else {
    $_SESSION["type"] = $_SESSION['logged_in']["type"];
}


if($_SESSION["type"] == "utilisateur" ){

    header("Location: index.php");
 } else {

?>
    <main>
        <div>
            <h2>Ajouter un article</h2>
        </div>
        <form method="POST" action="gestion_article/newArticle.php">
            <div>
                <label for="titre">Titre de l'article</label>
                <input type="text" name="titre">
            </div>
            <div>
                <label for="contenu">Contenu de l'article</label>
                <textarea name="contenu" id="" cols="30" rows="10"></textarea>
            </div>

            <div>
                <input type="submit" value="envoyer">
            </div>

        </form>

    </main>
<?php
}
?>