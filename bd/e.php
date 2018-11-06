<?php 

function conectarBD() {
	$server = 'localhost';
	$user = 'postgres';
	$pass = '123';
	$bd = 'CINEPOLIS';
	$connec = pg_connect("host=".$server." dbname=".$bd." user=".$user." password=".$pass." ") or die ("Error de conexion servidor ".$server." BD ".$bd."");
    return $connec;
}

 ?>




