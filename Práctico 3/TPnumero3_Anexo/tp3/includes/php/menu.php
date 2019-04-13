<ul class="menu">
	<?php
	if ( isset($_SESSION['usuario_logueado']) == true && $_SESSION['usuario_logueado'] == true )
	{
		echo "<li><a href='/tp3/admin/cerrar_sesion.php'>Cerrar Sesi&oacute;n</a></li>";
		echo "<li><a href='/tp3/admin/'>Inicio</a></li>";
		echo "<li>" . $_SESSION['info_personal']['nombre'] . " " . 
			$_SESSION['info_personal']['apellido'] . " (" .
			$_SESSION['info_usuario']['nombre'] . ")</li>";
	}
	else
	{
		echo "<li><a href='/tp3/admin/'>Iniciar Sesi&oacute;n</a></li>";
	}
	?>
</ul>