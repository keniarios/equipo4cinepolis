<?php  
	date_default_timezone_set("America/Mazatlan");
 	$fechaActual = date("Y-m-d");
 	$horaActual = date("H:i");

 	//Creamos sesión
    session_start();
	if(!isset($_SESSION['id_horario'])) 
	{
	  header('Location: index.php');
	}
	$idhorario = $_SESSION['id_horario'];
	$_SESSION['edad3era'] = 0;
	$_SESSION['adulto'] = 0;
	$_SESSION['ninos'] = 0;
	$_SESSION['precioTotal3raEdad'] = 0;
	$_SESSION['precioTotalAdulto'] = 0;
	$_SESSION['precioTotalNino'] = 0;
	$_SESSION['id_tarjeta'] = 0;
	$_SESSION['total'] = 0;
	$Cedad3era = 0;
	$Cadulto = 0;
	$Cninos = 0;
	$precioTotal3raEdad = 0;
	$precioTotalAdulto = 0;
	$precioTotalNino = 0;
	$id_tarjeta = 0;
	$PrecioTotal = 0;

	include ('bd/conexion.php'); $conexion = conectarBD();

	$CiudadSucursalHeader = pg_query("SELECT nombre, ALS.ciudad FROM altasucursal ALS INNER JOIN HORARIOS H ON ALS.id_sucursal=H.id_sucursal and id_horario='$idhorario'");
	$DatosSucursalHeader = pg_fetch_array($CiudadSucursalHeader);
	//Almacenamos el nombre de usuario en una variable de sesión usuario
    $_SESSION['nombre'] = $DatosSucursalHeader["nombre"];
    $_SESSION['ciudad'] = $DatosSucursalHeader["ciudad"];
    $nombresucursalHeader = $_SESSION['nombre'];
	$nombreciudadHeader = $_SESSION['ciudad'];


	$Timagen = pg_query("SELECT horarios.id_horario, horarios.id_pelicula, horarios.hora, horarios.fecha, peliculas.imagen, peliculas.nombreoriginal, altasucursal.nombre FROM horarios INNER JOIN peliculas ON horarios.id_pelicula = peliculas.id_pelicula INNER JOIN altasucursal ON horarios.id_sucursal = altasucursal.id_sucursal  WHERE horarios.id_horario=$idhorario;");
	
	$Tdatos = pg_query("select horarios.id_horario, horarios.id_pelicula, horarios.hora, horarios.fecha, peliculas.imagen, peliculas.nombreoriginal, altasucursal.nombre, clasificacion, idioma from horarios INNER JOIN peliculas ON horarios.id_pelicula = peliculas.id_pelicula INNER JOIN altasucursal on horarios.id_sucursal = altasucursal.id_sucursal  WHERE horarios.id_horario=$idhorario;");

	//OBTENER PRECIOS
	$resultHorario = pg_query("SELECT DISTINCT ON (id_precio) id_precio, PB.id_sucursal, tiposala, adultoprimerrango, terceraedadprimerrango, ninosprimerrango, adultosegundorango, terceraedadsegundorango, ninossegundorango FROM precioboletos PB INNER JOIN horarios H ON PB.id_sucursal=H.id_sucursal AND id_horario='$idhorario'");
	$datos=pg_fetch_array($resultHorario);
	$ID_precio = $datos['id_precio'];
	$ID_sucursal = $datos['id_sucursal'];
	$tiposala = $datos['tiposala'];
	$adultoprimerrango = $datos['adultoprimerrango'];
	$terceraedadprimerrango = $datos['terceraedadprimerrango'];
	$ninosprimerrango = $datos['ninosprimerrango'];
	$adultosegundorango = $datos['adultosegundorango'];
	$terceraedadsegundorango = $datos['terceraedadsegundorango'];
	$ninossegundorango = $datos['ninossegundorango'];


	if ($horaActual >='07:00' AND $horaActual <= "15:00") {
		$Precio3raEdad = $terceraedadprimerrango;
		$PrecioAdulto = $adultoprimerrango;
		$PrecioNiños = $ninosprimerrango;
	}
	else{
		$Precio3raEdad = $terceraedadsegundorango;
		$PrecioAdulto = $adultosegundorango;
		$PrecioNiños = $ninossegundorango;
	}

//archivosCompraBoletos
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0320)https://inetvis.cineticket.com.mx/compra/visSelectTickets.aspx?tkn=&cinemacode=954&txtSessionId=10261&distributor=Fox&originalTitle=Bohemian%20Rhapsody%20(Estados%20Unidos,%202018)&language=&genre=DRAMA&rating=B&director=Bryan%20Singer&protagonist=Allen%20Leech&_ga=2.169038049.1153251463.1541480097-231010952.1539140855 -->
<html class="" style="overflow-y: hidden;">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<style></style>
	<script async="" src="./archivosCompraBoletos/fbevents.js.descarga"></script>
	<script type="text/javascript" async="" src="./archivosCompraBoletos/js"></script>
	<script type="text/javascript" async="" src="./archivosCompraBoletos/ec.js.descarga"></script>
	<script src="./archivosCompraBoletos/6530.js.descarga" async="" type="text/javascript"></script>
	<script type="text/javascript" async="" src="https://dgy6rx5roq02d.cloudfront.net/triggit-analytics.min.js"></script>
</head>

<body style=""><!-- Google Tag Manager -->
	<script async="" src="./archivosCompraBoletos/uwt.js.descarga"></script><script async="" src="./archivosCompraBoletos/beacon.js.descarga"></script><script type="text/javascript" async="" src="./archivosCompraBoletos/analytics.js.descarga"></script><script type="text/javascript" async="" src="./archivosCompraBoletos/analytics.js.descarga"></script><script async="" src="./archivosCompraBoletos/gtm.js.descarga"></script><script>(function (w, d, s, l, i) {
	    w[l] = w[l] || []; w[l].push({
	        'gtm.start':
	        new Date().getTime(), event: 'gtm.js'
	    }); var f = d.getElementsByTagName(s)[0],
	    j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''; j.async = true; j.src =
	    'https://www.googletagmanager.com/gtm.js?id=' + i + dl; f.parentNode.insertBefore(j, f);
	})(window, document, 'script', 'dataLayer', 'GTM-M66T72');
	</script>
<!-- End Google Tag Manager -->

        <title>Cinepolis Online</title>
        <script language="javascript" src="./archivosCompraBoletos/visJavaCommon.js.descarga"></script>
        <link href="./archivosCompraBoletos/visStyles.css" type="text/css" rel="stylesheet">
        <link href="./archivosCompraBoletos/visStylesUser.css" type="text/css" rel="stylesheet">
        <link href="./archivosCompraBoletos/compra-asientos.css" rel="stylesheet">
        <script src="./archivosCompraBoletos/jquery.min.js.descarga" type="text/javascript" language="javascript"></script>
           
	<div class="FormStandard" onload="window.history.go(1);">

    
