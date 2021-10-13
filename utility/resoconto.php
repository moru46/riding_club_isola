//passa dati da pagina orincipale servizi alla pagina di riepilogo 

<?php

require('../database/db.php');
session_start();




	$pensione = $_SESSION["pensione"];
	$paddock = $_SESSION["paddock"];
	$giostra = $_SESSION["giostra"];
	$maniscalco = $_SESSION["maniscalco"];
	$veterinario = $_SESSION["veterinario"];
	$istruttore = $_SESSION["istruttore"];
	$tipologia = $_SESSION["tipologia"];
	$mese_inizio = $_SESSION["mese_inizio"];
	$mese_fine = $_SESSION["mese_fine"];
	$totale= $_SESSION["costo"];




$query = mysqli_query($con, "SELECT* FROM registro_mensile WHERE (('$mese_inizio' BETWEEN mese_inizio and mese_fine)or('$mese_inizio' <= mese_inizio)) and username='".$_SESSION['username_log']."'");
  $row = mysqli_fetch_assoc($query);
   if($row > 0 ){

   	$_SESSION["meseErr"] = 1;
   	header('location: ../AreaServizi.php');

   } else {

   	$query2 = mysqli_query($con, "INSERT INTO registro_mensile(username, pensione, paddock, giostra, maniscalco, veterinario, istruttore, mensile,mese_inizio,mese_fine,costo,pagato)
   							VALUES('".$_SESSION['username_log']."', '$pensione', '$paddock',
                 '$giostra', '$maniscalco','$veterinario','$istruttore',
                 '$tipologia','$mese_inizio','$mese_fine','$totale',0 )	");

   	$_SESSION["prenotato"] = 1;

   	unset($_SESSION["pensione"]);
   	unset($_SESSION["paddock"]);
   	unset($_SESSION["giostra"]);
   	unset($_SESSION["veterinario"]);
   	unset($_SESSION["maniscalco"]);
   	unset($_SESSION["istruttore"]);
   	unset($_SESSION["tipologia"]);
   	unset($_SESSION["mese_fine"]);
   	unset($_SESSION["mese_inizio"]);
   	unset($_SESSION["costo"]);


	   header('location: ../AreaServizi.php');}

  ?>