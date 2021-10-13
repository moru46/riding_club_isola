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
	<title> Area Servizi - C.E.L'isola  </title>
	<meta charset='UTF-8'>
	
    <link rel='stylesheet' type='text/css' href='Css/AreaServizi.css'>

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

<h2 id="titolo"> In questa area è possibile gestire le proprie spese mensili, selezionando il tipo di pensione,<br> gli istruttori, e i vari tipi di confort per il proprio cavallo.<br> Ti ricordiamo che puoi cambiare questi parametri solo una volta al mese<br>(il mese viene conteggiato a partire dalla data scelta per 30 giorni).<br>Per eventuali problemi e cambiamenti rivolgersi alla direzione.</h2>

<!-- RICORDATI DI CAMBIARE INDIRIZZO FORM-->
<form id="form" action="./test.php" method="post">

<h2 class="titolo_sec">&#8226; Seleziona il tipo di pensione:</h2>

<section>
  <div id="it">
<img src="./immagini/italy.svg" class="bandiera" alt="italy" id="italy">
<label id="label_it"> Italiana 
 <input type="radio" checked="checked" name="pensione" value="italiana"> </label>
</div>


<div id="usa_div">
<img src="./immagini/usa.svg" class="bandiera" alt="usa" id="usa">
<label id="label_usa"> Americana 
 <input type="radio"  name="pensione" value="americana"> </label>
</div>


<div id="uk_div">
<img src="./immagini/uk.svg" class="bandiera" alt="uk" id="uk">
<label id="label_uk"> Inglese 
 <input type="radio"  name="pensione" value="inglese"> </label>
</div>

</section>

<section id="extra">
 
 <h2 class="titolo_sec">&#8226; Aggiungi qualche extra alla pensione del tuo cavallo:</h2>



<div id="div_paddock">
<img src="./immagini/paddock.svg" class="extra_svg" alt="paddock" id="paddock">
<label id="label_paddock"> Paddock 
 <input type="checkbox" name="paddock" value="1" class="extra"> </label>
</div>

 <div id="div_giostra">
<img src="./immagini/carousel.svg" class="extra_svg" alt="giostra" id="giostra">
<label id="label_giostra"> Giostra 
 <input type="checkbox" name="giostra" value="1" class="extra"> </label>
</div>

<div id="div_maniscalco">
<img src="./immagini/ferro2.svg" class="extra_svg" alt="maniscalco" id="maniscalco" >
<label id="label_maniscalco"> Maniscalco 
 <input type="checkbox" name="maniscalco" value="1" class="extra"> </label>
</div>

<div id="div_veterinario">
<img src="./immagini/veterinarian.svg" class="extra_svg" alt="veterinario" id="veterinario">
<label id="label_veterinario"> Veterinario 
 <input type="checkbox" name="veterinario" value="1" class="extra"> </label>
</div>

</section>

<section id="istruttori">

   <h2 class="titolo_sec">&#8226; Scegli un istruttore e il tipo di mensile:</h2>

   <div id="div_giulia">
    <p> Amazzone 2' Grado<br> Istruttore 2' livello FISE<br> Specialita': salto ostacoli</p>
    <label id="label_istruttore_g"> Giulia 
     <input type="radio" checked="checked"  name="istruttore" value="Giulia" > <br>
   <!--    <label class="tipologia_contenitore">Mensile
         <select class="select" name="tipologia" >
           <option  selected="true" disabled="disabled"> </option>
          <option>Ridotto</option>
          <option>Completo</option>
         </select>
      </label> -->
      
      </label>
    </div>

    <div id="div_ilaria">
    <p> Amazzone 2' Grado<br> Istruttore 2' livello FISE<br> Specialita': salto ostacoli</p>
    <label id="label_istruttore_i"> Ilaria 
     <input type="radio" name="istruttore" value="Ilaria"  > <br>
  <!--    <label class="tipologia_contenitore">Mensile
         <select class="select"  name="tipologia" >
          <option  selected="true" disabled="disabled"> </option>
          <option>Ridotto</option>
          <option>Completo</option>
         </select>
       </label>-->
       </label>
    </div>

    <div id="div_barbara">
    <p> Amazzone 2' Grado<br> Istruttore 2' livello FISE<br> Specialita': salto ostacoli</p>
    <label id="label_istruttore_b"> Barbara 
     <input type="radio" name="istruttore" value="Barbara"  ><br>
  <!--    <label class="tipologia_contenitore">Mensile
         <select class="select"  name="tipologia" >
          <option  selected="true" disabled="disabled"></option>
          <option>Ridotto</option>
          <option>Completo</option>
         </select>
          </label>-->
           </label>
    </div>

    <label id="label_mese">Seleziona il tipo di corso:
         <select name="tipologia" >
          <option>Ridotto</option>
          <option>Completo</option>
         </select>
       </label>

</section>



<section id="mese">


  <label> Da quando vuoi usufruire di tale configurazione?<br>
  <input type="date" id="data" name="mese" ></label>

</section>


<button type="submit" id="bottone">Prosegui</button>
    




</form> <!-- CHIUSURA FORM --> 

<?php

if(isset($_SESSION["prenotato"])){
  echo"
  <script type='text/javascript'>alert('Confratulazioni, la prenotazione è andata a buon fine');</script>;
  ";
  unset($_SESSION["prenotato"]);

}

if(isset($_SESSION["meseErr"])){
 echo"
  <script type='text/javascript'>alert('Errore,data coincidente con il mese precedente');</script>;
  ";
  unset($_SESSION["meseErr"]);}
?> 
</div>

<!-- FINE CONTENITORE CENTRO1 GRIGIO --> 

 <div id="fondo">
 
       <p id="isola_footer"> Centro Equitazione L'isola <p>
      <p id="copyright"> Utilizzando il nostro sito, accetti i termini di utilizzo. Copyright 2019 fornito da "Isola S.p.A". Tutti i diritti riservati. </p>
    
    
</div>












</body>
</html>











