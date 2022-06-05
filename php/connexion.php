<!DOCTYPE html>
<!-- AIT CHADI Anissa, BELHADJ Dillan, CERF Fabien COSTA Mathéo
PréING2 MI Groupe 3-->
<?php session_start();?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Projet-Info-PreIng2-main/css/index.css" />
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Pacifico" />
    <title>Verif</title>
</head>

<?php
    $csv = array_map('str_getcsv', file('../data/users.csv'));          //on recupere les données du csv sous forme de flux utilisable (array)
    $login = $_POST["login"];
    $pass = $_POST["pass"];
    $error = TRUE;
    foreach($csv as $line){                             //on regarde si les identifiants et mot de passe sont dans notre csv
        if($line[0] == $login && $line[1] == $pass){
            $_SESSION['Connected'] = 1;
            $error = FALSE;
            if($line[13] == 1){                     //si compte admin on accorde plus de droit
                $_SESSION['Connected'] = 2;
            }
            header("Location:../index.php");
        }
    }
    if($error){                             //si identifiants inconnus (ou tout autre erreur) on redirige vers le menu avec une erreur
        header("Location:../index.php?cat=unknown");
    }
?>
