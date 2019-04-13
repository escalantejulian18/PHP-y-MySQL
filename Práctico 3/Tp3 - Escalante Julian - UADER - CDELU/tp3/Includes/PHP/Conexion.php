<?php

function conectarBD(){
	
	$conexion = mysql_connect('127.0.0.1', 'root');
	mysql_select_db('sgu',$conexion);
	
	return $conexion;
	
}


function desconectarBD($conexion){
	mysql_close($conexion);
}


?>
