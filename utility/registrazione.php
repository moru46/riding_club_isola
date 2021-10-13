<?php

require('../database/db.php'); //in questo modo ho incluso la connessione con il mio databse, ovvero la connession è richiesta

session_start();

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$errore = NULL;

//controllo se il campo nome è stato riempito, se si eseguo il test
if(empty($_POST["nome"])) {
	$nomeErr = "Inserire il nome";
	$errore = 1;
	} 
else {
	
	$nome = test_input($_POST["nome"]);
	
	if(!preg_match("/^[a-zA-Z ]*$/", $nome)) {
		$nomeErr = "Solo lettere e spazi bianchi";
		$errore = 1;
}

}

if(isset($nomeErr)){ //se la variebile $nomeErr è stata settata
	$_SESSION["nomeErr"] = $nomeErr; //passo tramite SESSION la variabile nomeErr che mi servirà per stamoare a video l'errore

}

if(empty($_POST["cognome"])) {
	$cognomeErr = "Inserire il cognome";
		$errore = 1;

	} 
else {
	
	$cognome = test_input($_POST["cognome"]);
	
	if(!preg_match("/^[a-zA-Z ]*$/", $cognome)) {
		$cognomeErr = "Solo lettere e spazi bianchi";
		$errore = 1;
}

}

if(isset($cognomeErr)){ //se la variebile $nomeErr è stata settata
	$_SESSION["cognomeErr"] = $cognomeErr; //passo tramite SESSION la variabile nomeErr che mi servirà per stamoare a video l'errore
}

if (empty($_POST["psw"])) {
	$pswErr = "Inserire una password";
		$errore = 1;
;

}
else {
	$psw = $_POST["psw"];

         /*   if (strlen($psw) <= '5') {
            $pswErr = "Inserire almeno 5 caratteri";
            	$errore = 1;
            
            }
            elseif (!preg_match("#[0-9]+#",$psw)) {
                $pswErr = "Inserire almeno un numero";
                	$errore = 1;

               
            }
            elseif(!preg_match("#[A-Z]+#",$psw)) {
                $pswErr = "Inserire almeno un carattere maiuscolo";
                	$errore = 1;

                
            }
            elseif(!preg_match("#[a-z]+#",$psw)) {
                $pswErr = "Inserire almeno un carattere minuscolo";
                	$errore = 1;

               
            }*/
          
   }

 if(isset($pswErr)){
 	$_SESSION["pswErr"] = $pswErr;
 }

 if(empty($_POST["psw_repeat"])) {
 	$psw_repeatErr = "Reinserire password";
 		$errore = 1;

 }
else {
	$psw_repeat = $_POST["psw_repeat"];
	$psw_repeat = test_input($_POST["psw_repeat"]);
	if($psw != $psw_repeat){
		$psw_repeatErr = "Psw non coincidenti";
			$errore = 1;

	}
}

if(isset($psw_repeatErr)){
	$_SESSION["psw_repeatErr"] = $psw_repeatErr;
}


/* EMAIL */

if(empty($_POST["email"])){
	$emailErr = "Inserire la mail";
	$errore = 1;
}

else {
	$email = test_input($_POST["email"]);
}

if(!filter_var($email,FILTER_VALIDATE_EMAIL)){ //serve per validqare le email
	$emailErr = "Formato non valido";
	$errore = 1;
}

//adesso guardo se nel database esiste gia unamail simile
/*
$query_email = "SELECT * FROM Registrazioni WHERE email = '".$email."'";*/
$result_email = mysqli_query($con, "SELECT * FROM Registrazioni WHERE email = '".$email."'"); //mi da i risultati
$result_email_num = mysqli_num_rows($result_email); //conta il numero din risultati

if($result_email_num > 0) {
	$emailErr = "Email gia' utilizzata";
	$errore = 1;
}

if(isset($emailErr)){
	$_SESSION["emailErr"] = $emailErr;
}


if(empty($_POST["username"])){
	$usernameErr = "Inserire Username";
	$errore = 1;
}else {
	$username = test_input($_POST["username"]);
	$result_username = mysqli_query($con, "SELECT * FROM Registrazioni WHERE username = '".$username."'"); //mi da i risultati
	$result_username_num = mysqli_num_rows($result_username); //conta il numero din risultati
	if($result_username_num > 0){
		$usernameErr = "Username gia' utilizzato";
		$errore = 1;
	}
}

if(isset($usernameErr)){
	$_SESSION["usernameErr"] = $usernameErr;
}


if($errore == NULL) {
	

	$result = mysqli_query($con, "INSERT into registrazioni (email, nome, cognome, username,password,admin)
				VALUES ('$email', '$nome', '$cognome', '$username', '".md5($psw)."', 0)"); // invio la query
	$registrato = "Registrato con successo! Prova ad effettuare il login";
	 $_SESSION['registrato'] = $registrato;

	 $result2 = mysqli_query($con, "INSERT INTO profilo (email, nome, cognome, username)
	 							VALUES ('$email', '$nome', '$cognome', '$username')");
	 
	 

    header("location: ../login.php"); //utilizzato per reinidrizzare la pagina dopo il php
        
    } else header('location: ../login.php')

?>





















