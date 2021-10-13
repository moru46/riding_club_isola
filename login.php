<?php
session_start();
require('database/db.php');

if(isset($_SESSION['username_log'])){
  session_destroy();}

?>


<!DOCTYPE html>
<html lang="it">
<head>
	<title> Area Login - C.E.L'isola  </title>
	<meta charset='UTF-8'>
	<link rel='stylesheet' type='text/css' href='Css/login.css'>
</head>
	

<body id="body">


<!-- Barra di navigazione -->
<div id="barranav">
  <table id="link">
  <tr>
    <th><a href="Home.php"> Home </a></th>
    <th><a href="Strutture.php"> Strutture </a></th> 
    <th><a href="Info.php">Info</a></th>
    <th><a href="login.php">Login</a></th>
  </tr>
 
</table>
  <img src="./immagini/FISE.svg" alt="fise" id="fise">
  
  <p id="isola2"> Centro Equitazione L'isola <p>

</div>

<!-- contenitore centrale, grigio, per contenere le altre div con i paragrafi -->

<div id="centro_1">
 
    <form  action="./utility/registrazione.php" method="post">
    <div id="registrazione">
        <h1 id="registrati_ora">Registrati</h1>

    <label class="label_reg" ><b>Nome</b>
    <input type="text" placeholder="Inserisci Nome" name="nome" >
    </label>

    <label class="label_reg" ><b>Cognome</b>
    <input type="text" placeholder="Inserisci Cognome" name="cognome" ></label>

    <label class="label_reg" ><b>Username</b>
    <input type="text" placeholder="Inserisci Username" name="username" ></label>

    <label class="label_reg" ><b>Email</b>
    <input type="text" placeholder="Inserisci Email" name="email" ></label>

    <label class="label_reg" ><b>Password</b>
    <input type="password" placeholder="Inserisci Password" name="psw" ></label>

    <label class="label_reg"><b>Ripeti Password</b>
    <input type="password" placeholder="Ripeti Password" name="psw_repeat" ></label>

    <div id="div_button">
    <p id="termini"> Creando un account accetti i nostri <a href="#">Termini e Condizioni</a>. </p>
   

    <button type="submit" id="bottone_reg">Registrati</button>
     </div>      

<?php

if(isset($_SESSION["emailErr"])){
  echo '<p class="errori_reg" id="emailErr">'.$_SESSION['emailErr'].'</p>';
  unset($_SESSION['emailErr']);
}

if(isset($_SESSION["nomeErr"])){
  echo '<p class="errori_reg" id="nomeErr">' .$_SESSION["nomeErr"]. '</p>';
  unset($_SESSION['nomeErr']);
}

if(isset($_SESSION["cognomeErr"])){
  echo '<p class="errori_reg" id="cognomeErr">' .$_SESSION["cognomeErr"]. '</p>';
  unset($_SESSION['cognomeErr']);
}

if(isset($_SESSION["usernameErr"])){
  echo '<p class="errori_reg" id="usernameErr">' .$_SESSION["usernameErr"]. '</p>';
  unset($_SESSION['usernameErr']);
}

if(isset($_SESSION["pswErr"])){
  echo '<p class="errori_reg" id="pswErr">' .$_SESSION["pswErr"]. '</p>';
  unset($_SESSION['pswErr']);
}

if(isset($_SESSION["psw_repeatErr"])){
  echo '<p class="errori_reg" id="psw_repeatErr">' .$_SESSION["psw_repeatErr"]. '</p>';
  unset($_SESSION['psw_repeatErr']);
}

if(isset($_SESSION['registrato'])){
    echo '<p id="registrato">' .$_SESSION["registrato"]. '</p>';
    unset($_SESSION['registrato']);


}
?>

    </div>

  </form>





  <!-- login form -->

   <form action="./utility/accesso.php" method="post">
     <div id="div_login">
         <h1 id="accedi">Accedi</h1>

    <label class="label_reg" ><b>Username</b>
    <input type="text" placeholder="Inserisci Username" name="username_log" required ></label>

    <label class="label_reg"><b>Password</b>
    <input type="password" placeholder="Inserisci Password" name="psw_log" required></label>

    <button type="submit" id="bottone_log">Accedi</button>



   

  <?php if(isset($_SESSION["errore_log"])){
  echo '<p class="errori_reg" id="errore_log">' .$_SESSION["errore_log"]. '</p>';
  unset($_SESSION['errore_log']);}?>
    
    </div>
  </form>
    
    
    
<button id="apri_reg"
        onclick="cambia1()">Registrati</button>
    
<button id="apri_log" onclick="cambia2()">Accedi</button>

</div>
<!-- FINE CONTENITORE CENTRO1 GRIGIO --> 

 <div id="fondo">
    <p id="isola_footer"> Centro Equitazione L'isola <p>
      <p id="copyright"> Utilizzando il nostro sito, accetti i termini di utilizzo. Copyright 2019 fornito da "Isola S.p.A". Tutti i diritti riservati. </p>
    
    
</div>

   
</body>
 <script src="Js/login.js"></script>

</html>



   

    







