<?php 

function conectarBD() {
	$server = '127.0.0.1';
	$user = 'kenia';
	$pass = 'Kenia123';
	$bd = 'bd_clientes';
	$connec = pg_connect("host=".$server." dbname=".$bd." user=".$user." password=".$pass." ") or die ("Error de conexion servidor ".$server." BD ".$bd."");
    return $connec;
}

 ?>




