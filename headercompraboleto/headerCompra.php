<?php
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<!-- HEADER -->
	<header>
		<!-- TOP HEADER -->
		<div class="contentBusqueda g960 cf">
			 
			<h1 class="col3"><a href="index.php" title="Cinépolis"><img src="./archivosCompraBoletos/lg-cinepolis.png" alt="Cinépolis"></a></h1>

			<div class="col8 filtroBusqueda" id="busqueda">
				<div class="col5">
					<div class="selectBlanco">
						   <div class="selectorA" id="uniform-ddlCiudad" style="width: 261px; background: url(../Imagenes/icon-select-form-gris.png) no-repeat 100% 0; border-radius: 5px; background-color: #fff;">
						   	<!--<span style="width: 249.008px; user-select: none;">Selecciona una ciudad</span>-->
						   	<select name="ddlCiudad" onchange="loadComplejo()" id="ddlCiudad" class="combo">
									<!--<option value="Selecciona una ciudad" selected="selected" clave="0">Selecciona una ciudad</option>-->
									<?php echo "<option value='$nombreciudadHeader' selected='selected' clave='0'>$nombreciudadHeader</option>";?>
							</select></div>
					</div>
				</div>
				<div class="col5">
					<div class="selectBlanco">
						 <div class="selectorA" id="uniform-ddlComplejo" style="width: 261px; background: url(../Imagenes/icon-select-form-gris.png) no-repeat 100% 0; border-radius: 5px; background-color: #fff;">
						 	<!--<span style="width: 182.008px; user-select: none;">Selecciona un cine</span>-->
						 	<select name="ddlComplejo" onchange="SelectSession(1)" id="ddlComplejo" class="combo">
						 		<!--<option value="0">Selecciona un cine</option>-->
						 		<?php echo "<option value='$nombresucursalHeader' selected='selected' clave='0'>$nombresucursalHeader</option>";?>
						 		</select>
						 	</div>
					</div>
				</div>
				<div class="col2">
					 
					 <input name="" type="button" value="VER CARTELERA" onclick="SelectSession(1)" class="btn btnEnviar">
				</div>
			</div>
			<div class="col1">
				 
				<fieldset id="login" class="dropdown">
					<h3>Ingresa tus datos</h3>
					<p class="textInput">
						<label for="email">Correo electrónico</label>
						<input id="email" name="email" value="" title="email" tabindex="4" type="email">
					</p>
					<p class="textInput">
						<label for="password" class="accessAid">Contrase�a</label>
						<input id="password" name="password" value="" title="password" tabindex="5" type="password">
					</p>
					
					<input class="btn btnSend" value="Entrar a Cinépolis® ID" tabindex="6" type="submit">
					
					<p class="linksLogin">
						<a href="https://inetvis.cineticket.com.mx/compra/visSelectTickets.aspx?tkn=&amp;cinemacode=954&amp;txtSessionId=10261&amp;distributor=Fox&amp;originalTitle=Bohemian%20Rhapsody%20(Estados%20Unidos,%202018)&amp;language=&amp;genre=DRAMA&amp;rating=B&amp;director=Bryan%20Singer&amp;protagonist=Allen%20Leech&amp;_ga=2.169038049.1153251463.1541480097-231010952.1539140855#" class="linkPassword" title="Recupera tu contrase�a">�Olvidaste tu contrase�a?</a>
						<a class="linkRegister" title="Registrate para Ingresar" href="https://inetvis.cineticket.com.mx/compra/visSelectTickets.aspx?tkn=&amp;cinemacode=954&amp;txtSessionId=10261&amp;distributor=Fox&amp;originalTitle=Bohemian%20Rhapsody%20(Estados%20Unidos,%202018)&amp;language=&amp;genre=DRAMA&amp;rating=B&amp;director=Bryan%20Singer&amp;protagonist=Allen%20Leech&amp;_ga=2.169038049.1153251463.1541480097-231010952.1539140855#">�No estás registrado?</a>
					</p>

					<input class="btn btnFaceConect" value="O accede con Facebook" tabindex="6" type="submit">
					<p class="text-center linksLogin">
						<a href="https://inetvis.cineticket.com.mx/compra/visSelectTickets.aspx?tkn=&amp;cinemacode=954&amp;txtSessionId=10261&amp;distributor=Fox&amp;originalTitle=Bohemian%20Rhapsody%20(Estados%20Unidos,%202018)&amp;language=&amp;genre=DRAMA&amp;rating=B&amp;director=Bryan%20Singer&amp;protagonist=Allen%20Leech&amp;_ga=2.169038049.1153251463.1541480097-231010952.1539140855#" title="Descubre los beneficios de Cinépolis® ID">�Qué es Cinépolis ID?</a>
					</p>
				</fieldset>
			</div>
			<div id="btnBusqueda">
				<a href="https://inetvis.cineticket.com.mx/compra/visSelectTickets.aspx?tkn=&amp;cinemacode=954&amp;txtSessionId=10261&amp;distributor=Fox&amp;originalTitle=Bohemian%20Rhapsody%20(Estados%20Unidos,%202018)&amp;language=&amp;genre=DRAMA&amp;rating=B&amp;director=Bryan%20Singer&amp;protagonist=Allen%20Leech&amp;_ga=2.169038049.1153251463.1541480097-231010952.1539140855#busqueda" title="Buscar Cartelera" class="abrirContent"><i class="icon-search"></i></a>
			</div>
		</div>
		<!-- NAVEGACIÓN -->
		<div class="navegacion">
			<div class="navContent g960 cf dropdown" id="menuNavega">
				<nav>					
				</nav>
				<nav>					
				</nav>
				
			</div>
			<div class="AbrirNav g960 cf">
				<a href="https://inetvis.cineticket.com.mx/compra/visSelectTickets.aspx?tkn=&amp;cinemacode=954&amp;txtSessionId=10261&amp;distributor=Fox&amp;originalTitle=Bohemian%20Rhapsody%20(Estados%20Unidos,%202018)&amp;language=&amp;genre=DRAMA&amp;rating=B&amp;director=Bryan%20Singer&amp;protagonist=Allen%20Leech&amp;_ga=2.169038049.1153251463.1541480097-231010952.1539140855#menuNavega" id="btnAbrirNav" class="col6 abrirContent" style="display:none">
					 
				</a>
				<ul class="redesSociales col6">
					<li>
						<a href="http://www.cinepolis.com/aplicaciones-moviles/" target="_blank" title="App Cinépolis" data="Apps Cinépolis®">
							<i class="icon-mobile-phone"></i>
						</a>
					</li>
					<li>
						<a href="http://www.youtube.com/cinepolisonline" target="_blank" title="YouTube Cinépolis" data="Youtube">
							<i class="icon-youtube"></i>
						</a>
					</li>
					<li>
						<a href="https://plus.google.com/+Cin%C3%A9polis/posts" target="_blank" title="Google-plus Cinépolis" data="Google+">
							<i class="icon-google-plus-sign"></i>
						</a>
					</li>
					<li>
						<a href="https://twitter.com/cinepolis" target="_blank" title="Twitter Cinépolis" data="Twitter">
							<i class="icon-twitter"></i>
						</a>
					</li>
					<li>
						<a href="https://www.facebook.com/cinepolisonline" target="_blank" title="Facebook Cinépolis" data="Facebook">
							<i class="icon-facebook"></i>
						</a>
					</li>
					<li>
						<a href="https://inetvis.cineticket.com.mx/compra/visSelectTickets.aspx?tkn=&amp;cinemacode=954&amp;txtSessionId=10261&amp;distributor=Fox&amp;originalTitle=Bohemian%20Rhapsody%20(Estados%20Unidos,%202018)&amp;language=&amp;genre=DRAMA&amp;rating=B&amp;director=Bryan%20Singer&amp;protagonist=Allen%20Leech&amp;_ga=2.169038049.1153251463.1541480097-231010952.1539140855#" target="_blank" title="Accesibilidad Cinépolis" data="Inclusite®">
							<i class="icon-inclusite"></i>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</header>
	<div id="nav-spacer"></div>
	<script type="text/javascript" language="javascript" src="./archivosCompraBoletos/top.js.descarga"></script>
	<!-- Inicio proceso de compra -->
	
	<!-- Fin de proceso de compra -->
	


</body>
</html>