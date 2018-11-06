
<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8">
		<link href="../css/style-login.css" rel='stylesheet' type='text/css' />
		<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
	<div class="main">
		<form action="../controladores/admin_login.php" method="post">
    		<h1><img style="width: 195px; height: 95px;" src="../img/logo5.png"></h1>
  			<div class="inset">
	  			<p>
	    		 <label for="email">Correo electrónico</label>
   	 				<input type="text" placeholder="E-mail" name="correo" required/>
				</p>

  				<p>
				    <label for="password">Escribir contraseña</label>
				    <input type="password" placeholder="Contraseña" name="contrasena" required/>
  				</p>
				  <p>
				    <input type="checkbox" name="recordar" id="recordar">
				    <label for="recordar">Recordar sesión</label>
				  	<br>
				    <br>
				    <section class="boton">
				    <center>
				    <input type="submit" value="Iniciar" style="background: #feca30; border-color: #feca30; color: white;">
				    </center>
				    </section>
				  </p>

				  <p class="p-container">
				  	<ul class="lista">
				  		<li>
				  			<span><a href="#"><b style="color: #feca30;">-</b> Olvide Contraseña</a></span>
				  		</li>
				  	</ul>
				  </p>
 			 </div>
		</form>
	</div>  
   	
   	<div class="copy-right">
		<p><a href="#" style="color: #feca30;">CINÉPOLIS</a>, LA CAPITAL DEL CINÉ</p> 
	</div>
</body>
</html>