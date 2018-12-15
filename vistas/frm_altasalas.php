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


    include ('../bd/conexion.php'); $conexion = conectarBD();

    //consulta para sacar el nombre de la sucursal
    $ResultSucursal = pg_query("SELECT DISTINCT ON (ciudad) ciudad, id_sucursal from altasucursal ORDER BY ciudad");

    //consulta para sacar las peliculas
    $result = pg_query("SELECT id_pelicula, titulo, idiomaespanol, idiomaingles, subtituloespanol, subtituloingles, pelicula3d, idiomaespanol3d, idiomaingles3d, subtituloespanol3d, subtituloingles3d FROM peliculas ORDER BY titulo");
 ?>

<!DOCTYPE html>
<html>
<?php include('header/encabezado2.php'); ?>
<head>
	<title></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<script type="text/javascript">
    function showContent() {
    	elementoetiqueta = document.getElementById("etiqueta3d");
        elementoidioma = document.getElementById("informacionidioma3d");
        elementosubtitulo = document.getElementById("informacionsubtitulo3d");
        check = document.getElementById("tresd");
        if (check.checked) {
        	 elementoetiqueta.style.display='block';
            elementoidioma.style.display='block';
            elementosubtitulo.style.display='block';

        }
        else {
        	elementoetiqueta.style.display='none';
            elementoidioma.style.display='none';
            elementosubtitulo.style.display='none';
        }
    }
</script> 

