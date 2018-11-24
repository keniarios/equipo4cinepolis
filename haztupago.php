<?php 
	
	include ('bd/conexion.php'); $conexion = conectarBD();

	//Creamos sesión
    session_start();
    $_SESSION['id_tarjeta'] = 0;
	$_SESSION['total'] = 0;
	$id_tarjeta = 0;
	$PrecioTotal = 0;
	if(!isset($_SESSION['id_horario'])) 
	{
	  header('Location: index.php');
	}
	$id_horario = $_SESSION['id_horario'];
	$Cedad3era = $_SESSION['edad3era'];
	$Cadulto = $_SESSION['adulto'];
	$Cninos = $_SESSION['ninos'];
	$precioTotal3raEdad = $_SESSION['precioTotal3raEdad'];
	$precioTotalAdulto = $_SESSION['precioTotalAdulto'];
	$precioTotalNino = $_SESSION['precioTotalNino'];


	$PrecioTotal = $precioTotal3raEdad + $precioTotalAdulto + $precioTotalNino;

	$CiudadSucursalHeader = pg_query("SELECT nombre, ALS.ciudad FROM altasucursal ALS INNER JOIN HORARIOS H ON ALS.id_sucursal=H.id_sucursal and id_horario='$id_horario'");
	$DatosSucursalHeader = pg_fetch_array($CiudadSucursalHeader);
	//Almacenamos el nombre de usuario en una variable de sesión usuario
    $_SESSION['nombre'] = $DatosSucursalHeader["nombre"];
    $_SESSION['ciudad'] = $DatosSucursalHeader["ciudad"];
    $nombresucursalHeader = $_SESSION['nombre'];
	$nombreciudadHeader = $_SESSION['ciudad'];

	//SELECCIONAR DATOS DE LA PELICULA
	$Timagen = pg_query("SELECT horarios.id_pelicula, horarios.hora, horarios.fecha, peliculas.imagen, peliculas.nombreoriginal, altasucursal.nombre FROM horarios INNER JOIN peliculas ON horarios.id_pelicula = peliculas.id_pelicula INNER JOIN altasucursal ON horarios.id_sucursal = altasucursal.id_sucursal  WHERE horarios.id_horario=$id_horario;");


	$Tdatos = pg_query("select horarios.id_horario, horarios.id_pelicula, horarios.hora, horarios.fecha, peliculas.imagen, peliculas.nombreoriginal, altasucursal.nombre, clasificacion, idioma, horarios.sala from horarios INNER JOIN peliculas ON horarios.id_pelicula = peliculas.id_pelicula INNER JOIN altasucursal on horarios.id_sucursal = altasucursal.id_sucursal  WHERE horarios.id_horario=$id_horario;");
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0061)https://inetvis.cineticket.com.mx/compra/visPayment.aspx?tk=2 -->
<html class="" style="overflow-y: hidden;">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
</head>


<body class="FormStandard" style="">"<!-- Google Tag Manager -->

	<script type="text/javascript" async="" src="archivosCompraBoletos/js"></script>
	<script src="archivosCompraBoletos/6530.js.descarga" async="" type="text/javascript"></script>
	<script async="" src="archivosCompraBoletos/uwt.js.descarga"></script>
	<script async="" src="archivosCompraBoletos/beacon.js.descarga"></script>
	<script type="text/javascript" async="" src="archivosCompraBoletos/analytics.js.descarga"></script>
	<script type="text/javascript" async="" src="archivosCompraBoletos/analytics.js.descarga"></script>
	
<!-- End Google Tag Manager -->"

    <title>Cinepolis Online</title>

    <meta content="Microsoft Visual Studio.NET 7.0" name="GENERATOR">
    <meta content="Visual Basic 7.0" name="CODE_LANGUAGE">
    <meta content="JavaScript" name="vs_defaultClientScript">
    <meta content="http://schemas.microsoft.com/intellisense/ie5" name="vs_targetSchema">
    <link href="archivosCompraBoletos/visStyles.css" type="text/css" rel="stylesheet">
    <!-- visStylesUser.css must proceed visStyles.css, so to override the default styles if requested -->

    <!--ROQUE-->
    <link href="archivosCompraBoletos/visStylesUser.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="archivosCompraBoletos/widgets-pago-con-puntos.css">
    
    
    <style type="text/css">
        tblExtraCardDetails.TD
        {
            text-align: left;
        }
    </style>
    <script src="archivosCompraBoletos/jquery.min.js.descarga" type="text/javascript" language="javascript"></script>
   
    <script type="text/javascript" language="javascript">
        var formapago = $("#txtFormaPago").val();
        var tarjeta = "";
        switch (formapago) {
            case "rdbFormaPago_1":
                tarjeta = "CREDITO/DEBITO";
                break;
            case "rdbFormaPago_2":
                tarjeta = "PAYPAL";
                break;
            case "rdbFormaPago_3":
                tarjeta = "BBVA";
                break;
            case "rdbFormaPago_4":
                tarjeta = "CINECASH";
                break;
            case "rdbFormaPago_5":
                tarjeta = "TARJETAS DEBITO CON PAYPAL";
                break;
            default:
                tarjeta = "CREDITO/DEBITO";
                break;
        }
        function Pago() {
            window.dataLayer = window.dataLayer || [];
            dataLayer.push({
                'event': 'pago',
                'ecommerce': {
                    'checkout': {
                        'actionField': {
                            'step': 4,
                            'option': tarjeta
                        }
                    }
                }
            });
        }
    </script>
    <img src="archivosCompraBoletos/seg" width="1" height="1" alt="">
<!-- CSS-->
			<link href="archivosCompraBoletos/reset.css" rel="stylesheet">
			<link href="archivosCompraBoletos/master.css" rel="stylesheet">
			<link href="archivosCompraBoletos/compra.css" rel="stylesheet">
			<link href="archivosCompraBoletos/responsive-master.css" rel="stylesheet">
			<link href="archivosCompraBoletos/responsive-compra.css" rel="stylesheet">
<?php
	include('headercompraboleto/headerCompra.php');
