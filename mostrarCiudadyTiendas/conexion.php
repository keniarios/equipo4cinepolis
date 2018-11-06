<?php 

function conectarBDCS()
{
	$host = "host=localhost";
	$port = "port=5432";
	$dbname = "dbname=CINEPOLIS";
	$user = "user=postgres";
	$password = "password=123";

	$bd = pg_connect("$host $port $dbname $user $password");
	if (!$bd ) {
		echo "Error: " .pg_last_error();
	}else{
		//echo "<H3>Conexion Exitosa - PosgreSQL<H3><HR>";

		return $bd;
	}
}
 ?>




