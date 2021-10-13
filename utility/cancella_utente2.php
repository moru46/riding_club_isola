<?php

require('../database/db.php');
session_start();

/*eliminazione record database*/
  $usernameToDelate = file_get_contents('php://input');



  $query1 = mysqli_query($con, "SELECT * FROM registro_mensile");
  $resultCount1=mysqli_num_rows($query1);

    $rows_registro_mensile = array();
      while($row = mysqli_fetch_assoc($query1)){
       $rows_registro_mensile[] = $row;
      }

      for($i = 0; $i<$resultCount1; $i++){
      	 if(1) {
      		mysqli_query($con, "DELETE FROM registro_mensile WHERE username='".$usernameToDelate."'");}
      }


      $query2 = mysqli_query($con, "SELECT * FROM allenamenti");
      $resultCount2=mysqli_num_rows($query2);

          $rows_allenamenti = array();
          while($row = mysqli_fetch_assoc($query2)){
            $rows_allenamenti[] = $row;
          }

      for($i = 0; $i<$resultCount2; $i++){
      	if(1) {
      		mysqli_query($con, "DELETE FROM allenamenti WHERE username='".$usernameToDelate."'");}
        }

        $query3 = mysqli_query($con, "SELECT * FROM profilo");
        $resultCount3=mysqli_num_rows($query3);

      $rows_profilo = array();
      while($row = mysqli_fetch_assoc($query3)){
        $rows_profilo[] = $row;
      }

      for($i = 0; $i<$resultCount3; $i++){
      	if(1) {
      		mysqli_query($con, "DELETE FROM profilo WHERE username='".$usernameToDelate."'");}
      	}

      $query4 = mysqli_query($con, "SELECT * FROM registrazioni");
      $resultCount4=mysqli_num_rows($query4);

      $rows_registrazioni = array();
      while($row = mysqli_fetch_assoc($query4)){
        $rows_registrazioni[] = $row;
      }

      for($i = 0; $i<$resultCount4; $i++){
      	if(1) {
      		mysqli_query($con, "DELETE FROM registrazioni WHERE username='".$usernameToDelate."'");}
      	}


/* ristampa documento php tramite ajax*/

    $query3 = mysqli_query($con, "SELECT * FROM registrazioni WHERE admin='0'");
    $resultCount3=mysqli_num_rows($query3);
    if($resultCount3 == 0){

  echo '    <div id="div_vuoto">
            <p id="p_vuoto"> <strong>Attenzione!</strong></p>
            <img src="immagini/sad1.svg" alt="carrello vuoto" id="img_vuoto">
             <p id="a_vuoto"> Nessun utente risulta iscritto al sito</p></div>';}

     $rows_profili = array();
    while($row = mysqli_fetch_assoc($query3)){
      $rows_profili[] = $row;
    }

for($i = 0; $i<$resultCount3; $i++){
  echo '

        <section class="sezione_profili">

        <div class="img_profili"> 
          <img src="./immagini/profilo.svg" alt="avatar user">
        </div>

        <div class="testo_user">
          <p><strong>Utente: </strong>'.$rows_profili[$i]['username'].'</p>
          <p class="dati"><strong> Nome: </strong> '.$rows_profili[$i]['nome'].'  <strong>Cognome:</strong> '.$rows_profili[$i]['cognome'].' </p>
              <input value="Rimuovi Utente" onclick="cancellaUtente(this)" class="rimuovi_utente" name="'.$rows_profili[$i]['username'].'" type="submit">
        </div>
        </section>

        <br>
        <hr>';}

?>