?>

    <!--FORMULARIO-->
    <?php
    /*echo "
    <form name='frmPayment' method='post' action='controladores/validarcompra.php?id_horario=$id_horario&edad3era=$Cedad3era&precioTotal3raEdad=$precioTotal3raEdad&adulto=$Cadulto&precioTotalAdulto=$precioTotalAdulto&ninos=$Cninos&precioTotalNino=$precioTotalNino' id='frmPayment'>
    ";*/
    echo "
    <form name='frmPayment' method='post' action='controladores/validarcompra.php' id='frmPayment'>
    ";
    ?>
			<input type="hidden" name="__EVENTTARGET" id="__EVENTTARGET" value="">
			<input type="hidden" name="__EVENTARGUMENT" id="__EVENTARGUMENT" value="">
			<input type="hidden" name="__LASTFOCUS" id="__LASTFOCUS" value="">


			<script type="text/javascript">
			<!--
			var theForm = document.forms['frmPayment'];
			if (!theForm) {
			    theForm = document.frmPayment;
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
					  
			

			<!--[if lt IE 9]>
				<script type="text/javascript"  src="scripts/css3-mediaqueries.js"></script>
			<![endif]-->

			<!-- Scripts-->
		  	<script src="archivosCompraBoletos/jquery-1.10.0.min.js.descarga"></script>
		  	<script type="text/javascript" src="archivosCompraBoletos/jquery-migrate-1.2.1.js.descarga"></script>
		  	<script src="archivosCompraBoletos/jquery-plugins.js.descarga"></script>
		  	<script src="archivosCompraBoletos/jquery-nicescroll.js.descarga"></script>
		  	<script src="archivosCompraBoletos/action.js.descarga"></script>
		    
	 


			<div class="wrapper">
				<section class="g960 cf">
					<article>
						<header>
							<h2><i class="btn icon-ticket"></i>COMPRA Y RESERVA TUS BOLETOS</h2>
						</header>

						<div class="row resumen">	
							<figure class="col2">
								<a href="#">
								<?PHP
								
			                        while ($datos=pg_fetch_array($Timagen)) {
			                            $rutaimagen = $datos['imagen'];

			                            echo "
			                            <a href='#'>
			                                <img src='../$rutaimagen' id='visOrderSummary_imgCartelLF13'/>
			                            </a>";
			                        }
			                    ?>
								</a>
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
		                                    <p><span><span id='visOrderTracker_lblScreen' class='DetailsSubHeader' style='display: none;'>Sala</span></span>
		                                    <em><span id='visOrderTracker_txtScreenDetails' class='DetailsText' style='display: none;'>$nombreSala</span></em></p>
		                                ";
		                            }
		                        ?>
			                    </div>
						 
						 <div class="col4">
	                        <table id="tblItemList" cellpadding="0" cellspacing="0">
	                        	<tbody>
								 	<tr>
								 		<td class="DetailsSubHeader">
								 			<span id="visOrderSummary_rptShowtimeList__ctl0_rptItemList__ctl0_lblBoletoName" class="DetailsSubHeader">Tipo de Boleto:</span>
								 		</td>
	                                    <td class="Price"></td>
	                                    <td class="Points"></td>
	                                    <td class="DetailsSubHeader"><span id="visOrderSummary_rptShowtimeList__ctl0_rptItemList__ctl0_lblAsientoName" class="DetailsSubHeader">Asientos:</span></td>
	                                </tr>

	                                <?php 
		                        		if ($Cedad3era>0) {
		                        			echo "
		                        			<tr>
			                                    <td class='OrderDetailsDescription Indent'>
			                                    	<span id='visOrderSummary_rptShowtimeList__ctl0_rptItemList__ctl1_txtItemDesc' class='DetailsText'>$Cedad3era 3 ERA EDAD</span>
			                                    </td>
			                                    <td class='Price'>
			                                    	<span id='visOrderSummary_rptShowtimeList__ctl0_rptItemList__ctl1_txtItemPrice' class='DetailsText'>$".$precioTotal3raEdad.".00</span>
			                                    </td>
			                                    <td class='Points'>
			                                    	<span id='visOrderSummary_rptShowtimeList__ctl0_rptItemList__ctl1_txtItemPoints' class='DetailsText'></span>
			                                    </td>
			                                    <td class='OrderMisc'>
			                                    	<span id='visOrderSummary_rptShowtimeList__ctl0_rptItemList__ctl1_txtItemMisc' class='DetailsText'>B1</span>
			                                    </td>
			                                </tr>
		                        			";
		                        		}
	                                
	                        
	                                	if ($Cadulto>0) {
		                        			echo "
		                        			<tr>
			                                    <td class='OrderDetailsDescription Indent'>
			                                    	<span id='visOrderSummary_rptShowtimeList__ctl0_rptItemList__ctl1_txtItemDesc' class='DetailsText'>$Cadulto ADULTO</span>
			                                    </td>
			                                    <td class='Price'>
			                                    	<span id='visOrderSummary_rptShowtimeList__ctl0_rptItemList__ctl1_txtItemPrice' class='DetailsText'>$".$precioTotalAdulto.".00</span>
			                                    </td>
			                                    <td class='Points'>
			                                    	<span id='visOrderSummary_rptShowtimeList__ctl0_rptItemList__ctl1_txtItemPoints' class='DetailsText'></span>
			                                    </td>
			                                    <td class='OrderMisc'>
			                                    	<span id='visOrderSummary_rptShowtimeList__ctl0_rptItemList__ctl1_txtItemMisc' class='DetailsText'>B2</span>
			                                    </td>
			                                </tr>
		                        			";
		                        		}
	                        
	                                	if ($Cninos>0) {
		                        			echo "
		                        			<tr>
			                                    <td class='OrderDetailsDescription Indent'>
			                                    	<span id='visOrderSummary_rptShowtimeList__ctl0_rptItemList__ctl1_txtItemDesc' class='DetailsText'>$Cninos NIÑOS</span>
			                                    </td>
			                                    <td class='Price'>
			                                    	<span id='visOrderSummary_rptShowtimeList__ctl0_rptItemList__ctl1_txtItemPrice' class='DetailsText'>$".$precioTotalNino.".00</span>
			                                    </td>
			                                    <td class='Points'>
			                                    	<span id='visOrderSummary_rptShowtimeList__ctl0_rptItemList__ctl1_txtItemPoints' class='DetailsText'></span>
			                                    </td>
			                                    <td class='OrderMisc'>
			                                    	<span id='visOrderSummary_rptShowtimeList__ctl0_rptItemList__ctl1_txtItemMisc' class='DetailsText'>B3</span>
			                                    </td>
			                                </tr>
		                        			";
		                        		}
	                                ?>
	                        
	                                <tr style='display:none'>
	                                    <td class='OrderDetailsDescription Indent'>
	                                    	<span id='visOrderSummary_rptShowtimeList__ctl0_rptItemList__ctl4_lblItemSubtotal' class='txtCompra'>Subtotal</span>
	                                    </td>
	                                    <td class='Price'>
	                                    	<span id='visOrderSummary_rptShowtimeList__ctl0_rptItemList__ctl4_txtItemSubtotalDetails' class='DetailsText Bold'>$132.00</span>
	                                    </td>
	                                    <td class='Points'>
	                                    	<span id='visOrderSummary_rptShowtimeList__ctl0_rptItemList__ctl4_txtItemPointsSubtotalDetails' class='DetailsText'></span>
	                                    </td>
	                                    <td class='OrderMisc'></td>
	                                </tr>
	                            </tbody>
	                        </table>
	               

			<style>
			/* Desgloce del servicio */
			.txt-amarillo {
				color:#feca30;
			}
			section .resumen .desglose button,section .resumen .desglose p {
				display:inline-block;
				vertical-align:super
			}
			section .resumen .desglose p {
				padding:0 10px 1em
			}
			section .resumen .desglose .info {
				background-color:#0b5ba1;
				border:0 none;
				-webkit-border-radius:2px;
				-moz-border-radius:2px;
				-ms-border-radius:2px;
				-o-border-radius:2px;
				border-radius:2px;
				color:#fff;
				height:18px;
				line-height:21px;
				text-align:center;
				width:18px
			}
			section .resumen .desglose .ab-desg {
				background-color:#f5f5f5;
				border:1px solid #e1e3e6;
				-webkit-border-radius:2em;
				-moz-border-radius:2em;
				-ms-border-radius:2em;
				-o-border-radius:2em;
				border-radius:2em;
				color:#a6afbe;
				height:18px;
				width:18px
			}
			section .resumen .desglose .table {
				height:0;
				overflow:hidden;

			}
			section .resumen .desglose .table table {
				margin:0;

			}
			section .resumen .desglose .table table td {
				text-align:right
			}
			section .resumen .info-txt {
				background-color:#fff;
				border:2px solid #e1e3e6;
				left:50%;
				margin-left:-180px;
				max-width:470px;
				padding:10px;
				position:absolute;
				top:2px;
				z-index:50;

			}
			section .resumen .info-txt a {
				font-size:.9em;
				position:absolute;
				right:10px;

			}
			section .resumen .info-txt a span {
				color:#000;
				font-size:1.2em;
				vertical-align:bottom
			}
			section .resumen .info-txt h3 {
				border-bottom:1px solid #e1e3e6;
				color:#000;
				font-size:1.2em;
				margin:0 0 6px;
				padding-bottom:8px
			}
			section .resumen .info-txt p {
				font-size:.9em
			}
			.DetailsSubHeader_DESGLOSE {
			color:   #969ea9;font-weight: bold;
			}
			    </style>
			       
			                    
			                <div class="desglose" style=" display:none">
										<button class="info">?</button>
										<p>Desglose del servicio</p>
										<button class="ab-desg icon-plus-sign"> </button>
										<div class="table" style="height: 0px;">
						 

			<table>
			<tbody>
			<tr>
			<td> 
			              <table border="0">
			      <tbody><tr id="visOrderSummary_trDonativo" style="display:none;">
				<td valign="top" class="DetailsSubHeader" width="250" align="right">Donativo:</td>
				<td class="Price">   <span id="visOrderSummary_lblDonativo" class="DetailsText"></span> <br>      </td>
				<td align="left"></td>
				<td valign="top">  <font class="DetailsSubHeader">             </font></td>
			</tr>

						    </tbody></table>
			 <table border="0" style="   style=" display:none"="">
			         <tbody><tr id="visOrderSummary_trBookingFeeItem" style="display:none; visible:hidden;">
				<td><span id="visOrderSummary_lbltrBookingFeeItem_TITULO" class="DetailsSubHeader_DESGLOSE" align="right">Garantía de Servicio:</span></td>
				<td class="Price">
			                    <span id="visOrderSummary_lblBookingFeeItemCostoCNCASH" style="display:none">3</span>
			                    <span id="visOrderSummary_lblBookingFeeItemQTY" style="display:none">2</span>
			                    <span id="visOrderSummary_lblBookingFeeItemCosto" style="display:none">4</span>
			                    </td>
				<td class="Points"><span id="visOrderSummary_lblBookingFeeItem" class="DetailsText Bold"></span></td>
				<td class="OrderMisc"></td>
			</tr>

			                 </tbody></table>
			  </td>
			</tr>
			</tbody>
			</table>
			    <script>
				   $('.info').click(function() {
				    $('.resumen .col10').append($('<div class="info-txt"><a href="#">Cerrar <span>X</span></a><h3>Acerca del Servicio</h3><p>Ahora tus boletos cuentan con una <strong>garantía de cancelación</strong>. Si por alguna razón no puedes llegar a la función que planeaste con anticipación, podrás validar la reposición de tus boletos.</p></div>').hide().fadeIn(400));
				    $('.info-txt a').click(function(e) {    $('.info-txt').fadeOut('fast');    e.preventDefault();});});$('.ab-desg').click(function(e) {if ($(this).hasClass('icon-plus-sign')) {    $(this).removeClass('icon-plus-sign').addClass('icon-minus-sign');    toggle = 60;}else {    toggle = 0;   $(this).removeClass('icon-minus-sign').addClass('icon-plus-sign');};$('.desglose .table').animate({height: toggle + "px"}, 300);e.preventDefault(); });
			    </script>
				 
			</div>
			</div></div>

			 <div id="tickets" class="col3">
			 	<p class="txtCompra">
			 		<span id="visOrderSummary_lblGrandTotal">Total</span>
			 	</p>
			 	<p class="compraTotal">
			 		<span id="visOrderSummary_txtGrandTotalDetails" class="totalFinal">$<?php echo $PrecioTotal ?>.00</span>
			 	</p>
			 	<p class="text-center">
			 		<span id="visOrderSummary_txtGrandTotalPointsDetails" class="DetailsText"></span><br>
			 		<span id="visOrderSummary_lblTotalTax" class="DetailsText">Incluye IVA</span>
			 		<a id="visOrderSummary_lnkCancelOrderLF13" tabindex="4"><br><br>
			 			<img id="imgCancelOrderLF13" src="archivosCompraBoletos/changesession.gif" class="ImageCancel" border="0">
			 		</a>
			 	</p>
			 </div>
		</div>

	         



			<div id="orderDetails" style="display:none">
			    <div id="orderHeader" class="DetailsHeaderRow" style="text-align:left; display:none">
			        <span id="visOrderSummary_lblOrderHeader" class="DetailsHeader">Tu Orden:</span>
			    </div><br>
			    <div id="details">
			        <div id="error" class="SectionContainer" style="text-align:left">
			            <span id="visOrderSummary_lblError" class="DetailsText"></span>
			        </div>
			        <div id="showSummary" class="SectionContainer" style="text-align:left">
			            <dl>
			               
			            </dl>
			            <div class="Clear">
			                <span id="visOrderSummary_lblShows" class="DetailsSubHeader">Detalle</span>
			            </div>
			           <div class="Clear"></div>
			            
			            
			        </div> 
			 
			        <div id="totals" class="SectionContainer">
			            <table cellpadding="0" cellspacing="0">
			                <tbody><tr id="rowBkFee" style="display: none;">
			                    <td class="OrderDetailsDescription"><span id="visOrderSummary_lblBookingFee" class="DetailsSubHeader">Seguro de boletos</span></td>
			                    <td class="Price"><span id="visOrderSummary_txtBookingFeeDetails" class="DetailsText Bold">$0.00</span></td>
			                    <td class="Points"></td>
			                    <td class="OrderMisc"></td>
			                </tr>
			                
			            </tbody></table>
			        </div>
			        <div id="cartlinks" style="display:none">
			            <input type="image" name="visOrderSummary:ibtnAddSession" id="visOrderSummary_ibtnAddSession" border="0">
			            <input type="image" name="visOrderSummary:ibtnCancel" id="visOrderSummary_ibtnCancel" border="0">
			        </div>
			    </div>
			<table>
								<tbody> 
							</tbody></table>

		</div>
		    <div style="display:none"><span id="visOrderSummary_lblCartelExtra"></span></div>

			  <center> </center> 
		       <span id="spanCartelExtra"></span>
		          <script>
		              try {

		                  if (document.getElementById('visOrderSummary_lblCartelExtra').innerHTML != '') {
		                      document.getElementById('spanCartelExtra').innerHTML = document.getElementById('visOrderSummary_lblCartelExtra').innerHTML + '';

		                  }
		              } catch (e) {
		              }
		                                            </script>
		    <div class="pasosCompra" style="margin-top: 23.5%;">
	                    <ul class="cf">
	                        <li style="width:20%" class="active"><i>1</i><span>SELECCIONA HORARIO</span></li>
						    <li style="width:20%" class="active"><i>2</i><span>ESCOGE TU LUGAR</span></li>
						    <li style="width:20%" class="active"><i>3</i><span>INICIA SESIÓN</span></li>
	                        <li style="width:20%" class="active"><i>4</i><span>HAZ TU PAGO</span></li>
						    <li style="width:20%"><i>5</i><span>CONFIRMA TU COMPRA</span></li>
					    </ul>
					
	        <table class="BodyTable" id="tblBody" cellspacing="0" cellpadding="0" border="0">
	            <tbody><tr align="center">
	                <td>
	                    <h3>
	                        Selecciona tu forma de pago</h3>
	                    
	                    <table id="tblContenido" cellspacing="0" cellpadding="0" width="580px" border="0">
	                        <tbody><tr>
	                            <td>
	                                <div id="ClockLayer" style="visibility: visible">
	                                    <table id="tblCountDown" cellspacing="0" cellpadding="0" width="580px" border="0">
	                                        <tbody><tr>
	                                            <td class="5PxHeighDONOTCHANGE" colspan="3">
	                                            </td>
	                                        </tr>
	                                        <tr>
	                                            <td width="5">
	                                            </td>
	                                            <td width="5">
	                                            </td>
	                                        </tr>
	                                        <tr>
	                                            <td class="5PxHeighDONOTCHANGE" colspan="3">
	                                            </td>
	                                        </tr>
	                                    </tbody></table>
	                                </div>
	                                <div id="ProcessingLabelLayer" style="display: none">
	                                    <p class="PaymentPagePleaseWait">
	                                        <span id="lblPleaseWait">Por favor espere mientras procesamos su orden.</span>
	                                    </p>
	                                </div>
	                                <div id="InfoLabelLayer1" style="visibility: visible">
	                                    <span id="lblCheckDetails" class="PaymentText"><br><p id="lblTarjeta"><font color="#f7c915">Para recoger los boletos es necesario que el titular presente la tarjeta de crédito con la que se hizo la compra e identificación oficial en taquilla y en compras mayores a $250 pesos se le solicitará firmar el comprobante bancario correspondiente.<br><br>Recuerda que una vez realizado el cargo a tu tarjeta de crédito no habrá cambios ni cancelaciones.</font></p></span><div id="divPayOptions" style="padding:5px 0 5px 0;display:none;">
	                                                    <span id="lblPayOptions" class="PaymentText">Aceptamos los siguientes métodos de pago:</span>
	                                                    <img id="imgPayOptions" src="archivosCompraBoletos/payoptions.gif" alt="Visa, Mastercard, American Express, Paypal, Bankcard" align="absmiddle" border="0" style="height:25px;width:227px;">
	                                                </div><table cellspacing="0" cellpadding="0" width="580px" border="0">
	                                        <tbody><tr>
	                                            <td width="5">
	                                            </td>
	                                            
	                                                
	                                            
	                                            <td width="5">
	                                            </td>
	                                        </tr>
	                                        <tr>
	                                            <td width="5">
	                                            </td>
	                                          
	                                                
	                                            
	                                            <td width="5">
	                                            </td>
	                                        </tr>
	                                        <tr style="height: 0;">
	                                            <td width="5">
	                                            </td>
	                                            
	                                                
	                                            
	                                            <td width="5">
	                                            </td>
	                                        </tr>
	                                        <tr style="height: 0;">
	                                            <td width="5">
	                                            </td>
	                                            <td align="left">
	                                                <div id="divPayPal" style="padding:0 0 5px 0;display:none;">
	                                                    <span id="lblPayPal" class="PaymentText">Comprobar rápidamente a través de su cuenta PayPal (requiere que las cookies estén habilitadas)</span><br>
	                                                    <br>
	                                                    <span id="lblOrSelectPayMethod" class="PaymentText">O</span>
	                                                </div>
	                                                <span id="lblAbovePayDetail" class="PaymentText">Ahora ingresa el detalle del pago, verifica que la información sea correcta y da click en el botón de CONFIRMA TU COMPRA para procesar tu transacción.</span>
	                                            </td>
	                                            <td width="5">
	                                            </td>
	                                        </tr>
	                                    </tbody></table>
	                                    <table cellpadding="0" cellspacing="0" width="580" style="Display:none">
	                                        <tbody><tr style="height: 10px">
	                                            <td align="center">
	                                                <div id="divRadButton" style="display: inline;">
	                                                    <table cellpadding="0" cellspacing="0" width="580">
	                                                        <tbody><tr>
	                                                            <td width="5">
	                                                            </td>
	                                                            <td width="570" align="left">
	                                                                <span id="lblUnpaidWarning" class="UnpaidWarningText">Si seleccionas RESERVAR deberás llegar al cine media hora antes de que comience la función y pagar tus boletos en taquilla, en caso contrario tu orden será cancelada.</span>
	                                                            </td>
	                                                            <td width="5">
	                                                            </td>
	                                                        </tr>
	                                                        <tr>
	                                                            <td align="center" colspan="3">
	                                                                <span class="RadioPayMethod"><div class="radio" id="uniform-radPaidBooking"><span class="checked"><input id="radPaidBooking" type="radio" name="radPayMethod" value="radPaidBooking" checked="checked" tabindex="1"></span></div><label for="radPaidBooking">Comprar</label></span>&nbsp;<span class="RadioPayMethod"><div class="radio" id="uniform-radUnpaidBooking"><span><input id="radUnpaidBooking" type="radio" name="radPayMethod" value="radUnpaidBooking" onclick="javascript:setTimeout(&#39;__doPostBack(\&#39;radUnpaidBooking\&#39;,\&#39;\&#39;)&#39;, 0)" language="javascript" tabindex="1"></span></div><label for="radUnpaidBooking">Reservar</label></span>
	                                                            </td>
	                                                        </tr>
	                                                        <tr style="height: 5px">
	                                                            <td colspan="3">
	                                                            </td>
	                                                        </tr>
	                                                    </tbody></table>
	                                                </div>
	                                            </td>
	                                        </tr>
	                                    </tbody></table>
	                                </div>


	                                 <div id="checkFormaPagoLST" style="">
	                                    <ul class="checkFormaPago cf">
	                                        <li id="pago2" onclick="seleccionar(1);" class="selected">
	                                            <div class="checker" id="uniform-choice_c" style="display: none;">
	                                                <span class="checked selected"><div class="checker" id="uniform-choice_c" style="display: none;"><span class="checked selected"><input name="" value="value3" type="checkbox" id="choice_c" checked="checked"></span></div></span>               
	                                            </div>
	                                            <figure align="center">
	                                                <img src="archivosCompraBoletos/ico-banamex.png">
	                                            </figure>
	                                            <label for="choice_c"> </label>
	                                        </li>
	                                        <li id="pago4" onclick="seleccionar(3);" class="">
	                                            <div class="checker" id="uniform-choice_e">
	                                                <span>
	                                                    <div class="checker" id="uniform-choice_e" style="display: none;"><span><input name="" value="value5" type="checkbox" id="choice_e"></span></div>
	                                                      <figure align="center"><img src="archivosCompraBoletos/icoPaypal.png" width="100px"></figure>
	                                                   
													</span>
												</div>                                            
	                                        </li>


	                                        <li id="pago5" class="debito-paypal" onclick="seleccionar(4);" style="display:none">
	                                            <div class="checker" id="uniform-choice_f" style="display: none;">
	                                                <span>
	                                                    <div class="checker" id="uniform-choice_f" style="display: none;"><span><input name="" value="value5" type="checkbox" id="choice_f"></span></div>
													</span>
												</div>
	                                        </li>
	                                    </ul>
	                                </div>
	                                 <center>
	                                    
	                                        <article class="widget-pago-puntos">
	            <article class="w-pago--login">
	                <h1 class="w-pago-title">OPCIONES DE CONFIRMACIÓN</h1>

	                <!--HERE-->
	                <div class="w-pago-form w-login-id">
	                    <div class="w-login-item">
	                     <div id="divVISACO" style="display:none">
	                                            <span id="lblVCOCartel"></span>
	                                            
	                                          
	                                                
	                                        
	                                      <div style="width:200px;"><img class="v-button" role="button" alt="Visa Checkout" src="archivosCompraBoletos/button.png" tabindex="0" style="cursor: pointer; transition-property: filter; transition-duration: 0.25s;"> <a class="v-learn v-learn-default" data-locale="es_MX" href="https://inetvis.cineticket.com.mx/compra/visPayment.aspx?tk=2#" "="" aria-label="Learn more about Visa Checkout">Conozca Mï¿½s</a></div>
	                                     </div>



	                                     <div id="divPagos">
	                                    
	                                    

		<style>
		    .beneficios__item{display:inline-block;margin:0 2%;max-width:100px;width:100%}
		    </style>
		<p align="center"> </p>
		    <table id="tblDATOS_PAGO" border="0" cellspacing="4">
		        <tbody><tr>
		            <td align="center" valign="top" id="tdExtraCardDetail_Col1" class="FP_FormasDePago" style="">
		                <br>Formas de Pago
		                <table id="tblExtraCardDetails_col1" cellspacing="2" cellpadding="0" border="0" style="border-width:0px;width:258px;">
							<tbody>
								<tr style="height:0px;">
								<td style="width:5px;"></td><td style="width:148px;"></td><td style="width:3px;"></td><td style="width:0px;"></td><td style="width:0px;"></td><td style="width:0px;"></td>
								</tr>
							</tbody>
						</table>
		                <table id="rdbFormasPago" class="cssFormaPago" border="0">
		                    <tbody><tr>
		                        <td valign="top">
		                            <div id="pnlFormaPago">
							<table id="rdbFormaPago" border="0" style="height:150px;">
								<tbody><tr>
									<td><span class="cssFPEWALLET"><div class="radio" id="uniform-rdbFormaPago_0"><span><input id="rdbFormaPago_0" type="radio" name="rdbFormaPago" value="rdbFormaPago_4" onclick="SaveFormaPago(this);"></span></div></span></td>
								</tr><tr>
									<td><span class="cssFPBancomer"><div class="radio" id="uniform-rdbFormaPago_1"><span class="checked"><input id="rdbFormaPago_1" type="radio" name="rdbFormaPago" value="rdbFormaPago_3" onclick="SaveFormaPago(this);"></span></div></span></td>
								</tr><tr>
									<td><span class="cssFPTarjeta"><div class="radio" id="uniform-rdbFormaPago_2"><span class=""><input id="rdbFormaPago_2" type="radio" name="rdbFormaPago" value="rdbFormaPago_1" onclick="SaveFormaPago(this);"></span></div></span></td>
								</tr><tr>
									<td><span class="cssFPPaypal"><div class="radio" id="uniform-rdbFormaPago_3"><span class=""><input id="rdbFormaPago_3" type="radio" name="rdbFormaPago" value="rdbFormaPago_2" onclick="SaveFormaPago(this);"></span></div></span></td>
								</tr><tr>
									<td><span class="cssFPPaypal_DEBITO"><div class="radio" id="uniform-rdbFormaPago_4"><span><input id="rdbFormaPago_4" type="radio" name="rdbFormaPago" value="rdbFormaPago_5" onclick="SaveFormaPago(this);"></span></div></span></td>
								</tr>
							</tbody>
						</table>
					</div>
	                        </td>
	                        <td align="right" valign="top">
	                            <div id="pnlEwallet">
		
	                                <table border="0" width="100%">
	                                    <tbody><tr>
	                                        <td align="left">
	                                            <img src="archivosCompraBoletos/cinecash.png" width="100" id="Img_WAllet" alt="Cinépolis® ID" class="FP_Imagenes">&nbsp;&nbsp;
	                                            <a href="javascript:openWindow(&#39;http://cinepolis.com/HTML/Otros/landing-cinecash/cinecash.html&#39;,600,800)  " class="FP_LINK"> ¿Qué es CineCash®?</a>
	                                        </td>
	                                    </tr>

		                                </tbody>
		                            </table>
		                        </div>

	                    </td></tr>
	                </tbody></table>
	            </td>
	            <td align="center" valign="top" id="tdExtraCardDetail_Col2" style="visibility: visible;">
	                <div id="divPagoLty" style="display:none; width:600px;">
	               


	                    <table class="PaymentDetailsRow">
	                        <tbody><tr style="height:0px;">
	                            <td style="width:5px;">&nbsp;</td>
	                            <td style="width:0px;">&nbsp;</td>
	                            <td style="width:0px;">&nbsp;</td>
	                            <td style="width:0px;">&nbsp;</td>
	                            <td style="width:300px;">&nbsp;</td>
	                            <td style="width:0px;">&nbsp;</td>
	                        </tr>
	                        <tr class="PaymentDetailsRow">
	                            <td colspan="1"></td>
	                            <td class="desc1" align="right" colspan="1"><span id="lblLtyPagoNombre" class="PaymentDetailsSubHeader">Nombre Completo:</span></td>
	                            <td colspan="2"></td>
	                            <td colspan="1">
	                                <span id="lblCardName_txtLtyPagoNombre" class="desc2">Nombre Completo::</span>
	                                <input name="txtLTYPagoNombre" type="text" id="txtLTYPagoNombre">
	                            </td>
	                            <td align="center" colspan="1"><span class="AsAppearsOnCard"></span></td>
	                        </tr>
	                        <tr class="PaymentDetailsRow">
	                            <td colspan="1"></td>
	                            <td class="desc1" align="right" colspan="1"><span id="lblLtyPagoNombre" class="PaymentDetailsSubHeader">Tarjeta Club Cinépolis®:</span></td>
	                            <td colspan="2"></td>
	                            <td colspan="1">
	                                <span id="lblCardName_txtLtyPagoNombre" class="desc2">Tarjeta Club Cinépolis®:</span>
	                                <input name="txtLTYPago" type="text" id="txtLTYPago">
	                            </td>
	                            <td align="center" colspan="1"><span class="AsAppearsOnCard"></span></td>
	                        </tr>

	                    </tbody></table>
	                </div>

	                
	                <div id="divEWALLET" style="display:none">
	                    <div id="spanEWALLET" style="width:600px;" class="BIENVENIDO_TOKENIZACION">  PARA PAGAR CON CINECASH REQUIERES INICIAR SESION CON TU CUENTA CINEPOLIS ID</div>
	                    
	                    <input name="txtEwalletUSR" size="20" autocomplete="off" type="hidden" maxlength="100" id="txtEwalletUSR" tabindex="1" class="PaymentDetailsTextBox">
	                    <input name="hdEwallet" type="hidden" id="hdEwallet">
	                    <input name="hdEwalletSaldo" type="hidden" id="hdEwalletSaldo">
	                    <input name="hdTCC" type="hidden" id="hdTCC">
	                </div>
	            	

	                <div id="divPagoLty2" style="width: 600px; display: none;" class="BIENVENIDO_TOKENIZACION">
	                    <div class="beneficios cf">
	                        <figure class="beneficios__item">
	                            <img src="archivosCompraBoletos/beneficio1.png" alt="Controla">
	                        </figure>
	                        <figure class="beneficios__item">
	                            <img src="archivosCompraBoletos/beneficio2.png" alt="Controla">
	                        </figure>
	                        <figure class="beneficios__item">
	                            <img src="archivosCompraBoletos/beneficio3.png" alt="Controla">
	                        </figure>
	                        <figure class="beneficios__item">
	                            <img src="archivosCompraBoletos/beneficio4.png" alt="Controla">
	                        </figure>
	                    </div>

	                </div>

	                    <div id="divAeromexicoPago" style="display:none">

	                        
	                    </div>

	                    <input type="button" onclick="saveButtonTokenUpdateParam(0)" class="Boton" style="width:auto; display:none" id="btnTokenActualizar2" value="Usar Tarjeta Anterior">


				<table id="tblExtraCardDetails_col2" cellspacing="2" cellpadding="0" border="0" style="border-width:0px;width:350px;">
					<tbody><tr style="height:0px;">
						<td style="width:5px;"></td><td style="width:0px;"></td><td style="width:0px;"></td><td style="width:0px;"></td><td style="width:300px;"></td><td style="width:0px;"></td>
					</tr><tr class="PaymentDetailsRow">
						<td colspan="1"></td><td class="desc1" align="right" colspan="1"><span id="lblCardName" class="PaymentDetailsSubHeader">Nombre del tarjetahabiente:</span></td><td colspan="2"></td><td colspan="1"><span id="lblCardName_desc2" class="desc2">Nombre del tarjetahabiente:</span>
							<input name="txtCardName" type="text" maxlength="30" id="txtCardName" tabindex="1" class="PaymentDetailsTextBox" style="width:200px;">
						</td><td align="center" colspan="1"><span class="AsAppearsOnCard"></span></td>
					</tr><tr class="PaymentDetailsRow">
						<td colspan="1"></td><td class="desc1" align="right" colspan="1"><span id="lblCardNumber" class="PaymentDetailsSubHeader">Número de la tarjeta:</span></td><td colspan="2"></td><td colspan="1"><span id="lblCardNumber_desc2" class="desc2">Número de la tarjeta:</span><input name="txtCardNumber" type="password" maxlength="16" id="txtCardNumber" tabindex="1" class="PaymentDetailsTextBox" autocomplete="off" onkeyup="CheckNumeric(this);" style="width:200px;"></td><td colspan="1"></td>
					</tr><tr id="RowCardCVC" class="PaymentDetailsRow">
						<td colspan="1"></td><td class="desc1" align="right" colspan="1"><span id="lblCardCVCNumber" class="PaymentDetailsSubHeader">Código de seguridad de la tarjeta:</span></td><td colspan="2"></td><td colspan="1"><span id="lblCardCVCNumber_desc2" class="desc2">Código de seguridad de la tarjeta:</span><input name="txtCardCVCNumber" type="password" maxlength="4" id="txtCardCVCNumber" tabindex="1" class="PaymentDetailsTextBox" autocomplete="off" onkeyup="CheckNumeric(this);" style="width:200px;"></td><td colspan="1"></td>
					</tr><tr id="RowCardExpiry" class="PaymentDetailsRow">
						<td colspan="1"></td>
						<td class="desc1" align="right" colspan="1">
							<span id="lblExpiryDate" class="PaymentDetailsSubHeader">Fecha de vencimiento:</span></td>
							<td colspan="2"></td>
							<td colspan="1">
								<span id="lblExpiryDate" class="desc2">Fecha de vencimiento:</span>
								<div class="selectorA" id="uniform-dropCardExpiryMonth" style="width: 45%; float: left; background: url(Imagenes/icon-select-form-gris.png) no-repeat 100% 0; background-color: #e1e3e6;">
									<!--<span style="width: 107.008px; user-select: none;">-</span>-->
									<select name="dropCardExpiryMonth" id="dropCardExpiryMonth" tabindex="1" class="PaymentDetailsDropDownList">
										<option selected="selected" value="">-</option>
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
									</select>
									&nbsp;/&nbsp;&nbsp;
								</div>	
								
								<div class="selectorA" id="uniform-dropCardExpiryYear" style="width: 45%; float: right; background: url(Imagenes/icon-select-form-gris.png) no-repeat 100% 0; background-color: #e1e3e6;">
									<!--<span style="width: 151.008px; user-select: none;">-</span>-->
									<select name="dropCardExpiryYear" id="dropCardExpiryYear" tabindex="1" class="PaymentDetailsDropDownList">
										<option selected="selected" value="">-</option>
										<option value="2018">2018</option>
										<option value="2019">2019</option>
										<option value="2020">2020</option>
										<option value="2021">2021</option>
										<option value="2022">2022</option>
										<option value="2023">2023</option>
										<option value="2024">2024</option>
										<option value="2025">2025</option>
										<option value="2026">2026</option>
										<option value="2027">2027</option>
										<option value="2028">2028</option>
										<option value="2029">2029</option>
										<option value="2030">2030</option>
									</select>
								</div>
							</td>
				<td colspan="1"></td>
					</tr><tr class="PaymentDetailsRow">
						<td colspan="1"></td>
						<td class="desc1" align="right" colspan="1">
							<span id="lblCardType" class="PaymentDetailsSubHeader">Tipo de tarjeta:</span>
						</td>
						<td colspan="2"></td>
						<td colspan="1">
							<span id="lblCardType_desc2" class="desc2">Tipo de tarjeta:</span>
							<div class="selectorA" id="uniform-dropCardType" style="width: 239px; background: url(Imagenes/icon-select-form-gris.png) no-repeat 100% 0; background-color: #e1e3e6;">
								<!--<span style="width: 237.008px; user-select: none;">Selecciona uno</span>-->
								<select name="dropCardType" id="dropCardType" tabindex="1" class="PaymentDetailsDropDownList" style="width:200px;">
									<option value="">Selecciona uno</option>
									<option value="Visa">Visa</option>
									<option value="Mastercard">Mastercard</option>
									<option value="Amex">Amex</option>
								</select>
					</div>
				</td>
				<td colspan="1"></td>
					</tr>
				</tbody></table>
			</td>
	 
		<input name="txtFormaPago" type="hidden" id="txtFormaPago" value="rdbFormaPago_3">
		<script>


	    function saveButtonTokenUpdateParam(Valor) {


	        document.getElementById("pnlTokenizacionPago").style.display = "none"
	        document.getElementById("btnTokenActualizar_param").value = Valor;
	        document.getElementById("tblExtraCardDetails_col2").style.display = ""

	       

	    }

	    function fnTokenMostrar() {
	    	//AQUI
	    	document.getElementById("txtCardName").value = "";
	    	document.getElementById("txtCardNumber").value = "";
	    	document.getElementById("txtCardCVCNumber").value = "";
	    	document.getElementById("dropCardExpiryMonth").value = "";
	    	document.getElementById("dropCardExpiryYear").value = "";
	    	document.getElementById("dropCardType").value = "";
	    	document.getElementById("txtEmail").value = "";
	    	document.getElementById("cboSMS").value = "";
	    	document.getElementById("txtCustPhone").value = "";
	    	document.getElementById("txtLoyaltyCardNumber").value = "";
	    	document.getElementById("chkTerms").value = "";
	    	

	        try {
	            if (document.getElementById("btnTokenActualizar_param").value == "1")
	                document.getElementById("pnlTokenizacionPago").style.display = "none"
	        } catch (e) {

	        }


	    }

	    function fnActualizarBotonTokenizacion() {
	        try {
	            if (document.getElementById("pnlTokenizacionPago") != null) {
	                if (document.getElementById("btnTokenActualizar_param").value == "2") {
	                    document.getElementById("tblExtraCardDetails_col2").style.display = "";
	                    parent.document.getElementById('btnTokenActualizar').style.display = 'none';
	                    document.getElementById("pnlTokenizacionPago").style.display = "";
	                } else if (document.getElementById("btnTokenActualizar_param").value == "1") {
	                    document.getElementById("tblExtraCardDetails_col2").style.display = "";
	                } else {
	                    document.getElementById("tblExtraCardDetails_col2").style.display = "none";
	                }
	            }
	            fnTokenMostrar();
	        } catch (e) {

	        }
	    }

	    function saveButtonTokenUpdateParam_Ver2(Valor) {
	        document.getElementById("pnlTokenizacionPago").style.display = "none"
	        document.getElementById("btnTokenActualizar_param_ver2").value = Valor;
	        document.getElementById("tblExtraCardDetails_col2").style.display = ""
	    }
	    function fnActualizarBotonTokenizacion_Ver2() {
	        try {
	            if (document.getElementById("pnlTokenizacionPago") != null) {
	                if (document.getElementById("btnTokenActualizar_param_ver2").value == "2") {
	                    document.getElementById("tblExtraCardDetails_col2").style.display = "";
	                    parent.document.getElementById('btnTokenActualizar').style.display = 'none';
	                    document.getElementById("pnlTokenizacionPago").style.display = "";

	                } else if (document.getElementById("btnTokenActualizar_param_ver2").value == "1") {
	                    document.getElementById("tblExtraCardDetails_col2").style.display = "";
	                    document.getElementById("pnlTokenizacionPago").style.display = "none"
	                } else {
	                    document.getElementById("tblExtraCardDetails_col2").style.display = "none";
	                }
	            }
	            //fnTokenMostrar();
	        } catch (e) {
	        }
	    }

	    function SaveFormaPago(obj, Ini) {
	        try {
	            var checkbox = document.getElementById('txtFormaPago');

	            checkbox.value = obj.value;
	            fnTokenMostrar();
	            var ColFormaPago = document.getElementById('tdExtraCardDetail_Col2');
	            document.getElementById('divAeromexicoPago').style.display = "none";

	            if (document.getElementById('divPagoLty')) {
	                document.getElementById('divPagoLty').style.display = "NONE";
	                document.getElementById('divPagoLty2').style.display = "NONE";

	            }

	            if (document.getElementById('trLoyaltyCardNumber')) {
	                document.getElementById('trLoyaltyCardNumber').style.display = "";
	            }
	         
	            switch (obj.value) {
	                case 'rdbFormaPago_6': //Aeromexico_Pago

	                    ColFormaPago.style.visibility = "visible";
	                    document.getElementById('tblExtraCardDetails_col2').style.display = "none";
	                    document.getElementById('divEWALLET').style.display = "none";
	                    document.getElementById('tdExtraCardDetail_Col2').style.display = "";
	                    document.getElementById('divAeromexicoPago').style.display = "";
	                    document.getElementById('trAeromexicoKM').style.display = "none";
	                    document.getElementById('pnlTokenizacionPago').style.display = "none";


	                    break;
	                case 'rdbFormaPago_3':
	                    ColFormaPago.style.visibility = "visible";
	                    try {
	                        document.getElementById('tblExtraCardDetails_col2').style.display = "";
	                        document.getElementById('divEWALLET').style.display = "none";
	                        document.getElementById('tdExtraCardDetail_Col2').style.display = "";
	                        document.getElementById('trAeromexicoKM').style.display = "";
	                        document.getElementById('pnlTokenizacionPago').style.display = "";
	                    } catch (e) { }
	                    fnActualizarBotonTokenizacion_Ver2();
	                    break;
	                case 'rdbFormaPago_1':
	                    ColFormaPago.style.visibility = "visible";
	                    try {
	                        document.getElementById('tblExtraCardDetails_col2').style.display = "";
	                        document.getElementById('divEWALLET').style.display = "none";
	                        document.getElementById('tdExtraCardDetail_Col2').style.display = "";
	                        document.getElementById('trAeromexicoKM').style.display = "";
	                        document.getElementById('pnlTokenizacionPago').style.display = "";
	                    } catch (e) { }
	                    fnActualizarBotonTokenizacion_Ver2();
	                    break;



	                case 'rdbFormaPago_4':

	                    ColFormaPago.style.visibility = "visible";
	                    document.getElementById('tblExtraCardDetails_col2').style.display = "none";
	                    document.getElementById('divEWALLET').style.display = "";
	                    document.getElementById('tdExtraCardDetail_Col2').style.display = "";
	                    document.getElementById('trAeromexicoKM').style.display = "";
	                    document.getElementById('pnlTokenizacionPago').style.display = "none";
	                    break;

	                case 'rdbFormaPago_7':
	                    if (document.getElementById('divPagoLty')) {
	                        document.getElementById('divPagoLty').style.display = "";
	                    }
	                    
	                    if (  document.getElementById('divEWALLET')) document.getElementById('divEWALLET').style.display = "none";
	                    if (document.getElementById('trLoyaltyCardNumber')) document.getElementById('trLoyaltyCardNumber').style.display = "none";
	                   
	                
	                    if   (document.getElementById('tblExtraCardDetails_col2')) document.getElementById('tblExtraCardDetails_col2').style.display = "none";
	                    if ( document.getElementById('tdExtraCardDetail_Col2')) document.getElementById('tdExtraCardDetail_Col2').style.display = "";
	                    if (document.getElementById('trAeromexicoKM')) document.getElementById('trAeromexicoKM').style.display = "";
	                    if(document.getElementById('pnlTokenizacionPago')) document.getElementById('pnlTokenizacionPago').style.display = "none";
	                 
	                    ColFormaPago.style.visibility = "visible";
	                  
	                    break;
	                case 'rdbFormaPago_2':

	                    document.getElementById('tdExtraCardDetail_Col2').style.display = "none";
	                
	                    document.getElementById('pnlTokenizacionPago').style.display = "none";
	                    document.getElementById('trAeromexicoKM').style.display = "";

	                    break;
	              

	                default:

	                    document.getElementById('tdExtraCardDetail_Col2').style.display = "";
	                    ColFormaPago.style.visibility = "collapse";
	                
	                    document.getElementById('pnlTokenizacionPago').style.display = "none";
	                    document.getElementById('trAeromexicoKM').style.display = "";
	                    break;


	            }

	        } catch (e) {

	        }
	    }


			</script>
			</tr></tbody></table><table id="tblExtraCardDetails" cellspacing="3" cellpadding="3" align="center" border="0" style="width:680px;">
				<tbody><tr style="height:0px;">
					<td style="width:165px;">&nbsp;</td><td style="width:180px;">&nbsp;</td><td style="width:3px;">&nbsp;</td><td style="width:2px;">&nbsp;</td><td style="width:300px;">&nbsp;</td><td style="width:200px;">&nbsp;</td>
				</tr><tr class="PaymentDetailsRow">
					<td colspan="1"></td><td class="desc1" align="right" colspan="1"><span id="lblEmail" class="PaymentDetailsSubHeader">Correo electrónico:</span></td><td colspan="2"></td><td colspan="1"><span id="lblEmail_desc2" class="desc2">Correo electrónico:</span>
						<input name="txtEmail" type="text" maxlength="60" id="txtEmail" tabindex="1" class="PaymentDetailsTextBox" style="width:200px;" required><script> try  {	 document.getElementById('tdExtraCardDetail_Col2').style.display=''; document.getElementById('tdExtraCardDetail_Col1').style.display='';} catch (e) {}</script></td><td colspan="1"></td>
				</tr><tr class="PaymentDetailsRow">
					<td colspan="1"></td>

					<td class="desc1" align="right" colspan="1">
						<span id="lblSMSTipo" class="PaymentDetailsSubHeader">Confirmar vía SMS:</span>
					</td>
					<td colspan="2"></td>
					<td colspan="1"><span id="lblSMSTipo_desc2" class="desc2">Confirmar vía SMS:</span>
						<div class="selectorA" id="uniform-cboSMS" style="width: 239px; background: url(Imagenes/icon-select-form-gris.png) no-repeat 100% 0; background-color: #e1e3e6;">
							<!--<span style="width: 237.008px; user-select: none;">Costo $1.5 (Opcional)</span>-->
							<select name="cboSMS" id="cboSMS" tabindex="1" class="PaymentDetailsDropDownList" style="width:200px;">
								<option value="">Costo $1.5 (Opcional)</option>
								<option value="Telcel">Telcel</option>
								<option value="Movistar">Movistar</option>
								<option value="Iusacell">Iusacell</option>
							</select>
						</div>
					</td>
			<td colspan="1"></td>
				</tr><tr class="PaymentDetailsRow">
					<td colspan="1"></td><td class="desc1" align="right" colspan="1"><span id="lblCustPhone" class="PaymentDetailsSubHeader">Teléfono:</span></td><td colspan="2"></td><td colspan="1"><span id="lblCustPhone_desc2" class="desc2">Teléfono:</span><input name="txtCustPhone" type="text" maxlength="10" id="txtCustPhone" tabindex="1" class="PaymentDetailsTextBox" style="width:200px;" onkeyup="CheckNumeric(this);"></td><td colspan="1"></td>
				</tr><tr id="trLoyaltyCardNumber" class="PaymentDetailsRow">
					<td colspan="1"></td>
					<td class="desc1" align="right" colspan="1">
						<span id="lblLoyaltyCardNumber" class="PaymentDetailsSubHeader">Número de Tarjeta Club Cinépolis:</span>
					</td>
					<td colspan="2"></td>
					<td colspan="1">
						<span id="lblLoyaltyCardNumber_desc2" class="desc2">Número de Tarjeta Club Cinépolis:</span><input name="txtLoyaltyCardNumber" type="text" maxlength="16" id="txtLoyaltyCardNumber" tabindex="1" class="PaymentDetailsTextBox" autocomplete="off" onkeyup="CheckNumeric(this);" style="width:200px;">
					</td>
					<td colspan="1"></td>
				</tr>
				<tr>
					<td colspan="3"></td>
					<td colspan="2">
						<div class="checker" id="uniform-chkTerms">
							<span class="checked">
								<input id="chkTerms" type="checkbox" name="chkTerms" tabindex="1">
							</span>
						</div>
						<span id="lblTerms" class="TermsAndConditions">He leído y estoy de acuerdo con los</span>
					</td>
					<td colspan="1"></td>
				</tr>
				<tr>
					<td colspan="3"></td><td colspan="3"><a id="lnkTerms" tabindex="1" class="StandardLink" href="#">Términos y Condiciones</a><span id="lblY" class="TermsAndConditions"> y </span><a id="mjoPolitica" tabindex="1" class="StandardLink" href="#">Aviso de Privacidad</a></td><td colspan="1"></td>
				</tr><tr class="5PxHeighDONOTCHANGE">
					<td colspan="6"></td>
				</tr><tr>
					<td colspan="4"></td><td align="right" colspan="1"><input type="image" name="ibtnPayNow" id="ibtnPayNow" tabindex="2" src="archivosCompraBoletos/paynow.gif" border="0"   style="display: none;"></td><td colspan="1"></td>
				</tr>
			</tbody></table>
			                                    

			<script type="text/javascript">
			     function SaveDonativo() {
			        try {
			            document.getElementById('visOrderSummary_lblDonativo').innerHTML='$' + MoneyFormat(document.getElementById('cboDonativo').value * document.getElementById('txtDonativoCosto').value /100 );
			            document.getElementById('visOrderSummary_txtGrandTotalDetails').innerHTML= parseFloat(document.getElementById('visOrderSummary_txtGrandTotalDetails').innerHTML.replace('$','').replace(',','')) - parseFloat(document.getElementById('txtDonativoQTY').value * document.getElementById('txtDonativoCosto').value /100) + parseFloat(document.getElementById('cboDonativo').value * document.getElementById('txtDonativoCosto').value /100) ;
			            document.getElementById('visOrderSummary_txtGrandTotalDetails').innerHTML= '$' + MoneyFormat( document.getElementById('visOrderSummary_txtGrandTotalDetails').innerHTML )
			            document.getElementById('txtDonativoQTY').value =document.getElementById('cboDonativo').value ;
			            if (document.getElementById('cboDonativo').value>'0'){
			                document.getElementById('visOrderSummary_trDonativo').style.display='block';
			            } else {
			                document.getElementById('visOrderSummary_trDonativo').style.display='none';
			            }
			        } catch (e) {}
			    }		
			    		
			    function MoneyFormat(amount) { 
			        var val = parseFloat(amount); 
			        if (isNaN(val)) { return "0.00"; } 
			        if (val <= 0) { return "0.00"; } 
			        val += ""; 
			        // Next two lines remove anything beyond 2 decimal places 
			        if (val.indexOf('.') == -1) { return val+".00"; } 
			        else { val = val.substring(0,val.indexOf('.')+3); } 
			        val = (val == Math.floor(val)) ? val + '.00' : ((val*10 == 
			        Math.floor(val*10)) ? val + '0' : val); 
			         
			        return val; 
			    }	 		
			</script>
	                                    <table align="center" id="Table1" border="1" cellpadding="30" cellspacing="30">
	                                        <tbody><tr>
	                                            <td style=" text-align:center"></td>
	                                            <td style=" text-align:right">
	                                                <a href="#" id="lnkChangeTickets" style="display:none;" tabindex="3" onclick="DisableButtons(&#39;this&#39;,&#39;lnkChangeTickets&#39;);">
	                                                    <img src="archivosCompraBoletos/ChangeTickets.gif" id="imgChangeTickets" class="ImageChangeTickets" border="0">
	                                                </a>
	                                                	<a href="#" id="lnkChangeSeats" tabindex="3" onclick="DisableButtons(&#39;this&#39;,&#39;lnkChangeSeats&#39;);">
	                                                    <img src="archivosCompraBoletos/ChangeSeats.gif" id="imgChangeSeats" class="ImageChangeSeats" border="0">
	                                                </a>
	                                            </td>
	                                            <td>&nbsp;&nbsp;</td>
	                                            <td style=" text-align:left">
	    	                                        <script>document.getElementById('ibtnPayNow').style.display='none'  </script>
	                                                <input type="image" name="ibtnPayNow2" id="ibtnPayNow2" tabindex="2" class="ImagePayNow" src="archivosCompraBoletos/paynow.gif" border="0">
	                                            </td>
	                                        </tr>
	                                    </tbody></table>
	                                </div></div></div>
	                            </article>
	                        </article>
	                    </center>
	                                <table cellspacing="0" cellpadding="0" border="0">
	                                    <tbody><tr style="height: 5px">
	                                        <td colspan="6">
	                                        </td>
	                                    </tr>
	                                    <tr>
	                                        <td colspan="1">
	                                        </td>
	                                        <!--<td class="5PxHeighDONOTCHANGE" align="right" colspan="4">
	                                            <div id="ProcAnimation" style="display: none">
	                                                <img id="imgProcessing" class="ImageProcessing" src="archivosCompraBoletos/Processing.gif" border="0"><div class="loader" style="display: block;"><div class="spinner"><div class="rect1"></div><div class="rect2"></div><div class="rect3"></div><div class="rect4"></div><div class="rect5"></div></div><p>Procesando...</p></div></div>
	                                        </td>-->
	                                        <td colspan="1">
	                                        </td>
	                                    </tr>
	                                    <!-- TEMPLATE ROW DO YOUR FORMATTING CHANGES HERE- also used for aesthetics -->
	                                    <tr>
	                                        <td width="5">
	                                        </td>
	                                        <td width="160">
	                                        </td>
	                                        <td width="170">
	                                        </td>
	                                        <td width="110">
	                                        </td>
	                                        <td width="130">
	                                        </td>
	                                        <td width="5">
	                                        </td>
	                                    </tr>
	                                    <!-- TEMPLATE ROW ENDS -->
	                                    <tr>
	                                        <td colspan="1">
	                                        </td>
	                                        <td colspan="4">
	                                            <table id="InfoLabelLayer2" cellpadding="0" cellspacing="0" width="570">
	                                                <tbody><tr>
	                                                    <td>
	                                                        <span id="lblPaymentWarning" class="PaymentWarning"><br></span>
	                                                    </td>
	                                                </tr>
	                                            </tbody></table>
	                                        </td>
	                                        <td colspan="1">
	                                        </td>
	                                    </tr>
	                                    <tr style="height: 5px">
	                                        <td colspan="6">
	                                        </td>
	                                    </tr>
	                                    <tr>
	                                        <td colspan="1">
	                                        </td>
	                                        <td colspan="4">
	                                            <table id="InfoLabelLayer3" cellpadding="0" cellspacing="0" width="570">
	                                                <tbody><tr>
	                                                    <td>
	                                                        <span id="lblBelowPayDetail" class="PaymentText"></span>
	                                                        <br>
	                                                        <span id="lblBackOptions" class="PaymentText">Si requieres modificar tu compra antes de confirmar su orden puedes usar los siguientes botones.</span>
	                                                    </td>
	                                                </tr>
	                                            </tbody></table>
	                                        </td>
	                                        <td colspan="1">
	                                        </td>
	                                    </tr>

	 


	                                    <tr>
	                                        <td height="5" colspan="6">
	                                        </td>
	                                    </tr>
	                                    <tr id="rowSingleSessionNavButtons">
				<td colspan="1">
			                                        </td>
				<td colspan="2">
			                                            <table cellpadding="0" cellspacing="0" width="330" border="0">
			                                                <tbody><tr>
			                                                    <td width="325">
			                                                       
			                                                        
			                                                        <input type="image" name="ibtnCancel" id="ibtnCancel" tabindex="4" class="ImageCancel" src="archivosCompraBoletos/cancel.gif" border="0" onclick="DisableButtons(this,&#39;btnCancelClick&#39;);" language="javascript" style="display:none">
			                                                    </td>
			                                                </tr>
			                                            </tbody></table>
			                                        </td>
				<td colspan="3">
			                                            <a href="https://inetvis.cineticket.com.mx/compra/visSelect.aspx" id="lnkCancelOrder" tabindex="4" style="display: none" onclick="DisableButtons(&#39;this&#39;,&#39;lnkCancelOrder&#39;);">
			                                                <img src="archivosCompraBoletos/cancel.gif" id="imgCancelOrder" class="ImageCancel" border="0"></a>
			                                        </td>
			</tr>



	                                    <tr>

	                                        <td colspan="1">
	                                        </td>
	                                        <td colspan="4">
	                                            <table cellspacing="0" cellpadding="0" border="0" width="570">
	                                                <tbody><tr>
	                                                    <td valign="top">
	                                                        <table width="135" border="0" cellpadding="2" cellspacing="0" title="Click to Verify - This site chose VeriSign SSL for secure e-commerce and confidential communications.">
			<tbody><tr>
			<td width="135" align="center" valign="top">
				<script type="text/javascript" src="archivosCompraBoletos/getseal"></script>
				
					<area alt="Click to Verify - This site has chosen an SSL Certificate to improve Web site security" title="" href="altatarjeta.php" shape="rect" coords="0,50,53,72" tabindex="-1" style="outline:none;">
					<area alt="" title="" href="javascript:symcBuySSL()" shape="rect" coords="53,50,100,72" style="outline:none;"></map>
					<img name="seal" src="archivosCompraBoletos/getseal(1)" oncontextmenu="return false;" border="0" usemap="#sealmap_small" alt=""> 
					<map name="sealmap_small" id="sealmap_small">
						<area alt="Click to Verify - This site has chosen an SSL Certificate to improve Web site security" title="" href="altatarjeta.php" shape="rect" coords="0,0,100,50" tabindex="-1" style="outline:none;">
						<area alt="Click to Verify - This site has chosen an SSL Certificate to improve Web site security" title="" href="altatarjeta.php" shape="rect" coords="0,50,53,72" tabindex="-1" style="outline:none;"><area alt="" title="" href="javascript:symcBuySSL()" shape="rect" coords="53,50,100,72" style="outline:none;"></map><br>
			<a href="vistas/frm_altatarjeta.php" target="_blank" style="color:#000000; text-decoration:none; font:bold 7px verdana,sans-serif; letter-spacing:.5px; text-align:center; margin:0px; padding:0px;">Certificados SSL</a><br>
			</td>
			</tr>
			</tbody></table>
	                                                    </td>
	                                                    <td width="5">
	                                                    </td>
	                                                    <td valign="top">
	                                                        <span id="lblVerify" class="PaymentText">Este sitio emplea seguridad SSL de Verisign, la cuál provee una transmisión segura de su información privada y detalles de la tarjeta de crédito sobre el Internet.</span>
	                                                    </td>
	                                                </tr>
	                                            </tbody></table>
	                                        </td>
	                                        <td colspan="1">
	                                        </td>
	                                    </tr>
	                                    <tr>
	                                        <td colspan="6">
	                                            &nbsp;
	                                        </td>
	                                    </tr>
	                                </tbody></table>
	                            </td>
	                        </tr>
	                    </tbody></table>
	                    <input name="txtPayClick" type="hidden" id="txtPayClick">
	                    <input name="txtPaymentAttempts" type="hidden" id="txtPaymentAttempts">
	                    <input name="txtMovieName" type="hidden" id="txtMovieName" value="Bohemian Rhapsody, La Historia de Fre Esp">
	                    <input name="txtMovieRating" type="hidden" id="txtMovieRating">
	                    <input name="txtCinemaName" type="hidden" id="txtCinemaName" value="Cinépolis Plaza Azahares">
	                    <input name="txtSessionDate" type="hidden" id="txtSessionDate">
	                    <input name="txtSessionTime" type="hidden" id="txtSessionTime">
	                    <input name="txtTicketInfo" type="hidden" id="txtTicketInfo">
	                    <input name="txtOrderTotal" type="hidden" id="txtOrderTotal"><input name="txtCinemaOpName" type="hidden" id="txtCinemaOpName">
	                    <input name="txtConcessionInfo" type="hidden" id="txtConcessionInfo"><input name="txtPointsCost" type="hidden" id="txtPointsCost">
	                    <input name="txtTechnicalDetails" type="hidden" id="txtTechnicalDetails">
	                    <input name="txtPrintAtHome" type="hidden" id="txtPrintAtHome" value="Y"><input name="txtCinEmailDisplayName" type="hidden" id="txtCinEmailDisplayName" value="Cineticket Web">
	                    <input name="txtCinEmailFromAddress" type="hidden" id="txtCinEmailFromAddress" value="cineticket@cineticket.com.mx"><input name="txtDateOrderChanged" type="hidden" id="txtDateOrderChanged" value="08/11/2018 09:24:37 a. m.">
	                    <input name="txtCancelClick" type="hidden" id="txtCancelClick"><input name="txtSelectedCardType" type="hidden" id="txtSelectedCardType">
	                    <input name="txtSelectedMobileMake" type="hidden" id="txtSelectedMobileMake"><input name="txtLoyaltyMemberChecked" type="hidden" id="txtLoyaltyMemberChecked" value="true">
	                    <input name="txtCinEmailCopyAddress" type="hidden" id="txtCinEmailCopyAddress">
	                    <input name="txtOrderModified" type="hidden" id="txtOrderModified">
	                    <input name="PaReq" type="hidden" id="PaReq"><input name="MD" type="hidden" id="MD"><input name="TermUrl" type="hidden" id="TermUrl">
	                    <input name="txtFromBackButton" type="hidden" id="txtFromBackButton">
	                    <input name="txtSelectedWalletCard" type="hidden" id="txtSelectedWalletCard">
	                    
	                    <div style="display: none">
	                        <input type="submit" name="btnPayNowClick" value="Button" id="btnPayNowClick" style="height:0px;width:0px;"><input type="submit" name="btnPayPalClick" value="Button" id="btnPayPalClick" style="height:0px;width:0px;"><input type="submit" name="btnBackSeatsClick" value="Button" id="btnBackSeatsClick" style="height:0px;width:0px;"><input type="submit" name="btnCancelClick" value="Button" id="btnCancelClick" style="height:0px;width:0px;"><input type="submit" name="btnBackTicketsClick" value="Button" id="btnBackTicketsClick" style="height:0px;width:0px;"></div>
		                </td>
		            </tr>
		        </tbody></table>
		    </div>
		         
		     </div>



		          </article>
		      </section></div>

		            
		                     
		                
		                 
		       
		   


		    <div id="pnlCS" style="display: none">
			
		    <p style="background:url(https://h.online-metrix.net/fp/clear.png?org_id=k8vif92e&amp;session_id=Cinepolis954_20000063616_20181108092430220625&amp;m=1)"></p>
		<!--<img src="./archivosCompraBoletos/clear(7).png" alt="">-->
		<!--<script src="./archivosCompraBoletos/check.js.descarga" type="text/javascript"></script>-->
		<object type="application/x-shockwave-flash" data="archivosCompraBoletos/fp.swf.descarga" width="1" height="1" id="thm_fp">
		<param name="movie" value="https://h.online-metrix.net/fp/fp.swf?org_id=k8vif92e&amp;session_id=Cinepolis954_20000063616_20181108092430220625">
		</object>
		</div>
		         <input name="CS_fpValue" type="hidden" id="CS_fpValue" value="954_20000063616_20181108092430220625">
		    <div id="capaHelp">
			<div id="Div1" style=" margin-left:1px; margin-top:5px; font-size:9px">
			</div>
		</div>

		<!-- Mesaje loading Paypal -->
		<div id="DivMSGPayPal" style="display:none;">
			 <div class="g960">
				<p>
					<i class="icon-ok-circle2"></i>
					Procesando tu pedido, Cinépolis<sup>®</sup> redireccionará al sitio de PayPal para que hagas tu pago en linea. 
				</p>
				 <figure>
					<img src="archivosCompraBoletos/PayPalWait.png">
				</figure>
			</div>
		</div>

					
					        &nbsp;

		<script language="JavaScript">
			<!--
			function openWindow(page,winHeight,winWidth){
				window.open (page, 'newwindow', config='height=' + winHeight +', width=' + winWidth + ', toolbar=no, menubar=no, scrollbars=yes, resizable=no,location=no, directories=no, status=no')
			}
		</script>


		<center>
			<!-- Scripts -->
			<script src="archivosCompraBoletos/jquery.spinner.js.descarga"></script>
		  	<script src="archivosCompraBoletos/jquery.kinetic.min.js.descarga"></script>
		  	<script src="archivosCompraBoletos/jquery.carouFredSel-min.js.descarga"></script>
			<script src="archivosCompraBoletos/action-reservar.js.descarga"></script>
		</center>

		<script language="javascript">var objDiv;try {objDiv = document.getElementById('divRadButton');objDiv.style.display = 'inline';} catch(e) {}</script><script language="javascript">document.getElementById('cartlinks').style.display = 'none';</script><script language="javascript">document.getElementById('rowBkFee').style.display = 'none';</script>
	</form><!--FIN_FORMULARIO-->


