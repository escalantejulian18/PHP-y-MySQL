<?php 

// Iniciamos o restauramos la sesión
session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/tp3/Includes/PHP/Conexion.php';

if ((isset($_POST['idpersona']))==true){
	
	$conexion = conectarBD();
	
	print_r($_POST);

	$idpersona = $_POST['idpersona'];
	
	$query="select * from usuario where idpersona=$idpersona";
	$resultado=mysql_query($query,$conexion);
	$fila3=mysql_fetch_assoc($resultado);
	
	$idusuario=$fila3['idusuario']; // para obtener el id del usuario
	
	echo $fila3['idusuario'];
	
	
	$apellido = $_POST['apellido'];
	$nombre = $_POST['nombre'];
	$tipodocumento = $_POST['tipo_documento'];
	$documento = $_POST['numero_documento'];            //Informacion del usuario
	$sexo = $_POST['sexo'];
	$nacionalidad = $_POST['nacionalidad'];
	$email = $_POST['email'];
	$telefono = $_POST['telefono'];
	$celular = $_POST['celular'];
	$provincia = $_POST['provincia'];
	$localidad = $_POST['localidad'];
	
	$usuario = $_POST['nombre_usuario'];
	$contrasenia = $_POST['contrasenia'];              //Usuario y contrasenia
	$tipousuario = $_POST['tipo_usuario'];
	
	
	//consulta a usuario 				
	$query2 = "UPDATE `usuario` SET 
				`idpersona`=$idpersona,
				`idtipousuario`=$tipousuario,
				`nombreusuario`=$usuario,
				`contrasenia`=$contrasenia 
		   	  WHERE idusuario=$idusuario";
	
	$resultado2=mysql_query($query2,$conexion);
	var_dump($resultado2);

    //Consulta a persona
	$query ="UPDATE persona set 
				idtipodocumento=$tipodocumento,
				apellido='$apellido',
				nombre='$nombre',
				numerodocumento=$documento,
				sexo='$sexo',                         
				nacionalidad='$nacionalidad', 
				email='$email', 
				telefono='$telefono', 
				celular='$celular', 
				provincia='$provincia', 
				localidad='$localidad'
			 where idpersona = $idpersona";
	
	
	$resultado=mysql_query($query, $conexion);
	var_dump($resultado);
	
	desconectarBD($conexion);
?>


<html>

	<head>
		 <title>Finalizar edicion</title>
	</head>
	<body>
	
	<hr>
	<h2>Edicion Finalizada</h2>
	<hr>
	
	<a href=/tp3/admin/Listar.php><button>Volver Listado</button></a>
	
	</body>





</html>

<?php }?>
