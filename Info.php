<?php
require('database/db.php');
session_start();
?>


<!DOCTYPE html>
<html lang="it">
<head>
	<title> Info - C.E.L'isola </title>
	<meta charset='UTF-8'>
	<link rel='stylesheet' type='text/css' href='Css/Info.css'>
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


<div id="centro_1">

  <div id="div_prezzi">

    <table id="prezzi">
      <caption>PREZZI PENSIONE</caption>
  <tr>
    <td>Pensione mensile americana</td>
    <td>€300</td>
  </tr>
  <tr>
    <td>Pensione mensile italiana</td>
    <td>€350</td>
  </tr>
   <tr>
    <td>Pensione mensile paddock</td>
    <td>€230</td>
  </tr>
  <tr>
    <td>Giostra mensile</td>
    <td>€50</td>
  </tr>
   <tr>
    <td>Paddock mensile</td>
    <td>€50</td>
  </tr>
  <tr>
    <td>Servizio maniscalco(cad. uno)</td>
    <td>€75</td>
  </tr>
  <tr>
    <td>Servizio veterinario(visita controllo)</td>
    <td>€40</td>
  </tr>
</table> 

<p id="extra_prezzi">
  Si fa presente alla gentile clientela che i suddetti prezzi sono indicativi e possono subire variazioni in base alle necessita', e alle richieste di ogni singolo cliente. Inoltre, e' data la possbilità al cliente di creare delle particolari combinazioni tra pensione, servizi ecc, il tutto previa consulta con la direzione.
  Ulteriori informazioni saranno disponibili nella relativa sezione, una volta effettuata la registrazione e il login. 
</p>
</div>

<div id="div_lezioni"> 

 <h1 id="titolo_descrizione_istruttori">COSTO LEZIONI</h1>

 <p id="descrizione_lezioni">
  Come descitto nella nostra Home, il centro conta ben tre diversi istruttori, ognuno dei quali specializzato in una determinata disciplina.
  Per tanto, nulla vieta ad un singolo cliente, di poter seguire contemporaneamente le lezioni di uno, due o addirittura tre istruttori differenti. Per orari e organizzazione si lascia la libertà al cliente di accordarsi direttamente con l'istruttore, tramite l'apposito portale interattivo, consultabile dalla propria pagina dopo la registrazione e il login.

</p>

 <table id="prezzi_lezioni_giulia">
  <caption>Giulia(salto ostacoli)</caption>
  <tr>
    <td>Singola lezione</td>
    <td>€10</td>
  </tr>
  <tr>
    <td>Mensile ridotto(max. 2 volte sett.)</td>
    <td>€80</td>
  </tr>
   <tr>
    <td>Mensile completo</td>
    <td>€120</td>
  </tr>
 
</table> 

<table id="prezzi_lezioni_ilaria">
  <caption>Ilaria(dressage)</caption>
  <tr>
    <td>Singola lezione</td>
    <td>€13</td>
  </tr>
  <tr>
    <td>Mensile ridotto(max. 2 volte sett.)</td>
    <td>€100</td>
  </tr>
   <tr>
    <td>Mensile completo</td>
    <td>€140</td>
  </tr>
 
</table> 

<table id="prezzi_lezioni_barbara">
  <caption>Barbara(scuola)</caption>
  <tr>
    <td>Singola lezione</td>
    <td>€10</td>
  </tr>
  <tr>
    <td>Mensile ridotto1(max. 2 volte sett.)</td>
    <td>€80</td>
  </tr>
   <tr>
    <td>Mensile ridotto2(max. 3 volte sett.)</td>
    <td>€100</td>
  </tr>
  <tr>
    <td>Mensile completo</td>
    <td>€135</td>
  </tr>
 
</table> 
</div>

<div id="indicazioni">

  <p id="dove_siamo"> Dove siamo <p>

  <p id="descrizione_dove_siamo">
    Il C.E L'isola si trova immerso nello splendido "Parco Naturale di San Rossore-Migliarino-Massaciuccoli", precisamente nel compune di "Coltano", in provincia di Pisa. Il centro è facilmente raggiungibile tramite la via Aurelia (svincolo "Mortellini") venendo da Pisa, oppure tramite la SS. Arnaccio se si proviene da Livorno.
  </p>
</div>

 <p id="link_navigatore"> Indirizzo : <a href="https://www.google.com/maps/place/Centro+Equitazione+Isola/@43.6260184,10.3881397,17z/data=!3m1!4b1!4m5!3m4!1s0x12d5932b95d53f01:0xbcef11420a098b99!8m2!3d43.6260184!4d10.3903284"  target="_blank"> Via del'isola 2 Coltano(Pi)</a>
   </p>
 </div>
 

<!-- FINE CONTENITORE CENTRO1 GRIGIO --> 

<div id="fondo">
     <p id="isola_footer"> Centro Equitazione L'isola <p>
      <p id="copyright"> Utilizzando il nostro sito, accetti i termini di utilizzo. Copyright 2019 fornito da "Isola S.p.A". Tutti i diritti riservati. </p>
</div>


</body>
<script src="Js/info.js"></script>

</html>











