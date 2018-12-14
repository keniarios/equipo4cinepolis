<?php
	include ("../bd/conexion.php"); $conexion = conectarBD();
	date_default_timezone_set("America/Mazatlan");

	session_start();
	if(!isset($_SESSION['id_registropersonal'])) 
	{
	  header('Location: ../vistas/frm_admin_login.php');
	}

	$id_pelicula = $_GET['id_pelicula'];
	$estatus = $_GET['id_estatus'];

	$query = "UPDATE peliculas SET estatus='$estatus' WHERE id_pelicula='$id_pelicula'";
	pg_query($query);


	echo "
		<script languaje='javascript'>
			alert('Estatus de la Pelicula Actualizada.');
			location.href = '../vistas/index.php';
		</script>
		";
?>