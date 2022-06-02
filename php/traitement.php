<?php
    if(isset($_POST['nom'])){

        $demande = array() ;
        $demande['nom'] = $_POST['nom'] ;
        $demande['email'] = $_POST['email'] ;
        $demande['objet'] = $_POST['objet'] ;
        $demande['tel'] = $_POST['tel'] ;
        $demande['message'] = $_POST['message'] ;
        $demande['date'] = date("d-m-Y  H:i") ;
        $demande['id'] = date("dmYHis") ; #pour unique 

        //on reteste coté serveur
        if(!preg_match("/^[a-zA-Z-' ]*$/",$demande['nom'])){
            echo "<script language='Javascript'>window.alert('Erreur dans le nom (format non compatible)');</script>";
            echo "<script language='Javascript'>document.location='http://localhost:8080/Projet-Info-Preing2-main/php/contact.php?cat=nom'</script>";
            exit;
        }
        if(!filter_var($demande['email'], FILTER_VALIDATE_EMAIL)){
            echo "<script language='Javascript'>window.alert('Erreur dans l email (format non compatible ex: lesept@gmail.com)');</script>";
            echo "<script language='Javascript'>document.location='http://localhost:8080/Projet-Info-Preing2-main/php/contact.php?cat=email'</script>";
            exit;
        }
        if(!preg_match("/^[0-9]{10}$/",$demande['tel'])){
            echo "<script language='Javascript'>window.alert('Erreur dans le champs en rouge (format non compatible, numero a 10 chiffres accolés');</script>";
            echo "<script language='Javascript'>document.location='http://localhost:8080/Projet-Info-Preing2-main/php/contact.php?cat=tel'</script>";
            exit;
        }
        /*if(!preg_match("/^[a-zA-Z-']*$/",$demande['message'])){
            echo "<script language='Javascript'>window.alert('Erreur dans le champs en rouge (texte');</script>";
            echo "<script language='Javascript'>document.location='http://localhost:8080/Projet-Info-Preing2-main/php/contact.php?cat=message'</script>";
            exit;
        }       Si on veut rajouter un regex pour le message*/ 
        $json = file_get_contents('contacter.json') ; #var qui contient notre fichier json
        #sous forme de tableau
        $json = json_decode($json, true) ; #conversion en php
        $json[] = $demande ;
        $json = json_encode($json) ; #reconversion en json
        file_put_contents('contacter.json', $json) ; #on remet le premier msg dans le fichier json
        echo ("<script language='Javascript'>document.location='mailto:couturalia@society.com?subject=".$demande['objet']."&body=".$demande['message']."%0A".$demande['nom']."%0ATéléphone :%20".$demande['tel']."'</script>");


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
?>