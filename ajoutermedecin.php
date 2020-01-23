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



if( !isset($_POST["nom"]) && !isset($_POST["prenom"]) && !isset($_POST["adresse"]) && !isset($_POST["ville_medecin"]) && !isset($_POST["cp_medecin"]) && !isset($_POST["tel"]) && !isset($_POST["departement"]))
     {   }


                //Code d'enregistrement des données du formulaire dans la BDD !
     else if(isset($_POST['specialite']) && isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["adresse"]) && isset($_POST["ville_medecin"]) && isset($_POST["cp_medecin"]) && isset($_POST["tel"]) && isset($_POST["departement"]))
    {
        
                //Cette requête aussi est bonne ! (mais à ne pas utiliser pour une requête de type SELECT)
        /*$req=$bdd->query('INSERT INTO medecin (ID_POSSEDE,NOM,PRENOM,ADRESSE,VILLE_MEDECIN,CP_MEDECIN,TEL,DEPARTEMENT) VALUES (\'' . $_POST['specialite'] . '\',\'' . $_POST['nom'] . '\', \'' . $_POST['prenom'] . '\', \'' . $_POST['adresse'] . '\',\'' . $_POST['ville_medecin'] . '\',\'' . $_POST['cp_medecin'] . '\',\'' . $_POST['tel'] . '\',\'' . $_POST['departement'] . '\')')or die(print_r($bdd->errorInfo()));*/
        
        
        // J'execute avec celle là !
        $req=$bdd->prepare('INSERT INTO medecin (ID_POSSEDE,NOM,PRENOM,ADRESSE,VILLE_MEDECIN,CP_MEDECIN,TEL,DEPARTEMENT) VALUES (?,?,?,?,?,?,?,?)')or die(print_r($bdd->errorInfo()));
        $req->execute(array($_POST['specialite'],$_POST['nom'],$_POST['prenom'],$_POST['adresse'],$_POST['ville_medecin'],$_POST['cp_medecin'],$_POST['tel'],$_POST['departement']));
        
        
        
        // Autre possibilité, mais ça bloque quelque part !
   /* $req=$bdd->prepare('INSERT INTO medecin (ID_POSSEDE,NOM,PRENOM,ADRESSE,VILLE_MEDECIN,CP_MEDECIN,TEL,DEPARTEMENT) VALUES (:specialite,:nom, :prenom, :adresse,:ville_medecin,:cp_medecin,:tel,:departement)')or die(print_r($bdd->errorInfo()));
        $req->execute(array(
                    'ID_POSSEDE'=>$_POST['specialite'],
                     'NOM'=>$_POST['nom'],
                      'PRENOM'=>$_POST['prenom'],
                       'ADRESSE'=>$_POST['adresse'],
                       'VILLE_MEDECIN'=>$_POST['ville_medecin'],
                       'CP_MEDECIN'=>$_POST['cp_medecin'],
                       'TEL'=>$_POST['tel'],
                       'DEPARTEMENT'=>$_POST['departement']));*/
        
        
        setFlash("success","Médecin enregistré !");
         
    }else{

         setFlash("danger","Insérez tous les champs !");
     }

    ?>



    <style>
    h1 {
      text-align: center
    }
    .form {
      width: 600px;
      margin: auto;
      border: 1px solid #ddd;
    }
    .form .field {
      clear: both;
      padding: 20px;
      font-size: 18px;
      border-bottom: 1px solid #ddd;
      background-color: #ebebeb;
    }
    .form .input {
      float: right;
    }
    .form input {
      padding: 4px;
      font-size: 18px
    }
  </style>
  <script>
   function validation() {
    var nom = document.getElementById("nom");
    var prenom = document.getElementById("prenom");
    var date = document.getElementById("date");
    var sex = document.querySelector('input[name="sex"]:checked');

    if (nom.value == '') {
        nom.style.borderColor = 'red';
     }

    else if (prenom.value == '') {
        prenom.style.borderColor = 'red';
     }
    else if (date.value == '') {
        date.style.borderColor = 'red';
     }
    else if (sex.value == '') {
        sex.style.borderColor = 'red';
     }

     else {
       alert('Nom: ' + nom.value + '\n'
             + 'Prenom: ' + prenom.value + '\n'
             + 'Date: ' + date.value + '\n'
             + 'Sex: ' + sex.value);
     }
  }
  </script>
<body>
    <div class="titre_afficher">
  <h1>Veuillez remplir les champs de ce formulaire pour ajouter un nouveau médecin !</h1>
    </div>
        
        <br>
  <form action="ajoutermedecin.php"  method="post" class="form">
    <div class="field">
      <label for="nom">Nom</label>
      <div class="input">
        <input type="text" name="nom" id="nom" placeholder="Votre nom" required>
      </div>
    </div>
    <div class="field">
      <label for="prenom">Prenom</label>
      <div class="input">
        <input type="text" name="prenom" id="prenom" placeholder="Votre prenom" required>
      </div>
    </div>
    <div class="field">
      <label for="specialite">Spécialité</label>
      <div class="input">
        <select name="specialite" required>
    <option value="1">Neurochirurgien</option>
    <option value="2">Orthopediste</option>
    <option value="3">Génélaliste</option>
    <option value="4">Pédo-psychatre</option>
    <option value="5">Cancérologue</option>
    <option value="6">Pneumologue</option>
    <option value="7">Médecin du sport</option>
    <option value="8">Cardiologue</option>
</select>
      </div>
    </div>
    
      <div class="field">
      <label for="adresse">Adresse</label>
      <div class="input">
        <input type="text" name="adresse" id="adresse" required>
      </div>
    </div>
      
        <div class="field">
      <label for="ville_medecin">Ville</label>
      <div class="input">
        <input type="text" name="ville_medecin" id="ville_medecin" placeholder="Ville" required>
      </div>
    </div>
      
          <div class="field">
      <label for="cp_medecin">cp_medecin</label>
      <div class="input">
        <input type="text" name="cp_medecin" id="cp_medecin" placeholder="ex: 75000" required>
      </div>
    </div>
      
          <div class="field">
      <label for="tel">Tel</label>
      <div class="input">
        <input type="text" name="tel" id="tel" placeholder="ex: 06 00 00 00 00" required>
      </div>
    </div>
      
          <div class="field">
      <label for="departement">Département</label>
      <div class="input">
        <input type="text" name="departement" id="departement" placeholder="ex: 94" required>
      </div>
    </div>
     
      
    <div class="field">
      <input type="submit" value="Enregistrer" >
      <input type="reset" value="Annuler">
    </div>
  </form>
    
<?php include("partials/footer.php");?>
 
    
    
    
    <footer>
         © Copyright GSB || Développé par Seydina DIENE et Randjith RADJAVELOU
    </footer>
    
    

     
    
    
    
    
    
    