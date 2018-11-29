<?php

require_once ('../../bd/conexion.php'); $conexion = conectarBD();

if (isset($_POST['politica'])) {
	$nombre = mb_convert_case($_POST['txtNombre'], MB_CASE_TITLE, "UTF-8");
	$appaterno = mb_convert_case($_POST['txtApellidoPaterno'], MB_CASE_TITLE, "UTF-8");
	$apmaterno = mb_convert_case($_POST['txtApellidoMaterno'], MB_CASE_TITLE, "UTF-8");
	$correo = strtoupper($_POST['txtCinepolisID']);
	$contrasena = $_POST['txtPassword'];
	$contrasena = password_hash($contrasena,PASSWORD_DEFAULT,array('cost'=>10));
	$txtTCC = $_POST['txtTCC'];
	$ddlPreguntaSecreta = $_POST['ddlPreguntaSecreta'];
	$txtRespuestaPregSecret = $_POST['txtRespuestaPregSecret'];
	$ddlDia = $_POST['ddlDia'];
	$ddlMes = $_POST['ddlMes'];
	$ddlAnio = $_POST['ddlAnio'];
	$txtLada = $_POST['txtLada'];
	$txtTelefono = $_POST['txtTelefono'];


	$query = "INSERT INTO registrocinepolisid (nombre, apellidopaterno, apellidomaterno, correo, contrasena, tarjetaclub, preguntaseguridad, respuestapreguntaseguridad, dianacimiento, mesnacimiento, anonacimiento, lada, telefono) VALUES ('$nombre', '$appaterno', '$apmaterno','$correo','$contrasena','$txtTCC','$ddlPreguntaSecreta','$txtRespuestaPregSecret', '$ddlDia', '$ddlMes', '$ddlAnio', '$txtLada', '$txtTelefono')";
	$result = pg_query($query); 
}//fin validacion_chkTerms
else{
	echo "
	<script languaje='javascript'>
	    alert('Debe de Aceptar La Política de Privacidad Cinépolis.');
	    location.href = '../haztupago.php';
	</script>
	";
}
?>
	<script languaje="javascript">
	    alert('Se registro correctamente.');
	    location.href = "../../index.php";
	</script>