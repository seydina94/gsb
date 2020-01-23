<?php
session_start();
if ((!isset($_SESSION["password"]) )&& (!isset($_SESSION["login"])))
{  header ("Location: index.php")   ;
   }
    

include("lib/database_connexion.php");

$id=$_GET['id'];
$motif=$_POST['motif'];
$id_concerne=$_POST['id_concerne'];
$id_rediger=$_POST['id_rediger'];
$daterapport=$_POST['daterapport'];
$bilan=$_POST['bilan'];

	 $rqt="update rapport set MOTIF='$motif',ID_CONCERNE='$id_concerne',ID_REDIGER='$id_rediger',BILAN='$bilan',DATERAPPORT='$daterapport' where ID ='$id'";
        $req=$bdd->query($rqt)or die(print_r($bdd->errorInfo()));

	
	/**
$result = $bdd->prepare(" UPDATE rapport
SET MOTIF=:motif, ID_CONCERNE=:id_concerne, ID_REDIGER=:id_rediger, BILAN=:bilan, DATERAPPORT=:daterapport WHERE ID=:id ")or die(print_r($bdd->errorInfo()));
$result->execute(array(
	'motif'=>$motif,
	'id_concerne'=>$id_concerne,
	'id_rediger'=>$id_rediger,
	'bilan'=>$bilan,
	'daterapport'=>$daterapport,
	'id'=>$id
));
*/

	/**
	$result = $bdd->prepare(" UPDATE rapport
SET MOTIF=?, ID_CONCERNE=?, ID_REDIGER=?, BILAN=?, DATERAPPORT=? WHERE ID=? ")or die(print_r($bdd->errorInfo()));
$result->execute(array($motif,$id_concerne,$id_rediger,$bilan,$date,$id));
/**   Les variables "date" et "id" ne sont pas reconnues ! C'est pourquoi cette requête préparée ne marche pas.
//$result->execute(array($_POST['motif'],$_POST['id_concerne'],$_POST['id_rediger'],$_POST['bilan'],$_POST['date'],$_POST['id']));
*/
$req->CloseCursor();
echo "Modification enregistrée !";
header ("Location: affichercompterendu.php");
?>