<?php

//session_start();
if(!isset($_SESSION['id_registropersonal'])) 
{
  header('Location: frm_admin_login.php');
}

$idusuariosesion = $_SESSION['id_registropersonal'];
$correo = $_SESSION['correo'];
$nombre = $_SESSION['nombre'];
$appaterno = $_SESSION['appaterno'];
$apmaterno = $_SESSION['apmaterno'];
$puesto = $_SESSION['puesto'];
$telefono = $_SESSION['telefono'];

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
	
	<script src="../js/misFunciones.js" type="text/javascript" charset="utf-8" async defer></script>
	<link rel="stylesheet" href="../css/jQuery-ui.css">
  	<script src="../js/jQuery-ui.js"></script>

</head>
<body>

	<style type="text/css">
		.ui-dialog-titlebar{
			background-color:#0b5ba1; 
			color:white;
			font-family: 'Helvetica';
		}
	</style>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#ver').on("click",function(){
				var form = $('#Perfil'); 
			    var Perfil = $("#dialog-perfil"),
			    dialog = Perfil.dialog({
			      autoOpen: false,
			      height: 'auto',
			      width: '460px',
			      modal: true,
			      draggable: false,
			      dialogClass: "alert",
			      buttons: {
			        Cerrar: function() {
			          dialog.dialog( "close" );
			        }
			      },
			      close: function() {
			      }
				})
			dialog.dialog( "open" );
			});
		});
	</script> 

	<div id="dialog-perfil" title="Perfil del Usuario" style="display: none;">
	  <p class="validateTips" id="validateTips"></p>
	  <div class="form-row">
	    <div class="form-group col-md-6">
	      <label style="font-weight: bold;display: block;margin-bottom: 0px;">Nombre</label>
	      <label style="display: block;"><?php echo $nombre ?> <br> <?php echo $appaterno . ' ' . $apmaterno ?></label>
	    </div>
	    <div class="form-group col-md-6">
	      <label style="font-weight: bold;display: block;margin-bottom: 0px;">Tipo de Usuario</label>
	      <label style="display: block;"><?php echo $puesto ?></label>
	    </div>
	  </div>
	  <div class="form-row">
	     <div class="form-group col-md-6">
	      <label style="font-weight: bold;display: block;margin-bottom: 0px;">Celular</label>
	      <label style="display: block;"><?php echo $telefono ?></label>
	    </div>
	    <div class="form-group col-md-6">
	      <label style="font-weight: bold;display: block;margin-bottom: 0px;">E-mail</label>
	      <label style="display: block;"><?php echo $correo ?></label>
	    </div>
	  </div>
	</div>
	<div class="container col-md-12" id="menu">
		<nav class="navbar navbar-light" style="padding-left: 0px;padding-top:25px;margin-right:0px;padding-right:0px; background-color: #0b5ba1;height: 80px;">
			<a class="navbar-brand" href="" style="margin-right:0px; background-color: #0b5ba1;">
				<img src="../img/logocabecera.png" class="img-logo d-inline-block align-top">
			</a>
			<div id="info-usuario">
				<span onmouseover="zoomIn()" onmouseout="zoomOut()"><img src="../img/usuario.png" class="img-user"></span><br>
				<span><label id="tipoUsuario"><?php echo $puesto ?></label></span>
				<div id="perfil" onmouseover="zoomIn()" onmouseout="zoomOut()"  style="cursor:default;display:none;position:absolute;margin-left: -90px;margin-top: -40px;width: 9rem;background-color:#fff;border-radius:5px;box-shadow:0 10px 16px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19)!important;font-size: 10pt;z-index: 1;text-align: left;">
					<label for="" style="padding: 5px;font-size: 13pt;color: black;"><?php echo $nombre . ' ' . $appaterno ?></label><hr>
					<ul style="padding:5px;LIST-STYLE: NONE;margin: 0px;">
						<li id="contra" onmouseover="focoMenuPerfil(this.id)" onmouseout="sinfocoMenuPerfil(this.id)" >
							<a style="color:black;text-decoration: none;" href="">Cambiar contraseña</a><br>
						</li>
						<li id="ver" onmouseover="focoMenuPerfil(this.id)" onmouseout="sinfocoMenuPerfil(this.id)">
							<a style="color:black;text-decoration: none;" >Ver perfil</a><br>
						</li>
						<li id="salir" onmouseover="focoMenuPerfil(this.id)" onmouseout="sinfocoMenuPerfil(this.id)">
							<a style="color:black;text-decoration: none;" href="../controladores/cerrar_sesion.php">Cerrar Sesión</a>
						</li>
					</ul>
				</div>
				<span><label id="nomUsuario"></label><span/><br>
				<span></span>
			</div>
		</nav>
		<div class="row" style="background-color: black;">
			<nav class="navbar navbar-expand-lg navbar-light" style="padding-left: 30px;padding-top:0px;float: left;">
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon" style="background-color:#feca30; "></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarTogglerDemo03">
						<ul class="navbar-nav mr-auto">
							<li id="inicio" class="nav-item">
								<a class="nav-link" href="index.php" style="color:#feca30;">Inicio<span class="sr-only">(current)</span></a>
							</li>
							<li id="inicio" class="nav-item">
								<a class="nav-link" href="frm_admincarrusel.php" style="color:#feca30;">Carrusel</a>
							</li>
							<div class="nav-link dropdown" style="color:#feca30; cursor: pointer;">
								<li class="nav-item dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Altas
								</li>
								<div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="background-color: black;">
									<a class="dropdown-item" href="frm_altaadmin.php" style="color:#feca30;">Personal</a>
									<a class="dropdown-item" href="frm_altasalas.php" style="color:#feca30;">Salas</a>
									<a class="dropdown-item" href="frm_altapeliculas.php" style="color:#feca30;">Peliculas</a>
									<a class="dropdown-item" href="frm_altahorariosbtnCiudades.php" style="color:#feca30;">Horarios</a>
									<a class="dropdown-item" href="frm_altasucursal.php" style="color:#feca30;">Sucursal</a>
									<a class="dropdown-item" href="frm_altaprecios.php" style="color:#feca30;">Precios</a>
								</div>
							</div>
							<div class="nav-link dropdown" style="color:#feca30; cursor: pointer;">
								<li class="nav-item dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Reportes
								</li>
								<div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="background-color: black;">
									<a class="dropdown-item" href="reportesventas.php" style="color:#feca30;">Ventas</a>
									<a class="dropdown-item" href="listarPeliculas.php" style="color:#feca30;">Peliculas</a>
									<a class="dropdown-item" href="listarUsuarios.php" style="color:#feca30;">Usuarios</a>
									<a class="dropdown-item" href="listarPersonal.php" style="color:#feca30;">Personal</a>
								</div>
							</div>

							<div class="nav-link dropdown" style="color:#feca30; cursor: pointer;">
								<li class="nav-item dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Reportes de Altas
								</li>
								<div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="background-color: black;">
									<a class="dropdown-item" href="reportesSalas.php" style="color:#feca30;">Salas</a>
									<a class="dropdown-item" href="reportesHorarios.php" style="color:#feca30;">Horarios</a>
									<a class="dropdown-item" href="reportesSucursales.php" style="color:#feca30;">Sucursales</a>
									<a class="dropdown-item" href="reportesPrecios.php" style="color:#feca30;">Precios</a>
									<a class="dropdown-item" href="reportesCarrusel.php" style="color:#feca30;">Carrusel</a>
								</div>
							</div>
						</ul>
					</div>
				</nav>
			</div>
		</div>
</body>
</html>