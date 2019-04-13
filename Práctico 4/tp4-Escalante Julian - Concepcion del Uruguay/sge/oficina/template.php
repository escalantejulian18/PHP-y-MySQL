<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/sge/equipo/includes/Equipo.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/sge/oficina/includes/Oficina.php';


$oOficina = new Oficina();
$oEquipo = new Equipo();

$ListaOficina = $oOficina->getAll();
$ListaEquipo = $oEquipo->getAll();

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>SGE | Aplicaciones</title>
	<link rel="stylesheet" type="text/css" href="/sge/includes/css/style.css" />
</head>
<body>

<div class="wrapper">
	
	<div class="background"></div>
	
	<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/sge/includes/php/header.php';?>
	
	<div class="main">
	
	<form action="agregar_equipo.php" method="post">
			
			
			<label>Equipo:</label>
				<select name="idEquipo">
					<?php foreach ( $ListaEquipo as $item ) { ?>
					<option value="<?php echo $item->getIdEquipo(); ?>"><?php echo $item->getDescripcion(); ?></option>
					<?php } ?>
				</select>
			
			<label>Oficina:</label>
				<select name="idOficina">
					<?php foreach ( $ListaOficina as $item ) { ?>
					<option value="<?php echo $item->getIdOficina(); ?>"><?php echo $item->getNombreOficina(); ?></option>
					<?php } ?>
				</select>
			<div>
			<input type="submit" value="Enviar"> <a href="lista.php"><button>Atras</button></a>
			
			</div> 
	
	</form>	
		
	
		
	</div>
	
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/sge/includes/php/footer.php';?>

</body>
</html>