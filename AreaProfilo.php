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
	<title> Area Profilo - C.E.L'isola  </title>
	<meta charset='UTF-8'>
   <link rel='stylesheet' type='text/css' href='Css/AreaProfilo.css'>
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



<div id="info_profilo">

   
    <p id= "nome"><strong>Nome: </strong><?php echo $nome ?></p>
    <p id= "cognome"><strong>Cognome: </strong><?php echo $cognome ?></p>
    <p id= "email"><strong>Email: </strong><?php echo $email ?></p>
    <p id= "cavallo"><strong>Nome del cavallo: </strong><?php echo $cavallo ?></p>
    <p id= "passaporto"><strong>Passaporto Fise: </strong><?php echo $passaporto ?></p>
    <p id= "patente"><strong>Patente Fise: </strong><?php echo $patente ?></p>
    <p id= "numeropatente"><strong>Numero Patente Fise: </strong><?php echo $numeropatente ?></p>

    


    <button  onclick="location.href = './ModificaAreaProfilo.php';" id="bottone_modifica">Modifica Profilo</button>



</div>
    
    <div id="breve_desc">
    <p>Aiutaci a tenere aggiornate le informazioni relative a te e al tuo cavallo.<br> Ti preghiamo di modificare questa parte dopo aver effettuato la registrazione, e solo in caso di cambiamenti importanti(ex. vendita cavallo, cambio patente ecc.).<br> Grazie per la collaborazione!
    
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











