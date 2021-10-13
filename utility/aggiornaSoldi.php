<?php

require('../database/db.php');
session_start();

$query1 = mysqli_query($con, "SELECT * FROM registro_mensile ORDER BY id");
$resultCount1=mysqli_num_rows($query1);
if($resultCount1 == 0){

  echo '    
            <div id="div_vuoto">
            <p id="p_vuoto"> <strong>Attenzione!</strong></p>
            <img src="immagini/sad_money.svg" alt="carrello vuoto" id="img_vuoto">
            <p id="a_vuoto"> Nessuna prenotazione presente in memoria</p></div>';
            
}

$rows_prenotazione = array();
while($row = mysqli_fetch_assoc($query1)){
  $rows_registro_mensile[] = $row;
}

for($i = 0; $i<$resultCount1; $i++){

echo '

<section class="sezione">

<div class="img_soldi"> ';
  if($rows_registro_mensile[$i]['pagato'] == 0){echo'<img src="./immagini/hand.svg" alt="avatar">';}
    if($rows_registro_mensile[$i]['pagato'] == 1){echo'<img src="./immagini/time.svg" alt="avatar">';}
      if($rows_registro_mensile[$i]['pagato'] == 2){echo'<img src="./immagini/like.svg" alt="avatar">';};
  
  echo'
  <h2>Utente: '.$rows_registro_mensile[$i]['username'].' <br> Periodo: dal '.$rows_registro_mensile[$i]['mese_inizio'].' al '.$rows_registro_mensile[$i]['mese_fine'].'
           <br><strong>Costo:</strong> '.$rows_registro_mensile[$i]['costo'].' &euro;</h2>';
           if($rows_registro_mensile[$i]['pagato'] == 0){echo'<p class="pagato"><strong>Pagato:</strong> No</p>';} 
            if($rows_registro_mensile[$i]['pagato'] == 1){echo'<p id="attesa"><strong>Stato pagamento:</strong> In attesa di conferma</p>';}
               if($rows_registro_mensile[$i]['pagato'] == 2){echo'<p class="pagato"><strong>Pagato:</strong>Si</p>';}
    if($rows_registro_mensile[$i]['pagato'] == 1){
      echo'
    <form class="conferma" action="utility/conferma_pagamento.php" method="post">
     <input value="Conferma"  type="submit" name="'.$rows_registro_mensile[$i]['id'].'">
    </form>
     <form class="cancella" action="utility/cancella_prenotazione.php" method="post">
     <input value="Cancella"  type="submit" name="'.$rows_registro_mensile[$i]['id'].'">
    </form>';
         };
echo'
</div>
</section>
<br>
<hr>
';}
?>   