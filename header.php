		<?php if(!$_SESSION){ ?>
				<header>
					<div class="menu_bar">
						<a href="#" class="bt-menu"><span class="icon-menu"></span>Menu</a>
					</div>
					
					<nav align="center">

						<ul>
							
							<li><a href="index.php"><span class="icon-home3"></span>Inicio</a></li>
							
							<li class="submenu">
								<a href="#"><span class="icon-tv"></span>Populares</a>
								<ul class="children">
									<?php 
										$sql = "SELECT * FROM Blog order by visitas desc limit 0,2";
										$res = mysql_query($sql,$con) or die("Error obteniendo blogs del usuario".mysql_error());
										while ($reg = mysql_fetch_array($res)) {
									?>
										<li><a href="populares.php?id_blog=<?php echo $reg['id_blog'] ?>"><?php echo $reg['titulo']; ?></a></li>

									<?php
										}
									 ?>	
								</ul>
							</li>
							
							<li><a href="#"><span class="icon-search"></span>Buscar</a></li>
							<li><a href="login.php"><span class="icon-switch"></span>Iniciar Sesión</a></li>
						</ul>
					</nav>
				</header>

			<?php } else {?>

				<header>
					<div class="menu_bar">
						<a href="#" class="bt-menu"><span class="icon-menu"></span>Menu</a>
					</div>
					
					<nav align="center">

						<ul>
							
							<li><a href="index.php"><span class="icon-home3"></span>Inicio</a></li>
							<li class="submenu">
								<a href="#"><span class="icon-tv"></span>Populares</a>
								<ul class="children">
									<?php 
										$sql = "SELECT * FROM Blog order by visitas desc limit 0,2";
										$res = mysql_query($sql,$con) or die("Error obteniendo blogs del usuario".mysql_error());
										while ($reg = mysql_fetch_array($res)) {
									?>
										<li><a href="#"><?php echo $reg['titulo']; ?></a></li>

									<?php
										}
									 ?>	
								</ul>
							</li>
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

									
								</ul>
							</li>
							<li><a href="#"><span class="icon-search"></span>Buscar</a></li>
							<li><a href="logout.php"><span class="icon-switch"></span>Cerrar Sesión</a></li>
						</ul>
					</nav>
				</header>

			<?php } ?>