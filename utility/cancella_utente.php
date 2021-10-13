<?php

require('../database/db.php');
session_start();


$usernameToDelate = file_get_contents('php://input');



$query1 = mysqli_query($con, "SELECT * FROM registro_mensile");
$resultCount1=mysqli_num_rows($query1);

$rows_registro_mensile = array();
while($row = mysqli_fetch_assoc($query1)){
  $rows_registro_mensile[] = $row;
}

for($i = 0; $i<$resultCount1; $i++){
	if(isset($_POST[$rows_registro_mensile[$i]['username']])) {
		mysqli_query($con, "DELETE FROM registro_mensile WHERE username='".$rows_registro_mensile[$i]['username']."'");}

	}


$query2 = mysqli_query($con, "SELECT * FROM allenamenti");
$resultCount2=mysqli_num_rows($query2);

$rows_allenamenti = array();
while($row = mysqli_fetch_assoc($query2)){
  $rows_allenamenti[] = $row;
}

for($i = 0; $i<$resultCount2; $i++){
	if(isset($_POST[$rows_allenamenti[$i]['username']])) {
		mysqli_query($con, "DELETE FROM allenamenti WHERE username='".$rows_allenamenti[$i]['username']."'");}

	}

$query3 = mysqli_query($con, "SELECT * FROM profilo");
$resultCount3=mysqli_num_rows($query3);

$rows_profilo = array();
while($row = mysqli_fetch_assoc($query3)){
  $rows_profilo[] = $row;
}

for($i = 0; $i<$resultCount3; $i++){
	if(isset($_POST[$rows_profilo[$i]['username']])) {
		mysqli_query($con, "DELETE FROM profilo WHERE username='".$rows_profilo[$i]['username']."'");}

	}

$query4 = mysqli_query($con, "SELECT * FROM registrazioni");
$resultCount4=mysqli_num_rows($query4);

$rows_registrazioni = array();
while($row = mysqli_fetch_assoc($query4)){
  $rows_registrazioni[] = $row;
}

for($i = 0; $i<$resultCount4; $i++){
	if(isset($_POST[$rows_registrazioni[$i]['username']])) {
		mysqli_query($con, "DELETE FROM registrazioni WHERE username='".$rows_registrazioni[$i]['username']."'");}

	}




// header('location: ../admin_home.php');






?>