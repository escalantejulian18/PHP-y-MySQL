<?php
namespace Sgu\Singleton;

class BasedeDatos{
	
	private static $_instance;
	private $_conexion; 

	private function __construct(){

		$this->_conexion = mysql_connect('127.0.0.1','root');
		mysql_select_db('sgu', $this->_conexion);
	}
	
	public static function getInstance(){
		
		if ( self::$_instance == null ){
				
			self::$_instance = new BaseDeDatos();
		}
	
		return self::$_instance;
	}
	
	public function getConexion(){
			
		return $this->_conexion;
	}
}
