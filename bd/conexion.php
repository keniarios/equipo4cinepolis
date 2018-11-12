<?php 

function conectarBD()
{
	$host = "host=equipo4.postgres.database.azure.com";
	$dbname = "dbname=cinepolis";
	$user = "user=equipo4@equipo4";
	$password = "password=Judith123";

	$bd = pg_connect("$host $dbname $user $password");
	if (!$bd ) {
		echo "Error: " .pg_last_error();
	}else{
		return $bd;
	}
}
 ?>




