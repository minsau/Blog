<?php
require_once("includes/conexion.php");
$sql_pub = "select * from Blog as b, Publicacion as p where p.id_blog = b.id_blog order by fecha_publicacion desc";
$res_pub = mysql_query($sql_pub, $con);
?>

<!DOCTYPE html>
<html>
	<head>
	<link rel="stylesheet" href="includes/css/style.css">
	<title> Blog | Un Ingeniero en Sistemas	</title>
	</head>
	<body>
		<div class="content">
			<div name="usuario-container" id="usuario-container"> 
			<font color="white"><h2 align="center" > Bienvenido</h2> <p align="right"> <a href="login.php"> iniciar sesión </a></p></font>
			</div>			
			<div name="entradas-container" id="entradas-container">
				<div class="entries" name="entrada1" id="entrada1">
					<?php
					while($reg_pub = mysql_fetch_array($res_pub)){
					?>
					<div id="title" onclick="javascript:parent.location='entrada1.php'"><h4> <?php echo $reg_pub['tema']." - ".$reg_pub['titulo']." - ".$reg_pub['fecha_publicacion']; ?> </h4> </div>
					<div id="body"> <p> <?php echo $reg_pub['contenido']; ?> </p></div>
					<?php
					}
					?>
				</div>
            </div> 
		
			</div>

		</div>
	</body>
</html>
