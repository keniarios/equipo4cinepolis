<?php 

function conectarBDslide()
{
	$host = "host=scinepolis.postgres.database.azure.com";
	$dbname = "dbname=cinepolis";
	$user = "user=equipo4@scinepolis";
	$password = "password=Judith123";

	$bd = pg_connect("$host $dbname $user $password");
	if (!$bd ) {
		echo "Error: " .pg_last_error();
	}else{
		//echo "<H3>Conexxion Exitosa - PosgreSQL<H3><HR>";
		return $bd;
	}
}

 ?>