<script type="text/javascript" id="">setTimeout(function(){var a=document.createElement("script"),b=document.getElementsByTagName("script")[0];a.src=document.location.protocol+"//script.crazyegg.com/pages/scripts/0012/6530.js?"+Math.floor((new Date).getTime()/36E5);a.async=!0;a.type="text/javascript";b.parentNode.insertBefore(a,b)},1);</script>
<script type="text/javascript" id="">var _comscore=_comscore||[];_comscore.push({c1:"2",c2:"9732062"});(function(){var a=document.createElement("script"),b=document.getElementsByTagName("script")[0];a.async=!0;a.src=("https:"==document.location.protocol?"https://sb":"http://b")+".scorecardresearch.com/beacon.js";b.parentNode.insertBefore(a,b)})();</script>
<noscript>
  <img src="https://sb.scorecardresearch.com/p?c1=2&amp;c2=9732062&amp;cv=2.0&amp;cj=1">
</noscript>



      
           <script type="text/javascript" language="javascript">                  
                $(document).ready(function () {
                              var movieData;
                                   if($.cookie("movieData")!== undefined)
                                               movieData = JSON.parse($.cookie("movieData"));
                                               dataLayer.push({'distribuidora': movieData.brand});
                                               });
                </script>

    <script type="text/javascript">
    /* inicial */
    
        if (document.getElementById('radPaidBooking').checked) {
            var opcion = document.getElementById('txtFormaPago').value;
            if (opcion == '') {
                if (document.getElementById('pago7').style.display == '')
                    opcion = 5;
                else
                    opcion = 2;
            }

            seleccionar(opcion);
            if (opcion == '5')
                document.getElementById('pago7').className = 'selected';
            else

                document.getElementById('pago' + String(Number(opcion) + 1)).className = 'selected';
    }else{
        document.getElementById('tdExtraCardDetail_Col2').style.display='none';
        document.getElementById('uniform-choice_a').click();
        document.getElementById('choice_a').checked='checked';
        document.getElementById('pago0').className='selected';
    }
    
    function seleccionar(num){
        if (num == '6') {

            document.getElementById('divPagos').style.display = 'none';
            document.getElementById('divVISACO').style.display = '';
        }

        else {
            document.getElementById('divPagos').style.display = '';
            document.getElementById('divVISACO').style.display = 'none';

            var id = 'rdbFormaPago_' + String(num);
            document.getElementById('txtFormaPago').value = String(num);
            document.getElementById('radPaidBooking').click();
            document.getElementById(id).click();

        }
    }
    
    function reservar(){
        document.getElementById('radUnpaidBooking').click();
    }
    </script>

    <script type="text/javascript" language="javascript">
		<!--
	
		function HideClockLayer(id) {
			var objDiv;

			
			try {
				
				objDiv = document.getElementById(id);

				
				if (objDiv.style.visibility == "hidden") {
					objDiv.style.visibility = "visible";
				} else {
					objDiv.style.visibility = "hidden";
				}			
			} catch(e) {
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
			} catch(e) {
			}
		}
		
		function showAnim() {
		    document.frmPayment.imgProcessing.src="Processing.gif#";
		}

	
		function ShowProcessing(id) {
			var objDiv;

			
			try {
				
				objDiv = document.getElementById(id);

				objDiv.style.display = "inline";					
				document.frmPayment.imgProcessing.src="Processing.gif#";
				
			} catch(e) {
			}
		}
		
	
		function PClick(PayButton, id) {
			
			stopClock = true;
			
			document.frmPayment.txtPayClick.value = 'Yes';			
			
			if (id == 'ibtnPayPal') {
			    DisableButtons(PayButton, 'btnPayPalClick');
			} else {
			    DisableButtons(PayButton, 'btnPayNowClick');
			}

			
			HideClockLayer('ClockLayer');
			
			HideShowLayer('ProcAnimation');

        try {
				
				if (document.getElementById('txtFormaPago').value == 'rdbFormaPago_2')
				{
				  
				document.getElementById('tblDetails').style.display='none';
				document.getElementById('tblBody').style.display='none';
				document.getElementById('DivMSGPayPal').style.display='';
			    document.getElementById('tdExtraCardDetail_Col2').style.visibility="hidden";
				window.scrollTo(0,0);
				 document.getElementById('tdExtraCardDetail_Col2').style.visibility="hidden";
				}  
				 
				 
				} catch(e) {
				}


            return false;
		}


		function DisableButtons(Button, id) {

			
			if (id == 'btnPayNowClick') {
				try {
				    document.getElementById('ibtnPayPal').disabled = 'true';
					document.getElementById('ibtnPayPal').className = 'CursorArrow';
					document.getElementById('ibtnCancel').disabled = 'true';
					document.getElementById('ibtnCancel').className = 'CursorArrow';
					disableAnchor('', '');
					disableAnchor('lnkTerms', '');
				} catch(e) {
				}
			}
			
			if (id == 'btnPayPalClick') {
				try {
				    document.getElementById('ibtnPayNow').disabled = 'true';
					document.getElementById('ibtnPayNow').className = 'CursorArrow';
					document.getElementById('ibtnCancel').disabled = 'true';
					document.getElementById('ibtnCancel').className = 'CursorArrow';
					disableAnchor('', '');
					disableAnchor('lnkTerms', '');
				} catch(e) {
				}
			}
			
			if (id == 'btnCancelClick') {
				try {
				    document.getElementById('ibtnPayPal').disabled = 'true';
					document.getElementById('ibtnPayPal').className = 'CursorArrow';
					document.getElementById('ibtnPayNow').disabled = 'true';
					document.getElementById('ibtnPayNow').className = 'CursorArrow';
					document.frmPayment.txtCancelClick.value = 'Yes';
					disableAnchor('', '');
					disableAnchor('lnkTerms', '');
				} catch(e) {
				}						
			}
			
			if (id == 'lnkChangeSeats') {
				try {
				    document.getElementById('ibtnPayPal').disabled = 'true';
					document.getElementById('ibtnPayPal').className = 'CursorArrow';
					document.getElementById('ibtnPayNow').disabled = 'true';
					document.getElementById('ibtnPayNow').className = 'CursorArrow';
					document.getElementById('ibtnCancel').disabled = 'true';
					document.getElementById('ibtnCancel').className = 'CursorArrow';
					disableAnchor('', 'lnkChangeSeats');
					disableAnchor('lnkTerms', '');
				} catch(e) {
				}						
			}
			
			if (id == 'lnkChangeTickets') {
				try {
				    document.getElementById('ibtnPayPal').disabled = 'true';
					document.getElementById('ibtnPayPal').className = 'CursorArrow';
					document.getElementById('ibtnPayNow').disabled = 'true';
					document.getElementById('ibtnPayNow').className = 'CursorArrow';
					document.getElementById('ibtnCancel').disabled = 'true';
					document.getElementById('ibtnCancel').className = 'CursorArrow';
					disableAnchor('', 'lnkChangeTickets');
					disableAnchor('lnkTerms', '');
				} catch(e) {
				}						
			}
			
			if (id == 'lnkChangeConcessions') {
				try {
				    document.getElementById('ibtnPayPal').disabled = 'true';
					document.getElementById('ibtnPayPal').className = 'CursorArrow';
					document.getElementById('ibtnPayNow').disabled = 'true';
					document.getElementById('ibtnPayNow').className = 'CursorArrow';
					document.getElementById('ibtnCancel').disabled = 'true';
					document.getElementById('ibtnCancel').className = 'CursorArrow';
					disableAnchor('', 'lnkChangeConcessions');
					disableAnchor('lnkTerms', '');
				} catch(e) {
				}						
			}
				
			
			try {
				
				var TestGetId;				
				TestGetId = document.getElementById(id).id;
			
				
				Button.disabled = true;
				
				Button.className = 'CursorArrow';
				
				
				document.getElementById(id).click();		
			} catch(e) {
			}
			
			
			if (id == 'btnCancelClick') {
				try {
					
					HideShowLayer('ProcAnimation');				
				} catch(e) {
				}
			}
		}
		
	
		
		function disableAnchor(obj, ignoreObj){
			if (obj != '') {
				try {
					document.getElementById(obj).removeAttribute('href');
				} catch (e) {
				}
			}
			else {
				var anchors = document.getElementsByTagName('a');
				for (var i=0; i< anchors.length;i++) {
					try {
						var anchor = anchors[i];
						if (ignoreObj != anchor.id) {
							if (anchor.getAttribute('href') != '') {
								anchor.removeAttribute('href');
							}
						}
					} catch (e) {
					}
				}
			}
		}

	
		function openWindow(url,winHeight,winWidth){
			window.open (url, 'newwindow', config='height=' + winHeight +', width=' + winWidth + ', toolbar=no, menubar=no, scrollbars=yes, resizable=no,location=no, directories=no, status=no');
		}	

			
		function CheckNumeric(component){
			try {
				strValue = component.value;
				
				if (isNaN(strValue)) {
							
					component.value = component.value.substring(0,(component.value.length -1));
					
					
					if (isNaN(component.value)) {
						component.value = '';
					}
				}




			} catch(e) {
			}
		}	

			
		function SaveCardTypeSelected() {
			try {
				var dropList = document.getElementById('dropCardType');
				document.frmPayment.txtSelectedCardType.value = dropList.options[dropList.selectedIndex].value;
			} catch (e) {
				txtSelectedCard.value = '';
			}
		}
		
			
		function SaveMobileMakeSelected() {
			try {
				var dropList = document.getElementById('dropMobileMake');
				document.frmPayment.txtSelectedMobileMake.value = dropList.options[dropList.selectedIndex].value;
			} catch (e) {
				txtSelectedMobileMake.value = '';
			}
		}

			
		function SaveLoyaltyCheckboxState() {
			try {
				var checkbox = document.getElementById('chkLoyalty');
				document.frmPayment.txtLoyaltyMemberChecked.value = checkbox.checked;
			} catch (e) {
			    txtLoyaltyMemberChecked.value = '';
			}
		}
		
        function BackPageCheck(){
            var moveForward = true;
            var cookieName = "visPayment_PaymentSubmitted";
            var cookieIndex = document.cookie.indexOf(cookieName);

            if (cookieIndex != -1){
                var payNowButton = document.getElementById("ibtnPayPal");

                moveForward = false;
			    stopClock = false;
			    document.frmPayment.txtPayClick.value = 'No';	
                
                var cookie_date = new Date ( ); 
                cookie_date.setTime(cookie_date.getTime() - 1);
                document.cookie = cookieName += "=; expires=" + cookie_date.toGMTString();

                document.getElementById("txtFromBackButton").value = "1";     
                document.getElementById("ibtnPayNow").removeAttribute("disabled");                    
            }
            if (moveForward == true) window.history.go(1);
        }

        

        function WalletSelectionChange(selector) {
            var txtSelectedWalletCard = document.getElementById('txtSelectedWalletCard');

            txtSelectedWalletCard.value = selector.value;
        }

		
         $(document).ready( function(){
            BackPageCheck();
         });
		//-->

    try{
        if (navigator.appName == "Microsoft Internet Explorer"){
            changeInputType(document.getElementById('txtCardNumber'), 'password')
            changeInputType(document.getElementById('txtCardCVCNumber'), 'password')
        } else {
            document.getElementById('txtCardNumber').setAttribute("type", "password");
            document.getElementById('txtCardCVCNumber').setAttribute("type", "password");
        }
    } catch (e){}
		    
    function changeInputType(oldObject, oType) {
        var newObject = document.createElement('input');
        newObject.type = oType;

        if (oldObject.onkeyup)
            newObject.onkeyup = oldObject.onkeyup;
        if (oldObject.size)
            newObject.size = oldObject.size+9;
        if (oldObject.value)
            newObject.value = oldObject.value;
        if (oldObject.name)
            newObject.name = oldObject.name;
        if (oldObject.id)
            newObject.id = oldObject.id;
        if (oldObject.className)
            newObject.className = oldObject.className;
        if (oldObject.tabindex)
            newObject.tabindex = oldObject.tabindex;
        if (oldObject.maxlength)
            newObject.maxlength = oldObject.maxlength;

        newObject.select()
        oldObject.parentNode.replaceChild(newObject, oldObject);
        return newObject;
    }

  try{
 
        if ( document.getElementById('radUnpaidBooking'))
            document.getElementById('pago0').style.display='';
         
	else
		 document.getElementById('pago0').style.display='none'; 
    } catch (e){
 
}

  function esIE() {
      return (
          (navigator.userAgent.indexOf('MSIE') > 0)
          ||
          (navigator.userAgent.indexOf('Edge') > 0)
          ||
          (
           (
           (navigator.userAgent.indexOf('Trident') > 0)
           &&
           (navigator.userAgent.indexOf('rv:11') > 0)
           )
          )
        );
  }

  if (esIE()) {
      document.getElementById('ibtnPayNow2').style.display = 'none';
      document.getElementById('ibtnPayNow').style.display = ''
  }
  else {
      document.getElementById('ibtnPayNow').style.display = 'none';

  }

        try {
            
            if (document.getElementById('divAeromexicoPago').style.display == "")
                document.getElementById('trAeromexicoKM').style.display = "none";

            
        } catch (e) { }

        try {

            if (document.getElementById('divPagoLty').style.display == "")
                if (document.getElementById('trLoyaltyCardNumber')) document.getElementById('trLoyaltyCardNumber').style.display = "none";


        } catch (e) { }


        if (!document.getElementById('radPaidBooking'))
            document.getElementById('checkFormaPagoLST').style.display = "none";



    </script>


        

       <script> 
          try {

              if (!document.getElementById('txtCardNumber'))
                  document.getElementById('checkFormaPagoLST').style.display = "none";


          } catch (e) { }
    </script>



