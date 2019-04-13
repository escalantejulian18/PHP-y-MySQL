<?php 

session_start();

if (isset($_POST['btSiguiente']))
{
	$_SESSION['correo'] = $_POST['txtCorreo'];
	$_SESSION['telefono'] = $_POST['txtTelefono'];
	$_SESSION['domicilio'] = $_POST['txtDomicilio'];
	$_SESSION['celular'] = $_POST['txtCelular'];
	$_SESSION['localidad'] = $_POST['txtLocalidad'];
	$_SESSION['provincia'] = $_POST['Provincia'];
}

$usuario = '';
$contraseña = '';
$apellido = '';
$nombre = '';
$tipodocumento='';
$documento='';
$sexo='';
$nacionalidad='';
$correo='';
$telefono = '';
$domicilio = '';
$celular='';
$provincia='';
$localidad='';

if ( isset($_SESSION['usuario']) )
{
	$usuario = $_SESSION['usuario'];
}

if ( isset($_SESSION['contraseña']) )
{
	$contraseña = $_SESSION['contraseña'];
}

if ( isset($_SESSION['apellido']) )
{
	$apellido = $_SESSION['apellido'];
}

if ( isset($_SESSION['nombre']) )
{
	$nombre = $_SESSION['nombre'];
}

if ( isset($_SESSION['tipoDocumento']) )
{
	$tipodocumento = $_SESSION['tipoDocumento'];
}

if ( isset($_SESSION['documento']) )
{
	$documento = $_SESSION['documento'];
}

if ( isset($_SESSION['sexo']) )
{
	$sexo = $_SESSION['sexo'];
}

if ( isset($_SESSION['nacionalidad']) )
{
	$nacionalidad = $_SESSION['nacionalidad'];
}

if ( isset($_SESSION['correo']) )
{
	$correo = $_SESSION['correo'];
}

if ( isset($_SESSION['telefono']) )
{
	$telefono = $_SESSION['telefono'];
}

if ( isset($_SESSION['domicilio']) )
{
	$domicilio = $_SESSION['domicilio'];
}

if ( isset($_SESSION['celular']) )
{
	$celular = $_SESSION['celular'];
}

if ( isset($_SESSION['provincia']) )
{
	$provincia = $_SESSION['provincia'];
}

if ( isset($_SESSION['localidad']) )
{
	$localidad = $_SESSION['localidad'];
}


?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>formulario</title>
</head>
<body>

<?php 
     require_once'Includes/php/cabecera.php';
?>	



<fieldset>

		<legend>Informacion Personal</legend>
		
		<p><strong>Usuario: </strong> <?php echo $usuario?> </p>
		<p><strong>Contraseña: </strong> <?php echo '****' ?> </p>
		<p><strong>Apellido: </strong> <?php echo $apellido?> </p>
		<p><strong>Nombre: </strong> <?php echo $nombre?> </p>
		<p><strong>Tipo Documento: </strong> <?php echo $tipodocumento?> </p>
		<p><strong>DNI: </strong> <?php echo $documento?> </p>
		<p><strong>Sexo: </strong> <?php echo $sexo?> </p>
		<p><strong>Nacionalidad: </strong> <?php echo $nacionalidad?> </p>

</fieldset>

<fieldset>

		<legend>Informacion Contacto</legend>
		
		<p><strong>Correo: </strong> <?php echo $correo?> </p>
		<p><strong>Teléfono: </strong> <?php echo $telefono?> </p>
		<p><strong>Celular: </strong> <?php echo $celular?> </p>
		<p><strong>Domicilio: </strong> <?php echo $domicilio?> </p>
		<p><strong>Provincia: </strong> <?php echo $provincia?> </p>
		<p><strong>Localidad: </strong> <?php echo $localidad?> </p>			

</fieldset>

<p><a href='Finalizar.php'><input type="submit" name="btsiguiente" value="Finalizar"></a></p>
<p><a href='Paso2.php'><input type="submit" name="btatras" value="Atrás"></a></p>

<?php 
     require_once'Includes/php/pie.php';
?>

</body>
</html>