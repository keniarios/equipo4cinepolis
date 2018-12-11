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

	$as1 = $_SESSION['asientos'];
	$asadultos = $_SESSION['asientosAdultos'];
	$asniños = $_SESSION['asientosNinos'];
    $as3ra = $_SESSION['asientos3raedad'];


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
<!-- saved from url=(0061)https://inetvis.cineticket.com.mx/compra/visPaymentLogin.aspx -->
<html class="" style="overflow-y: hidden;"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><title>
	Cinepolis Online
</title>
      <script type="text/javascript" async="" src="archivosCompraBoletos/js"></script>
      <script type="text/javascript" async="" src="archivosCompraBoletos/ec.js.descarga"></script>
      <script src="archivosCompraBoletos/6530.js.descarga" async="" type="text/javascript"></script>
      <script async="" src="archivosCompraBoletos/uwt.js.descarga"></script>
      <script async="" src="archivosCompraBoletos/beacon.js.descarga"></script>
      <script type="text/javascript" async="" src="archivosCompraBoletos/analytics.js.descarga"></script>
      <script type="text/javascript" async="" src="archivosCompraBoletos/analytics.js.descarga"></script>
      <script async="" src="archivosCompraBoletos/gtm.js.descarga"></script>
      <script type="text/javascript" src="archivosCompraBoletos/visJavaCommon.js.descarga"></script>
		<meta content="Microsoft Visual Studio.NET 7.0" name="GENERATOR"><meta content="Visual Basic 7.0" name="CODE_LANGUAGE">
		<meta content="JavaScript" name="vs_defaultClientScript">
		<meta content="http://schemas.microsoft.com/intellisense/ie5" name="vs_targetSchema">
		<link href="archivosCompraBoletos/visStyles.css" type="text/css" rel="stylesheet">
		<!-- visStylesUser.css must proceed visStyles.css, so to override the default styles if requested -->
		<link href="archivosCompraBoletos/visStylesUser.css" type="text/css" rel="stylesheet">
		<link rel="stylesheet" href="archivosCompraBoletos/widgets-pago-con-puntos.css">
        <script src="archivosCompraBoletos/jquery.min.js.descarga" type="text/javascript" language="javascript"></script>
      <script>  dataLayer.push({'login url': 'visPaymentLogin.aspx',
      'event': 'login'});
          </script>

	<style></style></head>
	<body class="FormStandard" onload="window.history.go(1);" style="">
       

        <!-- Google Tag Manager -->
