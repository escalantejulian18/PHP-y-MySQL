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
	
		<nav class="app_menu">
		
			<h3>Aplicaciones:</h3>
			
			<ul>
				
				<li>
					<a href="/sge/oficina" title="Oficinas">
						<img src="/sge/img/oficina.png" alt="oficina.png" />
						Oficinas
					</a>
				</li>
				
				<li>
					<a href="/sge/empleado" title="Empleados">
						<img src="/sge/img/empleado.png" alt="empleado.png" />
						Empleados
					</a>
				</li>
				
				<li>
					<a href="/sge/equipo" title="Equipos">
						<img src="/sge/img/equipo.png" alt="equipo.png" />
						Equipos
					</a>
				</li>
				
			</ul>
		
		</nav>
	
	</div>
	
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/sge/includes/php/footer.php';?>

</body>
</html>