<noscript><iframe src=""https://www.googletagmanager.com/ns.html?id=GTM-M66T72""
height=""0"" width=""0"" style=""display:none;visibility:hidden""></iframe></noscript>



        <img src="./archivosCompraBoletos/seg" width="1" height="1">
        <script type="text/javascript" src="./archivosCompraBoletos/swfobject.js.descarga"></script>
        <script type="text/javascript" src="./archivosCompraBoletos/jsapi.js.descarga"></script>
        <script type="text/javascript" charset="utf-8">    google.load("jquery", "1.3");</script><script src="./archivosCompraBoletos/jquery.min.js(1).descarga" type="text/javascript"></script>
        <link title="prettyPhoto main stylesheet" rel="stylesheet" type="text/css" href="./archivosCompraBoletos/estilos-Pase.css" charset="utf-8" media="screen">
        <script type="text/javascript" charset="utf-8" src="./archivosCompraBoletos/jquery-Pase.js.descarga"></script>

        <!--FORMULARIO-->
        <?php //echo "<form name='frmSelectTickets' method='post' action='escoge-tu-lugar.php?id_horario=$idhorario' id='frmSelectTickets'>"; ?>
		<?php echo "<form name='frmSelectTickets' method='post' action='controladores/valores_escoge-tu-lugar.php' id='frmSelectTickets'>"; ?>
			<input type="hidden" name="__EVENTTARGET" id="__EVENTTARGET" value="">
			<input type="hidden" name="__EVENTARGUMENT" id="__EVENTARGUMENT" value="">

			<script type="text/javascript">
			<!--
			var theForm = document.forms['frmSelectTickets'];
			if (!theForm) {
			    theForm = document.frmSelectTickets;
			}
			function __doPostBack(eventTarget, eventArgument) {
			    if (!theForm.onsubmit || (theForm.onsubmit() != false)) {
			        theForm.__EVENTTARGET.value = eventTarget;
			        theForm.__EVENTARGUMENT.value = eventArgument;
			        theForm.submit();
			    }
			}
			// -->
			</script>
			<input type="hidden" name="__VIEWSTATEGENERATOR" id="__VIEWSTATEGENERATOR" value="79A8EA44">
			<input type="hidden" name="__EVENTVALIDATION" id="__EVENTVALIDATION" value="/wEWRgK0n9HnDgKc9aPJDAKR+sKrAgKIib6YDQKV9bmuBwL1iqGIAQKr1Zq9AQK01Zq9AQK11Zq9AQK21Zq9AQK31Zq9AQKw1Zq9AQKx1Zq9AQKy1Zq9AQKj1Zq9AQKs1Zq9AQK01dq+AQKgy+eYBgKTie+sCQKw8aWIAQLPpJq9AQLQpJq9AQLRpJq9AQLSpJq9AQLTpJq9AQLUpJq9AQLVpJq9AQLWpJq9AQLHpJq9AQLIpJq9AQLQpNq+AQK1pOPzDgKjy6TCAwKzmaWIAQKnpZq9AQK4pZq9AQK5pZq9AQK6pZq9AQK7pZq9AQK8pZq9AQK9pZq9AQK+pZq9AQKvpZq9AQKgpZq9AQK4pdq+AQLe2qPiBAKL66bXDQLqk9O7DwLO7LydDgLH+OOSCwLW3JCUBwL4sufcBgL37e7OCwK168bfBAKPguHJDwL+vIy1DwKQkIzxBALFpN2+BgL/z5zfCwKewsfoDAKclajiAgLayJWaAgKFyYi5CQLgorjBDALWhOfXBQL9xtPxDQL+y4qNCALcjpPqBQLkscnrAQK4+5bqD9nyd2IrjDASv5uheKSG2U8J+k0b">
						
			<!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/> -->
			<title>Cinépolis</title>
			<meta name="description" content="">
			<meta name="keywords" content="">
			<meta name="author" content="IA Interactive">
			<meta name="copyright" content="">
			<meta name="viewport" content="initial-scale=1.0, width=device-width, maximum-scale=1.0">

			<link rel="icon" type="image/x-icon" href="https://inetvis.cineticket.com.mx/compra/favicon.ico">
		    <link rel="apple-touch-icon-precomposed" href="https://inetvis.cineticket.com.mx/compra/imagenes/logo-icons/icon-57x57.png">
		    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="https://inetvis.cineticket.com.mx/compra/imagenes/logo-icons/icon-72x72.png">
		    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="https://inetvis.cineticket.com.mx/compra/imagenes/logo-icons/icon-114x114.png">
		    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="https://inetvis.cineticket.com.mx/compra/imagenes/logo-icons/icon-144x144.png">
					  
			<!--[if lt IE 9]>
				<script type="text/javascript"  src="scripts/html5.js"></script>
			<![endif]-->
					  
			<!-- CSS-->
			<link href="./archivosCompraBoletos/reset.css" rel="stylesheet">
			<link href="./archivosCompraBoletos/master.css" rel="stylesheet">
			<link href="./archivosCompraBoletos/compra.css" rel="stylesheet">
			<link href="./archivosCompraBoletos/responsive-master.css" rel="stylesheet">
			<link href="./archivosCompraBoletos/responsive-compra.css" rel="stylesheet">

			<!--[if lt IE 9]>
				<script type="text/javascript"  src="scripts/css3-mediaqueries.js"></script>
			<![endif]-->

			<!-- Scripts-->
		  	<script src="./archivosCompraBoletos/jquery-1.10.0.min.js.descarga"></script>
		  	<script type="text/javascript" src="./archivosCompraBoletos/jquery-migrate-1.2.1.js.descarga"></script>
		  	<script src="./archivosCompraBoletos/jquery-plugins.js.descarga"></script>
		  	<script src="./archivosCompraBoletos/jquery-nicescroll.js.descarga"></script>
		  	<script src="./archivosCompraBoletos/action.js.descarga"></script>
    
		    <script type="text/javascript">
		        if (self === top) {
		            var antiClickjack = document.getElementById("antiClickjack");
		            antiClickjack.parentNode.removeChild(antiClickjack);
		        } else {
		            top.location = self.location;
		        }
		    </script>
		 

