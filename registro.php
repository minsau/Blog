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
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="includes/css/estiloheader.css">
	<link rel="stylesheet" type="text/css" href="includes/fonts.css">
	<script src="includes/js/jquery.js"></script>
	<script src="includes/js/main.js"></script>
	</head>

</head>
<body>

	<?php require_once("header.php"); ?>
	
	<div class="container " >
		<div class="row vertical-center ">
			<div class="col-lg-6 col-lg-offset-3 col-xs-offset-1 col-xs-9" name="formulario" id="div-login">
				<form action="#" id="form-registro" method="post" role="form">
			
			<div class="form-group">
				<label for="nombre">Nombre: </label><input type="text" name="nombre" id="nombre" placeholder="Ingresa tu nombre" class ="form-control" required><br>
			</div>
			<div class="form-group">
				<label for="apellidos">Apellidos: </label><input type="text" name="apellidos" id="apellidos" placeholder="Ingresa tus apellidos" class ="form-control" required><br>
			</div>
			<div class="form-group">
				<label for="alias">Alias: </label><input type="alias" name="alias" id="alias" placeholder="Ingresa un alias" class ="form-control" required><br>
			</div>
			<div class="form-group">
				<label for="correo">Correo: </label><input type="email" name="correo" id="correo" placeholder="Ingresa tu correo" class ="form-control" required><br>
			</div>
			<div class="form-group" id="">
				<label for="fecha_nacimiento">Fecha de nacimiento: </label><input type="date" name="fecha_nacimiento" id="datepicker" placeholder="Año-Mes-Dia" class ="form-control" required><br>
			</div>
			<div class="form-group">
				<label for="pass">Contraseña: </label> <input type="password" name="pass" id="pass" placeholder="Ingresa tu contraseña" class ="form-control" required>
			</div>
					

					<input type="submit" value="Registrarse" class="btn btn-primary">
				</form>
			</div>
		</div>
	</div>



	
	<script type="text/javascript" src="includes/js/bootstrap.js"></script>
	
		<script>
$(function () {
$("#datepicker").datepicker();
});
</script>
	
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