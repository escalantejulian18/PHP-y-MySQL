<?php

namespace Sgu\ActiveRecord;

// Incluimos la clase de active record base
require_once $_SERVER['DOCUMENT_ROOT'] . '/tp6/includes/php/ActiveRecord/ActiveRecord.php';

/**
 * Clase que administra los tipos de usuarios
 * 
 * @author totote
 * @package \Sgu\ActiveRecord
 */
class TipoUsuario extends \Sgu\ActiveRecord\ActiveRecord
{
	private $_idTipoUsuario;
	private $_nombre;
	private $_descripcion;
	
	public function setIdTipoUsuario($valor)
	{
		$this->_idTipoUsuario = $valor;
	}
	
	public function getIdTipoUsuario()
	{
		return $this->_idTipoUsuario;
	}
	
	public function setNombre($valor)
	{
		$this->_nombre = $valor;
	}
	
	public function getNombre()
	{
		return $this->_nombre;
	}
	
	public function setDescripcion($valor)
	{
		$this->_descripcion = $valor;
	}
	
	public function getDescripcion()
	{
		return $this->_descripcion;
	}
	
	public function insert()
	{
		$query = "insert into tipousuario (nombre, descripcion) values('{$this->_nombre}','{$this->_descripcion}')";
		
		mysql_query($query, $this->_conexion);
		
		$this->_idTipoUsuario = mysql_insert_id($this->_conexion);
	}
	
	public function update($id)
	{
		$query = "update tipousuario set nombre = '{$this->_nombre}', descripcion = '{$this->_descripcion}' where idtipousuario = $id";
		
		mysql_query($query, $this->_conexion);
	}
	
	public function delete($id)
	{
		$query = "delete from tipousuario where idtipousuario = $id";
		
		mysql_query($query, $this->_conexion);
	}
	
	public function fetch($id)
	{
		$query = "select * from tipousuario where idtipousuario = $id";
		
		$resultado = mysql_query($query, $this->_conexion);
		
		$fila = mysql_fetch_assoc($resultado);
		
		$this->_idTipoUsuario = $fila['idtipousuario'];
		$this->_nombre = $fila['nombre'];
		$this->_descripcion = $fila['descripcion'];
	}
}