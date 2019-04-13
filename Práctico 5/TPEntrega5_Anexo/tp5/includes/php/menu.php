<ul class="menu">
	<?php
	// Incluimos la clase de singleton
	require_once $_SERVER['DOCUMENT_ROOT'] . '/tp5/includes/php/Singleton/Sesion.php';
	
	// Obtenemos la instancia del Registry
	$oRegistry = \Sgu\Singleton\Sesion::getInstance()->getRegistry();
	
	if ( $oRegistry->exists('usuario_logueado') == true && $oRegistry->get('usuario_logueado') == true )
	{
		echo "<li><a href='/tp5/admin/cerrar_sesion.php'>Cerrar Sesi&oacute;n</a></li>";
		echo "<li><a href='/tp5/admin/'>Inicio</a></li>";
		echo "<li>" . $oRegistry->get('persona')->getNombre() . " " . 
			$oRegistry->get('persona')->getApellido() . " (" .
			$oRegistry->get('usuario')->getNombre() . ")</li>";
	}
	else
	{
		echo "<li><a href='/tp5/admin/'>Iniciar Sesi&oacute;n</a></li>";
	}
	?>
</ul>