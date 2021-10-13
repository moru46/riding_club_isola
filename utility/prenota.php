<?php 
require('../database/db.php');
session_start();

 $query = mysqli_query($con, "SELECT username, cavallo FROM profilo WHERE username='".$_SESSION['username_log']."'");
  $row = mysqli_fetch_assoc($query);
    $username = $row['username'];
    $cavallo = $row['cavallo'];

    $errore = NULL;


    if(isset($_POST['Campo'])) {
    	$campo = $_POST['Campo'];}

    if(isset($_POST['ora_inizio'])){
    	$ora_inizio = $_POST['ora_inizio'];
    }

    if(isset($_POST['ora_fine'])){
    	$ora_fine = $_POST['ora_fine'];
    }

    if($ora_fine <= $ora_inizio) {
        $oraErr = " l'ora di fine deve essere maggiore dell'ora di inizio";
        $errore = 1;} 
            else if(($ora_fine - $ora_inizio) > "2.00.00"){
                     $oraErr = "non è possibile prenotare il campo per piu' di due ore";
                    $errore = 1;} 



    if(isset($_POST['giorno'])){
    	$giorno = $_POST['giorno'];
    }

    if($giorno <= date("Y-m-d")){
                $errore = 1;
                $dataErr = "E' possibile prenotare il campo solo per giorni successivi al ";
    }

if(isset($oraErr)){
    $_SESSION["oraErr"] = $oraErr;
}

if(isset($dataErr)){
    $_SESSION["dataErr"] = $dataErr;
}



    
if($errore == NULL){
$query2 = mysqli_query($con, "INSERT INTO allenamenti(username, cavallo, campo, inizio, fine, giorno)
								VALUES('$username', '$cavallo', '$campo', '$ora_inizio', '$ora_fine', '$giorno')");
$_SESSION["prenotato"] = "Campo prenotato !";

header('location: ../Allenamento.php');} 
    else {header('location: ../Allenamento.php');}


?>