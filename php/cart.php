<!DOCTYPE html>
<!-- AIT CHADI Anissa, BELHADJ Dillan, CERF Fabien COSTA Mathéo
PréING2 MI Groupe 3-->
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="">
    <title>COUTURALIA</title>
</head>

<body>
    <!--Bouton de retour au magasin-->
    <a href="http://localhost:8080/PREING2MI3-AITCHADI-BELHADJ-CERF-COSTA-main/index.php">Revenir au magasin</a>

    <?php session_start(); ?>
    <?php
        //Fonction pour récupérer l'url de la page
        function getquery(){ $url = $_SERVER['REQUEST_URI'];
            return (parse_url($url, PHP_URL_QUERY)); 
        }
        //Fonction vidant le panier, si l'url contient 'cat=reset'
        function empty_cart() {
            $num = explode('=',getquery());
            if($num[1] == 'reset'){
                //Ouverture du fichier des stocks
                $file = "../data/test.csv";
                $f = fopen($file, 'r');
                $f2 = fopen("../data/test2.csv", 'w+');
                while(($data = fgetcsv($f, PHP_EOL)) !== FALSE){
                    for($j=0 ; $j < count($_SESSION['name']) ; $j++){
                        for($i=0 ; $i < count($data) ; $i++ ){
                            if($data[$i] == $_SESSION['name'][$j]){
                                //Modification des données ciblées
                                $data[$i+3] += $_SESSION['nbr'][$j];
                            }
                        }
                    }
                    //Copie des données modifiées dans un nouveau fichier temporaire
                    fputcsv($f2, $data);
                }
                fclose($f);
                fclose($f2);
                //Copie du nouveau fichier dans les stocks
                copy("../data/test2.csv", $file);
                //Suppression du fichier temporaire
                unlink("../data/test2.csv");
                $_SESSION['name'] = [];
                $_SESSION['price'] = [];
                $_SESSION['nbr'] = [];
                $total = 0;
                $ttc = 0;
                //Reinitialisation de l'url (sans cat=reset)
                header("Location:cart.php");
            }
        }
//Vérification que l'utilisateur est connecté (par sécurité)
        if($_SESSION['Connected'] == 1){
            //Si au moins 1 article a été ajouté
            if($_POST['value'] != 0){
                //Ouverture fichier des stocks
                $file = "../data/test.csv";
                $f = fopen($file, 'r');
                $f2 = fopen("../data/test2.csv", 'w+');
                //Ajout des informations produit aux variables session correspondantes
                $_SESSION['price'][] = $_POST['price'];
                $_SESSION['name'][] = $_POST['name'];
                $_SESSION['nbr'][] = $_POST['value'];
                //Modification des stocks
                while(($data = fgetcsv($f, PHP_EOL)) !== FALSE){
                    for($i=0 ; $i < count($data) ; $i++ ){
                        if($data[$i] == $_POST['name']){
                            $data[$i+3] -= $_POST['value'];
                        }
                    }
                    fputcsv($f2, $data);
                }
                fclose($f);
                fclose($f2);
                copy("../data/test2.csv", $file);
                unlink("../data/test2.csv");
            }
            $total = 0;
            $ttc = 0;
            empty_cart();
            //Affichage du panier
            for($i=0 ; $i < count($_SESSION['name']) ; $i++ ){
                echo "<p>Produit : {$_SESSION['name'][$i]}</p>";
                echo "<p>Prix (unitaire) : {$_SESSION['price'][$i]}</p>";
                echo "<p>Quantité : {$_SESSION['nbr'][$i]}</p>";
                $total += $_SESSION['nbr'][$i]*$_SESSION['price'][$i];
            }
            $ttc = $total + 0.2*$total;
            echo "<p>Total HT : {$total} €</p>";
            echo "<p>Total TTC : {$ttc} €</p>";
            //Bouton de confirmation de la commande + envoi du mail de confirmation
            echo "<script language='Javascript'>function mailto(){document.location='mailto:couturalia@society.com?subject=Facture numéro :".rand(0,1000000)."&body=Votre commande de".$ttc." euros nous a bien été transmise, merci d'avoir acheter chez Couturalia !%0A'}</script>";
            echo "<button onclick='mailto()'>Passer Commande";
        }
    ?>
    <!--Bouton pour vider le panier-->
    <button class='button1' onclick="location.href='http://localhost:8080/PREING2MI3-AITCHADI-BELHADJ-CERF-COSTA-main/php/cart.php?cat=reset'">Vider le panier
</body>

</html>
