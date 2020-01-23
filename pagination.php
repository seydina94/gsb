<?php
session_start();
if ((!isset($_SESSION["password"]) )&& (!isset($_SESSION["login"])))
{  header ("Location: index.php")   ;
   }
include("lib/function.php");
include("lib/constants.php");
include("partials/header.php");
include("partials/navbar.php");
include("lib/database_connexion.php");
?>

<h1>Affichage des médecins :</h1>
<?php
/** Debut Pagination */
/**    Récuperation du nombre de médecin     */
$sql = "SELECT COUNT(ID) AS NbreMD FROM medecin";
$req=$bdd->query($sql)or die(print_r($bdd->errorInfo()));
$retour=$req->fetch();

$NbreMD=$retour['NbreMD'];

// Variable NbreMDparPage
$NbreMDparPage=2;
//Nombre de pages 
$NbrePages = ceil ($NbreMD /$NbreMDparPage);
    // Numero de la page courante
if (isset($_GET['p']) && ($_GET['p'])>0 && ($_GET['p'])<=$NbrePages) {
	# code...
	$NumMD=$_GET['p'];
}
else{
	$NumMD=1;
}

$sql2= "SELECT * FROM medecin ORDER BY ID LIMIT ".(($NumMD-1)*$NbreMDparPage).",$NbreMDparPage";
$req2=$bdd->query($sql2)or die(print_r($bdd->errorInfo()));
while($donnees = $req2->fetch()){
	/** Fin premiere partie Pagination */
	?>
    <div class="affichagemedecin">
    <div class="infosmedecin">
    	<strong>NOM PRENOM   : </strong><?php echo $donnees['NOM'].' '.$donnees['PRENOM'];?><br>
    	<strong>ADRESSE   : </strong><?php echo $donnees['ADRESSE'];?><br>
    	<strong>VILLE   : </strong><?php echo $donnees['VILLE_MEDECIN'];?><br>
    	<strong>CODE POSTAL  : </strong><?php echo $donnees['CP_MEDECIN'];?><br>
        <strong>TEL   : </strong><?php echo $donnees['TEL'];?>
    </div>
    <div class="modifiermedecin">
        <form method="post" action="#">
    	<input type="submit" value="Modifier">
        </form>
    </div>
     

</div> 
<HR align="center" size=8 width="70%" color="red">
   



<?php
}
/**  Suite Pagination */
for ($i=1; $i <=$NbrePages ; $i++) { 
	# code...
	if ($i==$NumMD) {
		# code...
		echo "$i";
	}
	else{
	echo " <a href=\"pagination.php?p=$i\"> $i </a>/ ";
	}
}
/** Fin Pagination */
$req->CloseCursor();

?>