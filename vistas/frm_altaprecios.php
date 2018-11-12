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

	<script src="../js/jquery-3.3.1.min.js"></script>

	<script type="text/javascript">
    function showContent() {
    	elementoetiqueta = document.getElementById("etiqueta3d");
    	elementotiposala = document.getElementById("etiquetatiposala");
    	elementoradionormal = document.getElementById("radionormal");
		elementoradio3d = document.getElementById("radio3d");
		elementoradioimax = document.getElementById("radioimax");
		elementoradiojunior = document.getElementById("radiojunior");


    	elementoidioma = document.getElementById("informacionidioma3d");
    	

    	var ciudad = document.getElementById("ddlViewByCiudad");

    	var strCiudad = ciudad.options[ciudad.selectedIndex].value;

    	var e = document.getElementById("ddlViewBy");

		var strUser = e.options[e.selectedIndex].value;

		
		if (strCiudad != '') {
        	 combocines.style.display='block';  

        }
        else {
        	
        	combocines.style.display='none';
        	strUser = "";

        }


        if (strUser != '') {
        	 elementoetiqueta.style.display='block';
            elementoidioma.style.display='block';
            elementotiposala.style.display='block';
            elementoradionormal.style.display='block';
			elementoradio3d.style.display='block';
			elementoradioimax.style.display='block';
			elementoradio3d.style.display='block';
			elementoradiojunior.style.display='block';
           // elementosubtitulo.style.display='block';
            //alert(strUser);

        }
        else {
        	
        	elementoetiqueta.style.display='none';
            elementoidioma.style.display='none';
            elementotiposala.style.display='none';
            elementoradionormal.style.display='none';
            elementoradio3d.style.display='none';
            elementoradioimax.style.display='none';
            elementoradiojunior.style.display='none';
            //elementosubtitulo.style.display='none';
        }
    }
