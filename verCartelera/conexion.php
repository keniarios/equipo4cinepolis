<?php 

function conectarBDver()
{
	$host = "host=scinepolis.postgres.database.azure.com";
	$dbname = "dbname=cinepolis";
	$user = "user=equipo4@scinepolis";
	$password = "password=Judith123";

	$bd = pg_connect("$host $dbname $user $password");
	if (!$bd ) {
		echo "Error: " .pg_last_error();
	}else{
		return $bd;
	}
}
?>