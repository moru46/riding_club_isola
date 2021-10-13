<?php
session_start();
require('database/db.php');

if(!$_SESSION['username_log'])
  header('location: ./login.php');
?>
<!DOCTYPE html>
<html lang="it">
<head>
	<title> Indice Login - C.E.L'isola  </title>
	<meta charset='UTF-8'>
	<link rel='stylesheet' type='text/css' href='Css/indice_login.css'>
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

  <?php 

  if(isset($_SESSION['username_log']))
    echo '<h1 id="benvenuto">Benvenuto ' .' '. $_SESSION["username_log"] . ' !</h1>';

  ?>

  
  <p id="descrizione_area_login"> In questa pagina puoi gestire le tue attività, il tuo profilo, gestire gli allenamenti<br> e controllare le tue spese mensili.<br><br> Basta fare click su una delle seguenti sezioni... </p>

  <!-- Profilo-->
  <a href="AreaProfilo.php"><img src="./immagini/profilo.svg" id="profilo_img" alt="profilo"></a>
  <p class="testi_serv" id="testo_profilo">Area Profilo</p>

    <!-- Area shopping-->

   <a href="AreaServizi.php"><img src="./immagini/guidepost.png" id="shop_img" alt="servizi"></a>
  <p   class="testi_serv" id="testo_shop">Servizi</p>

 <!-- gestione allenaneti-->

   <a href="Allenamento.php"><img src="./immagini/allenamento.svg" id="training_img" alt="allenamento"></a>
  <p  class="testi_serv" id="testo_training">Allenamento</p>

  <!-- pagamenti-->

   <a href="pagamenti.php"><img src="./immagini/wallet.svg" id="wallet_img" alt="pagamenti"></a>
  <p  class="testi_serv" id="testo_pay">Pagamenti</p>


  <p id="testo_logout"> Per tornare all'aera precedente, ed eseguire il logout, fai click sul pulsante </p>
  <button  onclick="location.href = './utility/logout.php';" id="bottone_logout">Logout</button>
</div>

<!-- FINE CONTENITORE CENTRO1 GRIGIO --> 

 <div id="fondo">
    <p id="isola_footer"> Centro Equitazione L'isola <p>
      <p id="copyright"> Utilizzando il nostro sito, accetti i termini di utilizzo. Copyright 2019 fornito da "Isola S.p.A". Tutti i diritti riservati. </p>  
</div>
<script src="Js/index_login.js"></script>
</body>
</html>