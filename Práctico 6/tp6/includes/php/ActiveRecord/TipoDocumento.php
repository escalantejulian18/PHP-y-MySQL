<?php

namespace Sgu\ActiveRecord;

// Incluimos la clase de active record base
require_once $_SERVER['DOCUMENT_ROOT'] . '/tp6/includes/php/ActiveRecord/ActiveRecord.php';

/**
 * Clase que administra los tipos de documentos
 * 
 * @author totote
 * @package \Sgu\ActiveRecord
 */
class TipoDocumento extends \Sgu\ActiveRecord\ActiveRecord
{
	private $_idTipoDocumento;
	private $_nombre;
	private $_descripcion;
	
	public function setIdTipoDocumento($valor)
	{
		$this->_idTipoDocumento = $valor;
	}
	
	public function getIdTipoDocumento()
	{
		return $this->_idTipoDocumento;
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
		$query = "insert into tipodocumento (nombre, descripcion) values('{$this->_nombre}','{$this->_descripcion}')";
		
		mysql_query($query, $this->_conexion);
		
		$this->_idTipoDocumento = mysql_insert_id($this->_conexion);
	}
	
	public function update($id)
	{
		$query = "update tipodocumento set nombre = '{$this->_nombre}', descripcion = '{$this->_descripcion}' where idtipodocumento = $id";
		
		mysql_query($query, $this->_conexion);
	}
	
	public function delete($id)
	{
		$query = "delete from tipodocumento where idtipodocumento = $id";
		
		mysql_query($query, $this->_conexion);
	}
	
	public function fetch($id)
	{
		$query = "select * from tipodocumento where idtipodocumento = $id";
		
		$resultado = mysql_query($query, $this->_conexion);
		
		$fila = mysql_fetch_assoc($resultado);
		
		$this->_idTipoDocumento = $fila['idtipodocumento'];
		$this->_nombre = $fila['nombre'];
		$this->_descripcion = $fila['descripcion'];
	}
}