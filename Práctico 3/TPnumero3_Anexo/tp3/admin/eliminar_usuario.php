<?php 

// Iniciamos o restauramos la sesi�n
session_start();

// Obtenemos el id del usuario
$idUsuario = $_GET['id'];

// Eliminamos el usuario desde la base de datos

// Redireccionamos hacia el men�
header('location: /tp3/admin/');