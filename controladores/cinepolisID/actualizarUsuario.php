<?php
session_start();

include ('../../bd/conexion.php'); $conexion = conectarBD();
		
	//$id = $_POST['id'];
	$id_cinepolisid = $_SESSION['id_cinepolisid'];
	$nombre = mb_convert_case($_POST['txtNombre'], MB_CASE_TITLE, "UTF-8");
	$appaterno = mb_convert_case($_POST['txtApellidoPaterno'], MB_CASE_TITLE, "UTF-8");
	$apmaterno = mb_convert_case($_POST['txtApellidoMaterno'], MB_CASE_TITLE, "UTF-8");
	$ddlDia = $_POST['ddlDia'];
	$ddlMes = $_POST['ddlMes'];
	$ddlAnio = $_POST['ddlAnio'];
	$txtLada = $_POST['txtLada'];
	$txtTelefono = $_POST['txtCelular'];
	$txtTCC = $_POST['txtTCC'];

	$query = "UPDATE registrocinepolisid SET nombre = '$nombre', apellidopaterno = '$appaterno', apellidomaterno = '$apmaterno', dianacimiento = '$ddlDia', mesnacimiento = '$ddlMes', anonacimiento = '$ddlAnio', lada = '$txtLada', telefono = '$txtTelefono', tarjetaclub='$txtTCC' WHERE id_cinepolisid = '$id_cinepolisid'";

	$result = pg_query($query);

	$_SESSION['nombre'] = $nombre;
	$_SESSION['apellidopaterno'] = $appaterno;
	$_SESSION['apellidomaterno'] = $apmaterno;
	$_SESSION['tarjetaclub'] = $nombre;
	$_SESSION['dianacimiento'] = $ddlDia;
	$_SESSION['mesnacimiento'] = $ddlMes;
	$_SESSION['anonacimiento'] = $ddlAnio;
	$_SESSION['lada'] = $txtLada;
	$_SESSION['telefono'] = $txtTelefono;
	$_SESSION['tarjetaclub'] = $txtTCC;
?>
	<script languaje="javascript">
	    alert('Se actualizo correctamente la información.');
	    location.href = "../../cinepolisID/configuracion.php";
	</script>