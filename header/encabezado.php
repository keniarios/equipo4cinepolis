
<!DOCTYPE html>
<html>
<head>
	<title>Cinépolis</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
	
	<link href="../../css/vistasCliente/master.css" rel='stylesheet' type='text/css' />
	<link href="../../css/vistasCliente/master2.css" rel='stylesheet' type='text/css' />
	<link href="../../css/vistasCliente/master3.css" rel='stylesheet' type='text/css' />

</head>
<body>
	<header>
		<!--CONTENEDOR BUSQUEDA-->
		<!--<div class="contentBusqueda g1140 cf">-->
		<div class="contentBusqueda g1024 cf">
			<div id="btnMenu">
				<a href="#masCinepolis" title="Más Cinépolis®">
					<i class="icon-reorder"></i>
				</a>
			</div>
			<h1 class="col3">
				<a href="index.php" id="link_logomaster" title="Cinépolis®">
					<img src="../img/vistaCliente/lg-cinepolis.png" id="img_logomaster" alt="Cinépolis®">
					<span>Cinépolis®</span>
				</a>
			</h1>
			
			<!--CIUDADES Y SUCURSALES INCLUIDAS-->
		<?php include ('mostrarCiudadyTiendas/mostrarCiudadyTiendas.php');?>


			<div class="md-modal md-effect-12" id="videoTrailers">
				<div class="md-content">
					<div id="videoContent"></div>
					<button class="btnClose">
						<i class="icon-remove-circle"></i>
					</button>
				</div>
			</div>
			<script src="../../scripts/video/video.js" async="async"></script>
			
			<!--VALIDACION SI ESTA LOGEADO EL CLIENTE-->
			<?php
			//LOGEADO
				if ($id_cinepolisid>0) {
					?>
					<div class="col1">
						<div id="ctl25_pnlCinepolisIDMexico">
							<div>
					        	<a href="#sesion" class="btnId abrirContent sesionIniciada">
					            	<figure>
					            		<!--<img id="ctl25_lvCinepolisID_imgAvatar" src="https://static.cinepolis.com/marcas/id/mx/avatar/perfil-generico.jpg">-->
					                	<img id="ctl25_lvCinepolisID_imgAvatar" src="../../img/vistaCliente/cinepolisID/perfil-generico.jpg">
					            	</figure>
					        	</a>

					        	<fieldset id="sesion" class="dropdown">
						            <figure>
						            	<img id="ctl25_lvCinepolisID_imgPerfil" src="../../img/vistaCliente/cinepolisID/perfil-generico.jpg" style="height:71px;width:71px;">
						            </figure>
						            <h3>Roque Alionso</h3>
						            <a href="cinepolisID/index.php" title="Descubre los beneficios de Cinépolis® ID" class="btn btnSend">Ir a mi perfil</a>
						            <div class="clear"></div>
						            <p class="puntosID cf"><span>Puntos Club Cinépolis®:</span><i>0.0</i></p>
						            <p class="puntosID cf"><span>Créditos CineCash®:</span><i>0.0</i></p>
						            <p class="cineFavorito"><span>Tu Cinépolis® favorito es:</span><i></i>
						            </p>
						            <p class="text-center">
						                <input type="submit" name="btnCerrarSesion" value="Cerrar sesión" id="btnCerrarSesion" class="btn btnCloseID" onclick="location.href='controladores/cinepolisID/cerrar_sesion.php';">
						            </p>
					        	</fieldset>
					        </div>
						</div>
					</div>

					<?php
				}
				else{
					?>
					<div class="col1">
						<div id="ctl14_pnlCinepolisIDMexico">
							<div id="ctl14_pnlAnonymousTemplate">
								<a href="#login" class="btnId abrirContent">
									<figure>
										<!--<img src="//static.cinepolis.com/img/icon-ID.png" width="43" height="42" alt="ID Cinépolis">-->
										<img src="../img/vistaCliente/icon-ID.png" width="43" height="42" alt="ID Cinépolis">
										<figcaption>Iniciar Sesión</figcaption>
									</figure>
								</a>
								<!--ENVIO-->
								<FORM method="post" action="controladores/cinepolisID/loginID.php" onsubmit="javascript:return WebForm_OnSubmit();" id="form1">
								<fieldset id="login" class="dropdown" style=""><h3>Ingresa tus datos</h3>
									<p class="textInput">
										<label for="txbCinepolisIdMaster" style="width: auto;">Correo electrónico</label>
										<input name="txbCinepolisIdMaster" type="email" id="txbCinepolisIdMaster" tabindex="4" autocomplete="off" title="email" required>
										<span id="ctl14_RequiredFieldValidator3" class="validacion" style="display:none;"></span>
										<span id="ctl14_RegularExpressionValidator4" class="validacion" style="display:none;"></span>
									</p>
									<p class="textInput">
										<label for="txbContrasenaMaster" class="accessAid">Contraseña</label>
										<input name="txbContrasenaMaster" type="password" id="txbContrasenaMaster" tabindex="5" autocomplete="off" value="" title="password" required>
										<span id="ctl14_RequiredFieldValidator2" style="display:none;"></span>
									</p>
									<input type="submit" name="btnEntrarMaster" value="Entrar a Cinépolis® ID" id="btnEntrarMaster" tabindex="6" class="btn btnSend">
									<div id="ctl14_ValidationSummary1" style="display:none;"></div>
									
									
									<p class="linksLogin">
										<a href="#" class="linkPassword" title="Recupera tu contraseña">¿Olvidaste tu contraseña?</a><a class="linkRegister" title="Registrate para Ingresar" href="id-registro.php">¿No estás registrado?</a>
									</p>
									<div class="conectar-redes">
										<p>Conectar con:</p>
										<ul class="row">
											<li class="col4">
												<input class="btn btnFaceConect" value="Facebook" tabindex="6" type="submit">
											</li>
											<li class="col4">
												<input type="submit" name="ctl00$ctl14$btnTwitterConnect" value="Twitter" id="ctl14_btnTwitterConnect" class="btn btnTwitterConect">
											</li>
											<li class="col4">
												<input class="btn btnPlusConnect" value="Google +" tabindex="7" type="submit">
											</li>
										</ul>
									</div>
									<p class="text-center linksLogin">
										<a href="#" data-video="../videocinepolisID/cinepolisid.mp4" data-modal="modal-12" title="Descubre los beneficios de Cinépolis® ID" class="btn btnTrailer">¿Qué es Cinépolis® ID?</a>
									</p>
								</fieldset>
							</FORM>
							</div>
						</div>
					</div>
					<?php
				}
			?>
		</div>

		<!--NAVEGACION MASTER-->
		<div id="navegacion_master" class="navegacion">
			<!--<div class="AbrirNav g1140 cf">-->
			<div class="AbrirNav g1024 cf">
				<div class="float-left navComp navComp--campaing cf">
					<a href="#menuNavega" id="btnAbrirNav" class="abrirContent navComp__link">
						<i class="icon-arrow-down"></i>Menú
					</a>
					<a href="http://goo.gl/sO3Lhe" class="navComp__link navComp__link--pe">Próximos estrenos</a>
					<a href="#" class="navComp__link">Preventas</a>
					<a href="#" class="navComp__link">Entra</a>
					<a href="#" target="_blank" class="navComp__link navComp__link--vr">
						<!--<img src="https://static.cinepolis.com/img/lg-cinepolis-vr.png" alt="Cinépolis Vr">-->
						<img src="img/vistaCliente/lg-cinepolis-vr.png" alt="Cinépolis Vr">
					</a>
				</div>
				<ul class="redesSociales float-right cf">
					<li class="redesSociales-item" style="display: none">
						<a href="#" title="Accesibilidad Cinépolis" data="Inclusite®"><i class="icon-inclusite"></i></a>
					</li>
					<li class="redesSociales-item">
						<a class="redesSociales-link icon-facebook" data-social="facebook" href="https://www.facebook.com/cinepolisonline" target="_blank" title="Facebook Cinépolis" data="Facebook"></a>
					</li>
					<li class="redesSociales-item">
						<a class="redesSociales-link icon-twitter" data-social="twitter" href="https://twitter.com/cinepolis" target="_blank" title="Twitter Cinépolis" data="Twitter"></a>
					</li>
					<li class="redesSociales-item">
						<a class="redesSociales-link icon-instagram" data-social="instagram" href="http://instagram.com/cinepolismx" target="_blank" title="Instagram Cinépolis®" data="Instagram"></a>
					</li>
					<li class="redesSociales-item">
						<a class="redesSociales-link icon-youtube" data-social="youtube" href="http://www.youtube.com/user/CinepolisOnline" target="_blank" title="YouTube Cinépolis" data="Youtube"></a>
					</li>
					<li class="redesSociales-item">
						<a class="redesSociales-link icon-google-plus-sign" data-social="google-plus" href="https://plus.google.com/117623056519961937698" target="_blank" title="Google-plus Cinépolis" data="Google+"></a>
					</li>
					<li class="redesSociales-item" style="">
						<a target="_blank" data-social="linkedin" href="https://www.linkedin.com/company/296080?trk=tyah&amp;trkInfo=clickedVertical%3Acompany%2CclickedEntityId%3A296080%2Cidx%3A2-1-5%2CtarId%3A1479233918211%2Ctas%3Acin%C3%A9" class="redesSociales-link icon-linkedin"></a>
					</li>
					<li class="redesSociales-item">
						<a class="redesSociales-link icon-mobile-phone" href="#" title="App Cinépolis" data="Apps Cinépolis®"></a>
					</li>
				</ul>
			</div>
			<div class="row navContent dropdown" id="menuNavega" style="">
				<div class="g1024 cf">
				<!--<div class="g960 cf">-->
					<nav class="links-a">
						<ul id="ListaSecciones">
							<li class="col2">
								<a href="#" target="_self"><span>Próximos estrenos</span>
									<figure>
										<img class="lazy" data-src="../img/vistaCliente/proximosEstrenos/menuDesplegable/201810312100541.jpg" alt="Próximos estrenos">
									</figure>
								</a>
							</li>
							<li class="col2">
								<a href="#" target="_self"><span>Muestras y Festivales</span>
									<figure>
										<img class="lazy" data-src="../img/vistaCliente/proximosEstrenos/menuDesplegable/201882317751515.jpg" alt="Muestras y Festivales">
									</figure>
								</a>
							</li>
							<li class="col2">
								<a href="#" target="_self"><span>Promociones</span>
									<figure>
										<img class="lazy" data-src="../img/vistaCliente/proximosEstrenos/menuDesplegable/201892718524953.jpg" alt="Promociones">
									</figure>
								</a>
							</li>
							<li class="col2">
								<a href="#" target="_self"><span>+Que Cine</span>
									<figure>
										<img class="lazy" data-src="../img/vistaCliente/proximosEstrenos/menuDesplegable/20181099756662.jpg" alt="+Que Cine">
									</figure>
								</a>
							</li>
							<li class="col2">
								<a href="#" target="_self"><span>Sala de Arte</span>
									<figure>
										<img class="lazy" data-src="../img/vistaCliente/proximosEstrenos/menuDesplegable/20181051589145.jpg" alt="Sala de Arte">
									</figure>
								</a>
							</li>
							<li class="col2">
								<a href="https://goo.gl/BFvXnD" target="_blank"><span>Ver películas en Klic</span>
									<figure>
										<img class="lazy" data-src="../img/vistaCliente/proximosEstrenos/menuDesplegable/201810810258582.jpg" alt="Ver películas en Klic">
									</figure>
								</a>
							</li>
							<li class="hidden cn-pr">
								<a href="#" target="_self">
									<span>Preventas</span>
								</a>
							</li>
							<li class="col3 hidden nuestrasMarcas">
								<a href="#"><span>Nuestras Marcas</span>
								</a>
							</li>
							<li class="hidden cn-vr">
								<a href="#" target="_blank"><span>Cinépolis<sup>®</sup> VR</span>
								</a>
							</li>
						</ul>
					</nav>
					<nav id="navMarcas">
						<ul class="marcas row">
							<li>
								<a href="#" class="btnRegresar hidden" style="display: none">
									<i class="icon-caret-left"></i>Regresar
								</a>
							</li>
							<li>
								<figure class="anim-jr">
									<a href="#" target="_blank" title="Salas JR"><span class="sequence animated-jr"></span></a>
								</figure>
							</li> 
							<li>
								<figure class="anim-vip">
									<a href="#" target="_blank" title="Cinépolis VIP®"><span class="sequence animated-vip"></span></a>
								</figure>
							</li> 
							<li>
								<figure class="anim-cdx">
									<a href="#" title="Sala 4DX"><span class="sequence animated-cdx"></span></a>
								</figure>
							</li> 
							<li>
								<figure class="anim-imax">
									<a href="#" title="IMAX"><span class="sequence animated-imax"></span></a>
								</figure>
							</li> 
							<li>
								<figure class="anim-xe">
									<a href="#" title="Cinépolis Macro XE®"><span class="sequence animated-xe"></span></a>
								</figure>
							</li> 
							<li>
								<figure class="anim-club">
									<a href="#" title="Club Cinépolis"><span class="sequence animated-club"></span></a>
								</figure>
							</li> 
							<li>
								<figure class="anim-sda">
									<a href="#" title="Sala De Arte"><span class="sequence animated-sda"></span></a>
								</figure>
							</li> 
							<li>
								<figure class="anim-cash">
									<a href="#" title="CineCash®"><span class="sequence animated-cash"></span></a>
								</figure>
							</li> 
							<li>
								<figure class="anim-funda">
									<a href="http://fundacioncinepolis.org/" target="_blank" title="Fundación Cinépolis"><span class="sequence animated-funda"></span></a>
								</figure>
							</li> 
							<li>
								<figure class="anim-park">
									<a href="#" title="Cinema Park"><span class="sequence animated-park"></span></a>
								</figure>
							</li> 
							<li>
								<figure class="anim-garantia">
									<a href="#" title="Garantía Cinépolis®"><span class="sequence animated-garantia"></span></a>
								</figure>
							</li> 
							<li>
								<figure class="anim-vr"> 
									<a href="#" target="blank" title="Cinépolis® VR"><span class="sequence animated-vr"></span> </a>
								</figure>
							</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</header>

	<div id="nav-spacer"></div>
</body>
</html>