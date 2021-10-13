<?php

require('../database/db.php');
session_start();

if(isset($_POST['username_log'])){

	$username_log = stripslashes($_REQUEST['username_log']); //rimuove slash e roba varia

	$username_log = mysqli_real_escape_string($con, $username_log); //boh

	 $password_log = stripslashes($_REQUEST['psw_log']);

 	$password_log = mysqli_real_escape_string($con,$password_log);

 	$risultato = mysqli_query($con, "SELECT * FROM registrazioni WHERE username ='$username_log'
 										and password = '".md5($password_log)."'")
 					or die(mysqli_error());

 	$row1 = mysqli_num_rows($risultato);
 	$row2 =  mysqli_fetch_assoc($risultato);

 	$admin = $row2["admin"];

 	if($row1 == 1){
 		/*$nome = mysqli_query($con, "SELECT nome FROM registrazioni WHERE username = '$username_log'") or die(mysqli_error());
 		   $_SESSION['username_log'] = $username_log;*/
 		   if($admin == 1){$_SESSION['username_log'] = $username_log;
							header("location: ../admin_home.php");}
			else{$_SESSION['username_log'] = $username_log;
							header("location: ../indice_login.php");}}
 			else {
 				$_SESSION["errore_log"] = "Username o Password errati ! Riprova";
 				header("location: ../login.php");
 			}
 	
}




























	

?>


