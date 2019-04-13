<?php

// Incluyo la clase de base de datos
require_once $_SERVER['DOCUMENT_ROOT'] . '/sge/includes/php/BaseDeDatos.php';

// Incluyo la clase de empleado
require_once $_SERVER['DOCUMENT_ROOT'] . '/sge/empleado/includes/Empleado.php';

// Incluyo la clase de equipo
require_once $_SERVER['DOCUMENT_ROOT'] . '/sge/equipo/includes/Equipo.php';

// Incluyo la clase de oficinaequipo
require_once $_SERVER['DOCUMENT_ROOT'] . '/sge/oficina/includes/OficinaEquipo.php';

// Incluyo la clase de oficina
require_once $_SERVER['DOCUMENT_ROOT'] . '/sge/oficina/includes/Oficina.php';

$hayError = false;

// Creo el objeto para luego establecer los valores recibidos
$oOficina = new Oficina();

// Establezco los valores
$oOficina->setNombreOficina($_POST['nombre']);

// Verifico si está seteado el ID para saber si tengo que agregaro modificar
if ( isset( $_POST['idOficina'] ) && $_POST['idOficina'] > 0 )
{
	$oOficina->setIdOficina($_POST['idOficina']);
	$hayError = !$oOficina->modificar($oOficina);
	$mensaje='Se han modificado el nombre de la oficina';
}
else
{
	$hayError = !$oOficina->insertar($oOficina);
	$mensaje='Se han registrado la oficina';
}

// Si no hubo error, vuelvo a la lista
/*if ( $hayError == false )
{
	header("location: lista.php");
}*/

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>SGE | Guardar Oficina</title>
	<link rel="stylesheet" type="text/css" href="/sge/includes/css/style.css" />
</head>
<body>

<div class="wrapper">
	
	<div class="background"></div>
	
	<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/sge/includes/php/header.php';?>
	
	<div class="main">
		
		<div class="mensaje">
			<p><?php echo $mensaje; ?></p>
			<p><a href="lista.php"><button type="button">Volver</button></a></p>
		</div>
		
	</div>
	
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/sge/includes/php/footer.php';?>

</body>
</html>