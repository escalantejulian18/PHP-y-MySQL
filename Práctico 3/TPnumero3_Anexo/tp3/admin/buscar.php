<?php 

// Iniciamos o restauramos la sesi�n
session_start();

// Obtener el id del usuario desde la base de datos

// Redireccionar hacia el script borrar pasando el id como par�metro por GET
header('location: /tp3/admin/borrar.php?id=');