<?php


// Incluyo la clase de base de datos
require_once $_SERVER['DOCUMENT_ROOT'] . '/sge/includes/php/BaseDeDatos.php';

// Incluyo la clase de empleado
require_once $_SERVER['DOCUMENT_ROOT'] . '/sge/empleado/includes/Empleado.php';

$hayError = false;

// Creo el objeto para luego establecer los valores recibidos
$oEmpleado = new Empleado();
// Establezco los valores
$oEmpleado->setApellido($_POST['apellido']);
$oEmpleado->setNombre($_POST['nombre']);
$oEmpleado->setLegajo($_POST['legajo']);

// Verifico si está seteado el ID para saber si tengo que agregaro modificar
if ( isset( $_POST['idEmpleado'] ) && $_POST['idEmpleado'] > 0 )
{
	$oEmpleado->setIdEmpleado($_POST['idEmpleado']);
	$hayError = !$oEmpleado->modificar($oEmpleado);
	$mensaje="Se han editado todos los datos.";

}
else
{
	$hayError = !$oEmpleado->insertar($oEmpleado);
	$mensaje = "Se han cargado los datos";
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
			<p><?php echo $mensaje; ?> </p>
			<p><a href="lista.php"><button type="button">Volver</button></a></p>
		</div>
		
	</div>
	
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/sge/includes/php/footer.php';?>

</body>
</html>