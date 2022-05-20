<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css" />
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Pacifico" />
    <title>COUTURALIA</title>
</head>
<body>

    <div class="contenu"> 
        <form  id="formulaire">
        <input id="fermé" type="button" value="X" onclick="document.getElementById('formulaire').style.display='none'">
            <p>Bienvenue</p>
            <input type="email" placeholder="email" required> <br>
            <input type="mdp" placeholder="mot de passe"required>
            <br>
            <input type="submit" value="connexion" ><br>
            <a href="#">Mot de passe oublié</a>
        </form>
    
        <header>
            <div class="nvo">
                <img src="/projet/img/logotest3.png" alt="logo" id="logo">
            </div>

            <div class="banniere">
                <h1>Couturalia</h1> 
                <div class="placement"><button class="button1">Panier</div>
                <div class="placement"><button class="button1" onclick="document.getElementById('formulaire').style.display='block'"> Connexion</div> 
               
                <div class="menuH">
                    <ul>
                        <li><a href="http://localhost:8080/projet/index.php">Accueil</a></li>
                        <li><a href="http://localhost:8080/projet/index.php?cat=c02">Tissus</a></li>
                        <li><a href="#">Matériel</a></li>
                        <li><a href="#">Machines</a></li>                        
                        <li><a href="http://localhost:8080/projet/contact.html">Contact</a></li>
                    </ul>
                </div>
            </div>
        </header>
    
        <div class="milieu">
              <!-- <nav>
                    <div class="menu">
                        <h1>Nos produits :</h1>
                        <ul>
                            <li><a href="#">Accueil</a></li>
                            <li><a href="#">Tissus</a></li>
                            <li><a href="#">Matériel</a></li>
                            <li><a href="#">Machines</a></li>
                            <li><a href="http://localhost:8080/projet/contact.html">Contact</a></li>
                        </ul>
                    </div>
                </nav> -->
                <main> 
                    <p>Chez Couturalia, qualité et professionnalisme à votre service.
                    Que vous soyiez débutants, amateurs ou professionnels, vous trouverez tout le matériel nécessaire
                    pour la réalisation de vos pièces. 
                    Soie, cotton, polyester, fils, aiguilles, machines, vous trouverez assurément votre bonheur !
                    </p>    
                    <img src="/projet/img/tissus.jpg" alt="illustration" id="illustration">
                </main>
        </div>
        
        <footer>
            <div class="infos" id="réseaux">
                <p style="font-size:22px">
                    <a class="reseauxlog" href="https://twitter.com" target="_blank">
                        <ion-icon name="logo-twitter"></ion-icon>
                    </a>
                    <a class="reseauxlog" href="https://instagram.com" target="_blank">
                        <ion-icon name="logo-instagram"></ion-icon>
                    </a>
                        <a class="reseauxlog" href="https://github.com" target="_blank">
                    <ion-icon name="logo-github"></ion-icon>
                    </a>
                </p>  
            </div>

            <div class="infos" id="contact2">
                <p style="font-size:22px">couturalia@society.com</p>  
            </div>  

            <div class="infos" id="mentions">
                <p style="font-size:22px">©Couturalia</p>
            </div>
           
            <div class="infos" id="contact1">
                <p style="font-size:22px">01.77.88.92.99</p>        
            </div>
           
            <div class="infos" id="plan">
                <ul>
                    <li><a href="http://localhost:8080/projet/index.php">Accueil</a></li>
                    <li><a href="http://localhost:8080/projet/index.php?cat=c02">Tissus</a></li>
                    <li><a href="#">Matériel</a></li>
                    <li><a href="#">Machines</a></li>                        
                    <li><a href="http://localhost:8080/projet/contact.html">Contact</a></li>
                </ul>
            </div>      
        </footer>

        <span class="bulle un"></span>
        <span class="bulle deux"></span>
        <span class="bulle trois"></span>
        <span class="bulle quatre"></span>
        <span class="bulle cinq"></span>
        

    </div>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <?php
        function getquery(){ $url = $_SERVER['REQUEST_URI'];
            return (parse_url($url, PHP_URL_QUERY)); }

        function affichage() {
        $num = explode('=',getquery());
        $csv = array_map('str_getcsv', file('./data/exemple.csv'));
        foreach($csv as $line){
            if($line[4] ==$num[1] ){
            echo "<script>main.innerHTML()='<h1>".$line[0]."</h1>'</script>"; }
        }
        }
        affichage();
    ?>
</body>
</html>