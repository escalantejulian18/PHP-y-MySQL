<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/sge/includes/php/BaseDeDatos.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/sge/oficina/includes/OficinaEquipo.php';

class Oficina{
	
	public $idoficina;
	public $nombre;
	public $vector = array();
	
	
	public function setIdOficina($idoficina)
	{
		$this->idoficina=$idoficina;
	}
	
	public function setNombreOficina($nombre)
	{
		$this->nombre=$nombre;
	}
	
	
	public function getIdOficina()
	{
		return $this->idoficina;
	}
	
	public function getNombreOficina()
	{
		return $this->nombre;	
	}
	
	
	
	
	public function insertar($oficina){
	
		$oficina = new Oficina();
		//$id=$conector->getUltimoIdInsertadio();
		
		$id=$this->idoficina;
		$nombre=$this->nombre;
	
		$conector = new BaseDeDatos();

		//$consulta ="INSERT INTO `oficina`(`idoficina`, `nombre`) VALUES ($id,'$nombre')";
		$consulta ="INSERT INTO `oficina`(`nombre`) VALUES ('$nombre')";
	
		$conector->query($consulta);
	
	}
	
		
		public function eliminar($id){
	
			$conector = new BaseDeDatos();
	
			$consulta ="DELETE FROM oficina WHERE idoficina=$id";
	
			$conector->query($consulta);
	
		}
	
	
		public function modificar($oficina){
	
			$conector = new BaseDeDatos();
	
			$id=$this->getIdOficina();
			$nombre=$this->getNombreOficina();
		
			$consulta ="UPDATE `oficina` SET `idoficina`=$id,`nombre`='$nombre' WHERE idoficina=$id";
	
			$conector->query($consulta);
	
		}
	
	
			public function buscar($id)
			{
				$conector = new BaseDeDatos();
	
				$consulta ="SELECT * FROM oficina WHERE idoficina = $id";
	
				$conector->query($consulta);
	
				$fila = $conector->fetchArray();
	
				$oOficina = new Oficina();
				
				$oOficina->setIdOficina($fila['idoficina']);
				$oOficina->setNombreOficina($fila['nombre']);
					
				$resultados = $oOficina;
	
				return $resultados;
			}
			
			
			public function getAll (){
			
				$conector = new BaseDeDatos();
			
				$consulta = "SELECT * FROM oficina";
			
				$result=$conector->query($consulta);
			
				$resultados = array();
			
				while ( ( $fila = $conector->fetchArray() ) != false ){
					$oOficina = new Oficina();
					$oOficina->setIdOficina($fila['idoficina']);
					$oOficina->setNombreOficina($fila['nombre']);
					$resultados[]=$oOficina;
				}
			
				return $resultados;
			
			}
				
			
			public function getCantidadEquipos($id){  //$id es el id de oficina
				
				$oOficinaEquipo = new OficinaEquipo();
				
				$lista = $oOficinaEquipo->buscarPorIdOficina($id);
				return count($lista);
			}
			
			public function agregarEquipo($oficinaequipo){
				
				$oficinaequipo = new OficinaEquipo();
				
				$oficina = new Oficina();
				
				$oficina->vector[$oficinaequipo->getIdOficinaEquipo()]=$oficinaequipo;
					
			}
			
			
}







