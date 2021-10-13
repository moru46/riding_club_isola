<?php
require('database/db.php');
session_start();
?>


<!DOCTYPE html>
<html lang="it">
<head>
	<title> Strutture - C.E.L'isola </title>
	<meta charset='UTF-8'>
	<!--<link rel='stylesheet' type='text/css' href='Css/defaultCss.css'>-->
    <link rel='stylesheet' type='text/css' href='Css/strutture.css'>


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
   echo '<th><a href="indice_login.php">'.''. $_SESSION["username_log"] .'</a></th>';}
    else{ echo '<th><a href="login.php">Login</a></th>';}
  ?>  </tr>
 
</table>
  <img src="./immagini/FISE.svg" alt="fise" id="fise">
  
  <p id="isola2"> Centro Equitazione L'isola <p>

</div>

<!-- contenitore centrale, grigio, per contenere le altre div con i paragrafi -->

<!--<img src="./immagini/ferro2.png" alt="ferro" id="ferro">-->
<div id="centro_1">

  <p class="titolo_strutture">Campi di Allenamento</p>

<!-- campi allenamento -->
<section id="s1">
  <img src="./immagini/campo_A.jpg" alt="campo A" id="foto_A" class="img">
  <div id="campo_A"> 
    <h1 class="titolo_campo" id="campo_A_titolo">CAMPO A</h1>
    <p class="desc_campo" id="desc_campo_A">Campo in sabbia silicea<br> Misure: 120x70(metri)</p> 
  </div>
</section>

<section id="s2">

    <img src="./immagini/campo_coperto.jpg" class="img" alt="campo coperto" id="foto_C">
  <div id="campo_C"> 
    <h1 class="titolo_campo" id="campo_C_titolo">CAMPO COPERTO</h1>
    <p class="desc_campo" id="desc_campo_C">Campo in sabbia silicea<br> e fibra di poliestere<br> Misure: 80x35(metri)</p> 
  </div>

</section>
<section id="s3">
 <img src="./immagini/campo_tessuto_non.jpg" class="img" alt="campo B" id="foto_B">
  <div id="campo_B"> 
    <h1 class="titolo_campo" id="campo_B_titolo">CAMPO B</h1>
    <p class="desc_campo" id="desc_campo_B">Campo in sabbia silicea<br> e "tessuto non tessuto"<br> Misure: 70x50(metri)</p> 
  </div>
</section>

<br>
<hr>


<!-- tondino e giostra -->
  
    <p class="titolo_strutture">Altre strutture</p>
<section id="s4">
     <img class="img" src="./immagini/tondino.jpg" alt="tondino" id="foto_tondino">
     <div id="tondino"> 
      <h1 class="titolo_campo" id="tondino_titolo">TONDINO COPERTO</h1>
       <p class="desc_campo" id="desc_tondino">Tondino Coperto <br> Misure: 10metri(raggio) </p> 
     </div>
   </section>

      

<section id="s5">
     <img class="img" src="./immagini/giostra.jpg" alt="giostra" id="foto_giostra">
     <div id="giostra"> 
      <h1 class="titolo_campo" id="giostra_titolo">GIOSTRA</h1>
       <p class="desc_campo" id="desc_giostra">Giostra <br> Misure: 18metri(raggio) <br> Velocita' Max: 60m/min </p> 
     </div>

</section>



     <!--<hr id="hr1">-->

    <div id="box">
      <p id="tit" > Pensione Cavalli <p>
        <p id="desc_generale"> La nostra struttura moderna e funzionale ed il personale di scuderia affidabile e preparato permettono 
          a cavalli e pony una scuderizzazione ottimale. Il loro benessere è la nostra priorità:
           garantiamo un ottimo livello di alimentazione con il supporto esterno di alimentaristi.
          Il Centro mette a disposizione, per i soci che lo desiderassero, 
          professionisti con cui collabora da molti anni, 
          per prendersi cura dei cavalli in ogni aspetto: 
          veterinario, maniscalco, alimentarista, dentista, etc.<br>
           Il Centro offre la possibilità di scegliere tra pensione all'inglese e pensione completa all'italiana,
           con lettiere abbondanti e sempre pulite.<br>

        Per il benessere del tuo cavallo sono
         inoltre disponibili diverse tipologie di box <br>(3,20 x 3,20 o superiori)
          per tutte le esigenze, anche con paddok annessi.

        
      </p>
    



    </div>




  


</div>

<!-- FINE CONTENITORE CENTRO1 GRIGIO --> 

<div id="fondo">
  <p id="isola_footer"> Centro Equitazione L'isola <p>
        <p id="copyright"> Utilizzando il nostro sito, accetti i termini di utilizzo. Copyright 2019 fornito da "Isola S.p.A". Tutti i diritti riservati. </p>
</div>












</body>
</html>











