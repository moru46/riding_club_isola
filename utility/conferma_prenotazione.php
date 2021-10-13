<?php

require('../database/db.php');
session_start();

$query1 = mysqli_query($con, "SELECT * FROM registro_mensile WHERE username='".$_SESSION['username_log']."'");
$resultCount=mysqli_num_rows($query1);

$rows_registro_mensile = array();
while($row = mysqli_fetch_assoc($query1)){
  $rows_registro_mensile[] = $row;
}

for($i = 0; $i<$resultCount; $i++){
	if(isset($_POST[$rows_registro_mensile[$i]['id']])){
		mysqli_query($con, "UPDATE registro_mensile
							SET pagato='1'
							WHERE id='".$rows_registro_mensile[$i]['id']."'"
							);}

	}


header('location: ../pagamenti.php');






?>