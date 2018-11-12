<?php
	include ('bd/conexion.php'); $conexion = conectarBD();

	$id_horario = $_GET['id_horario'];
	$Cedad3era = $_POST['edad3era'];
	$Cadulto = $_POST['adulto'];
	$Cninos = $_POST['ninos'];
	$precioTotal3raEdad = $_POST['precioTotal3raEdad'];
	$precioTotalAdulto = $_POST['precioTotalAdulto'];
	$precioTotalNino = $_POST['precioTotalNino'];


	/*$id_horario = $_GET['id_horario'];
	$Cedad3era = $_GET['edad3era'];
	$Cadulto = $_GET['adulto'];
	$Cninos = $_GET['ninos'];
	$precioTotal3raEdad = $_GET['precioTotal3raEdad'];
	$precioTotalAdulto = $_GET['precioTotalAdulto'];
	$precioTotalNino = $_GET['precioTotalNino'];
	*/

	//DEFINIR EL TOTAL DEL PRECIO
	$PrecioTotal = $precioTotal3raEdad + $precioTotalAdulto + $precioTotalNino;

	//ASIENTOS
	$asientos = $Cedad3era + $Cadulto + $Cninos;
	$ocupados = "b01,b02,b03,b04,b05";

	//SELECCIONAR DATOS DE LA PELICULA
	$Timagen = pg_query("SELECT horarios.id_pelicula, horarios.hora, horarios.fecha, peliculas.imagen, peliculas.nombreoriginal, altasucursal.nombre FROM horarios INNER JOIN peliculas ON horarios.id_pelicula = peliculas.id_pelicula INNER JOIN altasucursal ON horarios.id_sucursal = altasucursal.id_sucursal  WHERE horarios.id_horario=$id_horario;");


	$Tdatos = pg_query("select horarios.id_horario, horarios.id_pelicula, horarios.hora, horarios.fecha, peliculas.imagen, peliculas.nombreoriginal, altasucursal.nombre, clasificacion, idioma, horarios.sala from horarios INNER JOIN peliculas ON horarios.id_pelicula = peliculas.id_pelicula INNER JOIN altasucursal on horarios.id_sucursal = altasucursal.id_sucursal  WHERE horarios.id_horario=$id_horario;");

?>


<!DOCTYPE html>
<html>

<head>
	<title>Cinepolis Online</title>
	<link rel="stylesheet" type="text/css" href="css/css-adrian/reset.css">
	<link rel="stylesheet" type="text/css" href="css/css-adrian/responsive-master.css">
	<link rel="stylesheet" type="text/css" href="css/css-adrian/master.css">
	<link rel="stylesheet" type="text/css" href="css/css-adrian/compra.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

	<!-- CSS-->
	<link href="../archivosCompraBoletos/master.css" rel="stylesheet">


	<script src='js/jquery-3.3.1.min.js'></script>
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
	  background-image: url('img/seat_0.png');
	  display: inline-block;
	  font-size: 11px;
	  text-align: center;
	  padding-top: 5px;
	  cursor: pointer;
	  font-weight: 700;
	  color:rgba(25, 25, 25, 0.7);
	}

	input[type=checkbox]:checked + label {
	  background-image: url('img/seat_5.png');
	  color:rgba(255, 255, 255, 0.7);
	}

	input[type=checkbox]:disabled + label {
	  background-image: url('img/seat_1.png')!important;
	  cursor:no-drop;
	  color:rgba(103, 3, 3, 0.09);
	}
</style>

<script language="javascript">
$(document).ready(function(){
	var ocupados = "<?php echo $ocupados; ?>";
	var arrayOcupados = ocupados.split(",");
	for (var j = 0; j < arrayOcupados.length ; j++) {
		var chbx = "#" + arrayOcupados[j];
		$(chbx).attr("disabled", "disabled");
	}
})