</head>
<body style="background-color: #EBECEF;">

				<div class="panel panel-default" >
					  <div class="panel-heading" id="cab-panel" style="margin-top: 35px;">
					    <label class="panel-title" style="color:black;font-size:20px;">ALTAS DE SALAS</label>
					  </div>
					  <div class="panel-body" id="cuerpoform">
					    <form role="form" action="../controladores/admin_altasalas.php" method="post" id="frm" enctype="multipart/form-data">

			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div><label>Fecha Registro:</label></div>
			    					<div class="form-control" style="width: 190px; margin-bottom: 10px;">

			                		<?php 
					                	date_default_timezone_set("America/Mazatlan");
				                		$fecha = date("Y-m-d");
			                		 	echo "$fecha"; 
			                		 ?>
			    					</div>
			    				</div>
			    			</div>

			    			<div class="row">
			    				<div class="col-md-4">
			    					<div class="form-group"><label>Nombre:</label>
			    						<input type="text" name="nombre" id="nombre" class="form-control input-sm" style="text-transform: uppercase;" required>
			    					</div>
			    				</div>
			    				<div class="col-md-4">
			    					<div class="form-group"><label>Tipo de Sala:</label>
			    						<select id="tipo" class="form-control input-sm">
			    							<option value="">Seleccione</option>
					    					<option value="Básica">Básica</option>
					    					<option value="Junior">Junior</option>
					    					<option value="VIP">VIP</option>
					    					<option value="4DX">4DX</option>
					    					<option value="IMAX">IMAX</option>
					    					<option value="MACRO XE">MACRO XE</option>
					    					<option value="3D">3D</option>
					    					<option value="De Arte">De Arte</option>
				    					</select>
			    					</div>
			    				</div>	

			   					<div class="col-md-4">
			    					<div class="form-group"><label>Estatus:</label>
			    						<select id="estatus" class="form-control input-sm" required>
			    							<option value="">Seleccione</option>
					    					<option value="1">Disponible</option>
					    					<option value="2">Ocupada</option>
					    					<option value="3">Inhabilitada</option>
				    					</select>
			    					</div>
			    				</div>
			    			</div>

			    			<div class="row">
			    				<div class="col-md-6">
			    					<div class="form-group"><label>Ciudad:</label>
			    						<select id="ciudadSala" class="form-control input-sm" required>
			    							<option value="">Selecciona</option>
			    							<?php
										    while ($datos=pg_fetch_array($ResultSucursal)) {
												$ID = $datos['id_sucursal'];
												$ciudad = $datos['ciudad'];
											
											echo "<option value='$ciudad' style='font-size: 14px;'>$ciudad</option>";
											}
											?>
				    					</select>
			    					</div>
			    				</div>
			    				<div class="col-md-6">
			    					<div class="form-group"><label>Sucursal:</label>
			                			<select id="sucursal" class="form-control input-sm" required>
			    							<option value="">Selecciona un cine</option>
				    					</select>
			    					</div>
			    				</div>
			    			</div>
			    			<!--<div class="row">
			   					
			   					<div class="col-md-12">
			   					<input type="button" css="btn btn-success" id="marcarTodo" value="Marcar todos">
			   					<input type="hidden" id="marcados" value="0">
			    				</div>
			    				
			    			</div>-->

			    			<div class="row">
			    				<div class="col-md-12">
		    						<table>
		    							<tr>
		    								<td>
	    										<label class="checkeable">
												  	<input id="a01" type="checkbox"/>
													<label for="a01">A01</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="a02" type="checkbox"/>
													<label for="a02">A02</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="a03" type="checkbox"/>
													<label for="a03">A03</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="a04" type="checkbox"/>
													<label for="a04">A04</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="a05" type="checkbox"/>
													<label for="a05">A05</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="a06" type="checkbox"/>
													<label for="a06">A06</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="a07" type="checkbox"/>
													<label for="a07">A07</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="a08" type="checkbox"/>
													<label for="a08">A08</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="a09" type="checkbox"/>
													<label for="a09">A09</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="a10" type="checkbox"/>
													<label for="a10">A10</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="a11" type="checkbox"/>
													<label for="a11">A11</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="a12" type="checkbox"/>
													<label for="a12">A12</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="a13" type="checkbox"/>
													<label for="a13">A13</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="a14" type="checkbox"/>
													<label for="a14">A14</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="a15" type="checkbox"/>
													<label for="a15">A15</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="a16" type="checkbox"/>
													<label for="a16">A16</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="a17" type="checkbox"/>
													<label for="a17">A17</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="a18" type="checkbox"/>
													<label for="a18">A18</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="a19" type="checkbox"/>
													<label for="a19">A19</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="a20" type="checkbox"/>
													<label for="a20">A20</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="a21" type="checkbox"/>
													<label for="a21">A21</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="a22" type="checkbox"/>
													<label for="a22">A22</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="a23" type="checkbox"/>
													<label for="a23">A23</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="a24" type="checkbox"/>
													<label for="a24">A24</label>
												</label>
											</td>
		    							</tr>
		    							<!-- FILA-->
		    							<tr>
		    								<td>
	    										<label class="checkeable">
												  	<input id="b01" type="checkbox"/>
													<label for="b01">B01</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="b02" type="checkbox"/>
													<label for="b02">B02</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="b03" type="checkbox"/>
													<label for="b03">B03</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="b04" type="checkbox"/>
													<label for="b04">B04</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="b05" type="checkbox"/>
													<label for="b05">B05</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="b06" type="checkbox"/>
													<label for="b06">B06</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="b07" type="checkbox"/>
													<label for="b07">B07</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="b08" type="checkbox"/>
													<label for="b08">B08</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="b09" type="checkbox"/>
													<label for="b09">B09</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="b10" type="checkbox"/>
													<label for="b10">B10</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="b11" type="checkbox"/>
													<label for="b11">B11</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="b12" type="checkbox"/>
													<label for="b12">B12</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="b13" type="checkbox"/>
													<label for="b13">B13</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="b14" type="checkbox"/>
													<label for="b14">B14</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="b15" type="checkbox"/>
													<label for="b15">B15</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="b16" type="checkbox"/>
													<label for="b16">B16</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="b17" type="checkbox"/>
													<label for="b17">B17</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="b18" type="checkbox"/>
													<label for="b18">B18</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="b19" type="checkbox"/>
													<label for="b19">B19</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="b20" type="checkbox"/>
													<label for="b20">B20</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="b21" type="checkbox"/>
													<label for="b21">B21</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="b22" type="checkbox"/>
													<label for="b22">B22</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="b23" type="checkbox"/>
													<label for="b23">B23</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="b24" type="checkbox"/>
													<label for="b24">B24</label>
												</label>
											</td>
		    							</tr>
		    							<!-- FILA-->
		    							<tr>
		    								<td>
	    										<label class="checkeable">
												  	<input id="c01" type="checkbox"/>
													<label for="c01">C01</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="c02" type="checkbox"/>
													<label for="c02">C02</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="c03" type="checkbox"/>
													<label for="c03">C03</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="c04" type="checkbox"/>
													<label for="c04">C04</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="c05" type="checkbox"/>
													<label for="c05">C05</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="c06" type="checkbox"/>
													<label for="c06">C06</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="c07" type="checkbox"/>
													<label for="c07">C07</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="c08" type="checkbox"/>
													<label for="c08">C08</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="c09" type="checkbox"/>
													<label for="c09">C09</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="c10" type="checkbox"/>
													<label for="c10">C10</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="c11" type="checkbox"/>
													<label for="c11">C11</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="c12" type="checkbox"/>
													<label for="c12">C12</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="c13" type="checkbox"/>
													<label for="c13">C13</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="c14" type="checkbox"/>
													<label for="c14">C14</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="c15" type="checkbox"/>
													<label for="c15">C15</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="c16" type="checkbox"/>
													<label for="c16">C16</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="c17" type="checkbox"/>
													<label for="c17">C17</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="c18" type="checkbox"/>
													<label for="c18">C18</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="c19" type="checkbox"/>
													<label for="c19">C19</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="c20" type="checkbox"/>
													<label for="c20">C20</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="c21" type="checkbox"/>
													<label for="c21">C21</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="c22" type="checkbox"/>
													<label for="c22">C22</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="c23" type="checkbox"/>
													<label for="c23">C23</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="c24" type="checkbox"/>
													<label for="c24">C24</label>
												</label>
											</td>
		    							</tr>
		    							<!-- FILA-->
		    							<tr>
		    								<td>
	    										<label class="checkeable">
												  	<input id="d01" type="checkbox"/>
													<label for="d01">D01</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="d02" type="checkbox"/>
													<label for="d02">D02</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="d03" type="checkbox"/>
													<label for="d03">D03</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="d04" type="checkbox"/>
													<label for="d04">D04</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="d05" type="checkbox"/>
													<label for="d05">D05</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="d06" type="checkbox"/>
													<label for="d06">D06</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="d07" type="checkbox"/>
													<label for="d07">D07</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="d08" type="checkbox"/>
													<label for="d08">D08</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="d09" type="checkbox"/>
													<label for="d09">D09</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="d10" type="checkbox"/>
													<label for="d10">D10</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="d11" type="checkbox"/>
													<label for="d11">D11</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="d12" type="checkbox"/>
													<label for="d12">D12</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="d13" type="checkbox"/>
													<label for="d13">D13</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="d14" type="checkbox"/>
													<label for="d14">D14</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="d15" type="checkbox"/>
													<label for="d15">D15</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="d16" type="checkbox"/>
													<label for="d16">D16</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="d17" type="checkbox"/>
													<label for="d17">D17</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="d18" type="checkbox"/>
													<label for="d18">D18</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="d19" type="checkbox"/>
													<label for="d19">D19</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="d20" type="checkbox"/>
													<label for="d20">D20</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="d21" type="checkbox"/>
													<label for="d21">D21</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="d22" type="checkbox"/>
													<label for="d22">D22</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="d23" type="checkbox"/>
													<label for="d23">D23</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="d24" type="checkbox"/>
													<label for="d24">D24</label>
												</label>
											</td>
		    							</tr>
		    							<!-- FILA-->
		    							<tr>
		    								<td>
	    										<label class="checkeable">
												  	<input id="e01" type="checkbox"/>
													<label for="e01">E01</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="e02" type="checkbox"/>
													<label for="e02">E02</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="e03" type="checkbox"/>
													<label for="e03">E03</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="e04" type="checkbox"/>
													<label for="e04">E04</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="e05" type="checkbox"/>
													<label for="e05">E05</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="e06" type="checkbox"/>
													<label for="e06">E06</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="e07" type="checkbox"/>
													<label for="e07">E07</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="e08" type="checkbox"/>
													<label for="e08">E08</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="e09" type="checkbox"/>
													<label for="e09">E09</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="e10" type="checkbox"/>
													<label for="e10">E10</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="e11" type="checkbox"/>
													<label for="e11">E11</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="e12" type="checkbox"/>
													<label for="e12">E12</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="e13" type="checkbox"/>
													<label for="e13">E13</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="e14" type="checkbox"/>
													<label for="e14">E14</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="e15" type="checkbox"/>
													<label for="e15">E15</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="e16" type="checkbox"/>
													<label for="e16">E16</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="e17" type="checkbox"/>
													<label for="e17">E17</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="e18" type="checkbox"/>
													<label for="e18">E18</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="e19" type="checkbox"/>
													<label for="e19">E19</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="e20" type="checkbox"/>
													<label for="e20">E20</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="e21" type="checkbox"/>
													<label for="e21">E21</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="e22" type="checkbox"/>
													<label for="e22">E22</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="e23" type="checkbox"/>
													<label for="e23">E23</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="e24" type="checkbox"/>
													<label for="e24">E24</label>
												</label>
											</td>
		    							</tr>
		    							<!-- FILA-->
		    							<tr>
		    								<td>
	    										<label class="checkeable">
												  	<input id="f01" type="checkbox"/>
													<label for="f01">F01</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="f02" type="checkbox"/>
													<label for="f02">F02</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="f03" type="checkbox"/>
													<label for="f03">F03</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="f04" type="checkbox"/>
													<label for="f04">F04</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="f05" type="checkbox"/>
													<label for="f05">F05</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="f06" type="checkbox"/>
													<label for="f06">F06</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="f07" type="checkbox"/>
													<label for="f07">F07</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="f08" type="checkbox"/>
													<label for="f08">F08</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="f09" type="checkbox"/>
													<label for="f09">F09</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="f10" type="checkbox"/>
													<label for="f10">F10</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="f11" type="checkbox"/>
													<label for="f11">F11</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="f12" type="checkbox"/>
													<label for="f12">F12</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="f13" type="checkbox"/>
													<label for="f13">F13</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="f14" type="checkbox"/>
													<label for="f14">F14</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="f15" type="checkbox"/>
													<label for="f15">F15</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="f16" type="checkbox"/>
													<label for="f16">F16</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="f17" type="checkbox"/>
													<label for="f17">F17</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="f18" type="checkbox"/>
													<label for="f18">F18</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="f19" type="checkbox"/>
													<label for="f19">F19</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="f20" type="checkbox"/>
													<label for="f20">F20</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="f21" type="checkbox"/>
													<label for="f21">F21</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="f22" type="checkbox"/>
													<label for="f22">F22</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="f23" type="checkbox"/>
													<label for="f23">F23</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="f24" type="checkbox"/>
													<label for="f24">F24</label>
												</label>
											</td>
		    							</tr>
		    							<!-- FILA-->
		    							<tr>
		    								<td>
	    										<label class="checkeable">
												  	<input id="g01" type="checkbox"/>
													<label for="g01">G01</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="g02" type="checkbox"/>
													<label for="g02">G02</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="g03" type="checkbox"/>
													<label for="g03">G03</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="g04" type="checkbox"/>
													<label for="g04">G04</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="g05" type="checkbox"/>
													<label for="g05">G05</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="g06" type="checkbox"/>
													<label for="g06">G06</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="g07" type="checkbox"/>
													<label for="g07">G07</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="g08" type="checkbox"/>
													<label for="g08">G08</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="g09" type="checkbox"/>
													<label for="g09">G09</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="g10" type="checkbox"/>
													<label for="g10">G10</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="g11" type="checkbox"/>
													<label for="g11">G11</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="g12" type="checkbox"/>
													<label for="g12">G12</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="g13" type="checkbox"/>
													<label for="g13">G13</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="g14" type="checkbox"/>
													<label for="g14">G14</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="g15" type="checkbox"/>
													<label for="g15">G15</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="g16" type="checkbox"/>
													<label for="g16">G16</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="g17" type="checkbox"/>
													<label for="g17">G17</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="g18" type="checkbox"/>
													<label for="g18">G18</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="g19" type="checkbox"/>
													<label for="g19">G19</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="g20" type="checkbox"/>
													<label for="g20">G20</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="g21" type="checkbox"/>
													<label for="g21">G21</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="g22" type="checkbox"/>
													<label for="g22">G22</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="g23" type="checkbox"/>
													<label for="g23">G23</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="g24" type="checkbox"/>
													<label for="g24">G24</label>
												</label>
											</td>
		    							</tr>
		    							<!-- FILA-->
		    							<tr>
		    								<td>
	    										<label class="checkeable">
												  	<input id="h01" type="checkbox"/>
													<label for="h01">H01</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="h02" type="checkbox"/>
													<label for="h02">H02</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="h03" type="checkbox"/>
													<label for="h03">H03</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="h04" type="checkbox"/>
													<label for="h04">H04</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="h05" type="checkbox"/>
													<label for="h05">H05</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="h06" type="checkbox"/>
													<label for="h06">H06</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="h07" type="checkbox"/>
													<label for="h07">H07</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="h08" type="checkbox"/>
													<label for="h08">H08</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="h09" type="checkbox"/>
													<label for="h09">H09</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="h10" type="checkbox"/>
													<label for="h10">H10</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="h11" type="checkbox"/>
													<label for="h11">H11</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="h12" type="checkbox"/>
													<label for="h12">H12</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="h13" type="checkbox"/>
													<label for="h13">H13</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="h14" type="checkbox"/>
													<label for="h14">H14</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="h15" type="checkbox"/>
													<label for="h15">H15</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="h16" type="checkbox"/>
													<label for="h16">H16</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="h17" type="checkbox"/>
													<label for="h17">H17</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="h18" type="checkbox"/>
													<label for="h18">H18</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="h19" type="checkbox"/>
													<label for="h19">H19</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="h20" type="checkbox"/>
													<label for="h20">H20</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="h21" type="checkbox"/>
													<label for="h21">H21</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="h22" type="checkbox"/>
													<label for="h22">H22</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="h23" type="checkbox"/>
													<label for="h23">H23</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="h24" type="checkbox"/>
													<label for="h24">H24</label>
												</label>
											</td>
		    							</tr>
		    							<!-- FILA-->
		    							<tr>
		    								<td>
	    										<label class="checkeable">
												  	<input id="i01" type="checkbox"/>
													<label for="i01">I01</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="i02" type="checkbox"/>
													<label for="i02">I02</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="i03" type="checkbox"/>
													<label for="i03">I03</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="i04" type="checkbox"/>
													<label for="i04">I04</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="i05" type="checkbox"/>
													<label for="i05">I05</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="i06" type="checkbox"/>
													<label for="i06">I06</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="i07" type="checkbox"/>
													<label for="i07">I07</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="i08" type="checkbox"/>
													<label for="i08">I08</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="i09" type="checkbox"/>
													<label for="i09">I09</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="i10" type="checkbox"/>
													<label for="i10">I10</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="i11" type="checkbox"/>
													<label for="i11">I11</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="i12" type="checkbox"/>
													<label for="i12">I12</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="i13" type="checkbox"/>
													<label for="i13">I13</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="i14" type="checkbox"/>
													<label for="i14">I14</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="i15" type="checkbox"/>
													<label for="i15">I15</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="i16" type="checkbox"/>
													<label for="i16">I16</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="i17" type="checkbox"/>
													<label for="i17">I17</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="i18" type="checkbox"/>
													<label for="i18">I18</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="i19" type="checkbox"/>
													<label for="i19">I19</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="i20" type="checkbox"/>
													<label for="i20">I20</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="i21" type="checkbox"/>
													<label for="i21">I21</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="i22" type="checkbox"/>
													<label for="i22">I22</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="i23" type="checkbox"/>
													<label for="i23">I23</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="i24" type="checkbox"/>
													<label for="i24">I24</label>
												</label>
											</td>
		    							</tr>
		    							<!-- FILA-->
		    							<tr>
		    								<td>
	    										<label class="checkeable">
												  	<input id="j01" type="checkbox"/>
													<label for="j01">J01</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="j02" type="checkbox"/>
													<label for="j02">J02</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="j03" type="checkbox"/>
													<label for="j03">J03</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="j04" type="checkbox"/>
													<label for="j04">J04</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="j05" type="checkbox"/>
													<label for="j05">J05</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="j06" type="checkbox"/>
													<label for="j06">J06</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="j07" type="checkbox"/>
													<label for="j07">J07</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="j08" type="checkbox"/>
													<label for="j08">J08</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="j09" type="checkbox"/>
													<label for="j09">J09</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="j10" type="checkbox"/>
													<label for="j10">J10</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="j11" type="checkbox"/>
													<label for="j11">J11</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="j12" type="checkbox"/>
													<label for="j12">J12</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="j13" type="checkbox"/>
													<label for="j13">J13</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="j14" type="checkbox"/>
													<label for="j14">J14</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="j15" type="checkbox"/>
													<label for="j15">J15</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="j16" type="checkbox"/>
													<label for="j16">J16</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="j17" type="checkbox"/>
													<label for="j17">J17</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="j18" type="checkbox"/>
													<label for="j18">J18</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="j19" type="checkbox"/>
													<label for="j19">J19</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="j20" type="checkbox"/>
													<label for="j20">J20</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="j21" type="checkbox"/>
													<label for="j21">J21</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="j22" type="checkbox"/>
													<label for="j22">J22</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="j23" type="checkbox"/>
													<label for="j23">J23</label>
												</label>
											</td>
											<td>
	    										<label class="checkeable">
												  	<input id="j24" type="checkbox"/>
													<label for="j24">J24</label>
												</label>
											</td>
		    							</tr>
		    						</table>
			    				</div>
			    			</div>
			    			<input type="hidden" name="asientosSeleccionados" id="asientosSeleccionados">

			    			<div class="row" style="padding-top: 20px;width: auto; padding-left:30%; padding-right:30%; padding-bottom:10px;">
			    					<input type="button" value="Registrar" class="btn btn-info btn-block" onclick="guardar();">
			    			</div>
			    			
			    			
			    		</form>
				  </div>
				</div>

        		
		
		<style type="text/css">
			label{
				margin-bottom: 1px;
			}
			input[type=checkbox] {
			  display: none;
			}

			input[type=checkbox] + label {  
			  height: 25px;
			  width: 25px;
			  background-image: url('../img/seat_0.png');
			  display: inline-block;
			  font-size: 11px;
			  text-align: center;
			  padding-top: 3px;
			  cursor: pointer;
			}

			input[type=checkbox]:checked + label {
			  background-image: url('../img/seat_5.png');
			}

			input[type=checkbox]:disabled + label {
			  background-image: url('../img/seat_1.png')!important;
			  cursor:no-drop;
			}
		</style>


		<script type="text/javascript">
			function guardar(){
				var nombre = $("#nombre").val();
				var sucursal = $("#sucursal").val();
				var ciudad = $("#ciudadSala").val();
				var estatus = $("#estatus").val();
				var tipo = $("#tipo").val();
				var listaAsientos = [];
		        var collection = $(":checkbox:checked");
		        /*for (var i = 0; i < collection.length; i++) {
		            listaAsientos.push(collection[i]["id"]);
		        }*/
		        $("#asientosSeleccionados").val(listaAsientos);
		        var asientosSeleccionados = $("#asientosSeleccionados").val()
		        //alert($("#asientosSeleccionados").val());
		        $.ajax({
	                url: '../controladores/admin_altasalas.php',
	                type: "POST",
	                dataType: "TEXT",
	                data: { nombre: nombre, sucursal: sucursal, ciudad: ciudad , estatus: estatus, tipo: tipo, asientosSeleccionados : asientosSeleccionados},
	                success: function (response) {
	                    alert(response);
	                    mensajeCorrecto = "Datos guarados correctamente";
	                    if (response.includes(mensajeCorrecto)) {
	                    	location.reload();
	                    }
	                }
	            });
	            window.location="frm_altasalas.php?";
			}

			$("input[type=checkbox]").prop('checked', true);
			/*$("#marcarTodo").click(function () {
				$("input[type=checkbox]").prop('checked', true);
			    if ($(marcados).val() == "0") {
			        //$("input[type=checkbox]").prop('checked', true); //todos los check
			        $("input[type=checkbox]").prop('checked', true); //solo los del objeto #diasHabilitados
			        $(marcados).val("1");
			    } else {
			        //$("input[type=checkbox]").prop('checked', false);//todos los check
			        $("input[type=checkbox]").prop('checked', false);//solo los del objeto #diasHabilitados
			        $(marcados).val("0");
			    }
			});*/
		</script>

</body>
<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/llamadasAjax.js"></script>
<?php include('footer/footer.php'); ?>
</html>