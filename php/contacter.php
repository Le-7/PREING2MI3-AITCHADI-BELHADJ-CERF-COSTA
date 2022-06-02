<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/contacter.css" />
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Pacifico" />
    <title>Test données</title>
</head>
<body>

    <?php
        $demande = file_get_contents('contacter.json') ;
        $demande = json_decode($demande, true) ;

        for($i=0; $i<count($demande); $i++) :
    ?>
        <div class="test">
            <div class="zones">
            <a href="traitement.php?del=<?php echo$demande[$i]['id']; ?>" class="action" id="fermé">X</a> <br>
            <p>
                <b><?php echo$demande[$i]['nom']; ?></b><br>
                <?php echo$demande[$i]['email']; ?><br>
                <?php echo$demande[$i]['tel']; ?><br>
                
                    <?php echo$demande[$i]['message']; ?> <br>
                
                <b class="date"> <?php echo$demande[$i]['date']; ?></b><br> </p>
                
            </div>
            <!-- -->
               

        </div>
    <?php endfor; ?>

</body>
</html>