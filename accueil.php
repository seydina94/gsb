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



<?php include("partials/footer.php");?>
    

    
    
<script type="text/javascript">
$(document).ready(function() {
// Create two variable with the names of the months and days in an array
var monthNames = [ "Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Decembre" ]; 
var dayNames= ["Dimanche","Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi"]

// Create a newDate() object
var newDate = new Date();
// Extract the current date from Date object
newDate.setDate(newDate.getDate());
// Output the day, date, month and year   
$('#Date').html(dayNames[newDate.getDay()] + " " + newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + ' ' + newDate.getFullYear());

setInterval( function() {
	// Create a newDate() object and extract the seconds of the current time on the visitor's
	var seconds = new Date().getSeconds();
	// Add a leading zero to seconds value
	$("#sec").html(( seconds < 10 ? "0" : "" ) + seconds);
	},1000);
	
setInterval( function() {
	// Create a newDate() object and extract the minutes of the current time on the visitor's
	var minutes = new Date().getMinutes();
	// Add a leading zero to the minutes value
	$("#min").html(( minutes < 10 ? "0" : "" ) + minutes);
    },1000);
	
setInterval( function() {
	// Create a newDate() object and extract the hours of the current time on the visitor's
	var hours = new Date().getHours();
	// Add a leading zero to the hours value
	$("#hours").html(( hours < 10 ? "0" : "" ) + hours);
    }, 1000);	
});
</script>




<div id="sequence" class="seq">
    <div class="seq-bg"></div>
    <div class="seq-screen">
      <ul class="seq-canvas">
        <li class="seq-in seq-valign">
          <div class="seq-content">
            <h2 data-seq class="seq-title">GSB / Gestion des compte-rendus.</h2>
              
              
              <div class="contain">
<div align="center" style="width: 100%;margin:10 auto;">
	<img src="images/logo_GSB.jpg"/>

    
<div>
	<div class="clock">
		<div id="Date"></div>
		  <ul class="clock">
		      <li id="hours"></li>
		      <li id="point">:</li>
		      <li id="min"></li>
		      <li id="point">:</li>
		      <li id="sec"></li>
		  </ul>
	</div>
</div>
</div>
</div>
              
              
            
          </div>
        </li>
      </ul>
    </div>
     </div>


<footer>
         © Copyright GSB || Développé par Seydina DIENE et Randjith RADJAVELOU.
    </footer> 
    
 
    