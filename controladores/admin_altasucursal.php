<?php

require_once ('../bd/conexion.php'); $conexion = conectarBD();

$ciudad = mb_convert_case($_POST['txtciudad'], MB_CASE_TITLE, "UTF-8");
$nombre = mb_convert_case($_POST['nombre'], MB_CASE_TITLE, "UTF-8");

if ($ciudad == "" ) {
	$ciudad = mb_convert_case($_POST['opcionciudad'], MB_CASE_TITLE, "UTF-8");
	if ($ciudad == "") 
	{
		?>
		<script languaje="javascript">
		    alert('Debe seleccionar una ciudad');
		    location.href = "../vistas/frm_altasucursal.php";
		</script>
		<?php
	}
	else
	{
		//0 - No activa
		//1 - Activa
		$query = "INSERT INTO altasucursal (nombre, ciudad, estatus) VALUES ('$nombre','$ciudad', 1)";
		$result = pg_query($query); 
	}
}
else{
	//0 - No activa
	//1 - Activa
	$query = "INSERT INTO altasucursal (nombre, ciudad, estatus) VALUES ('$nombre','$ciudad', 1)";
	$result = pg_query($query); 
}
?>

<script languaje="javascript">
	alert('Sucursal registrada correctamente');
	location.href = "../vistas/frm_altasucursal.php";
</script>