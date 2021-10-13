<?php
session_start();
require('database/db.php');
?>
<?php
if(!$_SESSION['username_log']){
header('location: ./login.php');
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
	<title>Pagamenti - C.E.L'isola  </title>
	<meta charset='UTF-8'>
	<link rel='stylesheet' type='text/css' href='Css/pagamenti.css'>
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

$query1 = mysqli_query($con, "SELECT * FROM registro_mensile WHERE username='".$_SESSION['username_log']."'");
$resultCount=mysqli_num_rows($query1);


if($resultCount == 0){

  echo '    <div id="div_vuoto">
            <p id="p_vuoto"> Ops! Sembra che tu non abbia ancora sottoscritto un abbonamento</p>
            <img src="immagini/sad1.svg" alt="carrello vuoto" id="img_vuoto">
            <p id="a_vuoto"><a href="AreaServizi.php" > Fallo subito! </a></p></div>';
}

$rows_prenotazione = array();
while($row = mysqli_fetch_assoc($query1)){
  $rows_registro_mensile[] = $row;
}

for($i = 0; $i<$resultCount; $i++){
  /* PER PAGARE*/



echo '

<section class="sezione">

<div class="img"> ';
  if($rows_registro_mensile[$i]['pagato'] == 0){echo'<img src="./immagini/x-button.svg" alt="avatar">';}
    if($rows_registro_mensile[$i]['pagato'] == 1){echo'<img src="./immagini/minus.svg" alt="avatar">';}
      if($rows_registro_mensile[$i]['pagato'] == 2){echo'<img src="./immagini/spunta.svg" alt="avatar ">';};
    echo'
</div>

<div class="testo">
  <h2> Periodo: dal '.$rows_registro_mensile[$i]['mese_inizio'].' al '.$rows_registro_mensile[$i]['mese_fine'].'</h2>
  <p class="pensione"> <strong>Tipo pensione:</strong> '.$rows_registro_mensile[$i]['pensione'].'</p><br>';

  if($rows_registro_mensile[$i]['paddock'] == 0){ echo'<p class="paddock"><strong>Paddock:</strong> No</p>';}
     else{ echo '<p class="paddock"><strong>Paddock:</strong> Si</p>';};// echo'<br>';
  if($rows_registro_mensile[$i]['giostra'] == 0){ echo'<p class="giostra"><strong>Giostra:</strong> No</p>';} 
      else{ echo '<p class="giostra"><strong>Giostra:</strong> Si</p>';};//echo'<br>';
  if($rows_registro_mensile[$i]['veterinario'] == 0){ echo'<p class="veterinario"><strong>Veterinario:</strong> No</p>';} 
      else{ echo '<p class="veterinario"><strong>Veterinario:</strong> Si</p>';};//echo'<br>';
  if($rows_registro_mensile[$i]['maniscalco'] == 0){ echo'<p class="maniscalco"><strong>Maniscalco:</strong> No</p>';}
     else{ echo '<p class="maniscalco"><strong>Maniscalco:</strong> Si</p>';};//echo'<br>';
  
    echo'

          <p class="istruttore"><strong>Istruttore:</strong> '.$rows_registro_mensile[$i]['istruttore'].'</p>
          <p class="mensile"><strong>Mensile:</strong> '.$rows_registro_mensile[$i]['mensile'].'</p>
           <p class="costo"><strong>Costo:</strong> '.$rows_registro_mensile[$i]['costo'].' &euro;</p>';
           if($rows_registro_mensile[$i]['pagato'] == 0){echo'<p class="pagato"><strong>Pagato:</strong> No</p>';} 
            if($rows_registro_mensile[$i]['pagato'] == 1){echo'<p class="pagato"><strong>Pagato:</strong> In attesa di conferma</p>';}
               if($rows_registro_mensile[$i]['pagato'] == 2){echo'<p class="pagato"><strong>Pagato:</strong>Si</p>';}
    if($rows_registro_mensile[$i]['pagato'] == 0){
      echo'
    <form class="prenota" action="utility/conferma_prenotazione.php" method="post">
     <input value="Paga Adesso !" class="pagamento" type="submit" name="'.$rows_registro_mensile[$i]['id'].'">
    </form>';
         };
echo'
</div>


</section>

<br>
<hr>

';


}

?>

<?php 
if($resultCount >0){
  echo '<p id="ritorno"><a href="AreaServizi.php"> Ritorna all&rsquo;area prenotazione!</a></p>';};
?>


 
</div>













</body>
</html>











