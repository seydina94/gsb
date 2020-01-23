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

<?php 
$q=$_GET['q'];
//$sql = "SELECT * FROM rapport WHERE BILAN LIKE "%$_GET['q']%" ";
$req=$bdd->prepare("SELECT rapport.ID,visiteur.nom AS nom_visiteur,visiteur.PRENOM AS prenom_visiteur,medecin.NOM AS nom_medecin,medecin.PRENOM AS prenom_medecin,rapport.DATERAPPORT,rapport.BILAN, MOTIF.libelle AS nom_motif FROM rapport JOIN visiteur ON rapport.ID_REDIGER=visiteur.ID JOIN medecin ON rapport.ID_CONCERNE=medecin.ID JOIN motif ON rapport.motif=motif.id WHERE rapport.BILAN LIKE :q ORDER BY rapport.ID  ")or die(print_r($bdd->errorInfo()));
$req->execute(array(
	'q'=>"%$q%"));
while($donnees = $req->fetch()){
	# code...
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


$req->CloseCursor();
?>


    
    <footer>
         © Copyright GSB || Développé par Seydina DIENE et Randjith RADJAVELOU
    </footer> 
    
    
    
    
    

     
    
    
    
    
    
    