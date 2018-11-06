<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link href="../../css/vistasCliente/master.css" rel='stylesheet' type='text/css' />
	<link href="../../css/vistasCliente/master2.css" rel='stylesheet' type='text/css' />
	<link href="../../css/vistasCliente/master3.css" rel='stylesheet' type='text/css' />

</head>
<body>


<footer>
	<div><!--<ul class="g960 cf">-->
		<ul class="g1024 cf">
			<li class="col6 catalogoPeliculas">
				<h3>CATÁLOGO DE PELÍCULAS</h3>

				<div class="sandbox"><select id="selectPelicula" class="movies selectized" placeholder="Busca una película" tabindex="-1" style="display: none;">
					<option value="" selected="selected"></option></select>

					<!--<div class="selectize-dropdown movies single">-->
						<!--<div class="selectize-input items not-full">
							<input type="text" autocomplete="off" tabindex="" placeholder="Busca una película" style="width: 114px;">
						</div>-->

						<div class="selectize-dropdown movies single" style="display: none; width: 456px; top: 36px; left: 0px;">

							<div class="selectize-dropdown-content">
								<input type="text" autocomplete="off" tabindex="" placeholder="Busca una película" style="width: 114px;">
							</div>
						</div>
					<!--</div>-->
				</div>
			</li>

			<li class="col3">
				
			</li>
			<li class="col3" id="opcionPais">
				<h3>CAMBIAR DE PAÍS</h3>
				<div class="selectPais">
					<ul class="submenu" style="z-index: 9999; display: none;">
						<li>
							<a href="http://www.cinepolisusa.com/">Estados Unidos</a>
						</li>
						<li>
							<a href="http://www.cinepolis.com/">México</a>
						</li>
						<li><a href="http://www.cinepolisindia.com/">India</a>
						</li>
						<li><a href="http://www.cinepolis.co.cr">Costa Rica</a>
						</li>
						<li><a href="http://www.cinepolis.com.sv">El Salvador</a>
						</li>
						<li><a href="http://www.cinepolis.com.gt">Guatemala</a>
						</li>
						<li><a href="http://www.cinepolis.com.hn">Honduras</a>
						</li>
						<li><a href="http://www.cinepolis.com.co">Colombia</a>
						</li>
						<li><a href="http://www.cinepolis.com.pa">Panamá</a>
						</li>
						<li><a href="http://www.cinepolis.com.pe">Perú</a>
						</li>
						<li><a href="http://cinehoyts.cl/">Chile</a>
						</li>
						<li><a href="http://yelmocines.es/">España</a>
						</li>
						<li><a href="http://www.cinepolis.com.br">Brasil</a>
						</li>
					</ul>
					<a href="javascript:void(0);" id="lnkSitios" class="btnPais cf"></a>
					<a href="javascript:void(0);" class="btnPais cf">
						<i class="icon-caret-up"></i>
						<span>México</span>
						<i class="float-right"><img src="https://static.cinepolis.com/img/1/2018103163152490.png" alt="México"></i>
					</a>
				</div>
			</li>
		</ul>
	</div>
	
	<!--<nav id="navMarcasFooter" class="cont-marcas g960 cf hideMovil">-->
	<nav id="navMarcasFooter" class="cont-marcas g1024 cf hideMovil">
		<ul class="marcas row">
			<li>
				<figure class="anim-jr">
					<a href="/sala-junior" target="_blank" title="Salas JR">
						<span class="sequence animated-jr"></span>
					</a>
				</figure>
			</li> 

			<li>
				<figure class="anim-vip">
					<a href="/vip" target="_blank" title="Cinépolis VIP®">
						<span class="sequence animated-vip"></span>
					</a>
				</figure>
			</li> 

			<li>
				<figure class="anim-cdx">
					<a href="/4dx" title="Sala 4DX">
						<span class="sequence animated-cdx"></span>
					</a>
				</figure>
			</li> 

			<li>
				<figure class="anim-imax">
					<a href="/imax" title="IMAX">
						<span class="sequence animated-imax"></span>
					</a>
				</figure>
			</li> 

			<li>
				<figure class="anim-xe">
					<a href="/macro-xe" title="Cinépolis Macro XE®">
						<span class="sequence animated-xe"></span>
					</a>
				</figure>
			</li> 

			<li>
				<figure class="anim-club">
					<a href="/club-cinepolis" title="Club Cinépolis">
						<span class="sequence animated-club"></span>
					</a>
				</figure>
			</li> 

			<li>
				<figure class="anim-sda">
					<a href="/sala-de-arte" title="Sala De Arte">
						<span class="sequence animated-sda"></span>
					</a>
				</figure>
			</li> 

			<li>
				<figure class="anim-cash">
					<a href="/id" title="CineCash®">
						<span class="sequence animated-cash"></span>
					</a>
				</figure>
			</li> 

			<li>
				<figure class="anim-funda">
					<a href="http://fundacioncinepolis.org/" target="_blank" title="Fundación Cinépolis">
						<span class="sequence animated-funda"></span>
					</a>
				</figure>
			</li> 

			<li>
				<figure class="anim-park">
					<a href="/cinema-park" title="Cinema Park">
						<span class="sequence animated-park"></span>
					</a>
				</figure>
			</li> 

			<li>
				<figure class="anim-garantia">
					<a href="/garantia-cinepolis" title="Garantía Cinépolis®">
						<span class="sequence animated-garantia"></span>
					</a>
				</figure>
			</li> 

			<li>
				<figure class="anim-vr"> 
					<a href="/realidad-virtual" target="blank" title="Cinépolis® VR">
						<span class="sequence animated-vr"></span> 
					</a>
				</figure>
			</li>
		</ul>
	</nav>

	<!--<div class="g960 cf navFooter">-->
	<div class="g1024 cf navFooter">
		<div class="col3 hideMovil">
			<ul id="ListaCarteleraFooter">
				<li>
					<h3>Cartelera</h3>
				</li>
					<li>
						<a target="_self" href="/preventas">Preventas</a>
					</li>

					<li>
						<a target="_self" href="/garantia-cinepolis">Garantía Cinépolis®</a>
					</li>

					<li>
						<a target="_self" href="/muestras-y-festivales">Muestras y festivales</a>
					</li>

					<li>
						<a target="_self" href="/mas-que-cine">+ Que Cine</a>
					</li>

					<li>
						<a target="_self" href="/proximos-estrenos">Próximos estrenos</a>
					</li>

					<li>
						<a target="_self" href="/cumple-de-pelicula">Cumpleaños de Película</a>
					</li>
				</ul>
			</div>

			<div class="col3 hideMovil">
				<ul id="ListaQuienes" class="hideMovil">
					<li>
						<h3>¿Quiénes somos?</h3>
					</li>

					<li>
						<a target="_self" href="/proveedores/">Proveedores</a>
					</li>

					<li>
						<a target="_blank" href="https://goo.gl/t7cmjv">Trabaja en Cinépolis®</a>
					</li>

					<li>
						<a target="_blank" href="https://intranet.cinepolis.com/SitePages/Bienvenida.aspx">Corporativo</a>
					</li>

					<li>
						<a target="_self" href="/proximas-aperturas">Próximas Aperturas</a>
					</li>

					<li>
						<a target="_self" href="/ventas-corporativas">Ventas Corporativas</a>
					</li>
				</ul>

			</div>

			<div class="col3">
				<ul id="ListaLegalesFooter">
					<li>
						<h3>Legales</h3>
					</li>

					<li>
						<a target="_blank" href="http://www.cinepolis.com.mx/_html/terminos-condiciones-generales.html">Términos y condiciones</a>
					</li>

					<li>
						<a target="_blank" href="http://www.cinepolis.com.mx/PDF/aviso-de-privacidad-cinepolis.pdf">Aviso de privacidad</a>
					</li>

					<li>
						<a target="_blank" href="http://cinepolis.com/pdf/Terminos-y-condiciones-CINECASH.pdf">Términos Cinecash</a>
					</li>
				</ul>
			</div>

			<div class="col3">
				<ul id="ListaContacto" class="contacto">
					<li>
						<h3>Contacto</h3>
					</li>
					
					<li>
						<a href="http://webportal.edicomgroup.com/customers/cinepolis/" target="_blank"><i class="icon-factura float-left"></i>Facturación electrónica</a>
					</li>

					<li>
						<a href="http://200.38.221.37/ct/web.htm" target="_blank"><i class="icon-contacto float-left"></i>Déjanos tus comentarios</a>
					</li>

					<li>
						<a href="http://www.hellohelp.net/hellohelp/userlogin.php?custid=880&amp;langid=1710&amp;referer=cineticket&amp;dni=&amp;un=" onclick="dataLayer.push({'event': 'chatfooter'});window.open('http://www.hellohelp.net/hellohelp/userlogin.php?custid=880&amp;langid=1710&amp;referer=cineticket&amp;dni=&amp;un=', 'newwindow', 'width=300, height=500'); return false;" target="_blank"><i class="icon-comment float-left"></i>Chatea con los expertos</a>
					</li>

					<li>
						<a href="#" class="lnkPhone" style="cursor: default;"><i class="icon-phone float-left"></i><span>01 552 122 60 60</span></a>
					</li>
				</ul>
			</div>
		</div>

		<!--<ul id="ListaReconocimientos" class="logosReconocimientos g960">-->
		<ul id="ListaReconocimientos" class="logosReconocimientos g1024">
			<li>
				<a target="_blank" href="http://ecommerceaward.org/los-ganadores-del-ecommerce-award-mexico-2018/" title="eCommerce">
					<img class="receCommerce" src="https://static.cinepolis.com/img/1/2018320162638955.png" alt="eCommerce">
				</a>
			</li>

			<li>
				<a target="_blank" href="http://www.coca-cola.com.mx" title="Coca-Cola">
					<img class="recCoca-Cola" src="https://static.cinepolis.com/img/1/201412917445996.png" alt="Coca-Cola">
				</a>
			</li>

			<li>
				<a target="_blank" href="http://www.comscore.com/esl/" title="ComScore">
					<img class="recComScore" src="https://static.cinepolis.com/img/1/20141291751119.png" alt="ComScore">
				</a>
			</li>

			<li>
				<a target="_blank" href="http://www.amipci.org.mx/" title="AMIPCI">
					<img class="recAMIPCI" src="https://static.cinepolis.com/img/1/201412917543139.png" alt="AMIPCI">
				</a>
			</li>

			<li>
				<img class="recExpansionSuperEmpresas" src="https://static.cinepolis.com/img/1/20141291768785.png" alt="Expansión Súper Empresas">
			</li>

			<li>
				<img class="recESR" src="https://static.cinepolis.com/img/1/20141291763359.png" alt="ESR">
			</li>
		</ul>

		<div class="row copyright">
			<!--<div class="g960 cf">-->
			<div class="g1024 cf">
				<p class="float-left"><small>Contenido del sitio 2014©&nbsp;&nbsp;Cinépolis® de México, S.A. de C.V.</small></p>
				<p class="float-right">Desarrollado por <a href="http://www.ia.com.mx" target="_blank">IA Interactive</a></p>
			</div>
		</div>
	</footer>

</body>
</html>