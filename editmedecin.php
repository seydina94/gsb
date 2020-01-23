<?php
session_start();
if ((!isset($_SESSION["password"]) )&& (!isset($_SESSION["login"])))
{  header ("Location: index.php")   ;
   }
    

include("lib/database_connexion.php");

$id=$_GET['id'];
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$adresse=$_POST['adresse'];
$ville=$_POST['ville'];
$code_postal=$_POST['code_postal'];
$tel=$_POST['tel'];

	$result = $bdd->prepare(" UPDATE medecin
SET NOM=?, PRENOM=?, ADRESSE=?, VILLE_MEDECIN=?, CP_MEDECIN=?, TEL=? WHERE ID=? ")or die(print_r($bdd->errorInfo()));
$result->execute(array($nom,$prenom,$adresse,$ville,$code_postal,$tel,$id));
/**   Les variables "date" et "id" ne sont pas reconnues ! C'est pourquoi cette requête préparée ne marche pas.
//$result->execute(array($_POST['motif'],$_POST['id_concerne'],$_POST['id_rediger'],$_POST['bilan'],$_POST['date'],$_POST['id']));
*/
header ("Location: affichermedecins.php");
?>