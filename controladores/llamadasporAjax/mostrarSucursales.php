<?php
    include ('../../bd/conexion.php'); $conexion = conectarBD();

    $V_Ciudad = $_POST['Ciudad'];

    $result = pg_query("SELECT id_sucursal, nombre FROM altasucursal WHERE ciudad='$V_Ciudad' ORDER BY 1");
    $totalRegistros = pg_numrows($result);

    echo "<option value=''>Selecciona un cine</option>";
    $x=0;
	while ($datos=pg_fetch_array($result)) {

    	$ID = $datos['id_sucursal'];
    	$nombre = $datos['nombre'];

		echo "<option value='cartelera.php?ciudad=$V_Ciudad&id_sucursal=$ID'>$nombre</option>";

        $x++;
        if ($totalRegistros == $x) {
            echo "<option value='cartelera.php?ciudad=$V_Ciudad' style='font-weight:bold'>Todas las Sucursales</option>";
        }
	}

	//echo "<option value='cartelera.php?ciudad=$V_Ciudad' style='font-weight:bold'>Todas las Sucursales</option>";
?>