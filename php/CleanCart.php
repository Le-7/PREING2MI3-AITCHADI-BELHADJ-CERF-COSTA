<?php 
    session_start();
    $_SESSION['cart'] = [ 'm01' => 0 , 'm02' => 0 , 'm03' => 0 , 'i01' => 0 , 'i02' => 0 , 'i03' => 0 , 't01' => 0 , 't02' => 0 , 't03' => 0 ];
    header('Location: ' . $_SERVER['HTTP_REFERER']);
?>