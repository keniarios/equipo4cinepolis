<?php
	include ("../bd/conexion.php"); $conexion = conectarBD();
	date_default_timezone_set("America/Mazatlan");

	session_start();
	if(!isset($_SESSION['id_registropersonal'])) 
	{
	  header('Location: ../vistas/frm_admin_login.php');
	}

	$id_pelicula = $_GET['id_pelicula'];

	$query = "DELETE FROM peliculas WHERE id_pelicula='$id_pelicula'";
	pg_query($query);


	echo "
		<script languaje='javascript'>
			alert('Pelicula Eliminada con Exito.');
			location.href = '../vistas/index.php';
		</script>
		";
?>