</script> 

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
					    <label class="panel-title" style="color:black;font-size:20px;">ALTAS PRECIOS DE BOLETOS</label>
					  </div>
					  <div class="panel-body" id="cuerpoform" style="margin-bottom: 35px;">
					    <form role="form" action="../controladores/admin_altapreciosboletos.php" method="post"  enctype="multipart/form-data">

			    			<div class="row" style="float: right;">
			    				<div class="col-xs-8 col-sm-8 col-md-8" >
			    					<div><label>Fecha Registro:</label></div>
			    					<div class="form-control" style="width: 190px; margin-bottom: 10px;">

			                		<?php 
			                			date_default_timezone_set("Mexico/General");
			                		  $fecha = date('d-M-Y');
			                		 echo "$fecha"; ?>
			    					</div>
			    				</div>
			   
			    			</div>

			    			<div class="row" style="padding-top: 100px">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<label>Seleccione Ciudad</label>
			    						<select name="opcionCiudad" id="ddlViewByCiudad" style="height: 30px; width: auto" onchange="javascript:showContent()">
			    							<option value="">Seleccione</option>
					    					<option value="Culiacán">Culiacán</option>
					    					<option value="Mazatlán">Mazatlán</option>
				    					</select>
				    				</div>
				    			</div>
			   						
			    			</div>

			    			<div class="row" id="combocines"  style="display: none";>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group" >
			    						<label>Seleccione Cine</label>
			    						<select name="opcionCine" id="ddlViewBy" style="height: 30px; width: auto;" onchange="javascript:showContent()">
			    							<option value="">Seleccione</option>
					    					<option value="Cinépolis Culiacán">Cinépolis Culiacán</option>
					    					<option value="Cinépolis Paseo San Isidro">Cinépolis Paseo San Isidro</option>
					    					<option value="Cinépolis Plaza Azahares">Cinépolis Plaza Azahares</option>
					    					<option value="Cinépolis Sendero Ganadera Culiacán">Cinépolis Sendero Ganadera Culiacán</option>
					    					<option value="Cinépolis VIP Culiacán">Cinépolis VIP Culiacán</option>
				    					</select>
				    				</div>
				    			</div>
			   						
			    			</div>


							<div class="row" align="center" id="etiquetatiposala" style="display: none;">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				    				<div class="form-group" style="background-color: #f5f5f5;">
										
							    		<div class="form-check form-check-inline"><h5>Tipo de Sala</h5></div>
				    				
							    		</div>
							    	</div>
							</div>
			    			
			    			<div class="form-check" id="radionormal"  style="display: none";>
			    			
							  <input type="radio" class="form-check-input" name="tipoSala" value="Normal" checked>
							  <label class="form-check-label">Normal</label>
							</div>

							
							<div class="form-check" id="radio3d"  style="display: none";>
							  <input type="radio" class="form-check-input" name="tipoSala" value="3D">
							  <label class="form-check-label">3D</label>
							</div>

							<div class="form-check" id="radioimax"  style="display: none";>
							  <input type="radio" class="form-check-input" name="tipoSala" value="Imax">
							  <label class="form-check-label">Imax</label>
							</div>

							<div class="form-check" id="radiojunior"  style="display: none";>
							  <input type="radio" class="form-check-input" name="tipoSala" value="Junior">
							  <label class="form-check-label">Junior</label>
							</div>


							<div class="row" align="center" id="etiqueta3d" style="display: none;">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				    				<div class="form-group" style="background-color: #f5f5f5;">
										
							    		<div class="form-check form-check-inline"><h5>Rango de Horarios</h5></div>
				    				
							    		</div>
							    	</div>
							</div>

							<div class="row">

									<div class="col-xs-10 col-sm-10 col-md-10" id="informacionidioma3d" style="display: none;">
				    				
				    				<div class="form-group">
				    					<label id="informacion3d"><h6>11:00 am - 15:00pm</h6></label><br>
				    					
					    					<div class="form-group row">
										    <label class="col-sm-3 col-form-label">ADULTO</label>
										    <div class="col-sm-8">
										      <input type="text" name="adultoprimerrango" class="form-control" id="" placeholder="59" maxlength="3" required>
										    </div>
										  	</div>

										  	<div class="form-group row">
										    <label class="col-sm-3 col-form-label">3 ERA EDAD</label>
										    <div class="col-sm-8">
										      <input type="text" name="terceraedadprimerrango" class="form-control" id="" placeholder="48" maxlength="3" required>
										    </div>
										  	</div>

										  	<div class="form-group row">
										    <label class="col-sm-3 col-form-label">NIÑOS</label>
										    <div class="col-sm-8">
										      <input type="text" name="ninosprimerrango" class="form-control" id="" placeholder="48" maxlength="3" required>
										    </div>
										  	</div>

									</div>

									<div class="form-group">
				    					<label id="informacion3d"><h6>Después de las 15 horas</h6></label><br>
				    					
					    					<div class="form-group row">
										    <label class="col-sm-3 col-form-label">ADULTO</label>
										    <div class="col-sm-8">
										      <input type="text" name="adultosegundorango" class="form-control" id="" placeholder="59" maxlength="3" required>
										    </div>
										  	</div>

										  	<div class="form-group row">
										    <label class="col-sm-3 col-form-label">3 ERA EDAD</label>
										    <div class="col-sm-8">
										      <input type="text" name="terceraedadsegundorango" class="form-control" id="" placeholder="48" maxlength="3" required>
										    </div>
										  	</div>

										  	<div class="form-group row">
										    <label class="col-sm-3 col-form-label">NIÑOS</label>
										    <div class="col-sm-8">
										      <input type="text" name="ninossegundorango" class="form-control" id="" placeholder="48" maxlength="3" required>
										    </div>
										  	</div>

									</div>

							</div>

			    			<div class="row" style="padding-top: 20px;width: auto; padding-left:45%; padding-right:40%; padding-bottom:10px;">
			    					<input type="submit" value="Registrar" class="btn btn-info btn-block col-lg-12">
			    			</div>
			    			
			    			
			    		</form>
				  </div>
				</div>

        		
		
		
	


</body>
<?php include('footer/footer.php'); ?>
</html>