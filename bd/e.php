<?php 

function conectarBD() {
	$server = 'cinepolisteam.postgres.database.azure.com';
	$user = 'equipo4@cinepolisteam';
	$pass = '123';
	$bd = 'Judith123';
	$connec = pg_connect("host=".$server." dbname=".$bd." user=".$user." password=".$pass." ") or die ("Error de conexion servidor ".$server." BD ".$bd."");
    return $connec;
}

 ?>




