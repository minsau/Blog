<?php
session_start();
require_once("includes/conexion.php");
require_once("functions.php");

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

		<?php require_once("header.php"); ?>

		<div class="container">
				
				<div class="row">
					<?php
					$sql_p = "select * from Blog as b, Publicacion as p where p.id_blog = b.id_blog order by fecha_publicacion desc"; 
					$res_p = mysql_query($sql_p, $con);
					$contador = 0;
					while($reg_p = mysql_fetch_array($res_p)){
					?>
					<div class="panel panel-info col-lg-9 col-sm-9 entrada" name="<?php echo "entrada".$reg_pub['id_entrada']; ?>" id="<?php echo "entrada".$reg_pub['id_entrada']; ?>">
						<div  class="panel-heading" id="title" >
							<a href="describePublicacion.php?id_publicacion=<?php echo $reg_p['id_publicacion'];?>&id_blog=<?php echo $reg_p['id_blog']; ?>"><strong><h4 class="panel-title"> <?php echo $reg_p['tema']." - ".$reg_p['titulo']; ?> </h4> </strong></a>
						</div>
						<div class="panel-body" id="body">
							<div id="descripcion-publicacion"><p> <?php echo $reg_p['descripcion']; ?> </p>	</div>	
							<div id="contenido-publicacion"><p> <?php echo $reg_p['contenido']; ?> </p>	</div>
						</div>
						<div class="panel-footer">
							<font size="2"> <p> <?php echo formatearFecha($reg_p['fecha_publicacion']); ?> </p></font>
						</div>
					</div>
						<?php if($contador == 0 && !$_SESSION){ ?>
					<div class="col-lg-3" name="formulario" id="div-login-index">
						<form action="login.php" id="form-login" method="post" role="form">
							<div class="form-group">
								<label for="correo"> Correo: </label> <input type="email" name="correo" id="correo" class="form-control" required>
							</div>	

							<div class="form-group">
								<label for="pass"> Contraseña:  </label> <input type="password" name="pass" id="pass" class="form-control" required>
							</div>

							<input type="submit" value="Ingresar" class="btn btn-primary">	 <a href="registro.php" style="float: rigth;"> Registrate </a>
						</form>
					</div>
					<?php
							$contador++;
						}

						if($contador == 0 && $_SESSION){
							require_once("panel.php");
						$contador++;
						}
					}
					?>


					
				</div>
				</div>
			
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
