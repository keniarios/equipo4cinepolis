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
<?php include('header/encabezado2.php'); ?>
<head>
	<title></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
	
</head>
<body style="background-color: #EBECEF;">
	<?php INCLUDE ('listarPersonalContenido.php'); ?>
</body>
<?php include('footer/footer.php'); ?>
</html>
