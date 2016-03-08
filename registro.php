<?php 
	session_start();
	if(!$_POST){
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="includes/css/bootstrap.css">
	<link rel="stylesheet" href="includes/css/style.css">
	<title>Registro de usuario</title>
</head>
<body>
	
	<div class="container ">
		<form action="#" id="registro" method="post">
			<h3 align="center" name="usuario-container" id="usuario-container"><font color="white"> Ingresa tus datos para registrarte</font></h3>
			<br>
			<div class="registro-container">
			<label for="nombre">Nombre: </label><input type="text" name="nombre" id="nombre" placeholder="Ingresa tu nombre" required><br>
			<label for="apellidos">Apellidos: </label><input type="text" name="apellidos" id="apellidos" placeholder="Ingresa tus apellidos" required><br>
			<label for="alias">Alias: </label><input type="alias" name="alias" id="alias" placeholder="Ingresa un alias" required><br>
			<label for="correo">Correo: </label><input type="email" name="correo" id="correo" placeholder="Ingresa tu correo" required><br>
			<label for="fecha_nacimiento">Fecha de nacimiento: </label><input type="date" name="fecha_nacimiento" id="fecha_nacimiento" placeholder="Año-Mes-Dia" required><br>
			<label for="pass">Contraseña: </label> <input type="password" name="pass" id="pass" placeholder="Ingresa tu contraseña" required>

			<input type="submit" class="btn btn-primary" value="Registrarse">
			</div>
		</form>
	</div>

	<script type="text/javascript" src="includes/js/jquery.js"></script>
	<script type="text/javascript" src="includes/js/bootstrap.js"></script>
	
</body>
</html>
<?php 
	} else {
	
	require_once("includes/conexion.php");
	$nombre = $_POST['nombre'];
	$apellidos = $_POST['apellidos'];
	$alias = $_POST['alias'];
	$correo = $_POST['correo'];
	$fecha_nacimiento = $_POST['fecha_nacimiento'];
	$password = $_POST['pass'];
	$sql = "insert into Usuario values (null,'$nombre','$apellidos','$alias','$correo',md5('$pass'),'usuario','$fecha_nacimiento')";
	$res = mysql_query($sql,$con) or die("Error al registrarse"); 	
	$sql = "Select * from Usuario where correo = '$correo'";
	$res = mysql_query($sql, $con);
	$reg = mysql_fetch_array($res);
	$_SESSION['id'] = $reg['id_usuario'];
	echo "<script language='javascript'>
			alert('Fuiste Registrado');
			</script>";
	if($reg['tipo'] = 'usuario'){
			header("Location: index.php");
		}
	}
?>