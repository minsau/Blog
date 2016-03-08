<?php
session_start();
	if(!$_POST){	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="includes/css/bootstrap.css">
	<title>Inicia Sesión</title>
</head>
<body>
	
	<div class="container">
		<form action="#" id="iniciar-sesion" method="post">
			<label for="correo">Correo: </label><input type="email" name="correo" id="correo" placeholder="Ingresa tu correo">
			<label for="pass">Contraseña: </label><input type="password" name="pass" id="pass" placeholder="Ingresa tu contraseña">
			<input type="submit" class="btn btn-primary" value="Ingresar">
		</form>
	</div>



	<script type="text/javascript" src="includes/js/jquery.js"></script>
	<script type="text/javascript" src="includes/js/bootstrap.js"></script>
	
</body>
</html>
<?php }else{
	
	require_once("includes/conexion.php");
	$correo = $_POST['correo'];
	$password = md5($_POST['pass']);
	//echo "$correo <br> $password";
	//echo "<br>";
	$sql = "SELECT * FROM Usuario WHERE correo = '$correo' AND password = '$password'";
	//echo $sql;
	$res = mysql_query($sql,$con) or die("Error consultando correo"); 
	//echo mysql_num_rows($res);
	if(mysql_num_rows($res) > 0){
		$reg = mysql_fetch_array($res) or die("Error al convertir en registros");
		$_SESSION['correo'] = $correo;
		$_SESSION['tipo'] = $reg['tipo'];
		$_SESSION['id'] = $reg['id_usuario'];	
	}

} ?>