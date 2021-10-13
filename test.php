<?php
session_start();
require('database/db.php');
?>

<?php
if(!$_SESSION['username_log']){
header('location: ./login.php');
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
	<title> Verifica - C.E.L'isola  </title>
	<meta charset='UTF-8'>
	
    <link rel='stylesheet' type='text/css' href='Css/test.css'>

</head>
    

<body id="body">




<div id="modal1" class="modal">

  <!-- Modal Riepilogo Prenotazione -->
  <div class="modal_content">  

  <p id="pens"><strong>Tipo pensione:</strong>
  <?php


  if(isset($_POST["pensione"])){
  $_SESSION["pensione"] = $_POST["pensione"];
  echo $_POST["pensione"];
  if($_POST["pensione"] == 'americana'){
    $totale = 300;
    echo ' (+300&euro;)';
  }
  if($_POST["pensione"] == 'italiana'){
    $totale = 350;
    echo ' (+350&euro;)';
  }
  if($_POST["pensione"] == 'inglese'){
    $totale = 280;
    echo ' (+280&euro;)';
  }

}

?>

</p>

<p id="padd"><strong>Paddock extra:</strong>
<?php

if(isset($_POST["paddock"])){
  $_SESSION["paddock"] = $_POST["paddock"];
   echo 'Si';
   echo ' (+50&euro;)';
   $totale += 50;
} else {
  echo 'No';}
?>

</p>


<p id="gios"><strong>Giostra extra:</strong>
<?php

if(isset($_POST["giostra"])){
  $_SESSION["paddock"] = $_POST["giostra"];
   echo 'Si';
   echo ' (+50&euro;)';
  $totale += 50;

} else {
  echo 'No';}
?>

</p>

<p id="manis"><strong>Maniscalco:</strong>
<?php

if(isset($_POST["maniscalco"])){
  $_SESSION["maniscalco"]= $_POST["maniscalco"];
   echo 'Si';
   echo ' (+80&euro;)';
      $totale += 80;

} else {
  echo 'No';}
?>

</p>

<p id="vet"><strong>Veterinario:</strong>
<?php

if(isset($_POST["veterinario"])){
  $_SESSION["veterinario"] = $_POST["veterinario"];
   echo 'Si';
   echo ' (+100&euro;)';
      $totale += 100;

} else {
  echo 'No';}
?>

</p>

<p id="istr"><strong>Istruttore:</strong>
<?php

if(isset($_POST["istruttore"])){
  $_SESSION["istruttore"] = $_POST["istruttore"]; 
  $_SESSION["tipologia"] = $_POST["tipologia"];
   echo $_POST["istruttore"];
   echo "  ";
   if($_POST["tipologia"] == ""){echo"Tipologia non selezionata";} else {echo $_POST["tipologia"];}

    if($_POST["istruttore"]=="Giulia")
      if($_POST["tipologia"]=="ridotto"){echo ' (+80&euro;)';    $totale += 80;
}
        else{echo ' (+120&euro;)';    $totale += 120;
}

     if($_POST["istruttore"]=="Ilaria")
      if($_POST["tipologia"]=="ridotto"){echo ' (+100&euro;)';   $totale += 100;
}
        else{echo ' (+140&euro;)';    $totale += 140;
}

     if($_POST["istruttore"]=="Barbara")
      if($_POST["tipologia"]=="ridotto"){echo ' (+100&euro;)';    $totale += 100;
}
        else{echo ' (+135&euro;)';    $totale += 135;
}

}
    
?>

</p>



<?php

if(isset($_POST["mese"])){
  $mese_inizio = $_POST["mese"];
  $_SESSION["mese_inizio"]=$mese_inizio;
  if($mese_inizio != ""){
   echo '<p id="start_pens"><strong>Inizio Pensione: </strong>' .$_POST["mese"]. '</p>';
  $mese_fine = date('Y-m-d', strtotime($mese_inizio. ' + 30 days'));
  $_SESSION["mese_fine"]=$mese_fine;
   echo '<p id="end_pens"><strong>Fine Pensione: </strong>' . $mese_fine . "</p>";}
else{
  echo '<p id="err_mese"><strong>ATTENZIONE</strong>, si prega di selezionare il giorno di inizio</p>';}
}

      
$presente = isset($mese_inizio);
      if($presente == false){

  echo'<p id="mese_mancante"> ATTENZIONE ERRORE: si prega di premere "indietro" </p>';
}
      
      
    else {

        if($mese_inizio ==""){
  echo'<p id="mese_mancante"> Premi "indietro" per tornare alla pagina precedente </p>';}


if($mese_inizio != ""){
  echo'<p id="totale_spesa">Costo totale: '.$totale.'&euro;</p>';
  $_SESSION["costo"]=$totale;
  echo'
  <form action="./utility/resoconto.php">
  <button type="submit" id="conferma">Conferma</button>
  </form>';}
    }
?>

<button onclick="location.href='./AreaServizi.php'" id="indietro">Indietro</button>



    </div>

</div>

<script src="Js/test.js"> </script>

</body>
</html>











