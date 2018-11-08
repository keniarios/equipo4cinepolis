<?php 

function conectarBD() {
	$server = '23.96.84.115';
	$user = 'kenia';
	$pass = 'Kenia123';
	$bd = 'bd_clientes';
	$connec = pg_connect("host=".$server." dbname=".$bd." user=".$user." password=".$pass." ") or die ("Error de conexion servidor ".$server." BD ".$bd."");
    return $connec;
}

 ?>




