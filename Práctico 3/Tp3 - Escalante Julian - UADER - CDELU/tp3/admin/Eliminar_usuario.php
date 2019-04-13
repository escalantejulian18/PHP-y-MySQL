<?php 

// Iniciamos o restauramos la sesión
session_start();

require_once($_SERVER['DOCUMENT_ROOT'] . '/tp3/Includes/PHP/Conexion.php');

if (isset($_GET['id'])==true){
	
	$conexion=conectarBD();

	$persona=$_GET['id'];
	
	$query="DELETE FROM usuario WHERE idpersona = $persona";
	
	$resultado= mysql_query($query, $conexion);

	$query="DELETE FROM persona WHERE idpersona = $persona";
	
	$resultado= mysql_query($query, $conexion);

	desconectarBD($conexion);
?>

<html>

	<head></head>
	
	<body>
	<h2>Persona Eliminada</h2>
	
	<a href='listar.php'><button>Volver a Listado</button> </a>
	</body>

</html>

<?php 
}

?>