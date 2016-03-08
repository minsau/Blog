<?php
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
	$correo = $_POST['correo'];
	$password = $_POST['pass'];
	//echo "$correo <br> $password";
	require_once("includes/conexion.php");

	$sql = "SELECT * FROM Usuario WHERE correo = '$correo'";
	//$res = mysql_query($sql,$con);
	$res = mysqli_query($con,$sql) or die("Error consultando correo"); 

} ?>