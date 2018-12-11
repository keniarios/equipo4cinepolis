<?php
	session_start();
	if(!isset($_SESSION['id_horario'])) 
	{
	  header('Location: ../index.php');
	}
	//Almacenamos el nombre de usuario en una variable de sesión usuario

	header("Location: ../inicia-sesion.php");
?>