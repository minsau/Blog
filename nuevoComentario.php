<?php 
session_start();
require_once("includes/conexion.php");

$comentario = $_POST['comentario'];
$id_usuario = $_POST['id_usuario'];
$id_publicacion = $_POST['id_publicacion'];
echo $comentario;
echo $id_usuario;
echo $id_publicacion;

$sql = "insert into Comentario values (null,'$comentario',now(),$id_usuario,$id_publicacion)";
$res = mysql_query($sql,$con) or die (mysql_error()."Error en nuevo comentario");

header("Location: describePublicacion.php?id_publicacion=$id_publicacion");
?>