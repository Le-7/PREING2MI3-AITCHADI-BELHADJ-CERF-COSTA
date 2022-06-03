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
                $_SESSION['name'] = [];
                $_SESSION['price'] = [];
                $_SESSION['nbr'] = [];
                $total = 0;
                $ttc = 0;
                header("Location:cart.php");
            }
        }

        if($_SESSION['Connected'] == 1){
            $_SESSION['price'][] = $_POST['price'];
            $_SESSION['name'][] = $_POST['name'];
            $_SESSION['nbr'][] = $_POST['value'];
            $total = 0;
            $ttc = 0;
            empty_cart();
            $file = "../data/test.csv";
            $f = fopen($file, 'r');
            $data = fgetcsv($f, ",");
            for($j=1 ; $j < count($_SESSION['name']) ; $j++ ){
                for($i=0 ; $i < count($data) ; $i++ ){
                    if($data[$i] == $_SESSION['name'][$j]){
                        $data[$i+2] -= $_SESSION['nbr'][$j];
                    }
                }
            }
            fputcsv($f);
            for($i=1 ; $i < count($_SESSION['name']) ; $i++ ){
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