<?php
require('database/db.php');
session_start();
?>


<!DOCTYPE html>
<html  lang="it">
<head>
	<title> Home - C.E.L'isola  </title>
	<meta charset='UTF-8'>
	<link rel='stylesheet' type='text/css' href='Css/Home.css' >
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
   <th><a href="help.php" id="help">Aiuto</a></th>
  </tr>

 
</table>
  <img src="./immagini/FISE.svg" alt="fise" id="fise">
  
  <p id="isola2"> Centro Equitazione L'isola <p>

</div>

<!-- contenitore centrale, grigio, per contenere le altre div con i paragrafi -->

<div id="centro_1">

<!-- loghi inizili -->
  <div id="div_benvenuto">

  	<p id="benvenuto">Benvenuto</p>
	<img src="./immagini/cavallo_destro2.svg" alt="cavallo" id="c_destro2">
	<img src="./immagini/cavallo_sinistro.svg" alt="cavallo" id="c_sinistro">
  </div>

<!-- chi siamo e prime due info -->
  <div id="info">
  	<!-- <img src="./immagini/ferro.png" alt="ferro" id="ferro"> -->


    <p id="chi_siamo"> Chi Siamo <p>
    	 <hr id="hr1">
    	 <hr id="hr2"> 

    	 <div id="intro">
       
    	 	<p>Il Centro Ippico L'isola nasce nel 1979, grazie alla passione per il mondo dell'equitazione
         dei coniugi Grazia e Giorgio Rosati. Agli albori 
           il Centro contava appena venti cavalli, sistemati dentro l'unica scuderia esistente;
            i campi di allenamento erano solamente due( il più grande, ancora in uso, 
            e un altro più piccolo sostituito nel tempo da uno spazio verde utilizzato 
            come punto di ristoro/relax). Oggi il Centro conta più di 70 cavalli, 
            organizzati in ben quattro scuderie diverse( una interna e tre esterne),
             e numerosi paddok sparsi intorno al centro, che oggi conta un estensione
              di quasi dieci ettari. Inoltre nel corso degli anni, sono state assai 
              numerose le opere di ampliamento e miglioramento dei campi di allenamento,
               con la costruzione anche di un maneggio coperto!<br>
               (per info sulle nostre strutture visitare la sezione dedicata).</p>
				</div>
				<img src="./immagini/centro_ippico.png" alt="immagine alta" id="centro_ippico">
        <img src="./immagini/centroippico.jpg" alt="immagine alta" id="centro_ippico2">


   </div>

 <!-- istrutotri del centro, con breve descriione e qualifiche -->

  <div id="istruttori_contenitore">

 	<hr id="hr3">
  <hr id="hr4"> 
  <p id="istruttori_titolo">Istruttori</p>

  
 
  <img src="./immagini/istruttori.jpg" id="coccarde1" alt="img3">
  <img src="./immagini/istruttori2.jpg" id="coccarde2" alt="img4">
    <div id="istruttori_descrizione">
      <p>Il Centro Ippico vanta al suo interno ben 3 diversi istruttori federali di secondo livello FISE.<br>
        Ognuno di essi e' qualificato, in una delle 3 maggiori discipline agonistiche legate
         al mondo dell'equitazione: Salto Ostacoli, Dressage e Endurance.
         Giulia, Ilaria e Barbara cercheranno di mettervi a vostro agio, facendovi entrare a contatto con il fantastico mondo
         dei cavalli.
         Giulia, specializzata nel salto ostacoli, ha solcato negli anni i migliori campi gara a livello italiano,
         ottenendo ottimi risultati, come ad esempio un Campionato Italiano Assoluto Amazzoni!
         Ilaria si occupa della parte relativa al Dressage, una disciplina "elegante" e tutta da scoprire.
         I principiani e le persone alle prime armi infine sono seguite da Barbara.
          Cercheremo di metterti a tuo agio nel miglior modo possibile.
          <br> Non ti resta quindi che visitare il nostro sito e scoprire altre fantastiche meraviglie.</p>
    </div>


  </div>

 
</div>

<!-- FINE CONTENITORE CENTRO1 GRIGIO --> 

 <div id="fondo">
    <p id="isola_footer"> Centro Equitazione L'isola <p>
     
      <p id="copyright"> Utilizzando il nostro sito, accetti i termini di utilizzo. Copyright 2019 fornito da "Isola S.p.A". Tutti i diritti riservati. </p>
    
    
</div>

<script src="Js/home.js"></script>
</body>
</html>