var limite = <?php echo $asientos; ?>;
var last = [];
var seleccionados = 0;
function validacion(objeto)
{
	var existe = 0;
	if (last.length > 0) {
		for (var i = 0; i < last.length; i++) {
			if (last[i]["id"] == objeto["id"]) {
				seleccionados = seleccionados - 1;
				delete last[i];
				for (var j = i; j < last.length - 1 ; j++) {
					last[j] = last[j + 1];
				}
				//delete last[last.length - 1];
				existe = 1;
				break;
			}
		}
	}
	if (existe == 0) {
		last[seleccionados] = objeto;

		seleccionados = seleccionados + 1;
		if (seleccionados > limite) {
			last[0].checked = false;
			for (var i = 0; i < last.length - 1 ; i++) {
				last[i] = last[i + 1];
			}
			//delete last[last.length - 1];
			seleccionados = seleccionados - 1;
		}
		if (seleccionados == limite) {
			var asientos = "";
			for (var i = 0; i < seleccionados ; i++) {
				if (i == last.length - 1) {
					asientos += last[i]["id"];
				}
				else{
					asientos += last[i]["id"] + ",";
				}
				
			}
			$("#asientosSeleccionados").val(asientos);
		}
	}
	
}
</script> 

<style type="text/css">
	form .container {
		    margin: 0 auto;
	    max-width: 930px;
	    width: 100%;
	}
	form .container .table-escoge {
		    margin: 0 auto;
	}
</style>

</head>
<body>

<!-- Scripts-->
	<!--
  	<script src="./archivosCompraBoletos/jquery-1.10.0.min.js.descarga"></script>
  	<script src="../archivosCompraBoletos/jquery-plugins.js.descarga"></script>
  	<script type="text/javascript" src="../archivosCompraBoletos/jquery-migrate-1.2.1.js.descarga"></script>
  	<script src="../archivosCompraBoletos/jquery-nicescroll.js.descarga"></script>
  	<script src="../archivosCompraBoletos/action.js.descarga"></script>
    
    <script type="text/javascript">
        if (self === top) {
            var antiClickjack = document.getElementById("antiClickjack");
            antiClickjack.parentNode.removeChild(antiClickjack);
        } else {
            top.location = self.location;
        }
    </script>-->

<?php
	include('headercompraboleto/headerCompra.php');
?>


