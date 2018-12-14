<!DOCTYPE html>
<html>
<head>
	<title>Cinecash | CinépolisID</title>
	<link href="../../css/vistasCliente/master-id.css" rel='stylesheet' type='text/css' />
	<link href="../../css/vistasCliente/master.css" rel='stylesheet' type='text/css' />
	<link href="../../css/vistasCliente/reset.css" rel='stylesheet' type='text/css' />
	<link href="../../css/vistasCliente/responsive-master.css" rel='stylesheet' type='text/css' />
</head>
<body>

		<!-- Aquí metemos las secciones -->
		<article id="cinecash" style="width: 72%;float: right;">
			<div id="reprod-video">
				<a href="#" class="id-icon-cerrar"></a>
				<video id="videoCinecash">
					<source type="video/mp4" src="../../videocinepolisID/cinecash.mp4">
					<source type="video/webm" src="../../videocinepolisID/cinecash.webm">
					<source type="video/ogg" src="../../videocinepolisID/cinecash.ogv">
				</video>
			</div>

			<section class="encabezado row">
				<div class="float-left info-video">
					<div class="datos">
						<h2><strong style="color: black; font-size: 32px; font-weight: bold;">Mi CineCash <sup>®</sup></strong><BR class="blue creditos" style="font-weight: bold; font-size: 14px; ">Mis créditos: <span><span id="ContentPlaceHolder1_sitio_lblCreditos">0.0</span></span></B></h2>
					</div>
					<div class="info-cinecash">
						<a href="#" class="id-icon-play"></a>
						<p>¿Qué es CineCash<sup>®</sup>?</p>
					</div>
				</div>
				<nav class="float-right">
					<a href="#" id="recargaCinecash" style="text-decoration: none:">
					    <span class="id-icon-recargar"></span>Recargar
					</a>
					<a href="#" id="transaccionesCinecash" class="active" style="text-decoration: none:">
						<span class="id-icon-consultar"></span>Consultar
					</a>
					<a href="#" id="regalaCinecash" style="text-decoration: none:">
						<span class="id-icon-regalar"></span>Regalar
					</a>
				</nav>
			</section><!--fin_encabezado row-->

			<script type="text/javascript">
		        $(document).ready(function () {
		            $('#transaccionesCinecash').addClass('active');
		        });
		    </script>
		    	<script src="scripts/Id.Core.Async.js"></script>
		    <div id="ContentPlaceHolder1_sitio_SeccionCinecash_pnlTransaccionesCineCash">
		        <!-- Últimos movimientos -->
		        <section id="movimientos-cCash" class="movimientos">
		            <div class="row">
		                <h3 class="float-left" style="color: #0b5ba1; font-size: 23px; font-weight: bold; margin: 0;">Últimos movimientos</h3>
		                <ul class="float-right menu-mov">
		                    <li>
		                        <a href="#" id="btnTodos" class="active" data-group="todas">Todos</a>
		                    </li>
		                    <li>
		                        <a href="#" id="btnCompras" data-group="compras">Compras</a>
		                    </li>
		                    <li>
		                        <a href="#" id="btnRecargas" data-group="recargas">Recargas</a>
		                    </li>
		                </ul>
		            </div>
		            <!-- Fila -->
		            <div id="movimientos-cont" style="opacity:1">
		                <div class="contenedorUltimosMovimientos"></div>
		            </div>
		            <section class="no-movimientos" id="secTransacciones" style="margin: auto; text-align: center;">
		                <span class="id-icon-id" style="color: #dbdbdb; display: inline-block; font-size: 6em; margin-bottom: 40px; text-align: center;"></span>
		                <p id="ContentPlaceHolder1_sitio_SeccionCinecash_textMovimientos" style="color: #dbdbdb; margin: auto; max-width: 380px; font-size: 14px;">No has hecho ningún movimiento con CineCash<sup>®</sup>. Recarga créditos con una Tarjeta de Crédito o compra una tarjeta en tu Cinépolis<sup>®</sup> favorito y vincúlala.
		                </p>
		            </section>
		        </section><!--fin_id="movimientos-cCash"-->
			</div><!--fin_ContentPlaceHolder1_sitio_SeccionCinecash_pnlTransaccionesCineCash-->
			<section class="encabezado row">
		        <div class="id-col8">
		            <h2 style="font-size: 27px;color:  black;font-weight: bold;">Tarjeta CineCash<sup>®</sup></h2>
		            <div class="activa-cinepass">
		                <label style="width: auto; font-size: 15px; float: left;">Ingresa el número de tu Tarjeta para conocer su saldo</label>
		                <input name="txtCineCash" type="text" maxlength="16" id="ContentPlaceHolder1_sitio_SeccionCinecash_txtCineCash" class="tarjeta">
		                <span id="ContentPlaceHolder1_sitio_SeccionCinecash_rfvtarjetaclubcinepolis" style="display:none;"></span>
		                <span id="ContentPlaceHolder1_sitio_SeccionCinecash_revtarjetaclubcinepolis" style="display:none;"></span>
		            </div>
		            <nav>
		                <button onclick="if (typeof(Page_ClientValidate) == 'function') Page_ClientValidate('ConsultarCineCash'); __doPostBack('ctl00$ctl00$ctl00$ContentPlaceHolder1$sitio$SeccionCinecash$btnConsultar','')" id="ContentPlaceHolder1_sitio_SeccionCinecash_btnConsultar" validationgroup="ConsultarCineCash" class="btn-id consultar" style="background-color:#13a9ce;border-color:#13a9ce; -webkit-border-radius:4px;border-radius:4px;border-style:solid;border-width:1px 0 0;	color:#fff;	line-height:18px;max-width:150px;padding:.4em 0;position:relative;text-align:center;-webkit-transition:0.3s all;-moz-transition:0.3s all;-o-transition:0.3s all;-ms-transition:0.3s all;transition:0.3s all;width:100%;" disabled>
		                    Consultar
		                    <span class="id-icon-flecha-der"></span>
		                </button>
		                <div id="ContentPlaceHolder1_sitio_SeccionCinecash_VSConsultarCineCash" style="display:none;">
		                	
		                </div>
		            </nav>
		        </div>
		        <figure class="id-col4 tarjeta">
		            <img src="https://static.cinepolis.com/marcas/id/mx/imagenes/sitio/img-numero-cinecash.png" alt="Encuentra el código de seguridad">
		        </figure>
		        <div class="movimientos">
		            <p class="row">
		                <span id="ContentPlaceHolder1_sitio_SeccionCinecash_lblQuedan"></span>
		            </p>
		            <p class="row">
		                <span id="ContentPlaceHolder1_sitio_SeccionCinecash_lblVencen"></span>
		            </p>
		            
		            <div id="loader"></div>
		        </div>
		    </section><!--fin_class="encabezado row"-->
		    <section class="banners-abajo" style="margin-bottom: 50px;">
		    	<div class="banner-izq">
		    		<figure>
		    			<a href="javascript:void(0);" target="_blank">
		    				<img src="https://static.cinepolis.com/marcas/id/mx/imagenes/banners/cinecash_a.jpg?08" alt="">
                        </a>
                        <figcaption>
                        	<h2 style="color: black;font-weight: bold;font-size: 24px;">Martes 2x1</h2>Martes 2x1 en todos los formatos.
					    </figcaption>
					</figure>
				</div>
				<div class="banner-der">
					<figure>
						<a href="javascript:void(0);" target="_blank">
                            <img src="https://static.cinepolis.com/marcas/id/mx/imagenes/banners/cinecash_b.jpg?08" alt="">
                        </a>
                        <figcaption>
                            <h2 style="color: black;font-weight: bold;font-size: 24px;">Combo lunes.</h2>Combo lunes por solo $154.
					    </figcaption>
                    </figure>
                </div>
            </section><!--fin_class="banners-abajo"-->
            <script src="../../scripts/Validaciones.js"></script>
            <script src="../../scripts/modernizr.js"></script>
            <script src="../../scripts/jquery.shuffle.min.js"></script>
            <script src="../../scripts/funciones-cinecash.js"></script>
            <script type="text/javascript">
		        $(window).load(function () {
		            $('.mdl-categorias').on('click', '.btnGuardarGeneros', function (e) {
		                $('.cat-modal .close').trigger('click');
		                jsUtil.fancyAlert('Estamos procesando tu información. Recuerda que puedes modificar tus Géneros favoritos en la sección de Configuración.', 'Aceptar');
		            });
		        });
		    </script>
		</article><!--fin_id="cinecash"-->
</body>
</html>