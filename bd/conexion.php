<?php 

function conectarBD()
{
	$host = "host=equipo4.postgres.database.azure.com";
	$dbname = "dbname=cinepolis";
	$user = "user=equipo4@equipo4";
	$password = "password=Judith123";

	$bd = pg_connect("$host $dbname $user");
	if (!$bd ) {
		echo "Error: " .pg_last_error();
	}else{
		echo "<H3>Conexion Exitosa - PosgreSQL<H3><HR>";

		return $bd;
	}
}
 ?>




