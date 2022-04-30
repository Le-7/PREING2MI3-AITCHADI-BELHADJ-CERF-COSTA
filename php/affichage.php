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
$csv = array_map('str_getcsv', file('../data/exemple.csv'));
echo $csv;
foreach($csv as $line){
    if($line[4] ==$num[1] ){
        //do what ever you want
        var_dump($line[0]);
    }
}
}
affichage();
?>
</body>
</html>
