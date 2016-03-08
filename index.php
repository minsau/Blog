<?php
session_start();
require_once("includes/conexion.php");

$id_usuario = $_SESSION['id'];
$sql_usuario = "select * from Usuario where id_usuario = $id_usuario";
$res_usuario = mysql_query($sql_usuario, $con);
$reg_usuario = mysql_fetch_array($res_usuario);

$sql_pub = "select * from Blog as b, Publicacion as p where p.id_blog = b.id_blog order by fecha_publicacion desc";
$res_pub = mysql_query($sql_pub, $con);

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
			<div name="usuario-container" id="usuario-container"> 
				<font color="white"><h2 align="center" > Bienvenido(a) <?php echo $reg_usuario['alias']; ?></h2> 
					<p align="right"> <a href="login.php"> Iniciar sesión </a></p>
				</font>
			</div>	

			<div align="left">
				<h3>Mis Blogs</h3>
				<a href="blog.php"><label>[+] Agregar blog</label></a>
				<br>
				<?php
					while($reg_blog = mysql_fetch_array($res_blog)){
					?>
					<div id="title" > <h4> <?php echo $reg_blog['titulo']; ?></h4> </div>
					<br>
					<?php
					}
					?>
			</div>		
			
			<div name="entradas-container" id="entradas-container">
				
					<a href="entradas.php"><label>[+] Agregar publicación</label></a>
					<br>
					<?php
					while($reg_pub = mysql_fetch_array($res_pub)){
					?>
					<div class="panel panel-info" name="<?php echo "entrada".$reg_pub['id_entrada']; ?>" id="<?php echo "entrada".$reg_pub['id_entrada']; ?>">
						<div  class="panel-heading" id="title" ><strong><h4 class="panel-title"> <?php echo $reg_pub['tema']." - ".$reg_pub['titulo']; ?> </h4> </strong> </div>
						<br>
						<div class="panel-body" id="body"> <p> <?php echo $reg_pub['contenido']; ?> </p>
						<br>
						<font size="2"> <p> <?php echo $reg_pub['fecha_publicacion']; ?> </p></font>
						</div>
					</div>
					<?php
					}
					?>
				
            </div> 
		
			</div>

		</div>
	</body>
</html>
