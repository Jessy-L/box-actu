<main>
    <form method="POST" action="gestion_user/inscription.php">

        <h2>INSCRIPTION</h2>

        <div class="content-input">
            <label for="nom">Nom</label>
            <input type="text" name="nom" required>
        </div>

        <div class="content-input">
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" required>
        </div>

        <div class="content-input">
            <label for="pseudo">Pseudo</label>
            <input type="text" name="pseudo" required>
        </div>

        <div class="content-input">
            <label for="email">Email</label>
            <input type="text" name="email" required>
        </div>

        <div class="content-input">
            <label for="password">Mot de passe </label>
            <input type="password" name="password" required>
        </div>

        <div class="content-input">
            <label for="cpassword">Confimer le mot de passe</label>
            <input type="password" name="cpassword" required>
        </div>

        <div class="content-checkbox">
            <p> <input type="checkbox" name="condition" id="condition"> J'accepte les condition d'utilisation.</p>
        </div>

        <div class="content-submit">
            <input type="submit" value="VALIDER">
        </div>

    </form>
</main>