<div class="wrapper">
		

		<?php  
			include('headercompraboleto/headerCompra.php');
		?>

		<section class="g960 cf">
			<article>
  			<header>
				<h2><i class="btn icon-ticket"></i>COMPRA Y RESERVA TUS BOLETOS</h2>
			</header>

		<div id="orderDetails" style="display:none">
		    <div id="orderHeader" class="DetailsHeaderRow" style="text-align:left; display:none">
		        <span id="visOrderTracker_lblOrderHeader" class="DetailsHeader">Tu Selección: </span>
		    </div><br>
		    <div id="details">
		        <div id="cinema" class="SectionContainer" style="text-align:left">
		            <dl>
		                <dt class="CinLabel"></dt>
		                <dd></dd>
		            </dl>
		        </div>
		        <div id="sessions" class="SectionContainer">
		            <table id="tblCurrentSession" cellspacing="0" cellpadding="0" style=" width:400px;">
		                <tbody><tr class="DetailsRow">
		                    <th class="orderDetailsDescription"></th>
		                    <th></th>
		                    <th></th>
		                    <th></th>
		                </tr>
		                <tr class="DetailsRow">
		                    <td></td>
		                    <td></td>
		                    <td></td>
		                    <td></td>
		                </tr>
		            </tbody></table>
		        </div>
		        <div class="SectionContainer">
		            <table cellpadding="0" cellspacing="0">
		                <tbody><tr class="DetailsRow">
		                    <th class="orderDetailsDescription"> </th>
		                    <th><span id="visOrderTracker_lblTktPrice" class="DetailsSubHeader"></span></th>
		                    <th><span id="visOrderTracker_lblTktPoints" class="DetailsSubHeader"></span></th>
		                    <th><span id="visOrderTracker_lblSeats" class="DetailsSubHeader"></span></th>
		                </tr>
		            </tbody></table>
		        </div>
		        <div id="cart" class="SectionContainer" visible="false" style="display: none;">
		            <table id="tblCartSessions" cellpadding="0" cellspacing="0">
		                <tbody><tr class="DetailsRow" id="rowHeaderCart">
		                    <th class="orderDetailsDescription"><span id="visOrderTracker_lblCartSession" class="DetailsSubHeader"></span></th>
		                    <th><span id="visOrderTracker_lblCartPrice" class="DetailsSubHeader"></span></th>
		                    <th><span id="visOrderTracker_lblCartPoints" class="DetailsSubHeader"></span></th>
		                    <th><span id="visOrderTracker_lblCartOptions" class="DetailsSubHeader"></span></th>
		                </tr>
		                
		            </tbody></table>
		            <div id="cartlinks" style="display:none">
		                <input type="image" name="visOrderTracker:ibtnAddSession" id="visOrderTracker_ibtnAddSession" src="./archivosCompraBoletos/AddNewSession.gif" border="0" onclick="if (!dialogPrompt(&#39;&#39;)) { return false;};" language="javascript">
		                <input type="image" name="visOrderTracker:ibtnCancel" id="visOrderTracker_ibtnCancel" src="./archivosCompraBoletos/CancelCart.gif" border="0">
		                <input type="image" name="visOrderTracker:ibtnCheckout" id="visOrderTracker_ibtnCheckout" src="./archivosCompraBoletos/Checkout.gif" border="0" onclick="if (!dialogPrompt(&#39;&#39;)) { return false;};" language="javascript">
		            </div>
		        </div>
		        
		    </div>
		</div>

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

                <!--HASTA AQUI-->
				<div class="col10">
					<div class="col5">
						<?php

                            while ($datos=pg_fetch_array($Tdatos)) {
                                $idhorario = $datos['id_horario'];  
                                $idpelicula= $datos['id_pelicula'];  
                                $hora= $datos['hora'];

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
                                    <p style='display:none'><span><span id='visOrderTracker_lblScreen' class='DetailsSubHeader' style='display: none;'>Sala</span></span>
                                    <em><span id='visOrderTracker_txtScreenDetails' class='DetailsText' style='display: none;'>SALA 2</span></em></p>
                                ";
                            }
                        ?>
					</div><!--FIN COL=5-->
					<div class="col4">
						<p><span id="visOrderTracker_lblTicket" class="DetailsSubHeader" style="display: none;">Boletos</span></p>
						

						<table>
													<tbody> 
												</tbody></table>
												  <span id="visOrderTracker_lblConcession" class="DetailsText"></span> 
											</div>

						 <div id="tickets" class="col3" style="display: none;">
							<p class="txtCompra">  
								<span id="visOrderTracker_lblTicketSubtotal">Subtotal</span> 
							</p>
							<p class="compraTotal">
								<span id="visOrderTracker_txtTicketSubtotalDetails"></span> 
							</p>
							<p class="text-center">
								<span id="visOrderTracker_txtTicketPointTotalDetails" class="DetailsText"></span> 
								<span id="visOrderTracker_lblTktTax" class="DetailsText">IVA Incluido</span> 
							</p>         
						</div>

						 
						<div style="display:none"><span id="visOrderTracker_lblCartelExtra"><font color="gray" style="font-size:10pt; font-style:italic">
						Favor de adquirir el o los boleto(s) en las categorías correctas, los clientes que les corresponda boleto de adulto y porten boleto de menor de edad o tercera edad, no podrán ingresar a la función. 
						Agradeceremos se consulte la política de precios en el cine de tu preferencia.  <br></font></span></div><font color="gray" style="font-size:10pt; font-style:italic">
						     

									<div class="col3">
										<p class="txtCompra">SUBTOTAL:</p>
										<p class="compraTotal">
						                	<span id="spTotalCompra">$0.00</span>
						                    <span id="lblTax" class="Tax">IVA incluido</span>
											
										</p>
										<p class="text-center">
											<img id="imgCancelOrderLF13" src="archivosCompraBoletos/changesession.gif" class="ImageCancel" border="0">
											
										</p>
									</div>
											

										</font></div><font color="gray" style="font-size:10pt; font-style:italic">
									</font></div><font color="gray" style="font-size: 10pt; font-style: italic;">

									<table id="tblTotal" style="display:none">
						                <colgroup>
						                    <col width="100px">
						                    <col width="50px">
						                </colgroup>
											        
						                <tbody><tr class="TicketTypeFooterRow">
						                    <td id="objHeaderTotal" class="TicketTypeFooter" align="right" valign="top"></td>
						                    
						                </tr>
						                <tr class="TicketTypeFooterRow">
						                    <td id="objOrderTotal" class="TicketTypeTotal" align="right"></td>
						                </tr>
						                <tr>
						                    <td id="objOrderTax" colspan="2" class="TicketTypeFooter" align="right"></td>
						                </tr>
						                <tr>
						                    <td colspan="2" class="TicketTypeFooter" align="right"></td>
						                </tr>
						                <tr>
						                	<td></td>
						                </tr>
						            </tbody></table>


									<table cellspacing="0" cellpadding="0" border="0" class="DetailsTableBorder" width="100%">
									    <tbody><tr>
									        <td>

									        </td>
									        <td align="center">
									      
									        </td>
									    </tr>
									    <tr> <td> </td></tr>
									</tbody></table>
						            
									<div class="pasosCompra">
										<ul class="cf">
											<li class="active"><i>1</i><span>SELECCIONA HORARIO</span></li>
											<li><i>2</i><span>ESCOGE TU LUGAR</span></li>
											<li><i>3</i><span>HAZ TU PAGO</span></li>
											<li><i>4</i><span>CONFIRMA TU COMPRA</span></li>
										</ul>

						 
						 				<fieldset>
 						 
					 
				
						<table class="BodyTable" id="tblBody" cellspacing="0" cellpadding="0" border="0">
							<tbody><tr>
								<td>
					    
						  <center> </center> 
                            <span id="spanCartelExtra" cssclass="TicketPageText" style=""><font color="gray" style="font-size:10pt; font-style:italic">
                            Favor de adquirir el o los boleto(s) en las categorías correctas, los clientes que les corresponda boleto de adulto y porten boleto de menor de edad o tercera edad, no podrán ingresar a la función. 
                            Agradeceremos se consulte la política de precios en el cine de tu preferencia.  <br></font></span>
                        
                        	<h3>Selecciona cuántos boletos quieres</h3>
                            <span id="lblAboveTicketDetail" class="TicketPageText">Puedes comprar 10 boletos máximo por transacción.<br><br><font color="#f7c915">Para recoger los boletos es necesario que el titular presente la tarjeta de crédito con la que se hizo la compra e identificación oficial en taquilla y en compras mayores a $250 pesos se le solicitará firmar el comprobante bancario correspondiente.</font><br><br></span>
                            <table cellspacing="0" cellpadding="0" width="580" border="0">
							<tbody><tr align="center">
								<td width="5"></td>
								<td width="570">				
							 
							<center> <img src="./archivosCompraBoletos/cintillo-Marvel.jpg" id="imfSuperTicketMarvel" style="display:none"></center>

							<!--PRECIO BOLETOS-->
                            <table border="1" id="tblTickets" class="tableTicket col9 row1" cellpadding="3" cellspacing="3">
								<tbody>
								<tr id="Tr1" class="TicketTypeHeaderRow">
									<th class="desc1"></th>
									<th><span id="lblTicketQty" class="TicketTypeHeader">CANTIDAD:</span></th>
									<th><span id="lblTicketUnitCost" class="TicketTypeHeader">COSTO:</span></th>
									<th><span id="lblTicketSubtotal" class="TicketTypeHeader">SUBTOTAL:</span></th>
								</tr>
								<tr>
									<td colspan="4" style="text-align:left">
                                        <span id="rptAreaCategory__ctl0_lblAreaCategory" class="TicketType TicketCategory"></span>
                                    </td>
                                </tr>

                                <tr class="TicketTypeRowAlt" ticketclass="NormalTicketTypeRow" areacategory="">   
                                	<td>     </td>
			                                           
                                   <td class="TicketTypeCell desc1">
                                   	<span id="rptAreaCategory__ctl0_rptTicketList__ctl1_lblDescription0" class="TicketType">3 ERA EDAD</span>
                                   	<span id="rptAreaCategory__ctl0_rptTicketList__ctl1_lblLongDescription0" class="TicketTypeSubText"></span>
                                   </td>
                                   <td valign="top" align="right" class="TicketQtyCell">
                                   	<span class="desc2">3 ERA EDAD</span>
                                   	<div class="spinner">
                                   		<input name="edad3era" type="text" readonly="readonly" id="rptAreaCategory__ctl0_rptTicketList__ctl1_ddlQtyInput" class="TicketTypeDropDown numBoletos value passive" maxlength="2">
                                   	</div>
                                   	<div class="selector" id="uniform-rptAreaCategory__ctl0_rptTicketList__ctl1_ddlQty0" style="width: 96px;">
                                   		<span style="width: 84.0078px; user-select: none;">0</span>
				                                   	

					                                   	<select name="rptAreaCategory:_ctl0:rptTicketList:_ctl1:ddlQty0" id="rptAreaCategory__ctl0_rptTicketList__ctl1_ddlQty0" class="TicketTypeDropDown" loyaltyreward="0" barcode="" <?php echo "price='".$Precio3raEdad."00'"; ?> ticketlabel="3 ERA EDAD" loyalty="0" tickettypehocode="3" ticketlabelalt="" loyaltyrecognitionid="" areacategorysequence="1" availabletomembercard="N" mmcprovidername="" isseatallocationon="Y" membershipticket="0" identity="0120" onchange="CalculateTotals(this.form.rptAreaCategory__ctl0_rptTicketList__ctl1_ddlQty0.value,2,<?php echo $Precio3raEdad."00"; ?>,document.getElementById(&#39;rptAreaCategory__ctl0_rptTicketList__ctl1_TicketSubTotal0&#39;),&#39;$#&#39;,&#39;.&#39;,&#39;rptAreaCategory__ctl0_rptTicketList__ctl1_TotalInCents0&#39;,&#39;visSelectTickets&#39;);CalculatePoints(this.form.rptAreaCategory__ctl0_rptTicketList__ctl1_ddlQty0.value,-1,&#39;+&lt;AMOUNT&gt; Points&#39;,2,&#39;.&#39;,document.getElementById(&#39;rptAreaCategory__ctl0_rptTicketList__ctl1_LtyPointsCostSubTotal0&#39;),&#39;rptAreaCategory__ctl0_rptTicketList__ctl1_TotalInPoints0&#39;);" availforltydiscount="N" style="width: 50px;">
															<option selected="selected" value="0">0</option>
															<option value="1">1</option>
															<option value="2">2</option>
															<option value="3">3</option>
															<option value="4">4</option>
															<option value="5">5</option>
															<option value="6">6</option>
															<option value="7">7</option>
															<option value="8">8</option>
															<option value="9">9</option>
															<option value="10">10</option>
														</select>
													</div>
												</td>
			                                   	<td valign="top" class="Price">
			                                   		<span id="rptAreaCategory__ctl0_rptTicketList__ctl1_TicketPrice0" class="TicketTypePrice">$<?php echo $Precio3raEdad; ?>.00</span>
			                                   		<input name="rptAreaCategory:_ctl0:rptTicketList:_ctl1:TotalInPoints0" type="hidden" id="rptAreaCategory__ctl0_rptTicketList__ctl1_TotalInPoints0" value="0">
			                                   	</td>    
			                                    <td valign="top" class="Price">
			                                    	<span id="rptAreaCategory__ctl0_rptTicketList__ctl1_TicketSubTotal0" class="TicketTypeSubTotal">$0.00</span><input name="precioTotal3raEdad" type="hidden" id="rptAreaCategory__ctl0_rptTicketList__ctl1_TotalInCents0" value="0">
			                                    </td>
			                                </tr>
			                              
			                                 <tr class="TicketTypeRow" ticketclass="NormalTicketTypeRow" areacategory="">
			                                  <td>     </td>
			                                  	<td class="TicketTypeCell desc1"><span id="rptAreaCategory__ctl0_rptTicketList__ctl2_lblDescription1" class="TicketType">ADULTO</span><span id="rptAreaCategory__ctl0_rptTicketList__ctl2_lblLongDescription1" class="TicketTypeSubText"></span></td>
			                                    <td class="TicketQtyCell"><span class="desc2">ADULTO</span><div class="spinner">
			                                    <input name="adulto" type="text" readonly="readonly" id="rptAreaCategory__ctl0_rptTicketList__ctl2_ddlQtyInput" class="TicketTypeDropDown numBoletos value passive" maxlength="2"></div><div class="selector" id="uniform-rptAreaCategory__ctl0_rptTicketList__ctl2_ddlQty1" style="width: 96px;"><span style="width: 84.0078px; user-select: none;">0</span><select name="rptAreaCategory:_ctl0:rptTicketList:_ctl2:ddlQty1" id="rptAreaCategory__ctl0_rptTicketList__ctl2_ddlQty1" class="TicketTypeDropDown" loyaltyreward="0" barcode="" 
			                                    	<?php echo "price='".$PrecioAdulto."00'"; ?> ticketlabel="ADULTO" loyalty="0" tickettypehocode="1" ticketlabelalt="" loyaltyrecognitionid="" areacategorysequence="1" availabletomembercard="N" mmcprovidername="" isseatallocationon="Y" membershipticket="0" identity="0118" onchange="CalculateTotals(this.form.rptAreaCategory__ctl0_rptTicketList__ctl2_ddlQty1.value,2,<?php echo $PrecioAdulto.'00'; ?>,document.getElementById(&#39;rptAreaCategory__ctl0_rptTicketList__ctl2_TicketSubTotal1&#39;),&#39;$#&#39;,&#39;.&#39;,&#39;rptAreaCategory__ctl0_rptTicketList__ctl2_TotalInCents1&#39;,&#39;visSelectTickets&#39;);CalculatePoints(this.form.rptAreaCategory__ctl0_rptTicketList__ctl2_ddlQty1.value,-1,&#39;+&lt;AMOUNT&gt; Points&#39;,2,&#39;.&#39;,document.getElementById(&#39;rptAreaCategory__ctl0_rptTicketList__ctl2_LtyPointsCostSubTotal1&#39;),&#39;rptAreaCategory__ctl0_rptTicketList__ctl2_TotalInPoints1&#39;);" availforltydiscount="N" style="width: 50px;">
												<option selected="selected" value="0">0</option>
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
												<option value="6">6</option>
												<option value="7">7</option>
												<option value="8">8</option>
												<option value="9">9</option>
												<option value="10">10</option>

											</select></div></td>
			                                    <td class="Price"><span id="rptAreaCategory__ctl0_rptTicketList__ctl2_TicketPrice1" class="TicketTypePrice">$<?php echo $PrecioAdulto; ?>.00</span><input name="rptAreaCategory:_ctl0:rptTicketList:_ctl2:TotalInPoints1" type="hidden" id="rptAreaCategory__ctl0_rptTicketList__ctl2_TotalInPoints1" value="0"></td>
			                                            
			                                    <td class="Price"><span id="rptAreaCategory__ctl0_rptTicketList__ctl2_TicketSubTotal1" class="TicketTypeSubTotal">$0.00</span><input name="precioTotalAdulto" type="hidden" id="rptAreaCategory__ctl0_rptTicketList__ctl2_TotalInCents1" value="0"></td>
			                                    <td></td>
			                                  </tr>
			                               
			                                <tr class="TicketTypeRowAlt" ticketclass="NormalTicketTypeRow" areacategory="">   
			                                <td>     </td>
			                                           
			                                   <td class="TicketTypeCell desc1"><span id="rptAreaCategory__ctl0_rptTicketList__ctl3_lblDescription2" class="TicketType">NIÑOS</span><span id="rptAreaCategory__ctl0_rptTicketList__ctl3_lblLongDescription2" class="TicketTypeSubText"></span></td>
			                                   <td valign="top" align="right" class="TicketQtyCell"><span class="desc2">NIÑOS</span><div class="spinner"><input name="ninos" type="text" readonly="readonly" id="rptAreaCategory__ctl0_rptTicketList__ctl3_ddlQtyInput" class="TicketTypeDropDown numBoletos value passive" maxlength="2"></div><div class="selector" id="uniform-rptAreaCategory__ctl0_rptTicketList__ctl3_ddlQty2" style="width: 96px;"><span style="width: 84.0078px; user-select: none;">0</span><select name="rptAreaCategory:_ctl0:rptTicketList:_ctl3:ddlQty2" id="rptAreaCategory__ctl0_rptTicketList__ctl3_ddlQty2" class="TicketTypeDropDown" loyaltyreward="0" barcode="" price="3300" ticketlabel="NIÑOS" loyalty="0" tickettypehocode="2" ticketlabelalt="" loyaltyrecognitionid="" areacategorysequence="1" availabletomembercard="N" mmcprovidername="" isseatallocationon="Y" membershipticket="0" identity="0119" onchange="CalculateTotals(this.form.rptAreaCategory__ctl0_rptTicketList__ctl3_ddlQty2.value,2,<?php echo $PrecioNiños.'00'; ?>,document.getElementById(&#39;rptAreaCategory__ctl0_rptTicketList__ctl3_TicketSubTotal2&#39;),&#39;$#&#39;,&#39;.&#39;,&#39;rptAreaCategory__ctl0_rptTicketList__ctl3_TotalInCents2&#39;,&#39;visSelectTickets&#39;);CalculatePoints(this.form.rptAreaCategory__ctl0_rptTicketList__ctl3_ddlQty2.value,-1,&#39;+&lt;AMOUNT&gt; Points&#39;,2,&#39;.&#39;,document.getElementById(&#39;rptAreaCategory__ctl0_rptTicketList__ctl3_LtyPointsCostSubTotal2&#39;),&#39;rptAreaCategory__ctl0_rptTicketList__ctl3_TotalInPoints2&#39;);" availforltydiscount="N" style="width: 50px;">
													<option selected="selected" value="0">0</option>
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
													<option value="5">5</option>
													<option value="6">6</option>
													<option value="7">7</option>
													<option value="8">8</option>
													<option value="9">9</option>
													<option value="10">10</option>

												</select></div></td>
			                                   <td valign="top" class="Price"><span id="rptAreaCategory__ctl0_rptTicketList__ctl3_TicketPrice2" class="TicketTypePrice">$<?php echo $PrecioNiños; ?>.00</span><input name="rptAreaCategory:_ctl0:rptTicketList:_ctl3:TotalInPoints2" type="hidden" id="rptAreaCategory__ctl0_rptTicketList__ctl3_TotalInPoints2" value="0"></td>    
			                                   <td valign="top" class="Price"><span id="rptAreaCategory__ctl0_rptTicketList__ctl3_TicketSubTotal2" class="TicketTypeSubTotal">$0.00</span><input name="precioTotalNino" type="hidden" id="rptAreaCategory__ctl0_rptTicketList__ctl3_TotalInCents2" value="0"></td>
			                                            
			                                  </tr>
                                        
                                            </tbody>
                                        </table>
                                        
                                      <center> <img src="./archivosCompraBoletos/SLIDER-GENERICO.jpg" id="imgImagenExtraPelicula" style="display:none"></center>
                                      <div id="pnlVOUCHER">
                                	<table id="tblVoucherEntry" width="570px" cellpadding="0" cellspacing="0" class="VoucherRow" style="display:none">
										<tbody>
										<tr id="RowVoucherEntry">
											<td>
												<a href="https://inetvis.cineticket.com.mx/compra/visSelectTickets.aspx?tkn=&amp;cinemacode=954&amp;txtSessionId=10261&amp;distributor=Fox&amp;originalTitle=Bohemian%20Rhapsody%20(Estados%20Unidos,%202018)&amp;language=&amp;genre=DRAMA&amp;rating=B&amp;director=Bryan%20Singer&amp;protagonist=Allen%20Leech&amp;_ga=2.169038049.1153251463.1541480097-231010952.1539140855#"><img src="./archivosCompraBoletos/PackageTicket.gif" id="btnShowContents" class="ImageBtnPackageTicket" border="0" onclick="ShowContents(&#39;1&#39;,&#39;&#39;,&#39;&#39;,&#39;visvoucherentry&#39;,&#39;voucherentry&#39;);"></a></td>
											<td>
												<span id="lblVoucherEntry" class="VoucherEntryText">INGRESE EL CODIGO DE SU CUPON:</span></td>
											<td></td>
										</tr>
										<tr id="RowVoucherButton">
											<td></td>
											<td></td>
											<td></td>
										</tr>
										<tr height="15px">
											<td colspan="3"></td>
										</tr>
										</tbody>
									</table>
								

							<!-- Canje folios -->
							<div class="canje-folios">
							    O redime tus folios electrónicos
							    <br>
							    <br>
								<div class="ingreso-folio">
							      
							   
							        <br>
							        <br>
									<label>
							           
										¿Tienes un número de folio a canjear?
										<button class="mas">?</button>
									</label>
									<div class="row">
										<i class="col2">
											<img src="./archivosCompraBoletos/icon-folio.jpg" alt="Folio">
										</i>

										<div class="col10">
											<table border="1">
												<tbody><tr>
													<td>
							                            <input name="txtVoucherEntry" type="text" maxlength="50" id="txtVoucherEntry" class="VoucherTextbox placeholder" placeholder="Canjea tu número de folio  o tu CINEBONO" onkeyup="try { if (document.getElementById(&#39;txtVoucherEntry&#39;).value == &#39;&#39;) { document.getElementById(&#39;ibtnAddToOrder&#39;).style.display = &#39;none&#39;; } else {  document.getElementById(&#39;ibtnAddToOrder&#39;).style.display = &#39;&#39;;  } if (window.event.keyCode == 13){  document.getElementById(&#39;txtVoucherSubmit&#39;).value = document.getElementById(&#39;txtVoucherEntry&#39;).value; document.getElementById(&#39;txtVoucherEntry&#39;).disabled = &#39;true&#39;; document.getElementById(&#39;txtVoucherPINSubmit&#39;).value = document.getElementById(&#39;txtVoucherPINEntry&#39;).value; document.getElementById(&#39;txtVoucherPINEntry&#39;).disabled = &#39;true&#39;; document.frmSelectTickets.txtHideAllVoucherRows.value = &#39;Yes&#39;; DisableButtons(this, &#39;btnAddToOrderClick&#39;); HideShowLayer(&#39;ProcAnimation&#39;); __doPostBack(&#39;ibtnAddToOrder&#39;,&#39;&#39;) } } catch(e) {}" onkeydown="if (window.event.keyCode == 13){return false;}" onkeypress="if (window.event.keyCode == 13){return false;}">
													</td>
													<td>
														&nbsp;
														<input type="image" name="ibtnAddToOrder" id="ibtnAddToOrder" src="./archivosCompraBoletos/addtoorder.gif" border="0" onclick=" document.getElementById(&#39;txtVoucherSubmit&#39;).value = document.getElementById(&#39;txtVoucherEntry&#39;).value; document.getElementById(&#39;txtVoucherEntry&#39;).disabled = &#39;true&#39;; document.getElementById(&#39;txtVoucherPINSubmit&#39;).value = document.getElementById(&#39;txtVoucherPINEntry&#39;).value; document.getElementById(&#39;txtVoucherPINEntry&#39;).disabled = &#39;true&#39;; document.frmSelectTickets.txtHideAllVoucherRows.value = &#39;Yes&#39;; DisableButtons(this, &#39;btnAddToOrderClick&#39;); HideShowLayer(&#39;ProcAnimation&#39;); ;" language="javascript" style="display:none;">
													</td>
												</tr>
											</tbody></table>		
										</div>
									
										<div class="mas-info-folios">
											<a href="https://inetvis.cineticket.com.mx/compra/visSelectTickets.aspx?tkn=&amp;cinemacode=954&amp;txtSessionId=10261&amp;distributor=Fox&amp;originalTitle=Bohemian%20Rhapsody%20(Estados%20Unidos,%202018)&amp;language=&amp;genre=DRAMA&amp;rating=B&amp;director=Bryan%20Singer&amp;protagonist=Allen%20Leech&amp;_ga=2.169038049.1153251463.1541480097-231010952.1539140855#" class="cerrar-mas-info" onclick="javascript:$(this).parent().fadeOut(); return false;">
												Cerrar <i class="icon-remove"></i>
											</a>
											<h4>Numeros de Folio</h4>
											<p>

							                    Es necesario ingresar el folio uno por uno y las veces deseadas para obtener la cantidad de boletos. Para aplicar promoción 2x1 será necesario ingresar los dos folios por separado.
											</p>
										</div>
									</div>
								</div>
							</div>

							</div>
								    <div id="divSelectSeats" class="Inline" style="display:none; VISIBILITY: hidden"><input type="image" name="ibtnSelectSeats" id="ibtnSelectSeats" class="ImageSelectSeats" src="./archivosCompraBoletos/selectseats.gif" border="0" onclick="document.frmSelectTickets.txtDoNotRehydrate.value = &#39;Yes&#39;;document.frmSelectTickets.txtHideAllVoucherRows.value = &#39;No&#39;;DisableButtons(this, &#39;btnSelectSeatsClick&#39;);HideShowLayer(&#39;ProcAnimation&#39;);__doPostBack(&#39;ibtnSelectSeats&#39;,&#39;&#39;);" language="javascript"></div>
                                    
                                    <div class="fee" style="display:none">
                                        <div class="desglose row">
                                            <p>
                                                <a href="https://inetvis.cineticket.com.mx/compra/visSelectTickets.aspx?tkn=&amp;cinemacode=954&amp;txtSessionId=10261&amp;distributor=Fox&amp;originalTitle=Bohemian%20Rhapsody%20(Estados%20Unidos,%202018)&amp;language=&amp;genre=DRAMA&amp;rating=B&amp;director=Bryan%20Singer&amp;protagonist=Allen%20Leech&amp;_ga=2.169038049.1153251463.1541480097-231010952.1539140855#" class="ver-desglose">
                                                    <span class="icon-plus-sign"></span>Desglose de precio</a>
                                            </p>

                                            <div class="desc-donativo">
                                                <p>
                                                    ï¿½Tienes Cinépolis ID? <a href="https://inetvis.cineticket.com.mx/compra/visSelectTickets.aspx?tkn=&amp;cinemacode=954&amp;txtSessionId=10261&amp;distributor=Fox&amp;originalTitle=Bohemian%20Rhapsody%20(Estados%20Unidos,%202018)&amp;language=&amp;genre=DRAMA&amp;rating=B&amp;director=Bryan%20Singer&amp;protagonist=Allen%20Leech&amp;_ga=2.169038049.1153251463.1541480097-231010952.1539140855#">Inicia sesión</a> y la garantía va por nuestra cuenta.
                                                </p>
                                                <p>
                                                    <a class="descripcion-fee" href="https://inetvis.cineticket.com.mx/compra/visSelectTickets.aspx?tkn=&amp;cinemacode=954&amp;txtSessionId=10261&amp;distributor=Fox&amp;originalTitle=Bohemian%20Rhapsody%20(Estados%20Unidos,%202018)&amp;language=&amp;genre=DRAMA&amp;rating=B&amp;director=Bryan%20Singer&amp;protagonist=Allen%20Leech&amp;_ga=2.169038049.1153251463.1541480097-231010952.1539140855#">?</a>
                                                    Garantï¿½a de servicio<strong>$5.00</strong>
                                                </p>
                                            </div>
                                            <div class="info-txt">
                                                <a href="https://inetvis.cineticket.com.mx/compra/visSelectTickets.aspx?tkn=&amp;cinemacode=954&amp;txtSessionId=10261&amp;distributor=Fox&amp;originalTitle=Bohemian%20Rhapsody%20(Estados%20Unidos,%202018)&amp;language=&amp;genre=DRAMA&amp;rating=B&amp;director=Bryan%20Singer&amp;protagonist=Allen%20Leech&amp;_ga=2.169038049.1153251463.1541480097-231010952.1539140855#">Cerrar <span>X</span></a>
                                                <h3>Acerca del Servicio</h3>
                                                <p>Ahora tus boletos cuentan con una <strong>garantía de cancelación</strong>. Si por alguna razón no puedes llegar a la función que planeaste con anticipación, podrás validar la reposición de tus boletos.</p>
                                            </div>
                                        </div>
                                        <div class="total-tabla row">
                                            <p>TOTAL: </p>
                                            <p><strong></strong></p>
                                        </div>
                                    </div>

                                    <div id="divOrderTickets" class="Inline" style="VISIBILITY: hidden">
                                    	<input type="image" name="ibtnOrderTickets" id="ibtnOrderTickets" class="ImageNext" src="./archivosCompraBoletos/nextSeat.gif" border="0">

                                    	<!--<input type="image" name="ibtnOrderTickets" id="ibtnOrderTickets" class="ImageNext" src="./archivosCompraBoletos/nextSeat.gif" border="0" onclick="document.frmSelectTickets.txtDoNotRehydrate.value = &#39;Yes&#39;;document.frmSelectTickets.txtHideAllVoucherRows.value = &#39;No&#39;;DisableButtons(this, &#39;btnOrderTicketsClick&#39;);HideShowLayer(&#39;ProcAnimation&#39;);__doPostBack(&#39;ibtnOrderTickets&#39;,&#39;&#39;);" language="javascript">-->
                                    </div>
                                    <div id="divSelectConcessions" class="Inline" style="display:none; VISIBILITY: hidden">
                                    	<input type="image" name="ibtnSelectConcessions" id="ibtnSelectConcessions" class="ImageSelectConcessions" src="./archivosCompraBoletos/selectconcessions.gif" border="0">
                                    	<!--<input type="image" name="ibtnSelectConcessions" id="ibtnSelectConcessions" class="ImageSelectConcessions" src="./archivosCompraBoletos/selectconcessions.gif" border="0" onclick="document.frmSelectTickets.txtDoNotRehydrate.value = &#39;Yes&#39;;document.frmSelectTickets.txtHideAllVoucherRows.value = &#39;No&#39;;DisableButtons(this, &#39;btnSelectConcessionsClick&#39;);HideShowLayer(&#39;ProcAnimation&#39;);__doPostBack(&#39;ibtnSelectConcessions&#39;,&#39;&#39;);" language="javascript">-->
                                    </div>
								 
								</td>
								<td width="5"></td>
							</tr>
						</tbody></table>
						<table class="NavigationTable" cellspacing="0" cellpadding="0" width="580" border="0">
							<tbody><tr class="NavigationRow">
                                <td>	
                                          

							<div id="pnlCINEPASS">
								
							   <br><!-- CinePass -->
							<fieldset>
								<div class="paseCinepass">
									<a onclick="javascript:fnCinePASS(&#39;&#39;)">
										<span>
											Utiliza tu
											<em>
												<img src="./archivosCompraBoletos/icon-cinepass-ticket.png">
											</em> 
											da clic aquí
										</span>
										<i class="float-right icon-caret-up"></i>
									</a>
									<div class="tooltip" style="display: none; right: 10px;">
										<iframe id="fraCINEPASS" height="360" width="390" src="./archivosCompraBoletos/saved_resource.html">
										</iframe>
									</div>
								</div>
							</fieldset>
							<a href="https://inetvis.cineticket.com.mx/compra/visCINEPASS.aspx?cinemacode=954&amp;txtSessionId=10261&amp;CiudadID=&amp;id=1?iframe=true" id="lnkCINEPASS" name="lnkCINEPASS">
							</a>

							<!-- Función -->
							<script>
								function fnCinePASS(stUrl) {
								document.getElementById('fraCINEPASS').src =  document.getElementById('lnkCINEPASS').href ;  
								}
							</script>
							</div>
                            <div id="pnlPase">
	
                              <br><!-- Pase Anual -->
							<fieldset>
								<div class="paseAnual">
									<a onclick="javascript:fnPase(&#39;&#39;)">
										<span>
											Si deseas utilizar tu 
											<em>
												<img src="./archivosCompraBoletos/icon-pase-anual-ticket.png">
											</em> 
											da clic aquí
										</span>
										<i class="float-right icon-caret-up"></i>
									</a>
									<div class="tooltip" style="display: none; right: 10px;">
										<iframe id="fraPASE" height="260" width="390" src="./archivosCompraBoletos/saved_resource(1).html">
										</iframe>
									</div>
								</div>
							</fieldset>
							<a href="https://inetvis.cineticket.com.mx/compra/visPase.aspx?cinemacode=954&amp;txtSessionId=10261&amp;CiudadID=&amp;id=1?iframe=true" id="lnkPase" name="lnkPase"></a>

							<!-- Función -->
							<script>
								function fnPase(stUrl) {
									document.getElementById('fraPASE').src =  document.getElementById('lnkPase').href ;  
								}
							</script>
							</div>

                                </td>	
								<td align="right" colspan="2">
									<div id="divSignIn" class="Inline" style="visibility: hidden;">
									    
									</div>
									
								</td>
							</tr>
							<tr class="NavigationRow">
								<td align="right" colspan="2">
									</td>
							</tr>
							<tr>
								<td colspan="1">
									<div style="VISIBILITY: hidden">
									    <input type="submit" name="btnOrderTicketsClick" value="" id="btnOrderTicketsClick" style="height:0px;width:0px;">
									    <input type="submit" name="btnSelectSeatsClick" value="" id="btnSelectSeatsClick" style="height:0px;width:0px;">
									    <input type="submit" name="btnCancelClick" value="" id="btnCancelClick" style="height:0px;width:0px;">
									    <input type="submit" name="btnSignInClick" value="" id="btnSignInClick" style="height:0px;width:0px;">
									    <input type="submit" name="btnSelectConcessionsClick" value="" id="btnSelectConcessionsClick" style="height:0px;width:0px;">

									</div>
								</td>
								<td align="right" colspan="1">
									
								</td>
							</tr>
						</tbody></table>
 
					<div class="condicionesCompra">
					 
					</div>
 
					<div id="ProcAnimation" style="DISPLAY: none;"><img id="imgProcessing" class="ImageProcessing" src="./archivosCompraBoletos/Processing.gif" border="0"><div class="loader" style="display: block;"><div class="spinner"><div class="rect1"></div><div class="rect2"></div><div class="rect3"></div><div class="rect4"></div><div class="rect5"></div></div><p>Procesando...</p></div></div>
											<div class="condicionesCompra">

							<span id="lblBelowTicketDetail" class="TicketPageText">Cinépolis® informa a sus clientes que la empresa no se hace responsable del cumplimiento o resultado de transacciones, reservas, promociones y/o en general, operaciones realizadas por o a través de aplicaciones, sitios o plataformas no oficiales de Cinépolis®*. Por favor, no se deje engañar. Cualquier transacción realizada por otras plataformas no autorizadas, no serán válidos. *Aplicaciones, sitios y plataformas oficiales: www.cinepolis.com, aplicaciones oficiales para iOS y Android. Películas de Clasificación 'C' sólo para mayores de 18 años; por lo que no se pueden comprar boletos para niños.<br><br> Para hacer válidos los precios aplicables a personas de la tercera edad, estudiantes y menores de edad, deberán mostrar identificación que lo acredite. <br><br>El precio de miércoles no aplica en días festivos, por lo que se aplicará el precio vigente más alto de lunes a domingo correspondiente a cada formato (funciones 2D, 3D, Macro XE, Cinépolis IMAX, Cinema Park).<br><br> El precio para premieres, estrenos, funciones especiales o contenido alternativo, correspondiente a cada formato (funciones 2D, 3D, 4Dx, Macro XE, IMAX o cualquier otro) será el publicado y determinado por Cinépolis®.<br><br> En días festivos se aplica el precio vigente más alto de lunes a domingo correspondiente a cada formato (funciones 2D, 3D, Macro XE, Cinépolis IMAX, Cinema Park). <br><br>Precios Incluyen IVA.</span></div></td>
						
						<input name="txtTechnicalDetails" type="hidden" id="txtTechnicalDetails">
						<input name="txtDoNotRehydrate" type="hidden" id="txtDoNotRehydrate">
						<input name="txtAllocatedSeating" type="hidden" id="txtAllocatedSeating" value="Y">
						<input name="txtForceSeatSelection" type="hidden" id="txtForceSeatSelection" value="Y">
						<input name="txtEnableManualSeatSelection" type="hidden" id="txtEnableManualSeatSelection" value="Y">
						<input name="txtHideAllVoucherRows" type="hidden" id="txtHideAllVoucherRows">
						<input name="txtEnableConcessionSales" type="hidden" id="txtEnableConcessionSales" value="N">
						<input name="txtVoucherSubmit" type="hidden" id="txtVoucherSubmit">
						<input name="txtVoucherPINSubmit" type="hidden" id="txtVoucherPINSubmit">
						<input name="txtDateOrderChanged" type="hidden" id="txtDateOrderChanged">
						<input name="txtCancelOrder" type="hidden" id="txtCancelOrder">
					
					</tr>
					</tbody></table>
		            <table cellspacing="0" cellpadding="0" width="580" border="0">
						<tbody><tr class="5PxHeighDONOTCHANGE">
							<td colspan="3"></td>
						</tr>
						<tr>
							<td width="5"></td>
							<td width="570" style="text-align:left"></td>
							<td width="5"></td>
						</tr>
						<tr style="HEIGHT:5px">
							<td colspan="3"></td>
						</tr>
					</tbody></table>
		            </fieldset>
		        </div>

		       <div id="divNegro" class="modalBg" style="display: none;" onclick="fnLightBoxSalir();"></div>     
		<div id="MSGLightBox" class="sjmodal-container" style="display: none;">
		    <a href="https://inetvis.cineticket.com.mx/compra/visSelectTickets.aspx?tkn=&amp;cinemacode=954&amp;txtSessionId=10261&amp;distributor=Fox&amp;originalTitle=Bohemian%20Rhapsody%20(Estados%20Unidos,%202018)&amp;language=&amp;genre=DRAMA&amp;rating=B&amp;director=Bryan%20Singer&amp;protagonist=Allen%20Leech&amp;_ga=2.169038049.1153251463.1541480097-231010952.1539140855#" class="sjmodal-close" onclick="fnLightBoxSalir();"></a>
				<h2 class="sjmodal-title">¡ATENCIÓN!</h2>
		<p> 
		    <span id="spLightBox" class="sjmodal-text"></span>
		</p>
		        <p> 
		    
		</p>
		<input type="button" onclick="fnLightBoxSalir(); return false;" class="mbtn" value="Ok, Entendido" id="btnLightBoxAceptar">
		<input type="button" onclick="window.history.back(); return false;" class="mbtn" value="Ok, Entendido" id="btnLightBoxRegresar" style="display:none">
		</div>
		<button class="mbtn" style="display:none">Ok, Entendido </button><p></p>

		</font></article></section></div>

		<font color="gray" style="font-size: 10pt; font-style: italic;"> 
		 
		    <link href="./archivosCompraBoletos/estilos-modal-cinepolis.css" type="text/css" rel="stylesheet">

		    <script>
		        function fnLightBoxSalir() {
		            document.getElementById('MSGLightBox').style.display = 'none'; document.getElementById('divNegro').style.display = 'none'
		        }


		    </script>


		<div id="pnlPaypalPixel">
			
		<script type="text/javascript">
		triggit_advertiser = "jc";
		triggit_segments = ["cinepolis", "cinepoliscart"];
		triggit_data = {'ppk' : 'jc[27396]'};

		(function() {
		var ta = document.createElement('script'); ta.type = 'text/javascript'; ta.async = true;
		ta.src = document.location.protocol + '//dgy6rx5roq02d.cloudfront.net/triggit-analytics.min.js';
		document.getElementsByTagName('head')[0].appendChild(ta);
		})();
		</script>


		</div>
		 <input name="hdVF" type="hidden" id="hdVF">
		        <input name="txtIP" type="hidden" id="txtIP" value="201.175.156.155">
		        <script language="JavaScript" src="./archivosCompraBoletos/ip.js.asp.descarga"></script>
		        <script language="JavaScript">
		              document.frmSelectTickets.txtIP.value=mjoIP;
		        </script>
			        &nbsp;
			<script language="JavaScript">
				<!--
				function openWindow(page,winHeight,winWidth){
					window.open (page, 'newwindow', config='height=' + winHeight +', width=' + winWidth + ', toolbar=no, menubar=no, scrollbars=yes, resizable=no,location=no, directories=no, status=no')
				}
			</script>


			<?php
				include ('footercompraboleto/footerCompra.php');
			?>

			</font>
		</form><!--FORMULARIO FIN-->
	</div>

