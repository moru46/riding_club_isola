<?php



//crea connessione

$con = mysqli_connect("localhost:3306","root","","isola");

//verifica connessiome

if (!$con) {
	die("connessione fallita : " .mysqli_connect_error());
}



?>