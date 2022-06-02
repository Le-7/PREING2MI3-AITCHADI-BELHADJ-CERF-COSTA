<?php
    session_start();
    $x = $_POST['diff'];
    $n = $_POST['nbr'];
    $_SESSION['cart'][$x]=$n;
    header('Location: ' . $_SERVER['HTTP_REFERER']);
?>