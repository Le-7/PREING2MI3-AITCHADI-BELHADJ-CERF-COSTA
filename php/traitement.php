<?php
    if(isset($_POST['nom'])){  //On créé une boucle pour récup les données

        $demande = array() ;
        $demande['nom'] = $_POST['nom'] ;
        $demande['email'] = $_POST['email'] ;
        $demande['objet'] = $_POST['objet'] ;
        $demande['tel'] = $_POST['tel'] ;
        $demande['message'] = $_POST['message'] ;
        $demande['date'] = date("d-m-Y  H:i") ;
        $demande['id'] = date("dmYHis") ; #Création d'un id unique par utilisateur

        //on teste coté serveur les données
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
        $json = file_get_contents('contacter.json') ; #var qui contient notre fichier json sous forme de tableau
        $json = json_decode($json, true) ; #conversion en php
        $json[] = $demande ; #on rempli le tableau
        $json = json_encode($json) ; #reconversion en json
        file_put_contents('contacter.json', $json) ; #on remet le premier msg dans le fichier json puis on créé un mail prérempli avec les données saisies
        echo ("<script language='Javascript'>document.location='mailto:couturalia@society.com?subject=".$demande['objet']."&body=".$demande['message']."%0A".$demande['nom']."%0ATéléphone :%20".$demande['tel']."'</script>");

    }

    else if(isset($_GET['del'])){  #Si on a del
        $demande = file_get_contents('contacter.json');  #on récupère le fichier json
        $demande = json_decode($demande, true);          #on le converti en php
 
        $verif = array() ;    #création d'un deuxième tableau vide 

        for($i=0; $i<count($demande); $i++){
            if($demande[$i]['id'] != $_GET['del']){ #si diff alors on fait entrer le msg dans le nvo tableau
                $verif[] = $demande[$i] ;
            } 
        
        }
        $verif = json_encode($verif);   #on remet en json
        file_put_contents('contacter.json', $verif) ;  #on remet le contenu du msg dans le json puis on réactualise la page
        echo "<script language='Javascript'>document.location='http://localhost:8080/Projet-Info-Preing2-main/php/contacter.php'</script>";
    }
?>
