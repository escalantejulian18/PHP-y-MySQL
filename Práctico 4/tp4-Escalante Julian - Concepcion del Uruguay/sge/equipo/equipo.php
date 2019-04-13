<?php

// Incluyo la clase de base de datos
require_once $_SERVER['DOCUMENT_ROOT'] . '/sge/includes/php/BaseDeDatos.php';

// Incluyo la clase de empleado
require_once $_SERVER['DOCUMENT_ROOT'] . '/sge/empleado/includes/Empleado.php';

// Incluyo la clase de equipo
require_once $_SERVER['DOCUMENT_ROOT'] . '/sge/equipo/includes/Equipo.php';

// Creo el objeto para luego cargar los datos
$oEquipo = new Equipo();

// Verifico que el id esté seteado
if ( isset( $_GET['id'] ) == false || $_GET['id'] < 1 )
{
	header("location: lista.php");
}

// Cargo la información del equipo
$oEquipo->buscar($_GET['id']);

// Verifico que exista el equipo
if ( $oEquipo->getIdEquipo() < 1 )
{
	header("location: lista.php");
}

// Creo el objeto para luego obtener todos los empleados
$oEmpleado = new Empleado();

// Obtengo el array con todos los objetos de empleado
$aItems = $oEmpleado->getAll();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>SGE | Informaci&oacute;n de Empleado</title>
	<link rel="stylesheet" type="text/css" href="/sge/includes/css/style.css" />
</head>
<body>

<div class="wrapper">
	
	<div class="background"></div>
	
	<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/sge/includes/php/header.php';?>
	
	<div class="main">
		
		<div class="formulario">
			
			<form action="/sge/equipo/guardar.php" method="post">
				
				<input type="hidden" name="idEquipo" value="<?php echo $oEquipo->getIdEquipo(); ?>"/>
				
				<label for="descripcion">Descripci&oacute;n:</label>
				<input type="text" name="descripcion" value="<?php echo $oEquipo->getDescripcion(); ?>" placeholder="Ingrese la descripci&oacute;n..."/>
				
				<label for="ip">Direcci&oacute; de IP:</label>
				<input type="text" name="ip" value="<?php echo $oEquipo->getIp(); ?>" placeholder="Ej: 192.168.0.0"/>
				
				<label for="mac">Direcci&oacute;n MAC:</label>
				<input type="text" name="mac" value="<?php echo $oEquipo->getMac(); ?>" placeholder="Ej: 00:b2:3c:fc:17:e1"/>
				
				<label for="idEmpleado">Empleado:</label>
				<select name="idEmpleado">
					<?php foreach ( $aItems as $item )
					{
						$option = '<option value="' . $item->getIdEmpleado() . '"';
						
						if ( $oEquipo->getEmpleado()->getIdEmpleado() == $item->getIdEmpleado() ) 
						{
							$option .= ' selected="selected"';
						}
						
						$option .= ">{$item->getApellido()}, {$item->getNombre()} (L {$item->getLegajo()})'</option>";
						
						echo $option;
					}
					?>
				</select>
				
				<div class="buttons">
					<button type="submit">Guardar</button>
					<button type="button" onclick="window.history.back();">Cancelar</button>
				</div>
				
			</form>
			
		</div>
		
	</div>
	
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/sge/includes/php/footer.php';?>

</body>
</html>