<!DOCTYPE html>
<?php session_start();?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/contact.css" />
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Pacifico" />
    <title>Inscription COUTURALIA</title>
</head>

<body>
    <form class="contact-formulaire" id="formulaire" action="http://localhost:8080/Projet-Info-Preing2-main/php/verif.php" method="POST">
        <a class="titre" href="http://localhost:8080/Projet-Info-Preing2-main/index.php">Retour à l'Accueil</a>
        <p>Bienvenue</p>
        <label for="login">Login</label>
        <input class="input-contenu" name="login" type="text" placeholder="login" required> <br>
        <label for="pass">Mot de passe (8 à 20 caractères)</label>
        <input class="input-contenu" name="pass" type="password" minlength="8" maxlength="20" placeholder="mot de passe"required> <br>
        <label>Nom</label>
        <input class="input-contenu" name="Nom" type="text" placeholder="Nom" required> <br>
        <label>Prénom</label>
        <input class="input-contenu" name="Prénom" type="text" placeholder="Prénom" required> <br>
        <fieldset>
            <legend>Genre</legend>
            <div>
              <input type="radio" name="Homme" name="Homme" value="Homme">
              <label for="Homme">Homme</label>
            </div>

            <div>
              <input class="input-contenu" type="radio" name="Femme" name="Femme" value="Femme">
              <label for="Femme">Femme</label>
            </div>

            <div>
              <input class="input-contenu" type="radio" name="Autre" name="Autre" value="Autre">
              <label for="Autre">Autre</label>
            </div>
        </fieldset>
        <label>Adresse mail</label>
        <input class="input-contenu" name="mail" type="email" placeholder="email" required> <br>
        <label>Téléphone (sans espace)</label>
        <input class="input-contenu" name="tel" type="tel" pattern="[0-9]{10}" placeholder="Ex. 06XXXXXXXX" required> <br>
        <label>Date de naissance</label>
        <input class="input-contenu" name="date" type="date" placeholder="date de naissance" required> <br>
        <fieldset>
            <legend>Adresse</legend>
            <div>
                <label>Ligne d'adresse 1</label>
                <input class="input-contenu" name="adr1" type="text" placeholder="Ligne d'adresse 1" required>
            </div>
            <div>
                <label>Ligne d'adresse 2</label>
                <input class="input-contenu" name="adr2" type="text" placeholder="Ligne d'adresse 2">
            </div>
            <div>
                <label>Ville</label>
                <input class="input-contenu" name="city" type="text" placeholder="Ville" required>
            </div>
            <div>
                <label>Pays</label>
                <input class="input-contenu" name="country" type="text" placeholder="Pays">
            </div>
        </fieldset>
        <label>Profession</label>
        <input class="input-contenu" name="job" type="text" placeholder="profession" required> <br>
        <input class="bouton" type="submit" value="connexion" ><br>
    </form>
</body>