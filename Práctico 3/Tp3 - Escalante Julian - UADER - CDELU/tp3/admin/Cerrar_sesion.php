<?php

// Iniciamos o restauramos la sesión
session_start();

// Destruímos la sesión
session_destroy();

// Redireccionamos al formulario de login
header('location: /tp3/admin/');
