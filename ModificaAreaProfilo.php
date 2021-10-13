<?php
session_start();
require('database/db.php');

  $query = mysqli_query($con, "SELECT* FROM profilo WHERE username='".$_SESSION['username_log']."'");
  $row = mysqli_fetch_assoc($query);
    $nome = $row['nome'];
    $cognome = $row['cognome'];
    $email = $row['email'];
    $username = $row['username'];
    $patente = $row['patenteFise'];
    $numeropatente = $row['numeroPatente'];
    $cavallo = $row['cavallo'];
    $passaporto  = $row['numeroPassaportoCavallo'];

?>

<?php
if(!$_SESSION['username_log']){
header('location: ./login.php');
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
	<title> Gestione Area Profilo - C.E.L'isola  </title>
	<meta charset='UTF-8'>
	
    <link rel='stylesheet' type='text/css' href='Css/ModificaAreaProfilo.css'>

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

<img src="./immagini/user.png" alt="profilo" id="avatar">
 <p id= "username"><strong><?php echo $username ?></strong></p>
<div id="modifica_profilo">
  <form action="./utility/ModificaProfilo.php" method="post">
    
    <label class="label" ><b>Patente Fise</b>
    <input id="input_patente" type="text" placeholder="Inserisci la patente Fise" name="patente" ></label>
   
    <label class="label"  ><b>Numero Patente Fise</b>
    <input id="input_numero" type="text" placeholder="Inserisci il numero della patente Fise" name="numero_patente" ></label>

    <label class="label"  ><b>Nome Cavallo</b>
    <input id="input_cavallo" type="text" placeholder="Inserisci il nome del cavallo" name="cavallo" ></label>

    <label class="label" ><b>Numero passaporto cavallo</b>
    <input id="input_passaporto" type="text" placeholder="Inserisci il numero del passaporto Fei" name="passaporto" > </label>

    <button type="submit" id="bottone_modifica">Modifica Profilo</button>
  </form>  


<!-- <div id="valori_precedenti">
    <p id= "cavallo_pre"><strong><?php echo $cavallo ?></strong></p>
    <p id= "passaporto_pre"><strong><?php echo $passaporto ?></strong></p>
    <p id= "patente_pre"><strong><?php echo $patente ?></strong></p>
    <p id= "numeropatente_pre"><strong><?php echo $numeropatente ?></strong></p>
</div> -->

<?php
if(isset($_SESSION["patenteErr"])){
  echo '<p class="errori_reg" id="patenteErr">'.$_SESSION['patenteErr'].'</p>';
  unset($_SESSION['patenteErr']);
}


if(isset($_SESSION["numero_patenteErr"])){
  echo '<p class="errori_reg" id="numero_patenteErr">' .$_SESSION["numero_patenteErr"]. '</p>';
  unset($_SESSION['numero_patenteErr']);
}

if(isset($_SESSION["cavalloErr"])){
  echo '<p class="errori_reg" id="cavalloErr">' .$_SESSION["cavalloErr"]. '</p>';
  unset($_SESSION['cavalloErr']);
}

if(isset($_SESSION["passaportoErr"])){
  echo '<p class="errori_reg" id="passaportoErr">' .$_SESSION["passaportoErr"]. '</p>';
  unset($_SESSION['passaportoErr']);
}
 ?>
</div>


</div>
  


<!-- FINE CONTENITORE CENTRO1 GRIGIO --> 

 <div id="fondo">
       <p id="isola_footer"> Centro Equitazione L'isola <p>
      <p id="copyright"> Utilizzando il nostro sito, accetti i termini di utilizzo. Copyright 2019 fornito da "Isola S.p.A". Tutti i diritti riservati. </p>
    
    
</div>












</body>
</html>











