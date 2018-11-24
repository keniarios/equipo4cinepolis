

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
					    <form role="form" action="../controladores/altatarjeta.php" method="post">

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
			    					<div class="form-group"><label>Nombre de tarjetahabiente:</label>
			                <input type="text" name="nombre" id="nombre" class="form-control input-sm" placeholder="nombre" style="text-transform: uppercase;" required>
			    					</div>
			    				</div>
			   					
			   					<div class="col-xs-4 col-sm-4 col-md-4">
			    					<div class="form-group"><label>Número de la tarjeta:</label>
			    						<input type="text" name="numerotarjeta" id="numerotarjeta" class="form-control input-sm" maxlength="16" style="text-transform: uppercase;" onkeypress="return valida(event);" max="16" required>
			    					</div>
			    				</div>

			    				<div class="col-xs-4 col-sm-4 col-md-4">
			    					<div class="form-group"><label>Código de seguridad de la tarjeta::</label>
			    						<input type="password" name="codigotarjeta" id="codigotarjeta" class="form-control input-sm" maxlength="3" style="text-transform: uppercase;" onkeypress="return valida(event);" max="3" required>
			    					</div>
			    				</div>
			    				
			    			</div>

			    			<div class="row">
			    				<div class="col-xs-4 col-sm-4 col-md-4">
			    					<div class="form-group"><label>Dinero Dispobible:</label>
			    						<input type="text" name="dinerodisponible" id="dinerodisponible" class="form-control input-sm" placeholder="1,000" style="text-transform: uppercase;" onkeypress="return valida(event);" required>
			    					</div>
			    				</div>

			    				<div class="col-xs-4 col-sm-4 col-md-4">
			    					<div class="form-group"><label>Tipo Tarjeta:</label>
			    						<select name="tipotarjeta" style="height: 30px; width: 190px" required>
			    							<option value="">Selecciona uno</option>
											<option value="Visa">Visa</option>
											<option value="Mastercard">Mastercard</option>
											<option value="Amex">Amex</option>
				    					</select>
			    					</div>
			    				</div>

			    				<div class="col-xs-4 col-sm-4 col-md-4">
			    					<div class="form-group"><label>Correo:</label>
			    						<input type="email" name="correo" id="correo" class="form-control input-sm" placeholder="correo" style="text-transform: uppercase;" required>
			    					</div>
			    				</div>
			    			</div>

			    			<div class="row" style="padding-top: 20px;width: auto; padding-left:30%; padding-right:30%; padding-bottom:10px;">
			    					<input type="submit" value="Registrar" class="btn btn-info btn-block">
			    			</div>

			    			<div class="row" style="padding-top: 20px;width: auto; padding-left:30%; padding-right:30%; padding-bottom:10px;">
			    				<a href="haztupago.php">Regresar</a>
			    			</div>
			    		</form>
				  </div>
				</div>
</body>
<?php include('footer/footer.php'); ?>
</html>