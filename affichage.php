<!DOCTYPE html>
<html>
<body>
<?php
function getquery(){ $url = $_SERVER['REQUEST_URI'];
    return (parse_url($url, PHP_URL_QUERY));
}

function affichage(){
$num = explode('=',getquery());
echo $num[1];
}
affichage();
?>
</body>
</html>