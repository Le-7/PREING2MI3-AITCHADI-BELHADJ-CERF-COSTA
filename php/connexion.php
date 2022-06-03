<!DOCTYPE html>
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
    $csv = array_map('str_getcsv', file('../data/users.csv'));
    $login = $_POST["login"];
    $pass = $_POST["pass"];
    $error = TRUE;
    foreach($csv as $line){
        if($line[0] == $login && $line[1] == $pass){
            $_SESSION['Connected'] = 1;
            $error = FALSE;
            header("Location:../index.php");
        }
    }
    if($error){
        header("Location:../index.php?cat=unknown");
    }
?>