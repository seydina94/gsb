<?php

//Fichier à copier dans lib/


// remplacer les variables suivantes:
$database="usersio_gsb";
$server="localhost";
$user="root";
$password="root";


try{
$bdd = new PDO("mysql:host=$server; dbname=$database", $user, $password );

} catch(PDOException $e) {

    echo $e->getMessage();
}
?>
