<?php

require_once ('../../bd/conexion.php'); $conexion = conectarBD();
		
	$id = $_POST['id'];
	$nombre = mb_convert_case($_POST['txtNombre'], MB_CASE_TITLE, "UTF-8");
	$appaterno = mb_convert_case($_POST['txtApellidoMaterno'], MB_CASE_TITLE, "UTF-8");
	$apmaterno = mb_convert_case($_POST['txtApellidoMaterno'], MB_CASE_TITLE, "UTF-8");
	$ddlDia = $_POST['ddlDia'];
	$ddlMes = $_POST['ddlMes'];
	$ddlAnio = $_POST['ddlAnio'];
	$txtLada = $_POST['txtCelular'];
	$txtTelefono = $_POST['txtTelefono'];

	$query = "UPDATE registrocinepolisid SET nombre = '$nombre', apellidopaterno = '$appaterno', apellidomaterno = '$apmaterno', dianacimiento = '$ddlDia', mesnacimiento = '$ddlMes', anonacimiento = '$ddlAnio', lada = '$txtLada', telefono = '$txtTelefono' WHERE id_cinepolisid = $id"

	$result = pg_query($query); 
?>
	<script languaje="javascript">
	    alert('Se actualizo correctamente la información.');
	    location.href = "../../cinepolisID/configuracion.php";
	</script>