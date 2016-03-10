<?php
session_start();
require_once("includes/conexion.php");

if($_SESSION){

	$id_usuario = $_SESSION['id'];
	$sql_usuario = "select * from Usuario where id_usuario = $id_usuario";
	$res_usuario = mysql_query($sql_usuario, $con);
	$reg_usuario = mysql_fetch_array($res_usuario);
}
	$id_publicacion = $_GET['id_publicacion'];
	$sql_publicacion = "select * from Publicacion where id_publicacion = $id_publicacion";
	$res_publicacion = mysql_query($sql_publicacion, $con);

	$sql_comentario = "select * from Usuario as u, Publicacion as p, Comentario as c where p.id_publicacion = c.id_publicacion and c.id_publicacion = $id_publicacion and p.id_publicacion = $id_publicacion and c.id_usuario = u.id_usuario";
	$res_comentario = mysql_query($sql_comentario, $con);

	$sql_pub = "select * from Blog as b, Publicacion as p where p.id_blog = b.id_blog order by fecha_publicacion desc"; 
	$res_pub = mysql_query($sql_pub, $con);

	$sql_pub_u = "select * from Blog as b, Publicacion as p where p.id_blog = b.id_blog and order by fecha_publicacion desc"; 
	$res_pub_u = mysql_query($sql_pub_u, $con);

	$sql_blog = "select * from Usuario as u, Blog as b where u.id_usuario = b.id_usuario";
	$res_blog = mysql_query($sql_blog, $con);
?>

<!DOCTYPE html>
<html lang="en">
	<head>
 		<meta charset="UTF-8">
 		<link rel="stylesheet" type="text/css" href="includes/css/bootstrap.css">
 		<link rel="stylesheet" href="includes/css/style.css">
			<title> Blog | Un Ingeniero en Sistemas	</title>
	</head>
	
	<body>
		<div class="container">
			
			<?php if(!$_SESSION){ ?>
				<div name="usuario-container" id="usuario-container"> 
					<font color="white"><h2 align="center" > Bienvenido(a), por favor registrate.</h2> 
						<p align="right"> <a href="login.php"> Iniciar sesión </a></p>
					</font>
				</div>	

			<?php } else {?>
			<div name="usuario-container" id="usuario-container"> 
				<font color="white"><h2 align="center" > Bienvenido(a) <?php echo $reg_usuario['alias']; ?></h2> 
					<p align="right"> <a href="logout.php"> Salir </a></p>
				</font>
			</div>	

			<?php } ?>

		<?php 
			if(!$_POST){
		 ?>
			<div class="modal fade" id="nuevo-blog" >
				<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h2 class="modal-title"> Datos Personales </h2> 
										<a class="btn btn-warning" id="cerrar">X</a>
									</div>
									<div class="modal-body">
								<form action="#" method="post">
									<label for="titulo">Titulo: </label><input type="text" name="titulo" id="titulo" placeholder="Ingresa un titulo" required><br>
									<label for="descripcion">Descripcion: </label><input type="text" name="descripcion" id="descripcion" placeholder="Ingresa una descripción del blog" required><br>
									<input type="submit" class="btn btn-primary" value="Guardar blog">
								</form>		
									</div>

									<div class="modal-footer">
											
									</div>
								</div>
				</div>
			</div>	

	<?php
		} else {
				require_once("includes/conexion.php");
				$titulo = $_POST['titulo'];
				$descripcion = $_POST['descripcion'];
				$sql = "insert into Blog values (null,'$titulo','$descripcion',now(),$id_usuario)";
				$res = mysql_query($sql, $con);
			}
	?>

			<div align="left" id="menu-blogs">
				<h3>Mis Blogs</h3>
				<a id="abrir-modal">[+] Agregar blog</a>
				<br>
				<?php
					while($reg_blog = mysql_fetch_array($res_blog)){
					?>
					<label> <a href=""> <?php echo $reg_blog['titulo']; ?> </a> </label>
					<label> <a href="entradas.php?id_blog=<?php echo $reg_blog['id_blog']; ?>"> [+] Agregar publicación </a> </label>
					<?php 
						while ($reg_pub = mysql_fetch_array($res_pub)) {
						?>
					<label> <?php echo $reg_pub['tema']; ?> </label>
						<?php
						}
					}
					?>
			</div>		
			
			<div name="entradas-container" id="entradas-container">
				<div class="form-inline" name="nuevo-blog" id="div-nuevo-blog" style="display: none;">
					<form action="#" method="post">
						<div class="form-group"> <label for="titulo">Titulo: </label><input type="text" name="titulo" id="titulo" placeholder="Ingresa un titulo" class = "form-control" required><br></div>
						<div class="form-group"> <label for="descripcion">Descripcion: </label><input type="text" name="descripcion" id="descripcion" placeholder="Ingresa una descripción del blog" class = "form-control" required><br></div>
						<input type="submit" class="btn btn-primary" value="Guardar blog">
					</form>		
				</div>
				
					<?php
					$sql_p = "select * from Blog as b, Publicacion as p where p.id_blog = b.id_blog order by fecha_publicacion desc"; 
					$res_p = mysql_query($sql_p, $con);
					while($reg_publicacion = mysql_fetch_array($res_publicacion)){
					?>
					<div class="panel panel-info">
						<div  class="panel-heading" id="title" ><strong><h4 class="panel-title"> <?php echo $reg_publicacion['tema']; ?> </h4> </strong> </div>
						<br>
						<div class="panel-body" id="body"> <p> <?php echo $reg_publicacion['descripcion']; ?> </p>
						<br>
						<div class="panel-body" id="body"> <p> <?php echo $reg_publicacion['contenido']; ?> </p>
						<br>
						<font size="2"> <p> <?php echo $reg_publicacion['fecha_publicacion']; ?> </p></font>
						</div>
						</div>
						<div  class="panel-heading" id="title" ><strong><h4 class="panel-title"> C O M E N T A R I O S </h4> </strong></div>
						<div  class="panel-heading" id="title" ><strong><h5 align="right" class="panel-title"> [+] Agregar comentario </h5> </strong></div>

						<?php 
						while($reg_comentario = mysql_fetch_array($res_comentario)){
						?>
						<div class="panel-body" id="body"> <?php echo $reg_comentario['comentario']; ?> 
						<font size="2"> <p align="right"> <?php echo $reg_comentario['alias']." - ".$reg_comentario['fecha_comentario']; ?> <hr></font>
						</div>
						<?php 
						}
						?>
					</div>
					<?php
					}
					?>

			<script type="text/javascript" src="includes/js/jquery.js"></script>
			<script type="text/javascript" src="includes/js/bootstrap.js"></script>

			<script type="text/javascript">
				$('#abrir-modal').click(function(){
                   $('#div-nuevo-blog').show();				
				});

				$('#cerrar').click(function(){
                    $('#nuevo-blog').modal('hide');					
				});

			</script>
	</body>
</html>
