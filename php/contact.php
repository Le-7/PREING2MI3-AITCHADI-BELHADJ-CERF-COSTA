<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nous contacter</title>
    <link rel="stylesheet" href="../css/contact.css" />
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Pacifico"/>
</head>
<body>

    <div class="contenu">
        <span class="cercle1"></span>
        <div class="formulaire">
          <div class="contact-info">
            <h3 class="titre">L'équipe Couturalia à votre écoute!</h3>
            <p class="texte">
              Pour toute remarque, complément d'information, problème ou réclamation,
              nous vous invitons à remplir notre formulaire de contact.
              Vous pouvez également faire un tour sur nos réseaux et nous envoyer un message privé dessus !
            </p>
  
            <div class="info">
              <div class="information">
                <img src="../img/map.png" class="icone"/>
                <p>42 boulevard du port, 95100 CERGY</p>
              </div>
              <div class="information">
                <img src="../img/email.png" class="icone"/>
                <p>couturalia-contact@society.com</p>
              </div>
              <div class="information">
                <img src="../img/tel.png" class="icone"/>
                <p> 01.77.88.92.99</p>
              </div>
            </div>
  
            <div class="social-media">
              <p>Nous suivre :</p>
              <div class="logos-reseaux">
                <a href="https://twitter.com" target="_blank">
                  <ion-icon name="logo-twitter"></ion-icon>
                </a>
                <a href="https://instagram.com" target="_blank">
                  <ion-icon name="logo-instagram"></ion-icon>
                </a>
                <a href="https://github.com" target="_blank">
                  <ion-icon name="logo-github"></ion-icon>
                </a>
                <a href="https://pinterest.com" target="_blank">
                  <ion-icon name="logo-pinterest"></ion-icon>
                </a>
              </div>
            </div>
          </div>
  
          <div class="contact-formulaire">
            <span class="bulle un"></span>
            <span class="bulle deux"></span>
  
            <form action="traitement.php" method="post">
              <h3 class="titre">Nous contacter</h3>
              <div class="input-contenu">
                <input type="text" name="nom" class="input" placeholder="Nom prénom"/> 
                
              </div>
              <div class="input-contenu">
                <input type="email" name="email" class="input" placeholder="Email" />
                
              </div>
              <div class="input-contenu">
                <input type="tel" name="tel" class="input" placeholder="Téléphone" />
                
              </div>
              <div class="input-contenu textarea">
                <textarea name="message" class="input" placeholder="Votre message"></textarea>
               
              </div>
              <input type="submit" name="envoyer" value="Envoyer" class="bouton" />
            </form>
          </div>
        </div>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
    <?php
        function getquery(){ $url = $_SERVER['REQUEST_URI'];
            return (parse_url($url, PHP_URL_QUERY)); }

        function affichageerror() {
        $err = explode('=',getquery());
        if($err[1]!=NULL)   
        {
         echo "<script language='Javascript'>console.log('$err');</script>";
          echo"<script language='Javascript'>document.querySelectorAll('input[type=$err]').style.background='red';</script>";
        }
    }
        affichageerror();
    ?>
</html>