<?php echo "<form id='frm' action='haztupago.php?id_horario=$id_horario&edad3era=$Cedad3era&precioTotal3raEdad=$precioTotal3raEdad&adulto=$Cadulto&precioTotalAdulto=$precioTotalAdulto&ninos=$Cninos&precioTotalNino=$precioTotalNino' method='POST'>";?>
			<input type="hidden" name="asientosSeleccionados" id="asientosSeleccionados">
			<div class="container">
			<section>
				<article>
					<header>
						<h2><i class="btn icon-ticket"></i>COMPRA Y RESERVA TUS BOLETOS</h2>
					</header>
				<div class="row resumen">	
						<figure class="col2">
							<?PHP
		                        while ($datos=pg_fetch_array($Timagen)) {
		                            $rutaimagen = $datos['imagen'];

		                            echo "
		                            <a href='#'>
		                                <img src='../$rutaimagen' id='visOrderTracker_imgCartelLF13'/>
		                            </a>";
		                        }
		                    ?>
						</figure>
						<div class="col10">
							<div class="col5">
								<?php

		                            while ($datos=pg_fetch_array($Tdatos)) {
		                                $idhorario = $datos['id_horario'];  
		                                $idpelicula= $datos['id_pelicula'];  
		                                $hora= $datos['hora'];
		                                $idsala= $datos['sala'];
		                                $NombreSala = pg_query("SELECT DISTINCT ON (nombre) nombre FROM salas SA INNER JOIN horarios H ON SA.id_sala = H.sala WHERE id_sala='$idsala'");
		                                $datosNombreSala=pg_fetch_array($NombreSala);
		                                $nombreSala = $datosNombreSala['nombre'];


		                                if ($hora >= '13:00') {
		                                    $hora = date('h:i', strtotime($hora));
		                                    $hora = $hora.'pm';
		                                }else{
		                                    $hora = $hora.'am';
		                                }
		                                
		                                $fecha= $datos['fecha'];
		                                $nombre= $datos['nombreoriginal'];
		                                $clasificacion= $datos['clasificacion'];
		                                $idioma = $datos['idioma'];
		                                $nombresucursal = $datos['nombre'];

		                                if ($idioma == "Español") {
		                                    $idioma = "Esp";
		                                }else{
		                                    if ($idioma == "Ingles") {
		                                        $idioma = "Ing";
		                                    }else{
		                                        if ($idioma == "Sub. Español") {
		                                            $idioma = "Sub Esp";
		                                        }else{
		                                            if ($idioma == "Sub. Ingles") {
		                                                $idioma = "Sub Ing";
		                                            }else{
		                                                if ($idioma == "Español 3D") {
		                                                    $idioma = "Esp 3D";
		                                                }else{
		                                                    if ($idioma == "Ingles 3D") {
		                                                    $idioma = "Ing 3D";
		                                                    }else{
		                                                        if ($idioma == "Sub. Español 3D") {
		                                                            $idioma = "Sub. Esp 3D";
		                                                        }else{
		                                                            if ($idioma == "Sub. Ingles 3D") {
		                                                                $idioma = "Sub. Ing 3D";
		                                                            }
		                                                        }
		                                                    }
		                                                }
		                                            }
		                                        }
		                                    }
		                                }
		                                
		                                date_default_timezone_set("America/Mazatlan");                              
		                                $test = explode("-",$datos['fecha']); 
		                                 $y = $test[0]; 
		                                 $m = $test[1]; 
		                                 $d = $test[2]; 

		                                 $dias = array('Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado');
		                                 $dialetra = $dias[date('L', strtotime($fecha))];

		                                // generamos los meses 
		                                function genMonth_Text($m) { 
		                                 switch ($m) { 
		                                  case 1: $month_text = "Enero"; break; 
		                                  case 2: $month_text = "Febrero"; break; 
		                                  case 3: $month_text = "Marzo"; break; 
		                                  case 4: $month_text = "Abril"; break; 
		                                  case 5: $month_text = "Mayo"; break; 
		                                  case 6: $month_text = "Junio"; break; 
		                                  case 7: $month_text = "Julio"; break; 
		                                  case 8: $month_text = "Agosto"; break; 
		                                  case 9: $month_text = "Septiembre"; break; 
		                                  case 10: $month_text = "Octubre"; break; 
		                                  case 11: $month_text = "Noviembre"; break; 
		                                  case 12: $month_text = "Diciembre"; break; 
		                                 } 
		                                 return ($month_text); 
		                                } 
		                                $m = genMonth_Text($m); 

		                                $diames = "$d de $m";                                              
		                            
		                                echo "
		                                    <p><span id='visOrderTracker_lblCinema' class='DetailsSubHeader'>Cine</span> 
		                                    <em><span id='visOrderTracker_txtCinemaDetails' class='DetailsText'>$nombresucursal</span></em></p>
		                                    <p><span id='visOrderTracker_lblMovie' class='DetailsSubHeader'>Película</span>
		                                    <em><span id='visOrderTracker_txtMovieDetails' class='DetailsText'>$nombre $idioma ($clasificacion)</span></em></p>
		                                    <p><span id='visOrderTracker_lblSessionDate' class='DetailsSubHeader'>Fecha</span>
		                                    <em><span id='visOrderTracker_txtSessionDateDetails' class='DetailsText'>$dialetra $diames</span></em></p>
		                                    <p><span id='visOrderTracker_lblSessionTime' class='DetailsSubHeader'>Función</span>
		                                    <em><span id='visOrderTracker_txtSessionTimeDetails' class='DetailsText'>$hora</span></em></p>
		                                    <p><span><span id='visOrderTracker_lblScreen' class='DetailsSubHeader'>Sala</span></span>
		                                    <em><span id='visOrderTracker_txtScreenDetails' class='DetailsText'>$nombreSala</span></em></p>
		                                ";
		                            }
		                        ?>
							</div>
							<div class="col4">
								<p><span id="visOrderTracker_lblTicket" class="DetailsSubHeader">Boletos</span></p>
								

		<table>
									<tbody> 
		                        <tr class="DetailsRow">
		                            <td><span id="visOrderTracker_rptTicketSet__ctl0_txtTktOrderDetails" class="DetailsText"><?php echo $Cedad3era; ?> 3 ERA EDAD</span></td>
		                            <td style="display:none" class="Price"><span id="visOrderTracker_rptTicketSet__ctl0_txtTktPriceDetails" class="DetailsText">$<?php echo $precioTotal3raEdad; ?>.00</span></td>
		                            <td class="Points"><span id="visOrderTracker_rptTicketSet__ctl0_txtTktPointsDetails" class="DetailsText"></span></td>
		                            <td><span id="visOrderTracker_rptTicketSet__ctl0_txtTktSeatDetails" class="DetailsText"></span></td>
		                        </tr>
		                    
		                        <tr class="DetailsRow">
		                            <td><span id="visOrderTracker_rptTicketSet__ctl1_txtTktOrderDetails" class="DetailsText"><?php echo $Cadulto; ?> ADULTO</span></td>
		                            <td style="display:none" class="Price"><span id="visOrderTracker_rptTicketSet__ctl1_txtTktPriceDetails" class="DetailsText">$<?php echo $precioTotalAdulto; ?>.00</span></td>
		                            <td class="Points"><span id="visOrderTracker_rptTicketSet__ctl1_txtTktPointsDetails" class="DetailsText"></span></td>
		                            <td><span id="visOrderTracker_rptTicketSet__ctl1_txtTktSeatDetails" class="DetailsText"></span></td>
		                        </tr>
		                    
		                        <tr class="DetailsRow">
		                            <td><span id="visOrderTracker_rptTicketSet__ctl2_txtTktOrderDetails" class="DetailsText"><?php echo $Cninos; ?> NIÑOS</span></td>
		                            <td style="display:none" class="Price"><span id="visOrderTracker_rptTicketSet__ctl2_txtTktPriceDetails" class="DetailsText">$<?php echo $precioTotalNino; ?>.00</span></td>
		                            <td class="Points"><span id="visOrderTracker_rptTicketSet__ctl2_txtTktPointsDetails" class="DetailsText"></span></td>
		                            <td><span id="visOrderTracker_rptTicketSet__ctl2_txtTktSeatDetails" class="DetailsText"></span></td>
		                        </tr>
		                    
								</tbody></table>
								  <span id="visOrderTracker_lblConcession" class="DetailsText"></span> 
							</div>

		 					<div id="tickets" class="col3">
		                    
							<p class="txtCompra">  <span id="visOrderTracker_lblTicketSubtotal">Subtotal</span> </p>
							<p class="compraTotal"><span id="visOrderTracker_txtTicketSubtotalDetails">$<?php echo $PrecioTotal; ?>.00</span> </p>
							<p class="text-center"><span id="visOrderTracker_txtTicketPointTotalDetails" class="DetailsText"></span> 
							<span id="visOrderTracker_lblTktTax" class="DetailsText">IVA Incluido</span> </p>
						</div>
						<div style="display:none"><span id="visOrderTracker_lblCartelExtra"></span></div>
					
							

						</font></div><font color="gray" style="font-size:10pt; font-style:italic">
					</font></div>
					<div class="pasosCompra">
						<ul class="cf">
							<li class="active"><i>1</i><span>SELECCIONA HORARIO</span></li>
							<li class="active"><i>2</i><span>ESCOGE TU LUGAR</span></li>
							<li><i>3</i><span>HAZ TU PAGO</span></li>
							<li><i>4</i><span>CONFIRMA TU COMPRA</span></li>
						</ul>
						  <center> </center> 
					<table id="tblBody" class="BodyTable" style="margin:0 auto;" cellspacing="0" cellpadding="0" border="0" width="582px">
			<tbody><tr>
				<td align="center">
							    <h3>Selecciona tus asientos</h3>
							    <span id="lblAppletExplanation" class="AppletExplanation">Para cambiar tu lugar asignado da click en el asiento deseado.</span>
								<table style="display:none;" id="tblCountDown" cellspacing="0" cellpadding="0" width="100%" border="0">
									<tbody><tr style="HEIGHT:5px">
										<td colspan="4"></td>
									</tr>
									<tr>
										<td colspan="1"></td>
										<td colspan="2"></td>
										<td colspan="1"></td>
									</tr>
									<tr style="HEIGHT:5px">
										<td colspan="4"></td>
									</tr>
									<tr>
										<td width="5" rowspan="2"></td>
										<td id="tdAppLabel" valign="top" rowspan="2"><br></td>
				
										<td valign="top" align="right" width="100"><span id="lblTimeRemaining" class="TimeRemaining">Tiempo restante:</span><br>
											
										</td>
										<td width="5" rowspan="2"></td>
									</tr>
									<tr valign="top">
										<td valign="top" align="right" width="100">
										</td>
									</tr>
									<tr>
										<td class="5PxHeighDONOTCHANGE" colspan="4"></td>
									</tr>
								</tbody></table>
								
								<br>
								<table id="tblLegendPos" cellspacing="0" cellpadding="0" border="0" width="100%">
					<tbody><tr>
						<td width="5px"></td>
						<td>
				                            <div id="divLegend" align="center">
			                                    <span>
			                                        <img id="imgAutoReserved" class="ImageAppletExample" src="img/seat_5.png" border="0">
			                                        &nbsp;
							                        <span id="lblAutoReserved" class="Legend">Su asiento</span>
							                    </span>
							                    <span>
							                        <img id="imgEmpty" class="ImageAppletExample" src="img/seat_0.png" border="0">
							                        &nbsp;
							                        <span id="lblEmpty" class="Legend">Disponible</span>
							                    </span>
			                                    
			                                    
							                    <span>
							                        <img id="imgSold" class="ImageAppletExample" src="img/seat_1.png" border="0">
		                                            &nbsp;
							                        <span id="lblSold" class="Legend">Vendido</span>
							                    </span>
							                    
							                    
				                            </div>
				                        </td>
						<td width="5px"></td>
					</tr>
				</tbody></table>
				</div><!--FIN class="col10"-->
				

		                        <table cellspacing="0" cellpadding="0" width="100%" border="0" style="padding-bottom:15px;">
									<tbody><tr>
										<td align="center" width="100%">
										    <span id="lblApplet"></span>
										    
										    
										    <div id="divSeatMap" class="Screen-AllAreas">
										        <table class="table-escoge" style="margin:0 auto!important;">
													<tr>
														<td>
															<label class="checkeable">
															  	<input id="a01" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="a01">A01</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="a02" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="a02">A02</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="a03" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="a03">A03</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="a04" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="a04">A04</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="a05" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="a05">A05</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="a06" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="a06">A06</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="a07" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="a07">A07</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="a08" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="a08">A08</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="a09" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="a09">A09</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="a10" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="a10">A10</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="a11" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="a11">A11</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="a12" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="a12">A12</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="a13" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="a13">A13</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="a14" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="a14">A14</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="a15" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="a15">A15</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="a16" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="a16">A16</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="a17" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="a17">A17</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="a18" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="a18">A18</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="a19" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="a19">A19</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="a20" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="a20">A20</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="a21" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="a21">A21</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="a22" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="a22">A22</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="a23" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="a23">A23</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="a24" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="a24">A24</label>
															</label>
														</td>
													</tr>
													<!-- FILA-->
													<tr>
														<td>
															<label class="checkeable">
															  	<input id="b01" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="b01">B01</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="b02" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="b02">B02</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="b03" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="b03">B03</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="b04" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="b04">B04</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="b05" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="b05">B05</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="b06" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="b06">B06</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="b07" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="b07">B07</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="b08" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="b08">B08</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="b09" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="b09">B09</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="b10" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="b10">B10</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="b11" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="b11">B11</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="b12" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="b12">B12</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="b13" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="b13">B13</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="b14" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="b14">B14</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="b15" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="b15">B15</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="b16" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="b16">B16</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="b17" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="b17">B17</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="b18" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="b18">B18</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="b19" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="b19">B19</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="b20" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="b20">B20</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="b21" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="b21">B21</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="b22" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="b22">B22</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="b23" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="b23">B23</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="b24" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="b24">B24</label>
															</label>
														</td>
													</tr>
													<!-- FILA-->
													<tr>
														<td>
															<label class="checkeable">
															  	<input id="c01" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="c01">C01</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="c02" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="c02">C02</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="c03" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="c03">C03</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="c04" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="c04">C04</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="c05" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="c05">C05</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="c06" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="c06">C06</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="c07" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="c07">C07</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="c08" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="c08">C08</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="c09" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="c09">C09</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="c10" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="c10">C10</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="c11" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="c11">C11</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="c12" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="c12">C12</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="c13" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="c13">C13</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="c14" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="c14">C14</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="c15" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="c15">C15</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="c16" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="c16">C16</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="c17" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="c17">C17</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="c18" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="c18">C18</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="c19" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="c19">C19</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="c20" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="c20">C20</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="c21" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="c21">C21</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="c22" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="c22">C22</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="c23" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="c23">C23</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="c24" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="c24">C24</label>
															</label>
														</td>
													</tr>
													<!-- FILA-->
													<tr>
														<td>
															<label class="checkeable">
															  	<input id="d01" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="d01">D01</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="d02" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="d02">D02</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="d03" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="d03">D03</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="d04" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="d04">D04</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="d05" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="d05">D05</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="d06" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="d06">D06</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="d07" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="d07">D07</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="d08" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="d08">D08</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="d09" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="d09">D09</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="d10" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="d10">D10</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="d11" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="d11">D11</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="d12" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="d12">D12</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="d13" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="d13">D13</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="d14" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="d14">D14</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="d15" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="d15">D15</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="d16" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="d16">D16</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="d17" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="d17">D17</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="d18" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="d18">D18</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="d19" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="d19">D19</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="d20" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="d20">D20</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="d21" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="d21">D21</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="d22" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="d22">D22</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="d23" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="d23">D23</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="d24" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="d24">D24</label>
															</label>
														</td>
													</tr>
													<!-- FILA-->
													<tr>
														<td>
															<label class="checkeable">
															  	<input id="e01" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="e01">E01</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="e02" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="e02">E02</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="e03" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="e03">E03</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="e04" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="e04">E04</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="e05" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="e05">E05</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="e06" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="e06">E06</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="e07" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="e07">E07</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="e08" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="e08">E08</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="e09" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="e09">E09</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="e10" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="e10">E10</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="e11" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="e11">E11</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="e12" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="e12">E12</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="e13" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="e13">E13</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="e14" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="e14">E14</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="e15" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="e15">E15</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="e16" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="e16">E16</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="e17" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="e17">E17</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="e18" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="e18">E18</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="e19" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="e19">E19</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="e20" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="e20">E20</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="e21" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="e21">E21</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="e22" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="e22">E22</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="e23" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="e23">E23</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="e24" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="e24">E24</label>
															</label>
														</td>
													</tr>
													<!-- FILA-->
													<tr>
														<td>
															<label class="checkeable">
															  	<input id="f01" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="f01">F01</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="f02" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="f02">F02</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="f03" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="f03">F03</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="f04" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="f04">F04</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="f05" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="f05">F05</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="f06" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="f06">F06</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="f07" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="f07">F07</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="f08" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="f08">F08</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="f09" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="f09">F09</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="f10" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="f10">F10</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="f11" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="f11">F11</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="f12" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="f12">F12</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="f13" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="f13">F13</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="f14" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="f14">F14</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="f15" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="f15">F15</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="f16" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="f16">F16</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="f17" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="f17">F17</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="f18" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="f18">F18</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="f19" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="f19">F19</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="f20" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="f20">F20</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="f21" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="f21">F21</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="f22" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="f22">F22</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="f23" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="f23">F23</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="f24" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="f24">F24</label>
															</label>
														</td>
													</tr>
													<!-- FILA-->
													<tr>
														<td>
															<label class="checkeable">
															  	<input id="g01" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="g01">G01</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="g02" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="g02">G02</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="g03" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="g03">G03</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="g04" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="g04">G04</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="g05" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="g05">G05</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="g06" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="g06">G06</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="g07" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="g07">G07</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="g08" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="g08">G08</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="g09" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="g09">G09</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="g10" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="g10">G10</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="g11" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="g11">G11</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="g12" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="g12">G12</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="g13" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="g13">G13</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="g14" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="g14">G14</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="g15" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="g15">G15</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="g16" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="g16">G16</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="g17" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="g17">G17</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="g18" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="g18">G18</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="g19" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="g19">G19</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="g20" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="g20">G20</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="g21" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="g21">G21</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="g22" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="g22">G22</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="g23" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="g23">G23</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="g24" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="g24">G24</label>
															</label>
														</td>
													</tr>
													<!-- FILA-->
													<tr>
														<td>
															<label class="checkeable">
															  	<input id="h01" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="h01">H01</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="h02" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="h02">H02</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="h03" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="h03">H03</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="h04" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="h04">H04</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="h05" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="h05">H05</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="h06" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="h06">H06</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="h07" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="h07">H07</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="h08" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="h08">H08</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="h09" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="h09">H09</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="h10" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="h10">H10</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="h11" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="h11">H11</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="h12" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="h12">H12</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="h13" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="h13">H13</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="h14" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="h14">H14</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="h15" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="h15">H15</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="h16" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="h16">H16</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="h17" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="h17">H17</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="h18" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="h18">H18</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="h19" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="h19">H19</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="h20" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="h20">H20</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="h21" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="h21">H21</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="h22" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="h22">H22</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="h23" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="h23">H23</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="h24" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="h24">H24</label>
															</label>
														</td>
													</tr>
													<!-- FILA-->
													<tr>
														<td>
															<label class="checkeable">
															  	<input id="i01" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="i01">I01</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="i02" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="i02">I02</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="i03" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="i03">I03</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="i04" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="i04">I04</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="i05" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="i05">I05</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="i06" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="i06">I06</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="i07" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="i07">I07</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="i08" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="i08">I08</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="i09" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="i09">I09</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="i10" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="i10">I10</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="i11" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="i11">I11</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="i12" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="i12">I12</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="i13" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="i13">I13</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="i14" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="i14">I14</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="i15" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="i15">I15</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="i16" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="i16">I16</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="i17" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="i17">I17</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="i18" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="i18">I18</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="i19" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="i19">I19</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="i20" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="i20">I20</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="i21" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="i21">I21</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="i22" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="i22">I22</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="i23" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="i23">I23</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="i24" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="i24">I24</label>
															</label>
														</td>
													</tr>
													<!-- FILA-->
													<tr>
														<td>
															<label class="checkeable">
															  	<input id="j01" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="j01">J01</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="j02" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="j02">J02</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="j03" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="j03">J03</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="j04" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="j04">J04</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="j05" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="j05">J05</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="j06" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="j06">J06</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="j07" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="j07">J07</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="j08" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="j08">J08</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="j09" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="j09">J09</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="j10" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="j10">J10</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="j11" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="j11">J11</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="j12" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="j12">J12</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="j13" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="j13">J13</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="j14" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="j14">J14</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="j15" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="j15">J15</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="j16" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="j16">J16</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="j17" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="j17">J17</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="j18" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="j18">J18</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="j19" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="j19">J19</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="j20" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="j20">J20</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="j21" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="j21">J21</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="j22" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="j22">J22</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="j23" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="j23">J23</label>
															</label>
														</td>
														<td>
															<label class="checkeable">
															  	<input id="j24" type="checkbox" onchange="validacion(this);" name="asientos" />
																<label for="j24">J24</label>
															</label>
														</td>
													</tr>
												</table>
										    </div>
										    <div id="divSeatMapBack" class="Screen-Back"> </div>
										</td>
									</tr>
								</tbody></table> <br>
								<table cellspacing="0" cellpadding="0" width="100%" border="0" style="margin:0 0 20px 0; width: 100%; border-collapse: collapse; border-spacing: 0;">
									<tbody>
										<tr>
									    <td width="100%">
										    <input type="image" name="ibtnShowAllSeats" id="ibtnShowAllSeats" src="Images/ZoomOut.gif" border="0" onclick="ShowAllSeats();return false;" language="javascript" style="float: right; padding-right: 5px; display: none;">
										    <input type="image" name="ibtnShowMySeats" id="ibtnShowMySeats" src="Images/ZoomIn.gif" border="0" onclick="ShowMySeats();return false;" language="javascript" style="float: right; display: none;">
										</td>
										</tr>
										<tr>
											<td width="100%" align="center">

											    <input type="image" name="ibtnChangeTickets" id="ibtnChangeTickets" src="img/ChangeTickets.gif" border="0" style="float:center;">
											    
											    <input type="image" name="ibtnCancel" id="ibtnCancel" src="img/changesession.gif" border="0" style="display:none; float:right;"> 
											    
											    <!--BOTON SIGUIENTE-->
											    <input type="image" name="ibtnNext" id="ibtnNext" src="img/next.gif" border="0" style="float:center; padding-right:5px;">
											    <!--<input type="image" name="ibtnNext" id="ibtnNext" src="img/next.gif" border="0" style="float:center; padding-right:5px;">-->
											</td>
										</tr>
										<tr align="right">
											<td colspan="1">
												<div id="ProcAnimation" style="DISPLAY: none"><img id="imgProcessing" class="ImageProcessing" src="Processing.gif#" border="0"><div class="loader" style="display: block;"><div class="spinner"><div class="rect1"></div><div class="rect2"></div><div class="rect3"></div><div class="rect4"></div><div class="rect5"></div></div><p>Procesando...</p></div></div>
											</td>
										</tr>
									</tbody>
								</table>
								
								<div style="VISIBILITY: hidden">
								    <input name="txtSeatInfo" type="text" id="txtSeatInfo" style="height:0px;width:0px;">
								    
								    <input type="submit" name="btnBackClick" value="" id="btnBackClick" style="height:0px;width:0px;">
								</div>
								<input name="txtBackButtonClicked" type="hidden" id="txtBackButtonClicked">
								<input name="txtDateOrderChanged" type="hidden" id="txtDateOrderChanged" value="07/11/2018 09:46:30 a. m.">
								<input name="txtCancelOrder" type="hidden" id="txtCancelOrder">
								<input name="txtConcessionsButtonClicked" type="hidden" id="txtConcessionsButtonClicked">
							</td>
			</tr>
			<table cellspacing="0" cellpadding="0" width="100%" border="0">
									<tbody><tr style="HEIGHT:5px">
										<td colspan="3"></td>
									</tr>
									<tr>
										<td width="5"></td>
										<td id="tdAppFoot" style="float: left; margin-bottom: 50px;"><span id="lblAppletFooter" class="AppletFooter" style="width:100%;">Ten en cuenta que el sistema no te permitirá dejar un solo asiento desocupado entre los asientos seleccionados.</span></td>
				
										<td width="5"></td>
									</tr>
									</tbody>
								</table>
		</tbody>
		</table>

					</div>
			</article>
			</section>

				<div class="row">
					<div class="col-md-12">
					</div>
				</div>
			</div>
</form>

	<?php
	include ('footercompraboleto/footerCompra.php');
	?>


</body>
</html>