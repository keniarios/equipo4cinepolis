<?php
	session_start();
	if(!isset($_SESSION['id_horario'])) 
	{
	  header('Location: ../index.php');
	}
	//Almacenamos el nombre de usuario en una variable de sesión usuario
	$_SESSION['asientos'] = $_POST["asientos"];
	$_SESSION['asientosAdultos'] = $_POST["asientosAdultos"];
	$_SESSION['asientosNinos'] = $_POST["asientosNinos"];
    $_SESSION['asientos3raedad'] = $_POST["asientos3raedad"];

    $asientos = $_SESSION['asientos'];
	$asientosseleccionadosadultos = $_SESSION['asientosAdultos'];
	$asientosseleccionadosniños = $_SESSION['asientosNinos'];
	$asientosseleccionados3raedad = $_SESSION['asientos3raedad'];

    //echo 'ASIENTOS: '.$asientos;
    echo 'ASIENTOS: '.$asientos.'<br>';

    echo 'A.3raedad: '.$asientosseleccionados3raedad.'<br>';

    echo 'A.Adultos: '.$asientosseleccionadosadultos.'<br>';

    echo 'A.Niños: '.$asientosseleccionadosniños.'<br>';


	/*if(!isset($_SESSION['id_cinepolisid'])) 
	{
		header("Location: ../inicia-sesion.php");
	}
	else{
		header("Location: ../haztupago.php");
	}*/
?>