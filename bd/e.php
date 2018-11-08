<?php 

function conectarBD() {
	$server = 'equipo4.postgres.database.azure.com';
	$user = 'equipo4@equipo4';
	$pass = '123';
	$bd = 'Judith123';
	$connec = pg_connect("host=".$server." dbname=".$bd." user=".$user." password=".$pass." ") or die ("Error de conexion servidor ".$server." BD ".$bd."");
    return $connec;
}

 ?>




