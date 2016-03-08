
<?php 
	session_start();
	if(!$_POST){
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
<div class="container " >
		<div class="row vertical-center ">
			<div class="col-lg-10 col-lg-offset-1 " name="formulario" id="div-login">
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


	<script type="text/javascript" src="includes/js/jquery.js"></script>
	<script type="text/javascript" src="includes/js/bootstrap.js"></script>
</body>
</html>
<?php 

	} else {

		$tema = $_POST['tema'];
		$contenido = $_POST['contenido'];

		echo "$tema <br> $contenido";

	}
	
 ?>