<?php 
	session_start();
	if(!isset($_SESSION['id_cinepolisid'])) 
	{
		$id_cinepolisid = -1;
	}
	else{
		$id_cinepolisid = $_SESSION['id_cinepolisid'];
	}

	$_SESSION['id_horario'] = 0;
	$_SESSION['edad3era'] = 0;
	$_SESSION['adulto'] = 0;
	$_SESSION['ninos'] = 0;
	$_SESSION['precioTotal3raEdad'] = 0;
	$_SESSION['precioTotalAdulto'] = 0;
	$_SESSION['precioTotalNino'] = 0;
	$_SESSION['id_tarjeta'] = 0;
	$_SESSION['total'] = 0;
	$_SESSION['nombre'] = "";
	$_SESSION['ciudad'] = "";
	$_SESSION['asientos3raedad'] = "";
	$_SESSION['asientosAdultos'] = "";
	$_SESSION['asientosNinos'] = "";

	$id_horario = 0;
	$Cedad3era = 0;
	$Cadulto = 0;
	$Cninos = 0;
	$precioTotal3raEdad = 0;
	$precioTotalAdulto = 0;
	$precioTotalNino = 0;
	$id_tarjeta = 0;
	$PrecioTotal = 0;
	$nombreciudadHeader = "";
	$nombresucursalHeader = "";
?>
<!DOCTYPE html>
<html>
<head>
	<link href="../css/vistasCliente/master.css" rel='stylesheet' type='text/css' />
	<link href="../css/vistasCliente/master2.css" rel='stylesheet' type='text/css' />
	<link href="../css/vistasCliente/master3.css" rel='stylesheet' type='text/css' />
	<link href="../css/vistasCliente/master4.css" rel='stylesheet' type='text/css' />
	<link href="../css/vistasCliente/Master5-1339141376.css" rel='stylesheet' type='text/css' />
	<link href="../css/vistasCliente/Master6-2006319605.css" rel='stylesheet' type='text/css' />
	<link href="../css/vistasCliente/estiloSelect.css" rel='stylesheet' type='text/css' />

	<!--EMPEZAR-->
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="author" content="IA Interactive">
	<meta name="copyright">
	<meta name="viewport" content="initial-scale=1.0, width=device-width, maximum-scale=1.0">


<!-- localhost:31852-->
<!-- beta perfil-->
<meta id="IdGoogle" name="google-signin-clientid" content="689027481079-oi4u1d79ltn3kigduev8glu0ah0nreon.apps.googleusercontent.com">
<!--stage perfil-->
<meta name="google-signin-scope" content="https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/plus.profile.emails.read">
<meta name="google-signin-cookiepolicy" content="single_host_origin">

<!--<link rel="icon" type="image/x-icon" href="https://static.cinepolis.com/favicon.ico">-->
<link rel="icon" type="image/x-icon" href="../img/vistaCliente/iconos/favicon.ico">

<!--<link rel="apple-touch-icon-precomposed" href="https://static.cinepolis.com/img/logo-icons/icon-57x57.png">-->
<link rel="apple-touch-icon-precomposed" href="../img/vistaCliente/icon-57x57.png">

<!--<link rel="apple-touch-icon-precomposed" sizes="72x72" href="https://static.cinepolis.com/img/logo-icons/icon-72x72.png">-->
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="../img/vistaCliente/icon-72x72.png">
<!--<link rel="apple-touch-icon-precomposed" sizes="114x114" href="https://static.cinepolis.com/img/logo-icons/icon-114x114.png">-->
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="../img/vistaCliente/icon-114x114.png">

<meta name="description" content="Consulta la cartelera, horarios, estrenos, preventas y promociones que tenemos para ti.">
<meta name="keywords" content="Cine, Cinépolis, Película, página de Cinépolis, Cartelera, Sinópsis, Trailers, Estrenos, Actores, funciones de cinépolis">
<link rel="alternate" href="cinepolis://action?action=cartelera">
<link href="../js/vistaCliente/32519680" rel="stylesheet" type="text/css">
<link href="../js/vistaCliente/493373719" rel="stylesheet">
<link href="../css/vistasCliente/add-encuesta.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../js/vistaCliente/-1339141376">
<!-- Scripts-->
<!--<script type="text/javascript" async="" src="http://www.google-analytics.com/plugins/ua/ec.js"></script>-->
<script type="text/javascript" async="" src="../js/vistaCliente/ec.js"></script>

<!--<script type="text/javascript" async="" src="https://www.google-analytics.com/gtm/js?id=GTM-KX39WKQ&amp;t=gtm5&amp;cid=231010952.1539140855"></script>-->
<script type="text/javascript" async="" src="../js/vistaCliente/js.js"></script>

<!--<script src="http://script.crazyegg.com/pages/scripts/0012/6530.js?427636" async="" type="text/javascript"></script>-->
<script src="" async="" type="text/javascript"></script>

