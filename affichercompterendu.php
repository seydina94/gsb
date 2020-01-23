<?php
session_start();
if ((!isset($_SESSION["password"]) )&& (!isset($_SESSION["login"])))
{  header ("Location: index.php")   ;
   }
include("lib/function.php");

include("partials/header.php");
include("partials/navbar.php");
include("lib/database_connexion.php");
?>

<div class="titre_afficher">
<h1> Compte - rendus de visites :</h1>
</div>

<?php
/** Debut Pagination */
/**    Récuperation du nombre de rapport     */
$sql = "SELECT COUNT(ID) AS NbreCR FROM rapport";
$req=$bdd->query($sql)or die(print_r($bdd->errorInfo()));
$retour=$req->fetch();

$NbreCR=$retour['NbreCR'];

// Variable NbreCRparPage
$NbreCRparPage=2;
//Nombre de pages 
$NbrePages = ceil ($NbreCR /$NbreCRparPage);
    // Numero page courante
if (isset($_GET['p']) && ($_GET['p'])>0 && ($_GET['p'])<=$NbrePages) {
    # code...
    $NumPC=$_GET['p'];
}
else{
    $NumPC=1;
}

//    REQUETE D4AFFICHAGE DES INFORMATIONS CONCERNANTS UN RAPPORT


// J'ai effectué la requête en joignant les tables "rapport", "visiteur","medecin" et "motif" en affichant dans ma requête les noms et prenoms des visiteurs et des médecins avec des noms spécifiques.
$sql2= "SELECT rapport.ID,visiteur.nom AS nom_visiteur,visiteur.PRENOM AS prenom_visiteur,medecin.NOM AS nom_medecin,medecin.PRENOM AS prenom_medecin,rapport.DATERAPPORT,rapport.BILAN, MOTIF.libelle AS nom_motif FROM rapport JOIN visiteur ON rapport.ID_REDIGER=visiteur.ID JOIN medecin ON rapport.ID_CONCERNE=medecin.ID JOIN motif ON rapport.motif=motif.id ORDER BY rapport.ID LIMIT ".(($NumPC-1)*$NbreCRparPage).",$NbreCRparPage";
/** 
sql2 = doit être remplacée par cette requete : 
"SELECT visiteur.nom AS nom_visiteur,visiteur.PRENOM AS prenom_visiteur,medecin.NOM AS nom_medecin,medecin.PRENOM AS prenom_medecin,rapport.DATERAPPORT,rapport.BILAN, MOTIF.libelle FROM rapport JOIN visiteur ON rapport.ID_REDIGER=visiteur.ID JOIN medecin ON rapport.ID_CONCERNE=medecin.ID JOIN motif ON rapport.motif=motif.id ;"
*/
 
$req2=$bdd->query($sql2)or die(print_r($bdd->errorInfo()));
while($donnees = $req2->fetch()){
	//    FIN REQUETE D4AFFICHAGE DES INFORMATIONS CONCERNANTS UN RAPPORT


    /** Fin premiere partie Pagination */
    ?>
    <div class="affichage">

    
    <div class="infos">
        <?php echo '<strong>Date du rapport : </strong>'.'  '.$donnees['DATERAPPORT'];?><br>
        <?php echo'<strong>Motif :</strong>'.'  '.$donnees['nom_motif'];?><br>
        <?php echo'<strong>Prenom et nom du médecin visité :</strong>'.'  '.$donnees['prenom_medecin']." ".$donnees['nom_medecin'];?><br>
        <?php echo'<strong>Prenom et nom du visiteur :</strong> '.'  '.$donnees['prenom_visiteur']." ".$donnees['nom_visiteur'];?>
    </div>
    <div class="bilan">
        <table>
            <tr>
                <th>
                    Bilan de la visite <form method="post" action="modifiercompterendu.php?id=<?php echo $donnees['ID']?> ">
        <input type="submit" value="Modifier" style="float:right; ">
        </form>
            </th>
                
            <!-- la balise <th> désigne l'entête du tableau --> 
            </tr>
            <tr>
                <td><?php  echo $donnees['BILAN']?></td>
            </tr>
        </table>
    </div>
     

</div> 
<HR align="center" size=8 width="70%" color="red">
   



<?php
}
/**  Suite Pagination */
for ($i=1; $i <=$NbrePages ; $i++) { 
    # code...
    if ($i==$NumPC) {
        # code...
        echo "$i";
    }
    else{ ?>
    
        <div class="pagination">
    <?php  echo " <a href=\"affichercompterendu.php?p=$i\"> $i </a>/ "; ?>
        </div>
   <?php }
}
/** Fin Pagination */
$req->CloseCursor();

?>