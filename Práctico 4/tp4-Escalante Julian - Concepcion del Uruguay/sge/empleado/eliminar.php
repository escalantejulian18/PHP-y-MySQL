<?php

// Incluyo la clase de base de datos
require_once $_SERVER['DOCUMENT_ROOT'] . '/sge/includes/php/BaseDeDatos.php';

// Incluyo la clase de empleado
require_once $_SERVER['DOCUMENT_ROOT'] . '/sge/empleado/includes/Empleado.php';

$hayError = false;

// Creo el objeto para luego eliminar el registro
$oEmpleado = new Empleado();

// Verifico que el id esté seteado
if ( isset( $_GET['id'] ) == false || $_GET['id'] < 1 )
{
	header("location: lista.php");
}

// Cargo la información del empleado
$oEmpleado->buscar($_GET['id']);

// Verifico que exista el empleado
/*if ( $oEmpleado->getIdEmpleado() < 1 )
{
	header("location: lista.php");
}*/

$hayError = !$oEmpleado->eliminar($_GET['id']);

// Si no hubo error, vuelvo a la lista
if ( $hayError == false )
{
	header("location: lista.php");
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>SGE | Eliminar Empleado</title>
	<link rel="stylesheet" type="text/css" href="/sge/includes/css/style.css" />
</head>
<body>

<div class="wrapper">
	
	<div class="background"></div>
	
	<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/sge/includes/php/header.php';?>
	
	<div class="main">
		
		<div class="mensaje">
			<p> Se ha Eliminado al Empleado.  </p>
			<p><a href="lista.php"><button type="button" >Volver</button></a></p>
		</div>
		
	</div>
	
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/sge/includes/php/footer.php';?>

</body>
</html>