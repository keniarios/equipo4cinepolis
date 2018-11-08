<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
<?php
require_once ('../../bd/conexion.php'); $conexion = conectarBD();

$Vcorreo = strtoupper($_POST["txbCinepolisIdMaster"]);
$Vcontrasena = $_POST["txbContrasenaMaster"];

$query = "SELECT * FROM registrocinepolisid WHERE correo = '$Vcorreo'";
$result = pg_query($query);

if($row = pg_fetch_array($result))
 {
  if(password_verify($Vcontrasena,$row["contrasena"]))
      {
        //Creamos sesión
        session_start();
        //Almacenamos el nombre de usuario en una variable de sesión usuario
        $_SESSION['id_cinepolisid'] = $row["id_cinepolisid"];
    		$_SESSION['nombre'] = $row["nombre"];
    		$_SESSION['apellidopaterno'] = $row["apellidopaterno"];
    		$_SESSION['apellidomaterno'] = $row["apellidomaterno"];
    		$_SESSION['correo'] = $row["correo"];
        $_SESSION['contrasena'] = $row["contrasena"];
        $_SESSION['tarjetaclub'] = $row["tarjetaclub"];
    		$_SESSION['preguntaseguridad'] = $row["preguntaseguridad"];
    		$_SESSION['respuestapreguntaseguridad'] = $row["respuestapreguntaseguridad"];
    		$_SESSION['dianacimiento'] = $row["dianacimiento"];
    		$_SESSION['mesnacimiento'] = $row["mesnacimiento"];
        $_SESSION['anonacimiento'] = $row["anonacimiento"];
        $_SESSION['lada'] = $row["lada"];
        $_SESSION['telefono'] = $row["telefono"];

        header("Location: cinepolisID/index.php");
      }
      else
      {
?>
        <script languaje="javascript">
          alert("Contraseña Incorrecta");
          location.href = "../../index.php";
        </script>
      <?php
      }
  }
  else
  {
  ?>
      <script languaje="javascript">
        alert("El correo y/o contraseña son Incorrectos!");
        location.href = "../../index.php";
      </script>
  <?php
}
//pg_free_result() se usa para liberar la memoria empleada al realizar una consulta
pg_free_result($result);

/*pg_close() se usa para cerrar la conexión a la Base de datos y es 
**necesario hacerlo para no sobrecargar al servidor*/
pg_close();
?>