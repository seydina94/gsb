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
                //Code d'enregistrement des données du formulaire dans la BDD !
     if(isset($_POST['date']) && isset($_POST["visiteur"]) && isset($_POST["medecin"]) && isset($_POST["motif"]) && isset($_POST["bilan"]))
    {
        
        // J'execute avec ce type de requête préparée là !
        $req=$bdd->prepare('INSERT INTO rapport (ID_REDIGER,ID_CONCERNE,DATERAPPORT,MOTIF,BILAN) VALUES (?,?,?,?,?)')or die(print_r($bdd->errorInfo()));
        $req->execute(array($_POST['visiteur'],$_POST['medecin'],$_POST['date'],$_POST['motif'],$_POST['bilan']));
        
        
        setFlash("success","Compte-rendu enregistré !");
        
    }


    ?>



    <style>
    h1 {
      text-align: center
    }
    .form {
      width: 600px;
        height: auto;
      margin: auto;
      border: 1px solid #ddd;
    }
    .form .field {
      clear: both;
      padding: 20px;
      font-size: 18px;
      border-bottom: 1px solid #ddd;
      background-color: #ebebeb;
        width: auto;
    }
    .form .input {
      float: right;
    }
    .form input {
      padding: 4px;
      font-size: 18px;
        height: 40px;
    }
        
        
        
        
    input[type=submit] {
  background-color: #1255a2;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #1872D9;
}  
        input[type=reset] {
  background-color: red;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
        input[type=reset]:hover {
  background-color: orangered;
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
  <h1>Veillez remplir les champs de ce formulaire pour ajouter un compte rendu!</h1>
    </div>
    
    
    <br>
    
  <form action="ajoutercompterendu.php"  method="post" class="form">
    <div class="field">
      <label for="date">Date</label>
      <div class="input">
        <input type="date" name="date" id="date" value=Date() required>
      </div>
    </div>
    <div class="field">
      <label for="visiteur">Visiteur</label>
      <div class="input">
        <select name="visiteur" required>
    <option value="1">Martin Ayden</option>
    <option value="5">Alysson Blanc</option>
    <option value="12">Seydina Diène</option>
    <option value="2">Bradley Dubois</option>
    <option value="3">Lorenzo Garnier</option>
    <option value="6">Alistair Gerard</option>
    <option value="4">Jenny Lopez</option>
    <option value="7">Mathieu Pasco</option>
    <option value="8">Valentin Plissoneau</option>
     <option value="11">Randjith Radjavelou</option>
    <option value="9">Clément Richard</option>
</select>
      </div>
    </div>
       <div class="field">
      <label for="medecin">Médecin</label>
      <div class="input">
        <select name="medecin" required>
    <option value="2">Elizabeth Bertin</option>
    <option value="3">Christine Bousquet</option>
    <option value="4">Paul Canavet</option>
    <option value="5">Georges Catoire</option>
    <option value="11">Ramon Chaudet</option>
    <option value="9">Michel Forbes-Grifon</option>
    <option value="1">Cedric Garcion</option>
    <option value="8">Owen Korb</option>
    <option value="10">Teddy Linet</option>
    <option value="6">Richard Pesta</option>
    <option value="7">Vincent Tim</option>
</select>
      </div>
    </div>
      <div class="field">
      <label for="motif">Motif</label>
      <div class="input">
        <select name="motif" required>
    <option value="2">Presentation d'un nouveau médicament</option>
    <option value="1">Visite Annuelle</option>
    <option value="3">Sollicitation du médecin</option>
    <option value="4">Visite bi-mensuelle</option>
</select>
      </div>
    </div>
      <div class="field">
      <label for="bilan">Bilan</label>
      <div class="input">
    <textarea id="bilan" name="bilan" placeholder="Bilan" style="height:50px;width:300" required></textarea>
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
    
    
    
    

     
    
    
    
    
    
    