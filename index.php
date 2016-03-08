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

$sql_pub_u = "select * from Blog as b, Publicacion as p where p.id_blog = b.id_blog and order by fecha_publicacion desc"; 
$res_pub_u = mysql_query($sql_pub_u, $con);

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


<a href="#miModal">Abrir Modal</a>
<div id="miModal" class="modal">
  <div class="modal-contenido">
    <a href="#">X</a>
    <form action="#" id="nuevo_blog" method="post">
			<h3 align="center" name="usuario-container" id="usuario-container"><font color="white"> Nuevo Blog</font></h3>
			<br>
			<div class="registro-container">
			<label for="titulo">Titulo: </label><input type="text" name="titulo" id="titulo" placeholder="Ingresa un titulo" required><br>
			<label for="descripcion">Descripcion: </label><input type="text" name="apellidos" id="apellidos" placeholder="Ingresa una descripción del blog" required><br>
			<input type="submit" class="btn btn-primary" value="Guardar blog">
			</div>
		</form>
  </div>  
</div>

			<div align="left">
				<h3>Mis Blogs</h3>
				<a href=""><label>[+] Agregar blog</label></a>
				<br>
				<?php
					while($reg_blog = mysql_fetch_array($res_blog)){
					?>
					<label> <a href=""> <?php echo $reg_blog['titulo']; ?> </a> </label>
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
<<<<<<< HEAD
				</div>
=======
				
            </div> 
		
			</div>
>>>>>>> be64682c348385afeacec9f1349ec679e51aca67

   		</div>
	</body>
</html>
