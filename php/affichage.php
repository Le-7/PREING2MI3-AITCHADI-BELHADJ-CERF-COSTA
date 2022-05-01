<!DOCTYPE html>
<html>
<body>
<?php
function getquery(){ $url = $_SERVER['REQUEST_URI'];
    return (parse_url($url, PHP_URL_QUERY));
}

function affichage(){
$num = explode('=',getquery());
$csv = array_map('str_getcsv', file('../data/exemple.csv'));
foreach($csv as $line){
    if($line[4] ==$num[1] ){
        echo("<h1>".$line[0]."</h1>");
    }
}
}
affichage();
?>
</body>
</html>