<script type="text/javascript" id="">setTimeout(function(){var a=document.createElement("script"),b=document.getElementsByTagName("script")[0];a.src=document.location.protocol+"//script.crazyegg.com/pages/scripts/0012/6530.js?"+Math.floor((new Date).getTime()/36E5);a.async=!0;a.type="text/javascript";b.parentNode.insertBefore(a,b)},1);</script>
<script type="text/javascript" id="">var _comscore=_comscore||[];_comscore.push({c1:"2",c2:"9732062"});(function(){var a=document.createElement("script"),b=document.getElementsByTagName("script")[0];a.async=!0;a.src=("https:"==document.location.protocol?"https://sb":"http://b")+".scorecardresearch.com/beacon.js";b.parentNode.insertBefore(a,b)})();</script>
<noscript>
  <img src="https://sb.scorecardresearch.com/p?c1=2&amp;c2=9732062&amp;cv=2.0&amp;cj=1">
</noscript>

<script type="text/javascript" id="">!function(d,e,f,a,b,c){d.twq||(a=d.twq=function(){a.exe?a.exe.apply(a,arguments):a.queue.push(arguments)},a.version="1.1",a.queue=[],b=e.createElement(f),b.async=!0,b.src="//static.ads-twitter.com/uwt.js",c=e.getElementsByTagName(f)[0],c.parentNode.insertBefore(b,c))}(window,document,"script");twq("init","nxnw4");twq("track","PageView");</script>
<font color="gray" style="font-size:10pt; font-style:italic">
	<!-- Scripts -->
	<script src="./archivosCompraBoletos/jquery.spinner.js.descarga"></script>
  	<script src="./archivosCompraBoletos/jquery.kinetic.min.js.descarga"></script>
  	<script src="./archivosCompraBoletos/jquery.carouFredSel-min.js.descarga"></script>
	<script src="./archivosCompraBoletos/action-reservar.js.descarga"></script>



