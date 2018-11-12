<?php 
session_start();
if(!isset($_SESSION['id_registropersonal'])) 
{
  header('Location: frm_admin_login.php');
}
require_once ('../bd/conexion.php'); $conexion = conectarBD(); 

$idusuariosesion = $_SESSION['id_registropersonal'];
$correo = $_SESSION['correo'];
$nombre = $_SESSION['nombre'];
$appaterno = $_SESSION['appaterno'];
$puesto = $_SESSION['puesto'];

?>

<!DOCTYPE html>
<html>

<head>
	<title></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
	<script src='../js/jquery-3.3.1.min.js'></script>
	<script src='../js/popper.min.js'></script>
	<script src='../js/bootstrap.min.js'></script>
	<link rel='stylesheet' href='../css/bootstrap.min.css'>
	<link rel='stylesheet' type='text/css' href='../css/estilo.css'>
	
	<script src="../js/misfunciones.js" type="text/javascript" charset="utf-8" async defer></script>
	<link rel="stylesheet" href="../css/jquery-ui.css">
  	<script src="../js/jquery-ui.js"></script>
</head>
<?php include('header/encabezado2.php'); ?>
<body style="background-color: #EBECEF;">
	<?php INCLUDE ('listarPersonalContenido.php'); ?>
</body>
<?php include('footer/footer.php'); ?>
</html>
