<?php

session_start();
if(!isset($_SESSION['id_registropersonal'])) 
{
  header('Location: frm_admin_login.php');
}

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

<script>
	function valida(e)
	{
	    tecla = (document.all) ? e.keyCode : e.which;
	    if (tecla==8){
	        return true;
	    }
	    patron =/[0-9]/;
	    tecla_final = String.fromCharCode(tecla);
	    return patron.test(tecla_final);
	}
</script>

</head>
<body style="background-color: #EBECEF;">

				<div class="panel panel-default" >
					<div class="panel-heading" id="cab-panel" style="margin-top: 35px;">
					    <label class="panel-title" style="color:black;font-size:20px;">Carrusel</label>
					</div>
					
					<div class="panel-body" id="cuerpoform" style="margin-bottom: 35px;">
					    <form role="form" action="../controladores/admin_subirSlider.php" method="post" enctype="multipart/form-data">
			    			<div class="row">

			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div><label>Fecha:</label></div>
			    					<div class="form-control" style="width: 120px; margin-bottom: 10px;">

			                		 <?php 
				                		date_default_timezone_set("America/Mazatlan");
				                		$fecha = date("Y-m-d");
			                		 	echo "$fecha"; ?>
			    					</div>
			    				</div>
			    			</div>


			    			<div class="row">
				    			<div class="col-xs-6 col-sm-6 col-md-6">
				    				<div class="form-group"><label>Titulo</label>
				    				<input type="text" name="titulo" id="titulo" class="form-control input-sm" placeholder="Nombre" required>
				    				</div>
				    			</div>

				    			<div class="col-xs-2 col-sm-2 col-md-2">
			    					<div class="form-group">
			    						<label style="text-align: center">Posición</label>
			    						<input type="text" name="posicion" id="posicion" onkeypress="return valida(event);" maxlength="1" class="form-control input-sm" placeholder="#" required>
			    					</div>
			    				</div>
			    			</div>

			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<label style="text-align: center">Imagen Banner:</label>
			    						<input type="file" name="imagenBanner">
			    					</div>
			    				</div>
			    			</div>

			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<label style="text-align: center">Imagen Movil:</label>
			    						<input type="file" name="imagenMovil">
			    					</div>
			    				</div>
			    			</div>

			    			<div class="row">
			   					<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<label style="text-align: center">Imagen Mini Slider:</label>
			    						<input type="file" name="imagenMini">
			    					</div>
			    				</div>
			    			</div>

			    			<div class="row" style="padding-top: 20px;width: auto; padding-left:30%; padding-right:30%; padding-bottom:10px;">
			    				<input type="submit" value="Agregar" class="btn btn-info btn-block">
			    			</div>
			    			
			    		</form>
					</div>
				</div>
</body>
<?php include('footer/footer.php'); ?>
</html>