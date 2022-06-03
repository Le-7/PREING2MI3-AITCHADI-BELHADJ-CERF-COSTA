<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="">
    <title>COUTURALIA</title>
</head>

<body>

    <a href="http://localhost:8080/Projet-Info-Preing2-main/index.php">Revenir au magasin</a>

    <?php session_start(); ?>
    <?php
        
        function getquery(){ $url = $_SERVER['REQUEST_URI'];
            return (parse_url($url, PHP_URL_QUERY)); 
        }

        function empty_cart() {
            $num = explode('=',getquery());
            if($num[1] == 'reset'){
                $file = "../data/test.csv";
                $f = fopen($file, 'r');
                $f2 = fopen("../data/test2.csv", 'w+');
                while(($data = fgetcsv($f, PHP_EOL)) !== FALSE){
                    for($j=0 ; $j < count($_SESSION['name']) ; $j++){
                        for($i=0 ; $i < count($data) ; $i++ ){
                            if($data[$i] == $_SESSION['name'][$j]){
                                $data[$i+3] += $_SESSION['nbr'][$j];
                            }
                        }
                    }
                    fputcsv($f2, $data);
                }
                fclose($f);
                fclose($f2);
                copy("../data/test2.csv", $file);
                unlink("../data/test2.csv");
                $_SESSION['name'] = [];
                $_SESSION['price'] = [];
                $_SESSION['nbr'] = [];
                $total = 0;
                $ttc = 0;
                header("Location:cart.php");
            }
        }

        if($_SESSION['Connected'] == 1){
            if($_POST['value'] != 0){
                $file = "../data/test.csv";
                $f = fopen($file, 'r');
                $f2 = fopen("../data/test2.csv", 'w+');
                $_SESSION['price'][] = $_POST['price'];
                $_SESSION['name'][] = $_POST['name'];
                $_SESSION['nbr'][] = $_POST['value'];
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
            for($i=0 ; $i < count($_SESSION['name']) ; $i++ ){
                echo "<p>Produit : {$_SESSION['name'][$i]}</p>";
                echo "<p>Prix (unitaire) : {$_SESSION['price'][$i]}</p>";
                echo "<p>Quantité : {$_SESSION['nbr'][$i]}</p>";
                $total += $_SESSION['nbr'][$i]*$_SESSION['price'][$i];
            }
            $ttc = $total + 0.2*$total;
            echo "<p>Total HT : {$total} €</p>";
            echo "<p>Total TTC : {$ttc} €</p>";
            echo "<script language='Javascript'>function mailto(){document.location='mailto:couturalia@society.com?subject=Facture &body=Commande%0A'}</script>";
            echo "<button onclick='mailto()'>Passer Commande";
        }
    ?>
    <button class='button1' onclick="location.href='http://localhost:8080/Projet-Info-Preing2-main/php/cart.php?cat=reset'">Vider le panier
</body>

</html>