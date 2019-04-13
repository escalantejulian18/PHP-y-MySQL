<?php

/**
 * Clase que administra las conexiones a la base de datos
 * 
 * @author emmanuel
 */
class BaseDeDatos
{
	/**
	 * Host de conexión al servido MySQL
	 * 
	 * @var string
	 */
	const HOST = '127.0.0.1';
	
	/**
	 * Usuario para el servidor MySQL
	 * 
	 * @var string
	 */
	const USER = 'root';
	
	/**
	 * Contraseña para el servidor MySQL
	 * 
	 * @var string
	 */
	const PASS = '';
	
	/**
	 * Base de Datos con la que trabajaremos
	 * 
	 * @var string
	 */
	const DB = 'sge';
	
	/**
	 * Atributo estático que contiene la conexión a la base de datos
	 * 
	 * @var resource
	 */
	public static $conexion;
	
	/**
	 * Resource de la última consulta hecha
	 * 
	 * @var resource
	 */
	public  $consulta;
	
	/**
	 * Error de MySQL
	 * 
	 * @var string
	 */
	public $error;
	
	/**
	 * Cuando se crea el objeto verifica que no se haya conectado
	 * 
	 * @param string $host Nombre de host
	 * @param string $user Nombre de usuario
	 * @param string $pass Contraseña para el usuario
	 * @param string $db Base de datos con la que trabajaremos
	 * @return BaseDeDatos
	 */
	public function __construct($host = self::HOST, $user = self::USER, $pass = self::PASS, $db = self::DB)
	{
		// Verificamos si no hay una conexión anterior
		if ( self::$conexion == null )
		{
			// Nos conectamos a MySQL
			$conexion = mysql_connect($host, $user, $pass);
			
			// Verificamos que no hay error en la conexión
			if ( $this->_verificarSiHayError($conexion) == false )
			{
				// Seleccionamos la base de datos
				mysql_select_db($db, $conexion);
			}
			
			// Verificamos que no haya error al seleccionar la base de datos
			if ( $this->_verificarSiHayError($conexion) == false )
			{
				// Si no hubo ningún problema establecemos la conexión en el atributo estático
				self::$conexion = $conexion;
			}
		}
	}
	
	/**
	 * Verifica si hay un error en la última ejecución de MySQL y formatea el error en el atributo $_error
	 * 
	 * @param resource $conexion
	 * @return boolean
	 */
	private function _verificarSiHayError($conexion = null)
	{
		// Inicializamos el error diciendo que no hay error
		$this->error = '';
		
		// Si el parámetro es nulo entonces tomo la conexión interna
		if ( $conexion == null )
		{
			$conexion = self::$conexion;
		}
		
		// Verificamos si hay un error en la última ejecución de MySQL
		if ( mysql_errno( $conexion ) != 0 )
		{
			$this->error = "(" . mysql_errno( $conexion ) . ") " . mysql_error( $conexion );
			return true;
		}
		
		return false;
	}
	
	/**
	 * Pregunta si hay un error en la ultima acción sobre MySQL
	 * 
	 * @return boolean
	 */
	public function ocurrioUnError()
	{
		return $this->_verificarSiHayError();
	}
	
	/**
	 * Verifica si hay un error en la ultima sentencia para devolverlo, de lo contrario devuelve false
	 * 
	 * @return boolean|string
	 */
	public function getError()
	{
		// Verificamos si se ha establecido algún error
		if ( $this->error == '' )
		{
			return false;
		}
		
		return $this->error;
	}
	
	/**
	 * Ejecuta una consulta a la base de datos y devuelve true o false dependiendo si tuvo éxito en la ejecución
	 * 
	 * @param string $consulta
	 * @return boolean
	 */
	public function query($consulta)
	{
		$this->consulta = mysql_query($consulta, self::$conexion);
		
		return $this->_verificarSiHayError();
	}
	
	/**
	 * Devuelve el último id que se generó al insertar un registro
	 * 
	 * @return integer
	 */
	public function getUltimoIdInsertadio()
	{
		return mysql_insert_id(self::$conexion);
	}
	
	/**
	 * Devuelve una fila como un array
	 * 
	 * @param int $modo Por defecto toma el valor de MYSQL_ASSOC
	 * @return array|boolean
	 */
	public function fetchArray($modo = MYSQL_ASSOC)
	{
		// Verificamos que no haya error en la consulta ejecutada
		if ( $this->_verificarSiHayError() == true )
		{
			return false;
		}
		
		$fila = mysql_fetch_array($this->consulta, $modo);
		
		return $fila;
	}
	
	/**
	 * Devuelve una fila como un objeto
	 * 
	 * @return object|boolean
	 */
	public function fetchObject()
	{
		// Verificamos que no haya error en la consulta ejecutada
		if ( $this->_verificarSiHayError() == true )
		{
			return false;
		}
		
		$fila = mysql_fetch_object($this->consulta);
		
		return $fila;
	}
}