<?php 

function conectarBDslide()
{
	$host = "host=equipo4.postgres.database.azure.com";
	$dbname = "dbname=cinepolis";
	$user = "user=quipo4@equipo4";
	$password = "password=Judith123";

	$bd = pg_connect("$host $port $dbname");
	if (!$bd ) {
		echo "Error: " .pg_last_error();
	}else{
		//echo "<H3>Conexxion Exitosa - PosgreSQL<H3><HR>";
		return $bd;
	}
}

 ?>




