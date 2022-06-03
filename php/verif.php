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
    $genre = '';
    if(strlen($_POST['Homme']) == 5){
        $genre = 'Homme';
    }elseif(strlen($_POST['Femme']) == 5){
        $genre = 'Femme';
    }elseif(strlen($_POST['Autre']) == 5){
        $genre = 'Autre';
    }

    $data = [htmlspecialchars($_POST["login"]), 
            htmlspecialchars($_POST["pass"]), 
            htmlspecialchars($_POST["Nom"]), 
            htmlspecialchars($_POST["Prénom"]), 
            $genre, 
            htmlspecialchars($_POST["mail"]), 
            htmlspecialchars($_POST["tel"]), 
            htmlspecialchars($_POST["date"]), 
            htmlspecialchars($_POST["adr1"]), 
            htmlspecialchars($_POST["adr2"]), 
            htmlspecialchars($_POST["city"]), 
            htmlspecialchars($_POST["country"]), 
            htmlspecialchars($_POST["job"]),
            "0"
        ];
    
    $filename = "../data/users.csv";
    $f = fopen($filename, 'a+');
    if(8 <= strlen($_POST['pass']) && strlen($_POST['pass']) <= 20 && strlen($_POST['Homme'])+strlen($_POST['Femme'])+strlen($_POST['Autre']) == 5 && strlen(htmlspecialchars($_POST['tel'])) == 10){
        fputcsv($f, $data);
    }
    echo "<script>document.location.href = 'http://localhost:8080/Projet-Info-Preing2-main/index.php'</script>";
?>