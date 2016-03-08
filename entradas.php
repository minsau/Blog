
<?php 
	session_start();

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Nueva Entrada</title>
		<link rel="stylesheet" type="text/css" href="includes/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="includes/css/style.css">
	<script src="includes/js/tinymce/tinymce.min.js"></script>
  	<script>tinymce.init({ selector:'textarea' });</script>
</head>
<body>
	
<?php
	if($_SESSION){
		require_once("includes/conexion.php");
	$id_usuario = $_SESSION['id'];
	$id_blog = $_GET['id_blog'];
	if(!$_POST){
 ?>
<div class="container " >
		<div class="row vertical-center ">
			<div class="col-lg-10 col-lg-offset-1 " name="formulario" id="div-entrada">
				<form action="#" id="form-entrada" method="post" role="form">
					<div class="form-group">
						<label> Titulo: </label> <input type="text" name="tema" id="tema" class="form-control" required>
					</div>	

					<div class="form-group">
						<label for="contenido"> Contenido:  </label> <textarea name="contenido" id="contenido" placeholder="Escribe tu publicacion aqui"></textarea>
					</div>

					<input type="submit" value="Publicar" class="btn btn-primary">

				</form>
			</div>
		</div>
	</div>

<?php 

	} else {

		$tema = $_POST['tema'];
		$contenido = $_POST['contenido'];

		$sql = "INSERT INTO Publicacion values (null,'$tema','$contenido',now(),'$id_blog')";
		$res = mysql_query($sql,$con) or die("Error al guardar la entrada".mysql_error());


		header("Location: index.php");

	}
	
	}else{
		echo "<div class='alert alert-danger'><strong>Debes <a href='login.php'>iniciar sesion</a></strong> </div>";
	}
 ?>
	<script type="text/javascript" src="includes/js/jquery.js"></script>
	<script type="text/javascript" src="includes/js/bootstrap.js"></script>
</body>
</html>
