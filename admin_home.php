<?php
session_start();
require('database/db.php');

if(!$_SESSION['username_log']){
header('location: ./login.php');
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
  <title> Area Admin - C.E.L'isola  </title>
  <meta charset='UTF-8'>
  <link rel='stylesheet' type='text/css' href='Css/admin_home.css'>
</head>

<body id="body">


<!-- Barra di navigazione -->
<div id="barranav">
  <table id="link">
  <tr>
   <?php 
  if(isset($_SESSION['username_log'])){
   echo '<th id="log"> '. $_SESSION["username_log"] . '</th>';}
    else{ echo '<th><a href="login.php">Login</a></th>';}
  ?>
  <th><p onclick="location.href = './utility/logout.php';">logout</p></th>
  </tr>

 
</table>
  <img src="./immagini/FISE.svg" alt="fise" id="fise">
  
  <p id="isola2"> Centro Equitazione L'isola <p>


</div>

<!-- contenitore centrale, grigio, per contenere le altre div con i paragrafi -->

<div id="centro_1">

  <?php 

  if(isset($_SESSION['username_log'])){
    echo '<h1 id="benvenuto">Benvenuto ' .' '. $_SESSION["username_log"] . ' !</h1>';
  }

  ?>

  
 <p id="descrizione_area_login">Questo è un profilo Admin! <br>
 Qui potrai gestire gli utenti della pagina e apportare modifiche. <br>
  Procedi selezionando una delle opzioni.</p> 





<img src="./immagini/ferro_money.svg" alt="money" id="money" onclick="aggiornaSoldi()">
<img src="./immagini/user_canc.svg" alt="user" id="user" >
<img src="./immagini/training_admin.svg" alt="training" id="training" onclick="aggiornaAllenamenti()">



<!-- MODAL SOLDI -->
    
<div id="modal1" class="modal">
<!-- Modal content -->
  <div class="modal_content">
    <span class="chiudi" id="span1">&times;</span>
      <div id="contenuto1">
       
<?php

        $query1 = mysqli_query($con, "SELECT * FROM registro_mensile ORDER BY id");
        $resultCount1=mysqli_num_rows($query1);
        if($resultCount1 == 0){

          echo '  <div id="div_vuoto">
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
         
           <input value="Conferma" class="conferma" type="submit" name="'.$rows_registro_mensile[$i]['id'].'" onclick="confermaPagamento(this)">
          <input value="Cancella" class="cancella"  type="submit" name="'.$rows_registro_mensile[$i]['id'].'" onclick="cancellaPagamento(this)">';
               };
        echo'
              </div>
              </section>
              <br>
              <hr>';
            }
?>   

    </div>
    <div id="riempi1"></div>
  </div>
</div>

<!-- MODAL TRAINING -->
    
<div id="modal2" class="modal">

  <!-- Modal content -->
  <div class="modal_content">
    <span class="chiudi" id="span2">&times;</span>
     <div id="contenuto2">
     
<?php

    $query2 = mysqli_query($con, "SELECT * FROM allenamenti ORDER BY id desc");
    $resultCount2=mysqli_num_rows($query2);

    if($resultCount2 == 0){

  echo '    <div id="div_vuoto">
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
           <!-- <form class="form_rimuovi" action="utility/CancellaAllenamento.php" method="post"> 
              <input value="Cancella Prenotazione" class="bottone_rimuovi" onclick="rimuoviAllenamento(this)" name="'.$rows_allenamenti[$i]['id'].'" type="submit">
            </form> -->
          <input value="Cancella Prenotazione" class="bottone_rimuovi" onclick="rimuoviAllenamento(this)" name="'.$rows_allenamenti[$i]['id'].'" type="submit">

        </div>
        </section>

        <br>
        <hr>';}
?>
     </div>
    <div id="riempi2"></div>
  </div>
</div>

<!-- MODAL User -->
    
<div id="modal3" class="modal">

  <!-- Modal content -->
  <div id="modal_user"  class="modal_content">
    <span class="chiudi" id="span3">&times;</span>
      <div id="contenuto3">

<?php     
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

/*
<form class="rimuovi_user" action="utility/CancellaAllenamento.php" method="post"> 
      <input value="Rimuovi Utente" class="rimuovi_utente" name="'.$rows_profili[$i]['username'].'" type="submit">
    </form>
*/
?>
      </div>
    </div>
  </div>
</div>

<!-- FINE CONTENITORE CENTRO1 GRIGIO --> 
   
</body>
   <script src="Js/admin.js"> </script>
   <script src="Js/rimozioneAjax.js"> </script>
    
</html>














