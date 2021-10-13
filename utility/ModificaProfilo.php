<?php

require('../database/db.php'); //in questo modo ho incluso la connessione con il mio databse, ovvero la connession è richiesta

session_start();

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if(empty($_POST["patente"])) {
	$patenteErr = "Inserire il tipo di patente: A,B,G1 o G2";
	$errore = 1;
	} 
else {
	
	$patente = test_input($_POST["patente"]);
	/*if($_POST["patente"] != 'A' or $_POST["patente"] != 'B' or $_POST["patente"] != 'G1' or $_POST["patente"] != 'G2'){
		$patenteErr = "Si prega di inserire un tipo di patente valido";
	$errore = 1;*/
	}
	


if(isset($patenteErr)){ 
	$_SESSION["patenteErr"] = $patenteErr; 
}


if(empty($_POST["numero_patente"])) {
	$numero_patenteErr = "Inserire il numero di patente";
	$errore = 1;
	} 
else {
	
	$numero_patente = test_input($_POST["numero_patente"]);
	}
	


if(isset($numero_patenteErr)){ 
	$_SESSION["numero_patenteErr"] = $numero_patenteErr; 
}

if(empty($_POST["cavallo"])) {
	$cavalloErr = "Inserire il nome del cavallo";
	$errore = 1;
	} 
else {
	
	$cavallo = test_input($_POST["cavallo"]);
	}
	


if(isset($cavalloErr)){ 
	$_SESSION["cavalloErr"] = $cavalloErr; 
}

if(empty($_POST["passaporto"])) {
	$passaportoErr = "Inserire il numero di passaporto";
	$errore = 1;
	} 
else {
	
	$passaporto = test_input($_POST["passaporto"]);
	}
	


if(isset($passaportoErr)){ 
	$_SESSION["passaportoErr"] = $passaportoErr; 
}


if($errore == NULL){
	$update = mysqli_query($con, "UPDATE profilo SET patenteFise ='$patente', numeroPatente ='$numero_patente', 
		cavallo = '$cavallo', numeroPassaportoCavallo = '$passaporto' WHERE username ='".$_SESSION['username_log']."' ");

	 header("location: ../AreaProfilo.php");
}else  header("location: ../ModificaAreaProfilo.php");