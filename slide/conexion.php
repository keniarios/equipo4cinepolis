<?php 

function conectarBDslide()
{
	$host = "host=23.96.84.115";
	$port = "port=5432";
	$dbname = "dbname=bd_cliente";
	$user = "user=kenia";
	$password = "password=Kenia123";

	$bd = pg_connect("$host $port $dbname $user $password");
	if (!$bd ) {
		echo "Error: " .pg_last_error();
	}else{
		//echo "<H3>Conexxion Exitosa - PosgreSQL<H3><HR>";
		return $bd;
	}
}

 ?>




