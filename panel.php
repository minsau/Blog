

<div class="panel panel-default col-lg-3 entrada" name="panel-creador" id="panel-creador">
	<div  class="panel-heading" id="title" ><strong>Herramientas de creador</h4> </strong> </div>
	<br>
	<div class="panel-body" id="body">

		<?php 
		if(isset($id_blog)){ ?>
		<a href="entradas.php?id_blog=<?php echo $id_blog; ?>"><span class="icon-plus" style="padding:10px;"></span>Agregar entrada</a>
		<?php } else { ?>
		<a href="entradas.php"><span class="icon-plus" style="padding:10px;"></span>Agregar entrada</a>
		<?php } ?><br>
		<a href="#" id="nuevo-blog-btn"><span class="icon-plus" style="padding:10px;"></span>Nuevo blog</a>

			<!--<div name="entradas-container" id="entradas-container">-->
				<div class="" name="nuevo-blog" id="div-nuevo-blog" style="display: block;">
					<br>
					<form action="panel.php?id=<?php echo $_SESSION['id']; ?>" method="post">
						<div class="form-group"> <label for="titulo">Titulo: </label><input type="text" name="titulo" id="titulo" placeholder="Ingresa un titulo" class = "form-control" required><br></div>
						<div class="form-group"> <label for="descripcion">Descripcion: </label><input type="text" name="descripcion" id="descripcion" placeholder="Ingresa una descripción del blog" class = "form-control" required><br></div>
						<input type="submit" class="btn btn-primary" value="Guardar blog">
					</form>		
				</div>
		<?php 
			if(!$_POST){

			} else {
				require_once("includes/conexion.php");
				$titulo = $_POST['titulo'];
				$descripcion = $_POST['descripcion'];
				$id_usuario = $_GET['id'];
				$sql = "insert into Blog values (null,'$titulo','$descripcion',now(),0,$id_usuario)";
				$res = mysql_query($sql, $con);
				header("Location: index.php");
			}
		?>

	




	</div>
</div>