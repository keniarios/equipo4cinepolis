
 <?php

require_once ('../bd/conexion.php'); $conexion = conectarBD();
$nombre = strtoupper($_POST['nombre']);
$ciudad = $_POST['ciudad'];
$sucursal = $_POST['sucursal'];
$tipo = $_POST['tipo'];
$estatus = $_POST['estatus'];

$asientosSeleccionados = $_POST['asientosSeleccionados'];
if ($nombre == "") {
	echo "Escriba el nombre de la sala para continuar";
}
else if ($sucursal == "") {
	echo "Seleccione una sucursal para continuar";
}
else if ($ciudad == ""){
	echo "Seleccione una ciudad para continuar";
}
else if ($estatus == ""){
	echo "Seleccione un estatus para continuar";
}
else if ($tipo == "") {
	echo "escribe un tipo de sala para continuar";
}
else if ($asientosSeleccionados == "") {
	echo "Seleccione asientos para continuar";
}
else {
	$query = "INSERT INTO salas(
	nombre, id_sucursal, ciudad, estatus, tiposala, asientos_seleccionados)
	VALUES ('$nombre', '$sucursal', '$ciudad', '$estatus', '$tipo', '$asientosSeleccionados')";
	pg_query($query);

	
	?>
		<script languaje="javascript">
		    alert('Se registro la Sala Correctamente!');
		    location.href = "../vistas/frm_altasalas.php";
		</script>
	<?php
	
}

?>