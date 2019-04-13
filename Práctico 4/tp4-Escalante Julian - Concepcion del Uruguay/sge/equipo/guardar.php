<?php

// Incluyo la clase de base de datos
require_once $_SERVER['DOCUMENT_ROOT'] . '/sge/includes/php/BaseDeDatos.php';

// Incluyo la clase de empleado
require_once $_SERVER['DOCUMENT_ROOT'] . '/sge/empleado/includes/Empleado.php';

// Incluyo la clase de equipo
require_once $_SERVER['DOCUMENT_ROOT'] . '/sge/equipo/includes/Equipo.php';

$hayError = false;

// Obtengo El empleado
$oEmpleado = new Empleado();
$aux = $oEmpleado->buscar($_POST['idEmpleado']);

// Creo el objeto para luego establecer los valores recibidos
$oEquipo = new Equipo();

// Establezco los valores
$oEquipo->setDescripcion($_POST['descripcion']);
$oEquipo->setIp($_POST['ip']);
$oEquipo->setMac($_POST['mac']);
$oEquipo->setEmpleado($aux->idempleado);

print_r($oEquipo);

// Verifico si está seteado el ID para saber si tengo que agregaro modificar
if ( isset( $_POST['idEquipo'] ) && $_POST['idEquipo'] > 0 )
{
	$oEquipo->setIdEquipo($_POST['idEquipo']);
	$hayError = !$oEquipo->modificar($oEquipo);
	$mensaje="Se han realizado los cambios";
}
else
{
	$hayError = !$oEquipo->insertar($oEquipo);
	$mensaje="Se han registrado el nuevo equipo";
}

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
	<title>SGE | Guardar Empleado</title>
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