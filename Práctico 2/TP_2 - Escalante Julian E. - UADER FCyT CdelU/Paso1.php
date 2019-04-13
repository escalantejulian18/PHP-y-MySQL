
<?php 

session_start();

$usuario = '';
$contraseña = '';
$apellido = '';
$nombre = '';
$tipodocumento='';
$documento='';
$sexo='';
$nacionalidad='';




if ( isset($_SESSION['usuario']) )
{
	$usuario = $_SESSION['usuario'];
}

if ( isset($_SESSION['contrasenia']) )
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


<form action="Paso2.php" method="post">

<fieldset>

		<legend>Informacion Personal</legend>


			<p>
			<label>Usuario: </label>
			<input type="text" name=txtUsuario placeholder="Nombre Usuario" value="<?php echo $usuario; ?>">
			</p>
			
			<p>
			<label>Contraseña </label>
			<input type="password" name="Contraseña" placeholder="Contraseña" value="<?php echo $contraseña; ?>">
			</p>	
				
			<p>
			<label>Apellido: </label>
			<input type="text" name=txtApellido placeholder="Apellido" value="<?php echo $apellido; ?>">
			</p>
			
			<p>
			<label>Nombre: </label>
			<input type="text" name=txtNombre placeholder="Nombre" value="<?php echo $nombre; ?>">
			</p>
			
			<p>
			<label>Tipo documento: </label>
			<select name="TipoDocumento">
			<option value="DNI"selected>DNI </option>
			<option value="LC">Libreta Civica </option>
			<option value="LE" >Libreta de Enrolamiento </option>
			
			</select>
			</p>
			
			<p>
			<label>Nº Documento: </label>
			<input type="text" name=txtDocumento placeholder="00.000.000" value="<?php echo $documento; ?>">
			</p>
			
			<p>
			<label>Sexo: </label> <br>
			<input type="radio" id="rdSexoM" name="rdSexo" value="M" checked>
			<label for="rdSexoM">Masculino</label> <br>

			<input type="radio" id="rdSexoF" name="rdSexo" value="F">
			<label for="rdSexoF">Femenino</label> <br>
			</p>
			
			<p>
			<label>Nacionalidad: </label>
			<input type="text" name=txtNacionalidad placeholder="Nacionalidad" value="<?php echo $nacionalidad; ?>">
			</p>

</fieldset>

<p><input  type="submit" name="btSiguiente" value="Siguiente"></p>
</form>




<?php 
     require_once'Includes/php/pie.php';
?>

</body>
</html>