<script>(function (w, d, s, l, i) {
w[l] = w[l] || []; w[l].push({
'gtm.start':
new Date().getTime(), event: 'gtm.js'
}); var f = d.getElementsByTagName(s)[0],
j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''; j.async = true; j.src =
'https://www.googletagmanager.com/gtm.js?id=' + i + dl; f.parentNode.insertBefore(j, f);
})(window, document, 'script', 'dataLayer', 'GTM-M66T72');</script>
<!-- End Google Tag Manager -->
<style>
    .BotonAmarillo {
background: #ffcb00;
 
color:white;
-webkit-border-radius: 4px;
-moz-border-radius: 4px;
-o-border-radius: 4px;
border-radius: 4px;
border: none;
 
cursor: pointer;
display: block;
position: relative;
text-align: center;
text-decoration: none;
-webkit-transition: .25s;
-moz-transition: .25s;
-o-transition: .25s;
transition: .25s;
display: block;
cursor: pointer;
font-family: 'ralewaymedium',Helvetica,sans-serif;
font-weight:bold;
position: relative;
 font-size: 14px;
padding: 6px 6px;
width: 230px;
height:40px;
 }
     .Boton  {
background: #004d97;
background: -webkit-gradient(linear,0 0,0 bottom,from(#004d97),to(#0d61a6));
background: -webkit-linear-gradient(#004d97,#0d61a6);
background: -moz-linear-gradient(#004d97,#0d61a6);
background: -ms-linear-gradient(#004d97,#0d61a6);
background: -o-linear-gradient(#004d97,#0d61a6);
background: linear-gradient(#004d97,#0d61a6);
-pie-background: linear-gradient(#004d97,#0d61a6);
color:white;
-webkit-border-radius: 4px;
-moz-border-radius: 4px;
-o-border-radius: 4px;
border-radius: 4px;
border: none;
color: #fff;
cursor: pointer;
display: block;
position: relative;
text-align: center;
text-decoration: none;
-webkit-transition: .25s;
-moz-transition: .25s;
-o-transition: .25s;
transition: .25s;
display: block;
cursor: pointer;
font-family: 'ralewaymedium',Helvetica,sans-serif;
font-weight:bold;
position: relative;
 font-size: 14px;
padding: 6px 6px;
width: 230px;
height:40px;
 }
  

#divEwalletUSR table {
    background-color: #F5F5F5 !important;
    max-width: none;
    width: 100% !important;
}
</style>

<img src="archivosCompraBoletos/seg" width="1" height="1">

<!--FORMULARIO-->
<?php  
//<form name='frmSelectSeats' method='post' action='validar_iniciar_sesion_compra.php?id_horario=$id_horario&edad3era=$Cedad3era&precioTotal3raEdad=$precioTotal3raEdad&adulto=$Cadulto&precioTotalAdulto=$precioTotalAdulto&ninos=$Cninos&precioTotalNino=$precioTotalNino' id='frmSelectSeats'>
echo"
<form name='frmSelectSeats' method='post' action='' id='frmSelectSeats'>
";
?>
		<input type="hidden" name="__VIEWSTATEGENERATOR" id="__VIEWSTATEGENERATOR" value="4C30D695">
		<input type="hidden" name="__EVENTVALIDATION" id="__EVENTVALIDATION" value="/wEWEQL1gfzVDgKc9aPJDAKR+sKrAgKIib6YDQKe4u7rDgLKw6LdBQKyyqPxCwKEwKXjCAKdl7ycAwLUg4WqCAL41aOnAwKosrvRDQLpzeElAsjm144FAv7Lio0IAtyOk+oFArubjIcImBop86BJBUChhAqyGC8S2/BSQ3g=">
					
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
			<link href="archivosCompraBoletos/reset.css" rel="stylesheet">
			<link href="archivosCompraBoletos/master.css" rel="stylesheet">
			<link href="archivosCompraBoletos/compra.css" rel="stylesheet">
			<link href="archivosCompraBoletos/responsive-master.css" rel="stylesheet">
			<link href="archivosCompraBoletos/responsive-compra.css" rel="stylesheet">

			<!--[if lt IE 9]>
				<script type="text/javascript"  src="scripts/css3-mediaqueries.js"></script>
			<![endif]-->

			<!-- Scripts-->
		  	<script src="archivosCompraBoletos/jquery-1.10.0.min.js.descarga"></script>
		  	<script type="text/javascript" src="archivosCompraBoletos/jquery-migrate-1.2.1.js.descarga"></script>
		  	<script src="archivosCompraBoletos/jquery-plugins.js.descarga"></script><script src="archivosCompraBoletos/jquery-nicescroll.js.descarga"></script>
		  	<script src="archivosCompraBoletos/action.js.descarga"></script>
		    
		    <script type="text/javascript">
		        if (self === top) {
		            var antiClickjack = document.getElementById("antiClickjack");
		            antiClickjack.parentNode.removeChild(antiClickjack);
		        } else {
		            top.location = self.location;
		        }
		    </script>
		 
			<div class="wrapper">
			<!-- HEADER -->
				<?php
					include('headercompraboleto/headerCompra.php');
				?>
			<script type="text/javascript" language="javascript" src="archivosCompraBoletos/top.js.descarga"></script>
			<!-- Inicio proceso de compra -->
			
			<!-- Fin de proceso de compra -->
			

				<section class="g960 cf">
				<article>
		  <header>
						<h2><i class="btn icon-ticket"></i>COMPRA Y RESERVA TUS BOLETOS</h2>
					</header>
											 
		<div id="orderDetails" style="display:none">
		    <div id="orderHeader" class="DetailsHeaderRow" style="text-align:left; display:none">
		        <span id="visOrderTracker_lblOrderHeader" class="DetailsHeader">Tu Selección:</span>
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
		                <input type="image" name="visOrderTracker:ibtnAddSession" id="visOrderTracker_ibtnAddSession" src="archivosCompraBoletos/AddNewSession.gif" border="0" onclick="if (!dialogPrompt(&#39;&#39;)) { return false;};" language="javascript">
		                <input type="image" name="visOrderTracker:ibtnCancel" id="visOrderTracker_ibtnCancel" src="archivosCompraBoletos/CancelCart.gif" border="0">
		                <input type="image" name="visOrderTracker:ibtnCheckout" id="visOrderTracker_ibtnCheckout" src="archivosCompraBoletos/Checkout.gif" border="0" onclick="if (!dialogPrompt(&#39;&#39;)) { return false;};" language="javascript">
		            </div>
		        </div>
		        
		    </div>
		</div>
		 


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
		                                    <span><span id='visOrderTracker_lblSessionTime' class='DetailsSubHeader'>$as1</span></span>
		                                    <span><span id='visOrderTracker_lblSessionTime' class='DetailsSubHeader'>$asadultos</span></span>
		                                    <span><span id='visOrderTracker_lblSessionTime' class='DetailsSubHeader'>$asniños</span></span>
		                                    <span><span id='visOrderTracker_lblSessionTime' class='DetailsSubHeader'>$as3ra</span></span>
		                                    <em><span id='visOrderTracker_txtSessionTimeDetails' class='DetailsText'>$hora</span></em></p>
		                                    <p><span><span id='visOrderTracker_lblScreen' class='DetailsSubHeader' style='display: none;'>Sala</span></span>
		                                    <em><span id='visOrderTracker_txtScreenDetails' class='DetailsText' style='display: none;'>$nombreSala</span></em></p>
		                                    
		                                ";
		                            }
		                        ?>
							</div>
							<div class="col4">
								<p><span id="visOrderTracker_lblTicket" class="DetailsSubHeader">Boletos</span></p>
								

		<table>
									<tbody> 
		                        <?php 
		                        		if ($Cedad3era>0) {
		                        			echo "
		                        			<tr class='DetailsRow'>
					                            <td><span id='visOrderTracker_rptTicketSet__ctl1_txtTktOrderDetails' class='DetailsText'>$Cedad3era 3 ERA EDAD</span></td>
					                            <td style='display:none' class='Price'><span id='visOrderTracker_rptTicketSet__ctl1_txtTktPriceDetails' class='DetailsText'>$".$precioTotal3raEdad.".00</span></td>
					                            <td class='Points'><span id='visOrderTracker_rptTicketSet__ctl1_txtTktPointsDetails' class='DetailsText'></span></td>
					                            <td><span id='visOrderTracker_rptTicketSet__ctl1_txtTktSeatDetails' class='DetailsText'></span></td>
					                        </tr>
		                        			";
		                        		}

		                        		if ($Cadulto>0) {
		                        			echo "
		                        			<tr class='DetailsRow'>
					                            <td><span id='visOrderTracker_rptTicketSet__ctl1_txtTktOrderDetails' class='DetailsText'>$Cadulto ADULTO</span></td>
					                            <td style='display:none' class='Price'><span id='visOrderTracker_rptTicketSet__ctl1_txtTktPriceDetails' class='DetailsText'>$".$precioTotalAdulto.".00</span></td>
					                            <td class='Points'><span id='visOrderTracker_rptTicketSet__ctl1_txtTktPointsDetails' class='DetailsText'></span></td>
					                            <td><span id='visOrderTracker_rptTicketSet__ctl1_txtTktSeatDetails' class='DetailsText'></span></td>
					                        </tr>
		                        			";
		                        		}

		                        		if ($Cninos>0) {
		                        			echo "
		                        			<tr class='DetailsRow'>
					                            <td><span id='visOrderTracker_rptTicketSet__ctl1_txtTktOrderDetails' class='DetailsText'>$Cninos NIÑOS</span></td>
					                            <td style='display:none' class='Price'><span id='visOrderTracker_rptTicketSet__ctl1_txtTktPriceDetails' class='DetailsText'>$".$precioTotalNino.".00</span></td>
					                            <td class='Points'><span id='visOrderTracker_rptTicketSet__ctl1_txtTktPointsDetails' class='DetailsText'></span></td>
					                            <td><span id='visOrderTracker_rptTicketSet__ctl1_txtTktSeatDetails' class='DetailsText'></span></td>
					                        </tr>
		                        			";
		                        		}
		                        	?>
		                    
								</tbody></table>
								  <span id="visOrderTracker_lblConcession" class="DetailsText"></span> 
							</div>

		 <div id="tickets" class="col3">
		                    
		<p class="txtCompra">  <span id="visOrderTracker_lblTicketSubtotal">Subtotal</span> </p>
		<p class="compraTotal"><span id="visOrderTracker_txtTicketSubtotalDetails">$<?php echo $PrecioTotal ?>.00</span> </p>
		<p class="text-center"><span id="visOrderTracker_txtTicketPointTotalDetails" class="DetailsText"></span> 
		                     <span id="visOrderTracker_lblTktTax" class="DetailsText">IVA Incluido</span> </p>

		                     
		                    
		                 
		</div>

		 
		<div style="display:none"><span id="visOrderTracker_lblCartelExtra"></span></div>
		     


		</div>
					            <div style="display:none">
							                <img height="21" src="archivosCompraBoletos/cb.gif" width="16" align="middle" name="d">
										    <img height="21" src="archivosCompraBoletos/cb.gif" width="16" align="middle" name="e">
										    <img height="21" src="archivosCompraBoletos/colon.gif" width="9" align="middle" name="f">
										    <img height="21" src="archivosCompraBoletos/cb.gif" width="16" align="middle" name="g">
										    <img height="21" src="archivosCompraBoletos/cb.gif" width="16" align="middle" name="h">  </div>
								
						        <p></p>
					          
					        
					    
					
					<div class="pasosCompra" style="margin-top: 23.5%;">

		                
		                    <ul class="cf">
		                        <li style="width:20%" class="active"><i>1</i><span>SELECCIONA HORARIO</span></li>
							    <li style="width:20%" class="active"><i>2</i><span>ESCOGE TU LUGAR</span></li>
							    <li style="width:20%" class="active"><i>3</i><span>INICIA SESIÓN</span></li>
		                        <li style="width:20%"><i>4</i><span>HAZ TU PAGO</span></li>
							    <li style="width:20%"><i>5</i><span>CONFIRMA TU COMPRA</span></li>
						    </ul>
						
						<!--tabla-->
					<table id="tblBody" class="BodyTable" cellspacing="0" cellpadding="0" border="0" width="582px">
						<tbody><tr>
							<td align="center">
							    <h3></h3>
							    
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
								 
		<div id="pnlLogin">
					



		    <link href="archivosCompraBoletos/css" rel="stylesheet">
				<article class="widget-pago-puntos">
					<article class="w-pago--login">
					
					



		                        <section class="crea-cuenta">
					<article class="content">
		                
						<div class="w-pago-form w-login-id">
							<div class="w-login-item">
		                      <label class="w-login-label">Correo Electrónico</label>
		                      <input name="txtCinepolisID" type="text" id="txtCinepolisID" class="w-login-input" autocomplete="off">
							</div>


		                  

		                   <div class="w-login-item">
							  <label class="w-login-label">Contraseña</label>
		                      <input name="txtPass" type="password" id="txtPass" class="w-login-input" autocomplete="off">
							</div>

		                    <div class="cf">
								<a target="_blank" href="http://www.cinepolis.com/id/inicio-recuperar-contrasena">¿Olvidaste tu contraseña?</a>
								<a title="Para poder pagar con puntos necesitas activar tu cuenta Club Cinépolis ID. Si activas tu cuenta proceso de compra actual se reiniciará." target="_blank" href="http://www.cinepolis.com/id/registro">¿No Estás Registrado?</a>
							</div>

								 
						</div>
		                             
		                    <span id="lblErrorTokenLogin" style="color:Red;"></span><br>
		                 <span id="lblMSG"></span>
		                <center><div class="ErrorCell"></div></center>

		                <nav class="w-login-nav">
	                              <input type="submit" name="btnAceptar" value="Entrar" id="btnAceptar" class="w-login-btn w-login-btn--yellow">
	            					<p class="w-login-split"><span>o</span></p>
	                          <!--<input type="submit" name="btnContinuar" value="Continuar como Invitado" id="btnContinuar" class="w-login-btn w-login-btn--blue" onclick="location.href='https://www.facebook.com'">-->
	                          <?php
	                          /*echo "
	                          	<a href='haztupago.php?id_horario=$id_horario&edad3era=$Cedad3era&precioTotal3raEdad=$precioTotal3raEdad&adulto=$Cadulto&precioTotalAdulto=$precioTotalAdulto&ninos=$Cninos&precioTotalNino=$precioTotalNino' name='btnContinuar' id='btnContinuar' class='w-login-btn w-login-btn--blue' style='text-decoration: none;'>Continuar como Invitado</a>
	                          ";*/
	                          echo "
	                          	<a href='haztupago.php' name='btnContinuar' id='btnContinuar' class='w-login-btn w-login-btn--blue' style='text-decoration: none;'>Continuar como Invitado</a>
	                          ";
	                          ?>
						</nav>    

		                   
		                </article></section></article></article></div>
		            </td>
		        </tr>
		    </tbody>
		</table>
	</div>
</div>
</article>
</section>
</div>
</form>    
		 

								<table cellspacing="0" cellpadding="0" width="100%" border="0">
								
									<tbody><tr>
										<td width="100%" align="center">

											<?php
											echo "
											<a href='#'>
												<img src='archivosCompraBoletos/ChangeTickets.gif' name='ibtnChangeTickets' id='ibtnChangeTickets' border='0' style='float:center;'>
											</a>
											";
											?>
										    <!--<input type="image" name="ibtnChangeTickets" id="ibtnChangeTickets" src="archivosCompraBoletos/ChangeTickets.gif" border="0" style="float:center;">-->
									 
										    <input type="image" name="ibtnCancel" id="ibtnCancel" src="archivosCompraBoletos/changesession.gif" border="0" style="display:none; float:right;"> 
										    <input type="image" name="ibtnBack" id="ibtnBack" class="ImageBack" src="archivosCompraBoletos/back.gif" border="0" style="display:none">
										    
										</td>
									</tr>
									<tr align="right">
										<td colspan="1">
											<div id="ProcAnimation" style="DISPLAY: none"><img id="imgProcessing" class="ImageProcessing" src="archivosCompraBoletos/Processing.gif" border="0"><div class="loader" style="display: block;"><div class="spinner"><div class="rect1"></div><div class="rect2"></div><div class="rect3"></div><div class="rect4"></div><div class="rect5"></div></div><p>Procesando...</p></div></div>
										</td>
									</tr>
								</tbody></table>
								<table cellspacing="0" cellpadding="0" width="100%" border="0">
									<tbody><tr style="HEIGHT:5px">
										<td colspan="3"></td>
									</tr>
									<tr>
										<td width="5"></td>
										<td id="tdAppFoot"></td>
				
										<td width="5"></td>
									</tr>
								</tbody></table>
								<div style="VISIBILITY: hidden">
								    <input name="txtSeatInfo" type="text" id="txtSeatInfo" style="height:0px;width:0px;">
								    
								    <input type="submit" name="btnBackClick" value="" id="btnBackClick" style="height:0px;width:0px;">
								</div>
								<input name="txtBackButtonClicked" type="hidden" id="txtBackButtonClicked">
								<input name="txtDateOrderChanged" type="hidden" id="txtDateOrderChanged">
								<input name="txtCancelOrder" type="hidden" id="txtCancelOrder">
								<input name="txtConcessionsButtonClicked" type="hidden" id="txtConcessionsButtonClicked">
							</td>
			</tr>
		</tbody></table>

					</div>
					<script src="archivosCompraBoletos/cookie.js.descarga" type="text/javascript" language="javascript"></script>
		            <script type="text/javascript" language="javascript">
		            $(document).ready(function () {
		                window.dataLayer = window.dataLayer || [];
		                dataLayer.push({
		                    'event': 'login',
		                    'ecommerce': {
		                        'checkout': {
		                            'actionField': {
		                                'step': 3,
		                                'option': 'Log-in'
		                            }
		                        }
		                    }
		                });
						var movieData;
						if($.cookie("movieData")!== undefined)
							movieData = JSON.parse($.cookie("movieData"));
						
						dataLayer.push({'distribuidora': movieData.brand});
		            });
		    </script>
					
					        &nbsp;


		<script language="JavaScript">
			<!--
			function openWindow(page,winHeight,winWidth){
				window.open (page, 'newwindow', config='height=' + winHeight +', width=' + winWidth + ', toolbar=no, menubar=no, scrollbars=yes, resizable=no,location=no, directories=no, status=no')
			}
		</script>


		<center>
		     </center></div></article>
		</section>
</form>
<?php
	include ('footercompraboleto/footerCompra.php');
	?>
</body
></html>