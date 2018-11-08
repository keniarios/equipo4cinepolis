<?php 

function conectarBDslide()
{
	$host = "host=127.0.0.1";
	$port = "port=5432";
	$dbname = "dbname=bd_clientes";
	$user = "user=kenia";
	$password = "password=123";

	$bd = pg_connect("$host $port $dbname $user $password");
	if (!$bd ) {
		echo "Error: " .pg_last_error();
	}else{
		//echo "<H3>Conexxion Exitosa - PosgreSQL<H3><HR>";
		return $bd;
	}
}

 ?>




