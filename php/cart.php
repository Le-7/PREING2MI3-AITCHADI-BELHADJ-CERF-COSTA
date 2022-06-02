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
    if($_SESSION['Connected'] == 1){
        $_SESSION['name'][] = $_POST['name'];
        $_SESSION['price'][] = $_POST['price'];
        $_SESSION['nbr'][] = $_POST['value'];
        foreach($_SESSION['name'] as $name){
            foreach($_SESSION['price'] as $price){
                foreach($_SESSION['nbr'] as $nbr){
                    echo "<p>$name</p>";
                    echo "<p>$price</p>";
                    echo "<p>$nbr</p>";
                }
            }
        }
    }else{
        echo "<script>document.location.href='http://localhost:8080/Projet-Info-Preing2-main/index.php?cat=not_connected'</script>";
    }
    ?>
</body>

</html>