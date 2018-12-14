<?php
    include ('../../bd/conexion.php'); $conexion = conectarBD();

    $V_Ciudad = $_POST['Ciudad'];

    $result = pg_query("SELECT id_sucursal, nombre FROM altasucursal WHERE ciudad='$V_Ciudad' ORDER BY 1");

    echo "<option value=''>Selecciona un cine</option>";
	while ($datos=pg_fetch_array($result)) {

    	$ID = $datos['id_sucursal'];
    	$nombre = $datos['nombre'];

		echo "<option value='$ID'>$nombre</option>";

	}
?>