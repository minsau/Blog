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
			<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
			<link rel="stylesheet" type="text/css" href="includes/css/estiloheader.css">
			<link rel="stylesheet" type="text/css" href="includes/fonts.css">
			<script src="includes/js/jquery.js"></script>
			<script src="includes/js/main.js"></script>
	</head>
	
	<body>
		<?php if(!$_SESSION){ ?>
				<div name="usuario-container" id="usuario-container"> 
					<font color="white"><h2 align="center" > Bienvenido(a), por favor registrate.</h2> 
						<p align="right"> <a href="login.php"> Iniciar sesión </a></p>
					</font>
				</div>	

			<?php } else {?>

				<header>
					<div class="menu_bar">
						<a href="#" class="bt-menu"><span class="icon-menu"></span>Menu</a>
					</div>
					
					<nav>
						<ul>
							<li><a href="#"><span class="icon-home3"></span>Inicio</a></li>
							<li><a href="#"><span class="icon-tv"></span>Populares</a></li>
							<li><a href="#"><span class="icon-user"></span>Mis datos</a></li>
							<li class="submenu">
								<a href="#"><span class="icon-tree"></span>Mis Blogs <span class="caret"></span></a>
								<ul class="children">
									
									<?php 
										$sql = "SELECT * FROM Blog WHERE id_usuario = '$id_usuario' ";
										$res = mysql_query($sql,$con) or die("Error obteniendo blogs del usuario".mysql_error());
										while ($reg = mysql_fetch_array($res)) {
									?>
										<li><a href="#"><?php echo $reg['titulo']; ?></a></li>

									<?php
										}
									 ?>									

									<li><a href="#">Ver todos</a></li>
								</ul>
							</li>
							<li><a href="#"><span class="icon-search"></span>Buscar</a></li>
							<li><a href="#"><span class="icon-switch"></span>Cerrar Sesión</a></li>
						</ul>
					</nav>
				</header>

			<?php } ?>

		<div class="container">

		<?php 
			if(!$_POST){
		 ?>
		<?php
		} else {
				require_once("includes/conexion.php");
				$titulo = $_POST['titulo'];
				$descripcion = $_POST['descripcion'];
				$sql = "insert into Blog values (null,'$titulo','$descripcion',now(),$id_usuario)";
				$res = mysql_query($sql, $con);
			}
	?>

	
			
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
