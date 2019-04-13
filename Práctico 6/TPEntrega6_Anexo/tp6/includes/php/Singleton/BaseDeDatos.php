<?php

namespace Sgu\Singleton;

/**
 * Clase que administra la conexión a la base de datos
 * 
 * @author totote
 * @package \Sgu\Singleton
 */
class BaseDeDatos
{
	private static $_instance;
	private static $_host = '127.0.0.1';
	private static $_usuario = 'root';
	private static $_contrasenia = '1234';
	private static $_base = 'sgu';
	
	private $_conexion;
	
	private function __construct()
	{
		$this->_conexion = mysql_connect(self::$_host, self::$_usuario, self::$_contrasenia);
		
		if ( mysql_errno($this->_conexion) != 0 )
		{
			throw new \Exception(mysql_error($this->_conexion));
		}
		
		mysql_select_db(self::$_base, $this->_conexion);
		
		if ( mysql_errno($this->_conexion) != 0 )
		{
			throw new \Exception(mysql_error($this->_conexion));
		}
	}
	
	public static function getInstance()
	{
		if ( self::$_instance == null )
		{
			self::$_instance = new BaseDeDatos();
		}
		
		return self::$_instance;
	}
	
	public function getConexion()
	{
		return $this->_conexion;
	}
}