<!--<script async="" src="//static.ads-twitter.com/uwt.js"></script>-->
<script async="" src="../js/vistaCliente/uwt.js"></script>


<!--<script async="" src="http://b.scorecardresearch.com/beacon.js"></script>-->
<script async="" src="../js/vistaCliente/beacon.js"></script>

<script type="text/javascript" async="" src="../js/vistaCliente/analytics.js"></script>
<!--<script type="text/javascript" async="" src="http://www.google-analytics.com/analytics.js"></script>-->


<!--<script async="" src="//www.googletagmanager.com/gtm.js?id=GTM-M66T72"></script>-->
<script async="" src="../js/vistaCliente/gtm.js"></script>


<!--<script async="" src="https://www.googletagmanager.com/gtm.js?id=GTM-KDPVQPJ"></script>-->
<script async="" src="../js/vistaCliente/gtms.js"></script>

<!--FUNCIONAR EL MENU slide-->
<script src="../js/vistaCliente/1676903877" type="text/javascript"></script>

<script src="../scripts/jquery-nicescroll.js"></script>

<script src="../scripts/postscribe.js" type="text/javascript"></script>
<!--<script src="https://www.googletagservices.com/tag/js/gpt.js"></script>-->
<script src="../js/vistaCliente/gpt.js"></script>
<!--<script id="gpt-impl-0.08857618998925232" src="https://securepubads.g.doubleclick.net/gpt/pubads_impl_264.js"></script>-->
<script id="gpt-impl-0.08857618998925232" src="../js/vistaCliente/pubads_impl_264.js"></script>

<!--<link rel="preload" href="https://adservice.google.com.mx/adsid/integrator.sync.js?domain=www.cinepolis.com" as="script">-->
<link rel="preload" href="../js/vistaCliente/integrator1.sync.js" as="script">
<!--<script src="https://adservice.google.com.mx/adsid/integrator.sync.js?domain=www.cinepolis.com"></script>-->
<script src="../js/vistaCliente/integrator2.sync.js"></script>


<script>processGoogleTokenSync({"newToken":"FBS"},5);</script>
<script>var googletag = googletag || {};
                googletag.cmd = googletag.cmd || [];</script>
<script>googletag.cmd.push(function() {
  slot1 = googletag.defineSlot('/21703872347/MX-Front/MX-Front-BI', [460, 251], 'div-gpt-ad-1525880352771-0').addService(googletag.pubads());
  slot2 = googletag.defineSlot('/21703872347/MX-Front/MX-Front-BIR', [300, 250], 'div-gpt-ad-1525880352771-1').addService(googletag.pubads());
  slot3 = googletag.defineSlot('/21703872347/MX-Front/MX-Front-LB', [728, 90], 'div-gpt-ad-1525880352771-2').addService(googletag.pubads());
  slot4 = googletag.defineSlot('/21703872347/MX-Front/MX-Front-MR', [300, 250], 'div-gpt-ad-1525880352771-3').addService(googletag.pubads());
  slot5 = googletag.defineSlot('/21703872347/MX-Front/MX-Front-SS', [120, 600], 'div-gpt-ad-1525880352771-4').addService(googletag.pubads());
  googletag.pubads().disableInitialLoad();
  googletag.pubads().enableSingleRequest();
  googletag.enableServices();
  });
 </script>
<script type="text/javascript">$( document ).ready(function() {
      var isMobile = {
          any: function() {
                return navigator.userAgent.match(/Android|BlackBerry|iPhone|iPad|iPod|Opera Mini|IEMobile/i);
          }
   };
 
 setTimeout(function(){ 
  
       if( isMobile.any() ){
          googletag.pubads().refresh([slot2]);
       }
       else
       {
          googletag.pubads().refresh([slot1, slot3, slot4, slot5]);
       } 
    }, 800);
 });
 </script>


