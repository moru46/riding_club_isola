<?php
require('database/db.php');
session_start();

if(!$_SESSION['username_log']){
header('location: ./login.php');
}
?>


<!DOCTYPE html>
<html lang="it">
<head>
	<title> Area Allenamenti - C.E.L'isola  </title>
	<meta charset='UTF-8'>
  <link rel='stylesheet' type='text/css' href='Css/Allenamento.css'>

</head>

<body id="body">


<!-- Barra di navigazione -->
<div id="barranav">
  <table id="link">
  <tr>
   <th><a href="Home.php"> Home </a></th>
    <th><a href="Strutture.php"> Strutture </a></th> 
    <th><a href="Info.php">Info</a></th>
 <?php 
  if(isset($_SESSION['username_log'])){
   echo '<th><a href="indice_login.php">'.' '. $_SESSION["username_log"] . '</a></th>';}
    else{ echo '<th><a href="login.php">Login</a></th>';}
  ?>
  </tr>
 
</table>
  <img src="./immagini/FISE.svg" alt="fise" id="fise">
  
  <p id="isola2"> Centro Equitazione L'isola <p>

</div>

<!-- contenitore centrale, grigio, per contenere le altre div con i paragrafi -->

<div id="centro_1">

<h2 id="descrizione"> In questa area è possibile prenotare e gestire i propri allenamenti.</h2>

<form  action="./utility/prenota.php" method="post">

<h2 id="titolo_campo">&#8226; Seleziona il campo di allenamento:</h2>

  <img src="./immagini/campo_A.jpg" class="img_campo" alt="campo_A" id="campo_A">
  <label class="container">Campo A
  <input type="radio" checked="checked" name="Campo" value="A"> 
  <span class="checkmark"></span>
  </label>


  <img src="./immagini/campo_coperto.jpg" alt="campo_B" class="img_campo" id="campo_B">
  <label class="container">Campo B
  <input type="radio"  name="Campo" value="B"> 
  <span class="checkmark"></span>
  </label>



  <img src="./immagini/campo_tessuto_non.jpg" alt="campo_C" class="img_campo" id="campo_C">
  <label class="container">Campo C
  <input type="radio"  name="Campo" value="C"> 
  <span class="checkmark"></span>
  </label>
  

<h2 id="titolo_orario">&#8226; Seleziona la fascia oraria in cui desideri allenarti:</h2>

<div id="orari">
 Ora inizio:
  <select id="ora_inizio" name="ora_inizio">
  <option>09:00</option>
  <option>09:30</option>
  <option>10:00</option>
  <option>10:30</option>
  <option>11:00</option>
  <option>11:30</option>
  <option>12:00</option>
  <option>12:30</option>
  <option>13:00</option>
  <option>13:30</option>
  <option>14:00</option>
  <option>14:30</option>
  <option>15:00</option>
  <option>15:30</option>
  <option>16:00</option>
  <option>16:30</option>
  <option>17:00</option>
  <option>17:30</option>
  <option>18:00</option>
  <option>18:30</option>
  <option>19:00</option>
  <option>19:30</option>
  </select>

  Ora fine:
  <select id="ora_fine" name="ora_fine">
  <option>09:00</option>
  <option>09:30</option>
  <option>10:00</option>
  <option>10:30</option>
  <option>11:00</option>
  <option>11:30</option>
  <option>12:00</option>
  <option>12:30</option>
  <option>13:00</option>
  <option>13:30</option>
  <option>14:00</option>
  <option>14:30</option>
  <option>15:00</option>
  <option>15:30</option>
  <option>16:00</option>
  <option>16:30</option>
  <option>17:00</option>
  <option>17:30</option>
  <option>18:00</option>
  <option>18:30</option>
  <option>19:00</option>
  <option>19:30</option>
  </select>

</div>

<?php 

if(isset($_SESSION["oraErr"])){
  echo '<p id="oraErr">' .$_SESSION["oraErr"]. '</p>';
  unset($_SESSION["oraErr"]);
}


?>




<div id="selezione_data">
<h2 id="titolo_data">&#8226; Seleziona il giorno in cui desideri allenarti:</h2>

<div id="div_data" > Giorno: <input type="date" id="data" name="giorno"> </div>

<?php
if(isset($_SESSION['dataErr'])){
    $data = date("Y-m-d");
    $errore =  $_SESSION["dataErr"];
    $disp = $errore.$data;

    echo '<p id="dataErr">' .$disp. '</p>';
    unset($_SESSION['dataErr']);
}

?>

</div>

<button id="prenota" type="submit" name="prenota">Prenota</button>

<?php 

if(isset($_SESSION["prenotato"])){
  echo '<p id="prenotato">' .$_SESSION["prenotato"]. '</p>';
  unset($_SESSION["prenotato"]);
}
?>

</form>



<p id="riepilogo">Clicca <a id="btn">qui</a> per visualizzare l'indice delle tue prenotazioni</p>
    
<!-- MODAL RIEPILOGO -->
    
<div id="modal1" class="modal">

  <!-- Modal content -->
  <div class="modal_content">
    <span class="chiudi">&times;</span>
     
      <?php

$query1 = mysqli_query($con, "SELECT * FROM allenamenti WHERE username='".$_SESSION['username_log']."'");
$resultCount=mysqli_num_rows($query1);

if($resultCount == 0){

  echo '    <div id="div_vuoto">
            <p id="p_vuoto"> Ops! Non hai ancora prenotato il tuo allenamento...</p>
            <img src="immagini/sad1.svg" alt="carrello vuoto" id="img_vuoto">
            <p id="a_vuoto"><a href="Allenamento.php" > Prenotalo adesso! </a></p></div>';
}

$rows_allenamenti = array();
while($row = mysqli_fetch_assoc($query1)){
  $rows_allenamenti[] = $row;
}

for($i = 0; $i<$resultCount; $i++){

echo '

<section class="sezione">

<div class="img"> 
  <img src="./immagini/allenamento.svg" alt="avatar allenamento">
</div>

<div class="testo">
  <h2> Prenotazione Allenamento # '.$rows_allenamenti[$i]['id'].'</h2>
  <p class="descrizione"> <strong>Cavallo:</strong> '.$rows_allenamenti[$i]['cavallo'].'<strong>Campo:</strong> '.$rows_allenamenti[$i]['campo'].'
          <strong>Giorno:</strong> '.$rows_allenamenti[$i]['giorno'].' <br> <strong>Ora Inizio:</strong> '.$rows_allenamenti[$i]['inizio'].'
           <strong>Ora Fine:</strong> '.$rows_allenamenti[$i]['fine'].' </p>';
    echo'
</div>


</section>

<br>
<hr>

';

}

?>

<?php 
if($resultCount >0){
  echo '<p id="ritorno"><a href="Allenamento.php"> Continua a pianificare i tuoi allenamenti!</a></p>';};
?>


 
                </div>
        </div>


</div>

<!-- FINE CONTENITORE CENTRO1 GRIGIO --> 

 <div id="fondo">
    <p id="isola_footer"> Centro Equitazione L'isola <p>
      <p id="copyright"> Utilizzando il nostro sito, accetti i termini di utilizzo. Copyright 2019 fornito da "Isola S.p.A". Tutti i diritti riservati. </p>
    
    
</div>











 <script src="Js/allenamento.js"></script>
</body>
   
</html>











