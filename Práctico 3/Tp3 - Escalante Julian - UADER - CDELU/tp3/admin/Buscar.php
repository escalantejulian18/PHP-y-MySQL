<?php 

// Iniciamos o restauramos la sesión
session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/tp3/Includes/PHP/Conexion.php';

if (isset($_GET["numero_documento"])==true){
	
	$documento=$_GET["numero_documento"];


$conexion=conectarBD();

$query="SELECT * FROM `persona` WHERE `numerodocumento`=$documento";

$resultado = mysql_query($query, $conexion);

$fila=mysql_fetch_assoc($resultado);
print($fila['idpersona']);


// Obtener el id del usuario desde la base de datos

// Redireccionar hacia el script borrar pasando el id como parámetro por GET
header("location: /tp3/admin/borrar.php?id=$fila[idpersona]");
}

