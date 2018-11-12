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
			 
			<h1 class="col3"><a href="index.php" title="Cinépolis"><img src="./Cinepolis Online_files/lg-cinepolis.png" alt="Cinépolis"></a></h1>

			<div class="col8 filtroBusqueda" id="busqueda">
				<div class="col5">
					<div class="selectBlanco">
						   <div class="selector" id="uniform-ddlCiudad" style="width: 261px;"><span style="width: 249.008px; user-select: none;">Selecciona una ciudad</span><select name="ddlCiudad" onchange="loadComplejo()" id="ddlCiudad" class="combo">
									<option value="Selecciona una ciudad" selected="selected" clave="0">Selecciona una ciudad</option>
									<option value="0" clave="acapulco">Acapulco</option>
									<option value="1" clave="aguascalientes">Aguascalientes</option>
									<option value="2" clave="apizaco">Apizaco</option>
									<option value="3" clave="cabo-san-lucas">Cabo San Lucas</option>
									<option value="4" clave="cadereyta">Cadereyta</option>
									<option value="5" clave="campeche">Campeche</option>
									<option value="6" clave="cancun">Cancún</option>
									<option value="7" clave="cd-acuna">Cd. Acuña</option>
									<option value="8" clave="cd-cuauhtemoc">Cd. Cuauhtémoc</option>
									<option value="9" clave="cd-del-carmen">Cd. del Carmen</option>
									<option value="10" clave="cd-hidalgo">Cd. Hidalgo</option>
									<option value="11" clave="cd-juarez">Cd. Juárez</option>
									<option value="12" clave="cd-nezahualcoyotl">Cd. Nezahualcóyotl</option>
									<option value="13" clave="cd-obregon">Cd. Obregón</option>
									<option value="14" clave="cd-victoria">Cd. Victoria</option>
									<option value="15" clave="celaya">Celaya</option>
									<option value="16" clave="chalco-ixtapaluca">Chalco - Ixtapaluca</option>
									<option value="17" clave="chetumal">Chetumal</option>
									<option value="18" clave="chihuahua">Chihuahua</option>
									<option value="19" clave="chilpancingo">Chilpancingo</option>
									<option value="20" clave="chimalhuacan">Chimalhuacán</option>
									<option value="21" clave="cienega-de-flores">Ciénega de Flores</option>
									<option value="22" clave="coacalco">Coacalco</option>
									<option value="23" clave="coatzacoalcos">Coatzacoalcos</option>
									<option value="24" clave="colima">Colima</option>
									<option value="25" clave="comalcalco">Comalcalco</option>
									<option value="26" clave="comitan">Comitán</option>
									<option value="27" clave="cordoba">Córdoba</option>
									<option value="28" clave="cozumel">Cozumel</option>
									<option value="29" clave="cuautla">Cuautla</option>
									<option value="30" clave="cuernavaca">Cuernavaca</option>
									<option value="31" clave="culiacan">Culiacán</option>
									<option value="32" clave="df-centro">D.F. Centro</option>
									<option value="33" clave="df-norte-y-am">D.F. Norte y A.M.</option>
									<option value="34" clave="df-oriente">D.F. Oriente</option>
									<option value="35" clave="df-poniente">D.F. Poniente</option>
									<option value="36" clave="df-sur">D.F. Sur</option>
									<option value="37" clave="durango">Durango</option>
									<option value="38" clave="ecatepec">Ecatepec</option>
									<option value="39" clave="emiliano-zapata">Emiliano Zapata</option>
									<option value="40" clave="ensenada">Ensenada</option>
									<option value="41" clave="guadalajara-centro">Guadalajara Centro</option>
									<option value="42" clave="guadalajara-norte">Guadalajara Norte</option>
									<option value="43" clave="guadalajara-norte-poniente">Guadalajara Norte - Poniente</option>
									<option value="44" clave="guadalajara-oriente">Guadalajara Oriente</option>
									<option value="45" clave="guadalajara-poniente">Guadalajara Poniente</option>
									<option value="46" clave="guadalajara-sur">Guadalajara Sur</option>
									<option value="47" clave="hermosillo">Hermosillo</option>
									<option value="48" clave="hidalgo-del-parral">Hidalgo del Parral</option>
									<option value="49" clave="iguala">Iguala</option>
									<option value="50" clave="irapuato">Irapuato</option>
									<option value="51" clave="jiutepec">Jiutepec</option>
									<option value="52" clave="jojutla">Jojutla</option>
									<option value="53" clave="la-paz">La Paz</option>
									<option value="54" clave="la-piedad">La Piedad</option>
									<option value="55" clave="lazaro-cardenas">Lázaro Cárdenas</option>
									<option value="56" clave="leon">León</option>
									<option value="57" clave="linares">Linares</option>
									<option value="58" clave="macuspana">Macuspana</option>
									<option value="59" clave="manzanillo">Manzanillo</option>
									<option value="60" clave="martinez-de-la-torre">Martínez de la Torre</option>
									<option value="61" clave="matamoros">Matamoros</option>
									<option value="62" clave="mazatlan">Mazatlán</option>
									<option value="63" clave="merida">Mérida</option>
									<option value="64" clave="mexicali">Mexicali</option>
									<option value="65" clave="minatitlan">Minatitlán</option>
									<option value="66" clave="montemorelos">Montemorelos</option>
									<option value="67" clave="monterrey-cumbres">Monterrey (Cumbres)</option>
									<option value="68" clave="monterrey-centro">Monterrey Centro</option>
									<option value="69" clave="monterrey-norte">Monterrey Norte</option>
									<option value="70" clave="monterrey-oriente">Monterrey Oriente</option>
									<option value="71" clave="monterrey-sendero">Monterrey Sendero</option>
									<option value="72" clave="monterrey-sur">Monterrey Sur</option>
									<option value="73" clave="morelia">Morelia</option>
									<option value="74" clave="nogales">Nogales</option>
									<option value="75" clave="nuevo-laredo">Nuevo  Laredo</option>
									<option value="76" clave="nuevo-vallarta">Nuevo Vallarta</option>
									<option value="77" clave="oaxaca">Oaxaca</option>
									<option value="78" clave="orizaba">Orizaba</option>
									<option value="79" clave="pachuca">Pachuca</option>
									<option value="80" clave="perinorte-cuautitlan">Perinorte - Cuautitlán</option>
									<option value="81" clave="playa-del-carmen">Playa del Carmen</option>
									<option value="82" clave="puebla">Puebla</option>
									<option value="83" clave="puerto-vallarta">Puerto Vallarta</option>
									<option value="84" clave="queretaro">Querétaro</option>
									<option value="85" clave="reynosa">Reynosa</option>
									<option value="86" clave="rosarito">Rosarito</option>
									<option value="87" clave="sahuayo">Sahuayo</option>
									<option value="88" clave="salamanca">Salamanca</option>
									<option value="89" clave="saltillo">Saltillo</option>
									<option value="90" clave="san-cristobal-de-las-c">San Cristóbal de las C</option>
									<option value="91" clave="san-francisco-del-rincon">San Francisco del Rincón</option>
									<option value="92" clave="san-jose-del-cabo">San José del Cabo</option>
									<option value="93" clave="san-juan-del-rio">San Juan del Río</option>
									<option value="94" clave="san-l-rio-colorado">San L Río Colorado</option>
									<option value="95" clave="san-luis-potosi">San Luis Potosí</option>
									<option value="96" clave="silao">Silao</option>
									<option value="97" clave="tampico">Tampico</option>
									<option value="98" clave="tapachula">Tapachula</option>
									<option value="99" clave="taxco">Taxco</option>
									<option value="100" clave="tecamac">Tecámac</option>
									<option value="101" clave="tecate">Tecate</option>
									<option value="102" clave="tehuacan">Tehuacán</option>
									<option value="103" clave="tepeji-del-rio">Tepeji del Río</option>
									<option value="104" clave="tijuana">Tijuana</option>
									<option value="105" clave="tlajomulco">Tlajomulco</option>
									<option value="106" clave="tlaxcala">Tlaxcala</option>
									<option value="107" clave="toluca">Toluca</option>
									<option value="108" clave="torreon">Torreón</option>
									<option value="109" clave="tuxpan">Tuxpan</option>
									<option value="110" clave="tuxtla-gutierrez">Tuxtla Gutiérrez</option>
									<option value="111" clave="uriangato">Uriangato</option>
									<option value="112" clave="uruapan">Uruapan</option>
									<option value="113" clave="veracruz">Veracruz</option>
									<option value="114" clave="villahermosa">Villahermosa</option>
									<option value="115" clave="xalapa">Xalapa</option>
									<option value="116" clave="zacatecas">Zacatecas</option>
									<option value="117" clave="zamora">Zamora</option>
                                    <!--<option value="arraijan-panama" clave="arraijan-panama">Zamora PA</option>-->
							</select></div>
					</div>
				</div>
				<div class="col5">
					<div class="selectBlanco">
						 <div class="selector" id="uniform-ddlComplejo" style="width: 194px;"><span style="width: 182.008px; user-select: none;">Selecciona un cine</span><select name="ddlComplejo" onchange="SelectSession(1)" id="ddlComplejo" class="combo">
						 <option value="0">Selecciona un cine</option>
                                    </select></div>
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
	<script type="text/javascript" language="javascript" src="./Cinepolis Online_files/top.js.descarga"></script>
	<!-- Inicio proceso de compra -->
	
	<!-- Fin de proceso de compra -->
	


</body>
</html>