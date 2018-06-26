<?php
//define('SERVER', "10.0.241.89");
//define('USER', "cefiidev608");
//define('PASSWORD', "pHG23cNh");
//define('BASE', "cefiidev608");

define('SERVER', "localhost");
define('USER', "root");
define('PASSWORD', "");
define('BASE', "inventaire");

try{
    $connexion = new PDO("mysql:host=".SERVER.";dbname=".BASE, USER, PASSWORD);
    $connexion->exec("SET CHARACTER SET utf8"); 
}

catch(Exception $e){
    echo 'Erreur: '.$e->getMessage();
}


?>