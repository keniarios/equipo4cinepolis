<?php
	session_start();
	if(!isset($_SESSION['id_horario'])) 
	{
	  header('Location: ../index.php');
	}
	

	//$_SESSION['asientos'] = $_POST["asientos"];
	$asientosseleccionados3raedad = $_POST["asientos3raedad"];
	$asientosseleccionadosadultos = $_POST["asientosAdultos"];
	$asientosseleccionadosniños = $_POST["asientosNinos"];
    

	$asientosseleccionados3raedad = substr($asientosseleccionados3raedad, 0, -1);
	$asientosseleccionadosadultos = substr($asientosseleccionadosadultos, 0, -1);
	$asientosseleccionadosniños = substr($asientosseleccionadosniños, 0, -1);


	//$_SESSION['asientos'] = $_POST["asientos"];
	$_SESSION['asientos3raedad'] = $asientosseleccionados3raedad;
	$_SESSION['asientosAdultos'] = $asientosseleccionadosadultos;
	$_SESSION['asientosNinos'] = $asientosseleccionadosniños;
    

    //$asientos = $_SESSION['asientos'];
	/*$asientosseleccionadosadultos = $_SESSION['asientosAdultos'];
	$asientosseleccionadosniños = $_SESSION['asientosNinos'];
	$asientosseleccionados3raedad = $_SESSION['asientos3raedad'];*/

    //echo 'ASIENTOS: '.$asientos;
    //echo 'ASIENTOS: '.$asientos.'<br>';

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