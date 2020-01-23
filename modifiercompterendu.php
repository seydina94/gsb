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

$id=$_GET['id'];
	$result = $bdd->prepare("SELECT * FROM rapport WHERE ID= ?")or die(print_r($bdd->errorInfo()));
	$result->execute(array($id));
	while($x=$result->fetch()) {
?>




<div align="center" style="width: 40%;margin:20 auto;">

  <div id="form-div">

     <form class="form-ajouter-compte-rendu" style="margin-top: 15%;" method="POST" action="editcompterendu.php?id=<?php echo $x['ID']?>" role="form">  <?php /**?id=<?php echo $x['ID']?>&daterapport=<?php echo $x['DATERAPPORT']?>&motif=<?php echo $x['MOTIF']?>&id_concerne=<?php echo $x['ID_CONCERNE']?>&id_rediger=<?php echo $x['ID_REDIGER']?>&bilan=<?php echo $x['BILAN']?> */?> 
        
        <h1>Modification du compte rendu !</h1>
    
<div class="field">
    <label for="date">Date</label>
    <div class="input">
        <input type="text" name="daterapport" id="daterapport" value=<?php echo $x['DATERAPPORT'];?> required>
      </div>
</div>
         
<div class="field">
      <label for="motif">Motif</label>
      <div class="input">
        <select name="motif" required>
    <option value="1">	Visite Annuelle</option>
    <option value="2">Presentation d'un nouveau medicament</option>
    <option value="3">Sollicitation du medecin</option>
    <option value="4">Visite bi-mensuelle</option>

</select>
      </div>
</div>
         
<div class="field">
      <label for="id_concerne">Médecin visité</label>
      <div class="input">
        <select name="id_concerne" required>
    <option value="1">	GARCION Cedric</option>
    <option value="2">BERTIN Elizabeth</option>
    <option value="3">BOUSQUET Christine</option>
    <option value="4">CANAVET Paul</option>
    <option value="5">CATOIRE Georges</option>
    <option value="6">PESTA Richard</option>
    <option value="7">TIM Vincent</option>
    <option value="8">KORB Owen</option>
    <option value="9">FORBES-GRIFON Michel</option>
    <option value="10">LINET Teddy</option>
    <option value="11">CHAUDET Ramon</option>

</select>
      </div>
</div>
         
         
<div class="field">
      <label for="id_rediger">Visiteur</label>
      <div class="input">
        <select name="id_rediger" required>
    <option value="1">	MARTIN Ayden</option>
    <option value="2">DUBOIS Bradley</option>
    <option value="3">GARNIER Lorenzo</option>
    <option value="4">LOPEZ Jenny</option>
    <option value="5">BLANC Alysson</option>
    <option value="6">GIRARD Alistair</option>
    <option value="7">PASCO Mathieu</option>
    <option value="8">PLISSONEAU Valentin</option>
    <option value="9">RICHARD Clément</option>
    <option value="11">RADJAVELOU Randjith</option>
    <option value="12">DIENE Seydina</option>
    

</select>
      </div>
</div>
         
        
<div class="field">
      <label for="bilan">Nouveau bilan</label>

<div class="input">
<input type="textarea" id="bilan" name="bilan" style="width:80%; height:100px;"
value="<?php echo $x['BILAN'];?>">
         </div>
</div>
      

<div class="submit">
        <input type="submit" value="Enregistrer" id="button-blue" />
        <div class="ease"></div>
</div>
         
<div class="submit">
        <input type="submit" value="Retour" id="button-blue"/>
        <div class="ease"></div>
</div>
    </form>
  </div>

    <?php
    }
?>
    
    
<?php $result->CloseCursor(); ?>
    
<?php include("partials/footer.php");?>
    
    
    
    
   