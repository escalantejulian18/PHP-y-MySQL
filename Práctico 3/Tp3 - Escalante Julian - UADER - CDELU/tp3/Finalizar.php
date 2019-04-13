<?php

// Iniciamos o restauramos la sesión
session_start();

// Variable que contendrá el mensaje respecto a si se pudo o no agregar al usuario
$mensaje = "";
$mensaje2 = "";

// Obtener toda la información desde la sesión y persistir en la base de datos


// Luego de agregar toda la información, eliminamos la información de la sesión
session_destroy();

// Si se ha podido guardar la información, se establece el mensaje de éxito
$mensaje = "Usuario registrado exitosamente.";
$mensaje2 = "El usuario no ha podido ser registrado.";


require_once 'Includes/PHP/Conexion.php';  



//$_SESSION['informacion_personal'] paso1
//$_SESSION['informacion_contacto'] paso2

if (isset($_SESSION['informacion_contacto'])==true){
	
	//tabla persona
	$apellido = $_SESSION['informacion_personal']['apellido'];
	$nombre = $_SESSION['informacion_personal']['nombre'];
	$tipodocumento = $_SESSION['informacion_personal']['tipo_documento']; 
	$documento = $_SESSION['informacion_personal']['numero_documento']; 
	$sexo = $_SESSION['informacion_personal']['sexo'];
	$nacionalidad = $_SESSION['informacion_personal']['nacionalidad']; 
	$email = $_SESSION['informacion_contacto']['email'];
	$telefono = $_SESSION['informacion_contacto']['telefono'];
	$celular = $_SESSION['informacion_contacto']['celular'];
	$domicilio = $_SESSION['informacion_contacto']['domicilio'];
	$provincia = $_SESSION['informacion_contacto']['provincia'];
	$localidad = $_SESSION['informacion_contacto']['localidad'];
	
	//tabla usuario
	$usuario = $_SESSION['informacion_personal']['nombre_usuario'];
	$contrasenia = $_SESSION['informacion_personal']['contrasenia'];
	$tipousuario = $_SESSION['informacion_personal']['tipo_usuario'];
	


$conexion = conectarBD(); //conectamos al motor de base de datos

//mysql_select_db("sgu",$conexion);

$query ="INSERT INTO persona(idtipodocumento, apellido, nombre, numerodocumento, sexo, nacionalidad, email, telefono, celular, provincia, localidad) 
		VALUES ($tipodocumento,'$apellido','$nombre',$documento,'$sexo','$nacionalidad','$email','$telefono','$celular','$provincia','$localidad')";
 
$resultado=mysql_query($query, $conexion);

$idPersona= mysql_insert_id();
$query ="INSERT INTO usuario(idpersona,idtipousuario, nombreusuario, contrasenia) 
		VALUES ($idPersona,$tipousuario,'$usuario','$contrasenia')";

$resultado2=mysql_query($query, $conexion);
desconectarBD($conexion);
}


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="ISO-8859-1">
	<title>SGU | Formulario de Inscripc&oacute;n</title>
	<link type="text/css" rel="stylesheet" href="/tp3/Includes/CSS/estilos.css">
</head>
<body>

<div class="wraper">

	<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/tp3/Includes/PHP/Header.php'; ?>
	<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/tp3/Includes/PHP/Menu.php'; ?>
	
	<fieldset>
		<legend>Registro Finalizado</legend>
		
		<div class="center mensaje">
			<p><?php if (($resultado)==true && ($resultado2)==true){
						echo $mensaje; 
						} else {
								echo $mensaje2;
								}?>
			
			</p>
			<p>
				<input type="button" value="Inicio" onclick="document.location='/tp3/'" class="button">
			</p>
		</div>
		
	</fieldset>
	
	<div class="push"></div>
	
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/tp3/includes/php/footer.php'; ?>
</body>
</html>