<?php

require('../database/db.php');
session_start();

$query2 = mysqli_query($con, "SELECT * FROM allenamenti ORDER BY id desc");
$resultCount2=mysqli_num_rows($query2);

if($resultCount2 == 0){

  echo '    
            <div id="div_vuoto">
            <p id="p_vuoto"> <strong>Attenzione!</strong></p>
            <img src="immagini/sad_training.svg" alt="carrello vuoto" id="img_vuoto">
            <p id="a_vuoto"> Nessuna prenotazione presente in memoria</p></div>';
            
}

$rows_allenamenti = array();
while($row = mysqli_fetch_assoc($query2)){
  $rows_allenamenti[] = $row;
}

for($i = 0; $i<$resultCount2; $i++){

echo '
          <section class="sezione_allenamento">

          <div class="img_training"> 
            <img src="./immagini/allenamento.svg" alt="avatar allenamento">
          </div>

          <div class="testo_training">
            <h2>Utente: '.$rows_allenamenti[$i]['username'].' - Prenotazione # '.$rows_allenamenti[$i]['id'].'</h2>
            <p class="descrizione"> <strong>Cavallo:</strong> '.$rows_allenamenti[$i]['cavallo'].'<strong> Campo:</strong> '.$rows_allenamenti[$i]['campo'].'
                    <strong>Giorno:</strong> '.$rows_allenamenti[$i]['giorno'].' <br> <strong>Ora Inizio:</strong> '.$rows_allenamenti[$i]['inizio'].'
                     <strong>Ora Fine:</strong> '.$rows_allenamenti[$i]['fine'].' </p>
              <form class="form_rimuovi" action="utility/CancellaAllenamento.php" method="post"> 
                <input value="Cancella Prenotazione" class="bottone_rimuovi" name="'.$rows_allenamenti[$i]['id'].'" type="submit">
              </form>
          </div>
          </section>

          <br>
          <hr>';}
?>