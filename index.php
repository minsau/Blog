<?php
session_start();
require_once("includes/conexion.php");

if($_SESSION){
$id_usuario = $_SESSION['id'];
$sql_usuario = "select * from Usuario where id_usuario = $id_usuario";
$res_usuario = mysql_query($sql_usuario, $con);
$reg_usuario = mysql_fetch_array($res_usuario);

$sql_pub = "select * from Blog as b, Publicacion as p where p.id_blog = b.id_blog order by fecha_publicacion desc"; 
$res_pub = mysql_query($sql_pub, $con);


$sql_pub_u = "select * from Blog as b, Publicacion as p where p.id_blog = b.id_blog and order by fecha_publicacion desc"; 
$res_pub_u = mysql_query($sql_pub_u, $con);

}

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
										<!--<a href="#infoPersonal" class="btn btn-primary btn-lg" data-toggle="modal" id="next1"> Mostrar </a>-->
                                                                                
										
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
					while($reg_p = mysql_fetch_array($res_p)){
					?>
					<div class="panel panel-info" name="<?php echo "entrada".$reg_pub['id_entrada']; ?>" id="<?php echo "entrada".$reg_pub['id_entrada']; ?>">
						<div  class="panel-heading" id="title" ><strong><h4 class="panel-title"> <?php echo $reg_p['tema']." - ".$reg_p['titulo']; ?> </h4> </strong> </div>
						<br>
						<div class="panel-body" id="body"> <p> <?php echo $reg_p['contenido']; ?> </p>
						<br>
						<font size="2"> <p> <?php echo $reg_p['fecha_publicacion']; ?> </p></font>
						</div>
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
