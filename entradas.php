
<?php 
	session_start();

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Nueva Entrada</title>
		<link rel="stylesheet" type="text/css" href="includes/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="includes/js/tinymce/skins/lightgray/content.min.css">
	<link rel="stylesheet" type="text/css" href="includes/css/style.css">
	<script src="includes/js/tinymce/tinymce.min.js"></script>

  	<script type="text/javascript">
        tinymce.init({
			language : 'es_MX',
			selector: 'textarea',
    theme: "modern",
    plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak table",
         "searchreplace wordcount visualblocks visualchars fullscreen insertdatetime media nonbreaking emoticons textcolor",
         "save table contextmenu directionality emoticons template paste textcolor"
   ],
   content_css: "css/content.css",
   toolbar: "insertfile undo redo preview | fontselect | fontsizeselect | forecolor backcolor emoticons | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | media fullpage", 
    fontsize_formats: "9pt 10pt 11pt 12pt 13pt 14pt 15pt 16pt 18pt 20pt 22pt 24pt",

	font_formats: "Andale Mono=andale mono,times;"+
        "Arial=arial,helvetica,sans-serif;"+
        "Arial Black=arial black,avant garde;"+
        "Book Antiqua=book antiqua,palatino;"+
        "Comic Sans MS=comic sans ms,sans-serif;"+
        "Courier New=courier new,courier;"+
        "Georgia=georgia,palatino;"+
        "Helvetica=helvetica;"+
        "Impact=impact,chicago;"+
        "Symbol=symbol;"+
        "Tahoma=tahoma,arial,helvetica,sans-serif;"+
        "Terminal=terminal,monaco;"+
        "Times New Roman=times new roman,times;"+
        "Trebuchet MS=trebuchet ms,geneva;"+
        "Verdana=verdana,geneva;"+
        "Webdings=webdings;"+
        "Wingdings=wingdings,zapf dingbats",
 }); 		
</script>
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
