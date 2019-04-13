<?php 

// Iniciamos o restauramos la sesión
session_start();

// Obtener el id del usuario desde la base de datos

// Redireccionar hacia el script borrar pasando el id como parámetro por GET
header('location: /tp3/admin/borrar.php?id=');