<?php

// Iniciamos o restauramos la sesi�n
session_start();

// Destru�mos la sesi�n
session_destroy();

// Redireccionamos al formulario de login
header('location: /tp3/admin/');
