<?php

require_once ('../bd/conexion.php'); $conexion = conectarBD();

if (isset($_POST['opcionpuesto'])) {
	# code...
	$valorpuesto = $_POST['opcionpuesto'];

	if ($valorpuesto == "") {
?>
		<script languaje="javascript">
		    alert('Debe seleccionar un usuario');
		    location.href = "../vistas/frm_altaadmin.php";
		</script>
	<?php
	}
	else
	{
		$nombre = mb_convert_case($_POST['nombre'], MB_CASE_TITLE, "UTF-8");
		$appaterno = mb_convert_case($_POST['appaterno'], MB_CASE_TITLE, "UTF-8");
		$apmaterno = mb_convert_case($_POST['apmaterno'], MB_CASE_TITLE, "UTF-8");
		
		//$nombre = strtoupper($_POST['nombre']);
		//$appaterno = strtoupper($_POST['appaterno']);
		//$apmaterno = strtoupper($_POST['apmaterno']);
		$correo = strtoupper($_POST['correo']);
		$contrasena = $_POST['contra'];
		$contrasena = password_hash($contrasena,PASSWORD_DEFAULT,array('cost'=>10));

		$query = "INSERT INTO registropersonal (numeroempleado, nombre, appaterno, apmaterno, correo, contrasena, telefono, puesto) VALUES ('$_POST[numempleado]', '$nombre', '$appaterno','$apmaterno','$correo','$contrasena','$_POST[telefono]','$_POST[opcionpuesto]')";

		$result = pg_query($query); 
?>
		<script languaje="javascript">
		    alert('Usuario registrado correctamente');
		    location.href = "../vistas/frm_altaadmin.php";
		</script>

	<?php
	}
}

?>