<!-- Google Tag Manager -->	
<script>(function (w, d, s, l, i) {
    w[l] = w[l] || []; w[l].push(
    { 'gtm.start': new Date().getTime(), event: 'gtm.js' }
    ); var f = d.getElementsByTagName(s)[0],
    j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''; j.async = true; j.src =
    'https://www.googletagmanager.com/gtm.js?id=' + i + dl; f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-KDPVQPJ');</script>
<!-- End Google Tag Manager -->
	<title>Cinépolis</title>

	
<script type="text/javascript" async="" src="http://dgy6rx5roq02d.cloudfront.net/triggit-analytics.min.js"></script>
<link rel="prefetch" href="http://tpc.googlesyndication.com/safeframe/1-0-29/html/container.html">

</head>
<body>
<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-M66T72" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>dataLayer = [];

if(typeof $.cookie("_2jdx646") != "undefined"){
dataLayer.push({"&uid": "#"+$.cookie("_2jdx646")});
}

(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-M66T72');
</script>



<!--<FORM method="post" action="controladores/cinepolisID/loginID.php" onsubmit="javascript:return WebForm_OnSubmit();" id="form1">-->
	<?php include('extras/aspNetHidden.php'); ?>

	<script type="text/javascript">//<![CDATA[
	var theForm = document.forms['form1'];
	if (!theForm) {
	    theForm = document.form1;
	}
	function __doPostBack(eventTarget, eventArgument) {
	    if (!theForm.onsubmit || (theForm.onsubmit() != false)) {
	        theForm.__EVENTTARGET.value = eventTarget;
	        theForm.__EVENTARGUMENT.value = eventArgument;
	        theForm.submit();
	    }
	}
	//]]></script>

	<script src="/WebResource.axd?d=pynGkmcFUV13He1Qd6_TZIYIQr44lyw1IYvRT9_TdoO7dBLhMt_tvVsfmBpqVzrZOmyLkcJgvBrjxSHvKuPf3A2&amp;t=636480115623431523" type="text/javascript"></script>

	<script type="text/javascript">//<![CDATA[
	 ;var EsVIP= false; //]]></script>

	 	<script src="/WebResource.axd?d=x2nkrMJGXkMELz33nwnakIcmZSxXWKxyv_hgsiG3p0XKQ1nm43WWVia1LCFf_q4A_fABVUsIYEokz22OvKIxNZ9tRBYh3FqtegGLyKVwr-U1&amp;t=636480115623431523" type="text/javascript"></script>

	 	<script type="text/javascript">//<![CDATA[
	function WebForm_OnSubmit() {
	if (typeof(ValidatorOnSubmit) == "function" && ValidatorOnSubmit() == false) return false;
	return true;
	}
	//]]></script>

	<?php include('extras/NAVMOBILE.php'); ?>

	<!-- BORRAR EL wrapper DE ABAJO TAMBIEN(donde cierra)-->
	<div id="wrapper" class="wrapper" style="left: 0%;">

		<!--HASTA AQUI BORRAR Y EL SLIDE QUE ESTA DEBAJO DEL encabezado.php-->
		<?php include('header/encabezado.php'); ?>

		<!-- SLIDE -->
		<?php include('slide/slide.php'); ?>

		<div class="contentWrapper contentWrapper--home">
			<div class="cont-busqueda-mov row"></div>
			<figure id="ContentPlaceHolder1_figVideo" class="videobg"></figure>
			<div class="notificacion" style="background-color: #FFCF8D;"></div>
			
			<!--CARTELERA-->
			<!--<section class="cartelera g960 cf">-->
			<section class="cartelera g1024 cf">
				<!-- select de ciudades en body -->
				<?php include('extras/selectCiudades.php'); ?>
				<!--CARTELERA-->
				<?php include('cartelera/mostrarCartelera.php'); ?>
			</section>
		</div><!--FIN contentWrapper contentWrapper--home-->
		
		<!--BORRAR HASTA EL FOOTER-->
		<div class="btnTourTutorial" style="display:none">
			<!--<a href="#" class="tour-index"><img src="https://static.cinepolis.com/img/icon-tour-tutorial.jpg" width="27" height="93"></a>-->
			<a href="#" class="tour-index"><img src="../img/vistaCliente/icon-tour-tutorial.jpg" width="27" height="93"></a>
		</div>
		<div class="md-modal md-effect-12" id="videoTrailers"><div class="md-content"><div id="videoContent"></div><button class="btnClose"><i class="icon-remove-circle"></i></button></div></div>
		<script src="../scripts/video/video.js" async="async"></script>
		<script type="text/javascript">var UrlCarteles = "";</script>
		<script src="../scripts/Datos/datos-carteles-front.js" async="" type="text/javascript"></script>
		<script src="../js/vistaCliente/-1315203077" type="text/javascript"></script>

        <script>$(function(){
		   $("#publiboard > div").addClass("cont-banner cf");
		   $("#leaderboard-dpf, #leaderboard, #publiboard .front-interno:first").wrapAll("<span class='col9' style='margin-left:0;'></span>");
		   $("#box-banner, #publiboard .front-interno:last").wrapAll("<span class='col3'></span>");
			});
		</script>

		<style>div#publiboard .cont-banner .col9 div div:nth-child(2){
		    left: inherit;
		    margin-left: inherit;
		    margin-top: inherit;
		    top: inherit;
		    width: inherit;
		}
		</style>
		<div class="ps-dinamic-overlay"></div>
		<script src="../scripts/action.js"></script>
		<script type="text/javascript">triggit_advertiser = "jc"; triggit_segments = ["cinepolis", "cinepolisgeneral"]; (function () { var ta = document.createElement('script'); ta.type = 'text/javascript'; ta.async = true; ta.src = document.location.protocol + '//dgy6rx5roq02d.cloudfront.net/triggit-analytics.min.js'; document.getElementsByTagName('head')[0].appendChild(ta) })();</script>


		<?php include('footer/footer.php'); ?>
	</div> <!--FIN wrapper-->
<!--</FORM>--> <!--FIN FORMULARIO(unico)-->

<script src="../js/llamadasAjax.js"></script>
</body>
</html>