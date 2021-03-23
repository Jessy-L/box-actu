<?php 

if (!isset($_SESSION['logged_in']["type"])) {
    $_SESSION["type"] = "utilisateur";
} else {
    $_SESSION["type"] = $_SESSION['logged_in']["type"];
}

?>

<nav id="block-nav">
        <ul>
            <a href="index.php?page=accueil" >Accueil</a>
            <a href="index.php?page=toutLesArticles" >Les articles </a>
            <a href="index.php?page=toutLesJeux" >Les jeux</a>
            <a href="index.php?page=toutLesTopic">Le forum</a>

            <?php if( $_SESSION["connexion"]  == 0 ){ ?>

            <!-- Partie connexion inscription  -->
                <a href="index.php?page=formConnexion">Connexion</a>
                <a href="index.php?page=formInscription">S'inscrire</a>
            <?php }else{ ?>
            <!-- Partie connexion inscription  -->
                <a href="index.php?page=pageDeconnexion">Se déconnecter</a>
                <a href="index.php?page=formEditAccount">Modifier votre compte</a>
               
            <?php } ?>

          

            <?php

                if($_SESSION["type"] <> "utilisateur" && $_SESSION["type"] <> "redac"){

            ?>

                    <a href="index.php?page=formAjoutArticle">Ajouter un Article</a>
                    <a href="index.php?page=formEditArticle">Modifier un articles</a>

                    <a href="index.php?page=formAjoutJeu">Ajouter un jeu</a>
                    <a href="index.php?page=formEditJeu">Modifier un jeu</a>

                    <a href="index.php?page=viewAccountAdmin">Modifier un compte</a>

            <?php 
                } else{

                    
                    if($_SESSION["type"] <> "utilisateur" ){
            ?>    
                        <a href="index.php?page=formAjoutArticle">Ajouter un Article</a>
                        <a href="index.php?page=formEditArticle">Modifier vos articles</a>
                       
                        <a href="index.php?page=formAjoutJeu">Ajouter un jeu</a>
                        <a href="index.php?page=formEditJeu">Modifier vos jeux</a>
            <?php 
                    }  
                }
            ?>




        </ul>
</nav>