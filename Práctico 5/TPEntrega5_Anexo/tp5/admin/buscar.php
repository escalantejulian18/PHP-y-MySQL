<?php 

// Incluimos la clase de sesion


// Incluimos la clase factory


// Obtenemos la sesión


// Obtenemos un objeto de tipo persona


// Obtenemos un objeto de tipo usuario


// Buscamos la persona por el número de documento



// Buscamos el usuario por el id de persona


// Redireccionar hacia el script borrar pasando el id como parámetro por GET
if ( $oUsuario->getIdUsuario() != null )
{
	header('location: /tp5/admin/borrar.php?id=' . $oUsuario->getIdUsuario());
}
else
{
	header('location: /tp5/admin/borrar_usuario.php');
}