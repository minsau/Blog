<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="includes/css/bootstrap.css">
	<link rel="stylesheet" href="includes/css/style.css">
	<title>Registro de usuario</title>
</head>
<body>
	
	<div name="registro-container" id="registro-container">
		<form action="#" id="registro" method="post">
			<h3 align="center" name="usuario-container" id="usuario-container"><font color="white"> Ingresa tus datos para registrarte</font></h3>
			<br>
			<label for="nombre">Nombre: </label><input type="text" name="nombre" id="nombre" placeholder="Ingresa tu nombre"><br>
			<label for="apellidos">Apellidos: </label><input type="text" name="apellidos" id="apellidos" placeholder="Ingresa tus apellidos"><br>
			<label for="alias">Alias: </label><input type="alias" name="alias" id="alias" placeholder="Ingresa un alias"><br>
			<label for="correo">Correo: </label><input type="email" name="correo" id="correo" placeholder="Ingresa tu correo"><br>
			<label for="fecha_nacimiento">Fecha de nacimiento: </label><input type="date" name="fecha_nacimiento" id="fecha_nacimiento" placeholder="Ingresa fecha de nacimiento"><br>
			<label for="pass">Contraseña: </label> <input type="password" name="pass" id="pass" placeholder="Ingresa tu contraseña"><br>
			<input type="submit" class="btn btn-primary" value="Ingresar">
		</form>
	</div>

	<script type="text/javascript" src="includes/js/jquery.js"></script>
	<script type="text/javascript" src="includes/js/bootstrap.js"></script>
	
</body>
</html>