<?php 

// Iniciamos o restauramos la sesión
session_start();

// Inicializamos la variable que contendra el mensaje respecto al inicio de sesión
$mensaje = "";
$_SESSION['usuario_logueado']=false;
$_SESSION['info_personal']='';
$_SESSION['info_usuario']='';

// Verificamos si se han enviado las credenciales
if ( isset($_POST['nombre_usuario'], $_POST['contrasenia']) == true && $_POST['nombre_usuario'] != null && $_POST['contrasenia'] != null )
{
	
	$usuario=$_POST['nombre_usuario'];
	$contrasenia=$_POST['contrasenia'];
	
	// Debemos conprobar contra la base de datos si las credenciales son correctas
	require_once $_SERVER['DOCUMENT_ROOT'] . '/tp3/Includes/PHP/Conexion.php';
	$conexion=conectarBD();
	
	$query="select * from usuario";
	$resultado=mysql_query($query,$conexion);
	
	while (($fila = mysql_fetch_assoc($resultado)) != false){

		if(($fila['nombreusuario']==$usuario)&&($fila['contrasenia']==$contrasenia)){
			
			$id=$fila['idpersona'];
			
			$query="select * from persona where idpersona=$id";
			$resultado2=mysql_query($query,$conexion);
			$fila2=mysql_fetch_assoc($resultado2);      //fila2 contiene la informacion del usuario
			
			$_SESSION['usuario_logueado']=true;
			$_SESSION['info_personal']=array('nombre'=>$fila2['nombre'],
											           'apellido'=>$fila2['apellido'],
			                                            );
			$_SESSION['info_usuario']=array('nombreU'=>$fila['nombreusuario'],
					                                  'tipo_usuario'=>$fila['idtipousuario'],
			                                          );	
		}
	}
	
   $mensaje="Bienvenido ".$fila['nombreusuario'];
   
	
	// Si las credenciales son correctas debemos establecer los valores en las variables de sesión
	// y luego redireccionarlo hacia el menú de administración
	
	// Si las credenciales no son correctas debemos informarle al usuario el debido mensaje

   
   
}
else
{
	$mensaje = "No se han ingresado las credenciales de acceso";
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="ISO-8859-1">
	<title>SGU | Iniciar Sesi&oacute;n</title>
	<link type="text/css" rel="stylesheet" href="/tp3/includes/css/estilos.css">
</head>
<body>

<div class="wraper">

	<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/tp3/includes/php/header.php'; ?>
	
	<fieldset>
		<legend>Validaci&oacute;n de credenciales</legend>
		
		<div class="center mensaje">
			
		
			<p><?php if ($_SESSION['usuario_logueado']==true){
			   echo "Bienvenido";?> <br/>
			   <a href="menu.php"><button>Empezar</button></a><?php }
			   else{ echo "Ha ocurrdio algun error, Verifique su usuario y clave"?> <br/>
			   <input type="button" value="Volver" onclick="history.back();" class="button"> <?php }?>
			</p>
		</div>
		
	</fieldset>
	
	<div class="push"></div>
	
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/tp3/includes/php/footer.php'; ?>
</body>
</html>