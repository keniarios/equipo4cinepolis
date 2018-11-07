<?php 

function conectarBD()
{
	
	$serverName = "equipo4cinepolis.database.windows.net";
	$connectionOptions = array(
	    "Database" => "cinepolis",
	    "Uid" => "keniarios",
	    "PWD" => "Equipo4cinepolis"
	);
	//Establishes the connection
	$conn = sqlsrv_connect($serverName, $connectionOptions);
}
 ?>




