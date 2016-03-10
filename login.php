<?php
session_start();
	if(!$_POST){	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="includes/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="includes/css/style.css">
	<title>Inicia Sesión</title>
			<link rel="stylesheet" type="text/css" href="includes/css/estiloheader.css">
			<link rel="stylesheet" type="text/css" href="includes/fonts.css">
			<script src="includes/js/jquery.js"></script>
			<script src="includes/js/main.js"></script>
</head>
<body>
	<?php require_once("header.php"); ?>
	
	<div class="container " >
		<div class="row">
			<div class="col-sm-10" name="formulario" id="div-login">
				<form action="#" id="form-login" method="post" role="form">
					<div class="form-group">
						<label for="correo"> Correo: </label> <input type="email" name="correo" id="correo" class="form-control" required>
					</div>	

					<div class="form-group">
						<label for="pass"> Contraseña:  </label> <input type="password" name="pass" id="pass" class="form-control" required>
					</div>

					<input type="submit" value="Ingresar" class="btn btn-primary">	 <a href="registro.php" style="float: rigth;"> Registrate </a>
				</form>
			</div>
		</div>
	</div>




	
	<script type="text/javascript" src="includes/js/bootstrap.js"></script>
	
</body>
</html>
<?php }else{
	
	require_once("includes/conexion.php");
	$correo = $_POST['correo'];
	$password = md5($_POST['pass']);
	echo "$correo <br> $password";
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

		if($reg['tipo'] = 'usuario'){
			header("Location: index.php");
		}		
	}else{
		echo "Usuario no encontrado";
	}

} ?>