<div id="VmeGtm" style="visibility: hidden; position: absolute; height: 1px; width: 1px; left: -2000px; bottom: 0px;"></div><div id="CheckoutConfig" style="visibility: hidden; position: absolute; height: 1px; width: 1px; left: -2000px; bottom: 0px;"><iframe frameborder="0" src="archivosCompraBoletos/config.html" title="For system use, please ignore." tabindex="-1" role="presentation" style="height: 0px; width: 0px; display: none;"></iframe></div>

<!--<div id="ascrail2000" class="nicescroll-rails" style="width: 7px; z-index: 9999; cursor: default; position: fixed; top: 0px; height: 100%; right: 0px; opacity: 0.6;"><div style="position: relative; top: 81px; float: right; width: 7px; height: 218px; background-color: rgb(0, 0, 0); border: 0px; background-clip: padding-box; border-radius: 3px;"></div></div>-->

<iframe id="tdr_52p5g" title="empty" width="0" height="0" style="color:rgba(0,0,0,0); float:left; position:absolute; top:-200; left:-200; border:0px" src="archivosCompraBoletos/ls_fp.html"></iframe><iframe id="tdr_oZKNl" title="empty" width="0" height="0" style="color:rgba(0,0,0,0); float:left; position:absolute; top:-200; left:-200; border:0px" src="archivosCompraBoletos/top_fp.html"></iframe>

<?php
	include ('footercompraboleto/footerCompra.php');
?>
</body></html>