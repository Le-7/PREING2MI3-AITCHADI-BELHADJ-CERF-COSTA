<?php
    if(isset($_POST['nom'])){

        $demande = array() ;
        $demande['nom'] = $_POST['nom'] ;
        $demande['email'] = $_POST['email'] ;
        $demande['tel'] = $_POST['tel'] ;
        $demande['message'] = $_POST['message'] ;
        $demande['date'] = date("d-m-Y  H:i") ;
        $demande['id'] = date("dmYHis") ; #pour unique 

        if(!preg_match("/^[a-zA-Z-']*$/",$demande['nom'])){
            echo"<script language='Javascript'>console.log('caca');</script>";
            exit;
        }
        $json = file_get_contents('contacter.json') ; #var qui contient notre fichier json
        #sous forme de tableau
        $json = json_decode($json, true) ; #conversion en php
        $json[] = $demande ;
        $json = json_encode($json) ; #reconversion en json
        file_put_contents('contacter.json', $json) ; #on remet le premier msg dans le fichier json
        header("location: ../index.php") ; #renvoyer sur index.php apres envoi


    }

    else if(isset($_GET['del'])){
        $demande = file_get_contents('contacter.json');
        $demande = json_decode($demande, true);

        $verif = array() ;

        for($i=0; $i<count($demande); $i++){
            if($demande[$i]['id'] != $_GET['del']){ #si diff alors on le fait entrer dans le nvo tableau
                $verif[] = $demande[$i] ;
            } 
        
        }
        $verif = json_encode($verif);
        file_put_contents('contacter.json', $verif) ;
        echo "<script language='Javascript'>document.location='http://localhost:8080/Projet-Info-Preing2-main/php/contacter.php'</script>";
    }

    