<script language="javascript">CalcOrderTotal('2','$#','.','visSelectTickets');CalcOrderPoints('+<AMOUNT> Points',2,'.');</script>
	<script language="javascript">HideLayer('divSignIn');</script><script language="javascript">try {setDescriptionCss('rptAreaCategory__ctl0_rptTicketList__ctl1_lblDescription0','0','False');} catch (e) {}</script><script language="javascript">try {setDescriptionCss('rptAreaCategory__ctl0_rptTicketList__ctl2_lblDescription1','0','False');} catch (e) {}</script><script language="javascript">try {setDescriptionCss('rptAreaCategory__ctl0_rptTicketList__ctl3_lblDescription2','0','False');} catch (e) {}</script><script language="javascript">document.getElementById('tickets').style.display = 'none';document.getElementById('cart').style.display = 'none';</script>
		<script src="./archivosCompraBoletos/cookie.js.descarga" type="text/javascript" language="javascript"></script>
    <script type="text/javascript">
       $(document).ready(function () {
		window.dataLayer = window.dataLayer || [];
		dataLayer.push({
			'event': 'boletos',
			'ecommerce': {
				'checkout': {
					'actionField': {
						'step': 1,
						'option': 'Boletos'
					}
				}
			}
		});
		var brand = getUrlParameter("distributor");
		var originalTitle = getUrlParameter("originalTitle");
		var language = getUrlParameter("language");
		var genre = getUrlParameter("genre");
		var rating = getUrlParameter("rating");
		var director = getUrlParameter("director");
		var protagonist = getUrlParameter("protagonist");
		var date = $("#visOrderTracker_txtSessionDateDetails").text();
		var time = $("#visOrderTracker_txtSessionTimeDetails").text();
		var movieData = {
			"brand" : brand === undefined ? "": brand,
			"originalTitle" : originalTitle === undefined ? "": originalTitle,
			"language" : language === undefined ? "": language,
			"genre" : genre === undefined ? "": genre,
			"rating" : rating === undefined ? "": rating,
			"director" : director === undefined ? "": director,
			 "protagonist" : protagonist === undefined ? "": protagonist,
			 "date":date,
			 "time":time
		};
		dataLayer.push({'distribuidora': brand});
		var data = JSON.stringify(movieData);
		$.cookie("movieData", data, { path: '/' });
	   });

	var getUrlParameter = function getUrlParameter(sParam) {
		var sPageURL = decodeURIComponent(window.location.search.substring(1)),
			sURLVariables = sPageURL.split('&'),
			sParameterName,
			i;

		for (i = 0; i < sURLVariables.length; i++) {
			sParameterName = sURLVariables[i].split('=');

			if (sParameterName[0] === sParam) {
				return sParameterName[1] === undefined ? true : sParameterName[1];
			}
		}
	};

    </script>
		<div id="testDIV"><max_boletos_04></max_boletos_04></div>

		<script type="text/javascript" language="javascript">
		<!--

        function Increment(component){								
			strValue = component.value;
			
			if (isNaN(strValue)) {
				alert("isNaN")
				component.value = 1;
			} else {				
				component.value ++;
				
				if (component.value == '') {
					component.value = 0;
				}
				
				if (component.value == strValue) {
					component.value = 0;
				}
			}			
		}
				

		function HideShowLayer(id) {
			var objDiv;

						
			try {
							
				objDiv = document.getElementById(id);
				
				
				if (objDiv.style.display == "none") {
				    objDiv.style.display = "inline";
				} else {
				    objDiv.style.display = "none";
				}
				
				
				if (objDiv.style.display == "inline") {
				    objDiv.style.visibility = 'visible';
				    setTimeout("showAnim()",200);
				    
				}
			} catch (e) {
			}
		}
		
		function showAnim() {
		    document.frmSelectTickets.imgProcessing.src="Processing.gif#";
		}


		function DisableButtons(Button, id) {
		    
			try {
				
				var TestGetId				
				TestGetId = document.getElementById(id).id
			
				
				Button.disabled = true;
				
				Button.className = 'CursorArrow';
				
				
				//document.getElementById(id).click();		
			} catch(e) {
			}
			
			
			try {
				document.getElementById('ibtnCancel').disabled = 'true';
				document.getElementById('ibtnCancel').className = 'CursorArrow';
				document.getElementById('ibtnSelectSeats').disabled = 'true';
				document.getElementById('ibtnSelectSeats').className = 'CursorArrow';
				document.getElementById('ibtnOrderTickets').disabled = 'true';
				document.getElementById('ibtnOrderTickets').className = 'CursorArrow';	
				document.getElementById('ibtnSignIn').disabled = 'true';
				document.getElementById('ibtnSignIn').className = 'CursorArrow';
				document.getElementById('ibtnSelectConcessions').disabled = 'true';
				document.getElementById('ibtnSelectConcessions').className = 'CursorArrow';							
				document.getElementById('ibtnAddToOrder').disabled = 'true';
				document.getElementById('ibtnAddToOrder').className = 'CursorArrow';	
			} catch(e) {
			}
		}

	

		function MM_swapImgRestore() { //v3.0
		var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
		}

		function MM_findObj(n, d) { //v3.0
		var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
			d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
		if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
		for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document); return x;
		}

		function MM_swapImage() { //v3.0
		var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
		if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
		}

		function MM_preloadImages() { //v3.0
		var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
			var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
			if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
		}
		
	


		try {
				document.getElementById('ibtnAddToOrder').src = 'images/addtoorder.gif';
			
						} catch(e) {
			}
	

		var a = new Array("processing.gif", "applet/images/c1.gif", "applet/images/c2.gif", "applet/images/c3.gif", "applet/images/c4.gif", "applet/images/c5.gif", "applet/images/c6.gif", "applet/images/c7.gif", "applet/images/c8.gif", "applet/images/c9.gif", "applet/images/colon.gif");

		var d=document;
		if(d.images) {
			if(!d.MM_p) d.MM_p=new Array();
				var i,j = d.MM_p.length;
				for(i=0; i<a.length; i++)
					if (a[i].indexOf("#")!=0) {
						d.MM_p[j] = new Image;
						d.MM_p[j++].src=a[i];
					}
		}			
		//-->	
	
	try {	
	document.getElementById('visOrderTracker_lblTicket').style.display='none'	;

	document.getElementById('ColSubTotal').style.display='none'	;
	} catch(e) {
			}
	
	

		    try {
		        var SalaJunior = 0;
		        try {

		            for (i = 0; i < 4; i++) {
		                if (document.getElementById('rptAreaCategory__ctl' + i + '_lblAreaCategory').innerHTML == 'JUNIOR PUFF') {
		                    document.getElementById('rptAreaCategory__ctl' + i + '_lblAreaCategory').innerHTML = document.getElementById('rptAreaCategory__ctl' + i + '_lblAreaCategory').innerHTML + '-<b>   Incluye 2 asientos </b><img src="descubre.jpg"  Width="100px">';
		                    SalaJunior = 1;

		                    document.getElementById('rptAreaCategory__ctl' + i + '_lblAreaCategory').className = 'TicketType asientoPuff';
		                }
		            }

		        } catch (e) {
		        }



		      
		            try {

		                for (i = 0; i < 4; i++) {
		                    if (document.getElementById('rptAreaCategory__ctl' + i + '_lblAreaCategory').innerHTML == 'JUNIOR COJIN') {
		                        document.getElementById('rptAreaCategory__ctl' + i + '_lblAreaCategory').innerHTML = document.getElementById('rptAreaCategory__ctl' + i + '_lblAreaCategory').innerHTML + '-<b>   Incluye 2 asientos </b><img src="descubre.jpg"  Width="100px">';
		                        SalaJunior = 1;

		                        document.getElementById('rptAreaCategory__ctl' + i + '_lblAreaCategory').className = 'TicketType asientoCojin';
		                    }
		                }

		            } catch (e) {
		            }





		        
		        try {

		            for (i = 0; i < 4; i++) {
		                if (document.getElementById('rptAreaCategory__ctl' + i + '_lblAreaCategory').innerHTML == 'JUNIOR CAMASTRO') {
		                    document.getElementById('rptAreaCategory__ctl' + i + '_lblAreaCategory').innerHTML = document.getElementById('rptAreaCategory__ctl' + i + '_lblAreaCategory').innerHTML + '-<b>    </b><img src="descubre.jpg"  Width="100px">';
		                    SalaJunior = 1;

		                    document.getElementById('rptAreaCategory__ctl' + i + '_lblAreaCategory').className = 'TicketType asientoTumbona';
		                }
		            }

		        } catch (e) {
		        }
		        





		        if (SalaJunior == 1) {





		            try {

		                for (i = 0; i < 4; i++) {
		                    if (document.getElementById('rptAreaCategory__ctl' + i + '_lblAreaCategory').innerHTML == 'TRADICIONAL') {
		                        document.getElementById('rptAreaCategory__ctl' + i + '_lblAreaCategory').innerHTML = document.getElementById('rptAreaCategory__ctl' + i + '_lblAreaCategory').innerHTML + '-<b>    </b><img src="descubre.jpg"  Width="100px">';
		                        SalaJunior = 1;

		                        document.getElementById('rptAreaCategory__ctl' + i + '_lblAreaCategory').className = 'TicketType Tradicional';
		                    }
                             
		                }
		            } catch (e) {
		            }




		        }

		    } catch (e) {
		    }







		    try {
		        if (document.getElementById('visOrderTracker_txtMovieDetails').innerHTML.indexOf('Interestelar 4DX/2D') > -1) {
		            var elements = document.getElementsByClassName('TicketTypeRowAlt');



		            for (var i = 0; i < elements.length; i++) {

		                if (elements[i].innerHTML.indexOf('ESPECIAL') == -1)
		                    elements[i].style.display = 'none';

		            }

		            var elements = document.getElementsByClassName('TicketTypeRow');



		            for (var i = 0; i < elements.length; i++) {

		                if (elements[i].innerHTML.indexOf('ESPECIAL') == -1)
		                    elements[i].style.display = 'none';

		            }



		        }

		    } catch (e) {
		    }


		    var MAX_BOLETOS = 10;
		    try {
		        if (document.getElementById('visOrderTracker_txtMovieDetails').innerHTML.indexOf('SJ') > -1) {
		            document.getElementById('MSGLightBox').style.display = '';
		            document.getElementById('spLightBox').innerHTML = document.getElementById('spanCartelExtra').innerHTML;
		            document.getElementById('spanCartelExtra').innerHTML = '';
		            document.getElementById('divNegro').style.display = 'block'

		        }
                else
		            document.getElementById('spanCartelExtra').style.display = '';
		    } catch (e) {
		    }

		    $(function ($) {
		        $(".spinner button").click(function () {

		            var suma = 0;

		            if ($(".numBoletos").length > 0) {
		                for (i = 0; i < $(".numBoletos").length; i++) {
		                    suma += parseInt($(".numBoletos")[i].value);
		                }
		            }

		            if (suma >= MAX_BOLETOS) {
		                $(".increase").attr("disabled", "disabled");
		            } else {
		                $(".increase").removeAttr('disabled');
		            }
		        });
		    });



		    try {

		        if (document.getElementById('visOrderTracker_lblCartelExtra').innerHTML != '') {
		            document.getElementById('spanCartelExtra').innerHTML = document.getElementById('visOrderTracker_lblCartelExtra').innerHTML + '';
		            try {
		                if (document.getElementById('visOrderTracker_txtMovieDetails').innerHTML.indexOf('SJ') > -1) {
		                    document.getElementById('spanCartelExtra').innerHTML = document.getElementById('spanCartelExtra').innerHTML + '<pp>';
		                }

		            } catch (e) {
		            }


		            if (document.getElementById('visOrderTracker_lblCartelExtra').innerHTML.indexOf('<nd>') > -1) {
		                document.getElementById('tblTickets').style.display = "none";
		                if (document.getElementById('pnlPase')) document.getElementById('pnlPase').style.display = "none";
		                if (document.getElementById('pnlVOUCHER')) document.getElementById('pnlVOUCHER').style.display = "none";
		                if (document.getElementById('pnlCINEPASS')) document.getElementById('pnlCINEPASS').style.display = "none";

		                if (document.getElementById('btnLightBoxRegresar')) {

		                    document.getElementById('btnLightBoxAceptar').style.display = "none";
		                    document.getElementById('btnLightBoxRegresar').style.display = "";
		                }

		            }



		        }
		    } catch (e) {
		    }


		    try {
		        if (document.getElementById('spanCartelExtra').innerHTML.indexOf('<pp>') > -1) {
		            document.getElementById('MSGLightBox').style.display = '';
		            document.getElementById('spLightBox').innerHTML = document.getElementById('spanCartelExtra').innerHTML;
		            document.getElementById('spanCartelExtra').innerHTML = '';
		            document.getElementById('divNegro').style.display = 'block'
		        }

		    } catch (e) {
		    }


		    try {
		       
		        if (document.getElementById('spanCartelExtra').innerHTML.indexOf('<max_boletos_') > -1) {
		            var iniMAxBol = document.getElementById('spanCartelExtra').innerHTML.indexOf('<max_boletos_');
		            
		            MAX_BOLETOS = document.getElementById('spanCartelExtra').innerHTML.substring(iniMAxBol + 13, iniMAxBol + 15);
		            document.getElementById('lblAboveTicketDetail').innerHTML = 'Puedes comprar ' + MAX_BOLETOS  + '  boletos mï¿½ximo por transacciï¿½n.';
		            
		           
		        }

		    } catch (e) {
		    }

		    try {

		        if (document.getElementById('tblTickets').innerHTML.indexOf('KLIC') > -1) {
		            document.getElementById('imgImagenExtraPelicula').style.display = "";
		        }

		    } catch (e) {
		    }



		    try {

		        if (document.getElementById('hdVF').value=='Y') {
		          

		            MAX_BOLETOS = 1
		            document.getElementById('lblAboveTicketDetail').innerHTML = 'Puedes comprar 1  boletos mï¿½ximo por transacciï¿½n.';


		        }

		    } catch (e) {
		    }

		    try {
		        if ( (document.getElementById('visOrderTracker_txtMovieDetails').innerHTML.indexOf('Marvel10:')>-1)  ) {
		            
					document.getElementById('imfSuperTicketMarvel').style.display = "";

		        }

		    } catch (e) {
		    }

