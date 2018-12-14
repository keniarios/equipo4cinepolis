<?php 

function conectarBDCS()
{
	
	$host = "host=cinepolisteam.postgres.database.azure.com";
	$dbname = "dbname=cinepolis";
	$user = "user=equipo4@cinepolisteam";
	$password = "password=Judith123";

	$bd = pg_connect("$host $dbname $user $password");
	if (!$bd ) {
		echo "Error: " .pg_last_error();
	}else{
		//echo "<H3>Conexion Exitosa - PosgreSQL<H3><HR>";

		return $bd;
	}
}
 ?>




