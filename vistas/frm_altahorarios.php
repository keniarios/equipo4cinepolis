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

<?php  
 	$Pciudad = $_GET['ciudad'];
 	$PnCiudad = mb_strtoupper($Pciudad);
    $Pid_sucursal = $_GET['id_sucursal'];

    include ('../bd/conexion.php'); $conexion = conectarBD();

    //consulta para sacar el nombre de la sucursal
    $Tsucursal = pg_query("SELECT nombre FROM altasucursal WHERE id_sucursal = '$Pid_sucursal'");
    $row = pg_fetch_array($Tsucursal);

    //consulta para sacar las peliculas
    $result = pg_query("SELECT id_pelicula, titulo, idiomaespanol, idiomaingles, subtituloespanol, subtituloingles, pelicula3d, idiomaespanol3d, idiomaingles3d, subtituloespanol3d, subtituloingles3d FROM peliculas ORDER BY titulo");
?>

<!DOCTYPE html>
<html>
<?php include('header/encabezado2.php'); ?>
<head>
	<title></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body style="background-color: #EBECEF;">

	<div class="panel panel-default" >
		  <div class="panel-heading" id="cab-panel" style="margin-top: 35px;">
		    <label class="panel-title" style="color:black;font-size:20px;">ALTAS DE HORARIOS DE <?php echo "$PnCiudad, <b style='font-weight: bold; font-size: 14px;'>Sucursal: $row[0]</b>"; ?></label>
		  </div>
		  <div class="panel-body" id="cuerpoform" style="margin-bottom: 35px;">

		    <?php echo "<form role='form' action='../controladores/admin_horarios.php?ciudad=$Pciudad&id_sucursal=$Pid_sucursal' method='post'  enctype='multipart/form-data'>"; ?>

    			<div class="row">
    				<div class="col-xs-7 col-sm-7 col-md-7">
    					<div><label>Fecha Registro:</label></div>
    					<div class="form-control" style="width: 120px; margin-bottom: 10px;">

                		<?php 
                			date_default_timezone_set("America/Mazatlan");
                		 	$fecha = date("Y-m-d");
                		 	//$fecha = date("Y-m-d H:i:s");
                			echo "$fecha";
                		 ?>
    					</div>
    				</div>
    			</div>

    			<div class="row">
						<div class="col-xs-10 col-sm-10 col-md-10">
						<div class="form-group"><br><label style="font-weight: bold; width: 350px;">Película</label>
							<div class="selector" id="selectorpelicula">
								<select name="opcionpelicula" id="opcionpelicula" style="width:100%; height: 30px; font-family:'Roboto',Helvetica,Arial,sans-serif;height:33px;margin-top:2px;margin-bottom:15px;-webkit-transition:0.3s all;-moz-transition:0.3s all;-o-transition:0.3s all;-ms-transition:0.3s all;transition:0.3s all; margin-bottom:15px;">
									<option value="" style=" font-size: 15px;">Seleccione una Película</option>
									<?php
								    while ($datos=pg_fetch_array($result)) {
										$ID = $datos['id_pelicula'];
										$titulo = $datos['titulo'];
										$idiomaespanol = $datos['idiomaespanol'];
										$idiomaingles = $datos['idiomaingles'];
										$subtituloespanol = $datos['subtituloespanol'];
										$subtituloingles = $datos['subtituloingles'];
										$pelicula3d = $datos['pelicula3d'];
										$idiomaespanol3d = $datos['idiomaespanol3d'];
										$idiomaingles3d = $datos['idiomaingles3d'];
										$subtituloespanol3d = $datos['subtituloespanol3d'];
										$subtituloingles3d = $datos['subtituloingles3d'];
									
									echo "
									<option value='$ID' style=' font-size: 14px;'>$titulo</option>
									";
									}
									?>
								</select>
							</div>
		    			</div>
			    	</div>
			    </div><!--fin_row-->

			    <div class="row">
			    	<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group"><br><label style="font-weight: bold; margin-left: 40px; width: 150px;">Idioma</label>
							<div class="selector" id="selectoridioma">
							   <select name="opcionidioma" id="opcionidioma" style="width: 200px; height: 30px; font-family:'Roboto',Helvetica,Arial,sans-serif;height:33px;margin-top:2px;margin-bottom:15px;-webkit-transition:0.3s all;-moz-transition:0.3s all;-o-transition:0.3s all;-ms-transition:0.3s all;transition:0.3s all;margin-bottom:15px;">
									<option value="">Seleccione</option>
								</select>
							</div>
		    			</div>
			    	</div>

			    	<div class="col-xs-5 col-sm-5 col-md-5">
						<div class="form-group"><br><label style="font-weight: bold; margin-left: 40px; width: 150px;">Sala</label>
							<div class="selector" id="selectorsala">
								<select name="opcionsala" id="opcionsala" style=" width: 200px; height: 30px; font-family:'Roboto',Helvetica,Arial,sans-serif;height:33px;margin-top:2px;margin-bottom:15px;-webkit-transition:0.3s all;-moz-transition:0.3s all;-o-transition:0.3s all;-ms-transition:0.3s all;transition:0.3s all; margin-bottom:15px;">
									<option value="">Seleccione</option>
									<?php

								    $resultsala =pg_query("SELECT id_sala, nombre FROM salas WHERE estatus='1' and ciudad='$Pciudad' and id_sucursal='$Pid_sucursal' ORDER BY nombre");

								    
								    while ($datosSala=pg_fetch_array($resultsala)) {
										$ID_Sala = $datosSala['id_sala'];
										$nombreSala = $datosSala['nombre'];
									
									echo "
										<option value='$ID_Sala' style=' font-size: 14px;'>$nombreSala</option>";
									}
									?>
								</select>
							</div>
		    			</div>
			    	</div>
			    </div>


			    <div class="row">
						<div class="col-xs-0 col-sm-0 col-md-0">
						<div class="form-group"><label style="font-weight: bold; margin-left: 20px;">Hora</label>
							<div class="selector" id="selector hora">
								<select name="opcionhora" id="opcionhora" style="margin-left: 20px; height: 30px; font-family:'Roboto',Helvetica,Arial,sans-serif;height:33px;margin-top:2px;margin-bottom:15px;-webkit-transition:0.3s all;-moz-transition:0.3s all;-o-transition:0.3s all;-ms-transition:0.3s all;transition:0.3s all;margin-bottom:15px; text-align: center;">
									<option value="">NA</option>
									<option value="00">00</option>
									<option value="01">01</option>
									<option value="02">02</option>
									<option value="03">03</option>
									<option value="04">04</option>
									<option value="05">05</option>
									<option value="06">06</option>
									<option value="07">07</option>
									<option value="08">08</option>
									<option value="09">09</option>
									<option value="10">10</option>
									<option value="11">11</option>
									<option value="12">12</option>
									<option value="13">13</option>
									<option value="14">14</option>
									<option value="15">15</option>
									<option value="16">16</option>
									<option value="17">17</option>
									<option value="18">18</option>
									<option value="19">19</option>
									<option value="20">20</option>
									<option value="21">21</option>
									<option value="22">22</option>
									<option value="23">23</option>
								</select>
							</div>
		    			</div>
			    	</div>

			    	<div class="col-xs-0 col-sm-0 col-md-0">
						<div class="form-group">
							<div class="selector" id="selector hora" style="margin-left:5px; margin-right: 5px; margin-top: 35px;font-weight: bold;font-size: 20px;">
								:
							</div>
		    			</div>
			    	</div>

			    	<div class="col-xs-0 col-sm-0 col-md-0">
						<div class="form-group"><label style="font-weight: bold;">Minutos</label>
							<div class="selector" id="selector hora">
								<select name="opcionminutos" id="opcionminutos" style="height: 30px; font-family:'Roboto',Helvetica,Arial,sans-serif;height:33px;margin-top:2px;margin-bottom:15px;-webkit-transition:0.3s all;-moz-transition:0.3s all;-o-transition:0.3s all;-ms-transition:0.3s all;transition:0.3s all; margin-bottom:15px; text-align: center;">
									<option value="">NA</option>
									<option value="00">00</option>
									<option value="01">01</option>
									<option value="02">02</option>
									<option value="03">03</option>
									<option value="04">04</option>
									<option value="05">05</option>
									<option value="06">06</option>
									<option value="07">07</option>
									<option value="08">08</option>
									<option value="09">09</option>
									<option value="10">10</option>
									<option value="11">11</option>
									<option value="12">12</option>
									<option value="13">13</option>
									<option value="14">14</option>
									<option value="15">15</option>
									<option value="16">16</option>
									<option value="17">17</option>
									<option value="18">18</option>
									<option value="19">19</option>
									<option value="20">20</option>
									<option value="21">21</option>
									<option value="22">22</option>
									<option value="23">23</option>
									<option value="24">24</option>
									<option value="25">25</option>
									<option value="26">26</option>
									<option value="27">27</option>
									<option value="28">28</option>
									<option value="29">29</option>
									<option value="30">30</option>
									<option value="31">31</option>
									<option value="32">32</option>
									<option value="33">33</option>
									<option value="34">34</option>
									<option value="35">35</option>
									<option value="36">36</option>
									<option value="37">37</option>
									<option value="38">38</option>
									<option value="39">39</option>
									<option value="40">40</option>
									<option value="41">41</option>
									<option value="42">42</option>
									<option value="43">43</option>
									<option value="44">44</option>
									<option value="45">45</option>
									<option value="46">46</option>
									<option value="47">47</option>
									<option value="48">48</option>
									<option value="49">49</option>
									<option value="50">50</option>
									<option value="51">51</option>
									<option value="52">52</option>
									<option value="53">53</option>
									<option value="54">54</option>
									<option value="55">55</option>
									<option value="56">56</option>
									<option value="57">57</option>
									<option value="58">58</option>
									<option value="59">59</option>
									<option value="60">60</option>
								</select>
							</div>
		    			</div>
			    	</div>

			    	<div class="col-xs-4 col-sm-4 col-md-4" style="margin-left: 50px;">
    					<div class="form-group"><label style="font-weight: bold;">Fecha</label>
    						<input type="date" name="fechaEstreno" id="fechaEstreno" class="form-control input-sm" required>
    					</div>
    				</div>
			    </div><!--fin_row-->

    			<div class="row" style="padding-top: 20px;width: auto; padding-left:30%; padding-right:30%; padding-bottom:10px;">
    					<input type="submit" value="Registrar" class="btn btn-info btn-block">
    			</div>
    			
    			
    		</form>
	  </div>
	</div>
</body>
<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/llamadasAjax.js"></script>
<?php include('footer/footer.php'); ?>
</html>