</script>

    "<!-- Google Tag Manager (noscript) -->
<noscript><iframe src=""https://www.googletagmanager.com/ns.html?id=GTM-M66T72""
height=""0"" width=""0"" style=""display:none;visibility:hidden""></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->"


	

</font>
<!--<div id="ascrail2000" class="nicescroll-rails" style="width: 7px; z-index: 9999; cursor: default; position: fixed; top: 0px; height: 100%; right: 0px; opacity: 0.6;"><div style="position: relative; top: 248px; float: right; width: 7px; height: 239px; background-color: rgb(0, 0, 0); border: 0px; background-clip: padding-box; border-radius: 3px;"></div></div>-->
<script type="text/javascript" id="">!function(b,e,f,g,a,c,d){b.fbq||(a=b.fbq=function(){a.callMethod?a.callMethod.apply(a,arguments):a.queue.push(arguments)},b._fbq||(b._fbq=a),a.push=a,a.loaded=!0,a.version="2.0",a.queue=[],c=e.createElement(f),c.async=!0,c.src=g,d=e.getElementsByTagName(f)[0],d.parentNode.insertBefore(c,d))}(window,document,"script","https://connect.facebook.net/en_US/fbevents.js");fbq("init","1479175765731211");fbq("track","PageView");
fbq("track","AddToCart",{content_type:"product",content_name:"Bohemian Rhapsody, La Historia de Fre Esp (B)",content:"Fox"});</script>
<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=1479175765731211&amp;ev=PageView&amp;noscript=1"></noscript>



</body></html>