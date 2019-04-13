<?php

// Incluyo la clase de base de datos
require_once $_SERVER['DOCUMENT_ROOT'] . '/sge/includes/php/BaseDeDatos.php';

// Incluyo la clase de empleado
require_once $_SERVER['DOCUMENT_ROOT'] . '/sge/empleado/includes/Empleado.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/sge/equipo/includes/Equipo.php';


// Creo el objeto para luego obtener todos los empleados
$oEmpleado = new Empleado();

// Obtengo el array con todos los objetos de empleado
$aItems = $oEmpleado->getAll();

$oEquipo = new Equipo();

if (isset($_GET['id'])==true){

	$aux = $oEquipo->buscar($_GET['id']);

}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>SGE | Agregar Equipo</title>
	<link rel="stylesheet" type="text/css" href="/sge/includes/css/style.css" />
</head>
<body>

<div class="wrapper">
	
	<div class="background"></div>
	
	<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/sge/includes/php/header.php';?>
	
	<div class="main">
		
		<div class="formulario">
			
			<form action="/sge/equipo/guardar.php" method="post">
			
				<input type="hidden" name="idEquipo" value="<?php echo $aux->idequipo; ?>">
				
				<label for="descripcion">Descripci&oacute;n:</label>
				<input type="text" name="descripcion" value="<?php echo $aux->descripcion?>"/>
				
				<label for="ip">Direcci&oacute; de IP:</label>
				<input type="text" name="ip" value="<?php echo $aux->direccionIP?>"/>
				
				<label for="mac">Direcci&oacute;n MAC:</label>
				<input type="text" name="mac" value="<?php echo $aux->direccionMAC?>"/>
				
				<label for="idEmpleado">Empleado:</label>
				<select name="idEmpleado">
					<?php foreach ( $aItems as $item ) { ?>
					<option value="<?php echo $item->getIdEmpleado(); ?>"><?php echo $item->getApellido() . ', ' . $item->getNombre() . ' (L ' . $item->getLegajo() . ')'; ?></option>
					<?php } ?>
				</select>
				
				<div class="buttons">
					<button type="submit">Guardar</button>
					<button type="button" onclick="window.history.back();">Atras</button>
				</div>
				
			</form>
			
		</div>
		
	</div>
	
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/sge/includes/php/footer.php';?>

</body>
</html>