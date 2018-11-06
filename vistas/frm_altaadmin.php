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
					    <label class="panel-title" style="color:black;font-size:20px;">ALTAS DE USUARIO</label>
					  </div>
					  <div class="panel-body" id="cuerpoform" style="margin-bottom: 35px;">
					    <form role="form" action="../controladores/admin_registropersonal.php" method="post">

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
			    				<div class="col-xs-4 col-sm-4 col-md-4">
			    					<div class="form-group"><label>Nombre:</label>
			                <input type="text" name="nombre" id="nombre" class="form-control input-sm" placeholder="Maria Guadalupe" style="text-transform: uppercase;" required>
			    					</div>
			    				</div>
			   					
			   					<div class="col-xs-4 col-sm-4 col-md-4">
			    					<div class="form-group"><label>Apellido Paterno:</label>
			    						<input type="text" name="appaterno" id="appaterno" class="form-control input-sm" placeholder="López" style="text-transform: uppercase;" required>
			    					</div>
			    				</div>

			    				<div class="col-xs-4 col-sm-4 col-md-4">
			    					<div class="form-group"><label>Apellido Materno:</label>
			    						<input type="text" name="apmaterno" id="apmaterno" class="form-control input-sm" placeholder="López" style="text-transform: uppercase;" required>
			    					</div>
			    				</div>
			    				
			    			</div>

			    			<div class="row">
			    				<div class="col-xs-4 col-sm-4 col-md-4">
			    					<div class="form-group"><label>Correo:</label>
			    						<input type="email" name="correo" id="correo" class="form-control input-sm" placeholder="maria.lopez@gmail.com" style="text-transform: uppercase;" required>
			    					</div>
			    				</div>

			    				<div class="col-xs-4 col-sm-4 col-md-4">
			    					<div class="form-group"><label>Telefono/Celular:</label>
			    						<input type="text" name="telefono" id="telefono" class="form-control input-sm" placeholder="6671002200" maxlength="10" style="text-transform: uppercase;" onkeypress="return valida(event);" max="10" required>
			    					</div>
			    				</div>

			    				<div class="col-xs-4 col-sm-4 col-md-4">
				    					<div class="form-group"><label>Número de Empleado:</label>
				                		<input type="text" name="numempleado" id="numempleado" class="form-control input-sm" placeholder="99999999" maxlength="8" style="text-transform: uppercase;" onkeypress="return valida(event);" required>
				    					</div>
				    				</div>

			    				
			    			</div>

			    			<div class="row">
			    				<div class="col-xs-4 col-sm-4 col-md-4">
			    					<div class="form-group">
			    						<label>Puesto:</label>
			    						<select name="opcionpuesto" style="height: 30px; width: 190px">
			    							<option value="">Seleccione</option>
					    					<option value="STAFF">Staff</option>
					    					<option value="SUPERVISOR">Supervisor</option>
				    				</select>
				    					</div>
				    				</div>

				    				<div class="col-xs-4 col-sm-4 col-md-4">
			    					<div class="form-group"><label>Contraseña:</label>
			    						<input type="password" name="contra" id="contra" class="form-control input-sm" placeholder="**********" required>
			    					</div>
			    				</div>

			    				<div class="col-xs-4 col-sm-4 col-md-4">
			    					<div class="form-group"><label>Confirmar Contraseña:</label>
			    						<input type="password" name="confirmarcontra" id="confirmarcontra" class="form-control input-sm" placeholder="**********" required>
			    					</div>
			    				</div>
			    			</div>

			    			<div class="row" style="padding-top: 20px;width: auto; padding-left:30%; padding-right:30%; padding-bottom:10px;">
			    					<input type="submit" value="Registrar" class="btn btn-info btn-block">
			    			</div>
			    			
			    			
			    		</form>
				  </div>
				</div>
</body>
<?php include('footer/footer.php'); ?>
</html>