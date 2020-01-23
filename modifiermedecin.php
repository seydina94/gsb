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
	$result = $bdd->prepare("SELECT * FROM medecin WHERE ID= ?")or die(print_r($bdd->errorInfo()));
	$result->execute(array($id));
	while($x=$result->fetch()) {
?>




<div align="center" style="width: 40%;margin:20 auto;">

  <div id="form-div">

     <form class="form-ajouter-compte-rendu" style="margin-top: 15%;" method="POST" action="editmedecin.php?id=<?php echo $x['ID']?>" role="form">

        
        <h1>Modification des informations du médecin !</h1>
    
<div class="field">
    <label for="date">Nom</label>
    <div class="input">
        <input type="text" name="nom" id="text" value="<?php echo $x['NOM'];?>" required>
      </div>
</div>
         
<div class="field">
      <label for="motif">Prénom</label>
      <div class="input">
        <input type="text" name="prenom" id="prenom" value="<?php echo $x['PRENOM'];?>" >
      </div>
</div>
      
<div class="field">
      <label for="id_concerne">Adresse</label>
      <div class="input">
        <input type="text" name="adresse" id="adresse" value="<?php echo $x['ADRESSE'];?>">
      </div>
</div>

<div class="field">
      <label for="id_concerne">Ville</label>
      <div class="input">
        <input type="text" name="ville" id="ville" value="<?php echo $x['VILLE_MEDECIN'];?>">
      </div>
</div>
         
<div class="field">
      <label for="id_rediger">Code postal</label>
      <div class="input">
        <input type="text" name="code_postal" id="code_postal" value="<?php echo $x['CP_MEDECIN'];?>">
      </div>
</div>
         
        
<div class="field">
      <label for="tel">Téléphone</label>
      <div class="input">
        <input type="text" name="tel" id="tel" value="<?php echo $x['TEL'];?>">
      </div>
</div>
        
<?php
    }
?>
      
<br>
<div class="submit">
        <input type="submit" value="Enregistrer" id="button-blue"/>
        <div class="ease"></div>
</div>
         
<div class="submit">
        <input type="submit" value="Retour" id="button-blue"/>
        <div class="ease"></div>
</div>
    </form>
  </div>

    
    
    
<?php $result->CloseCursor(); ?>
    
<?php include("partials/footer.php");?>