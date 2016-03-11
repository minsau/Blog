<?php 
	function formatearFecha($var)
	{
		$fechaCompleta = explode(' ',$var);
		$fecha = $fechaCompleta[0];
		$hora = $fechaCompleta[1];

		return "Fue creada el dia $fecha a las $hora";
	}

 ?>