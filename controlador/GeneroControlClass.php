<?php
require_once('/../entidades/ActorClass.php');
require_once('/../dao/GeneroDAO.php');
require_once('/../dao/ConexionClass.php');

class GeneroControl{

	// Atributos
	private $conexion;
	private $daoGenero;
	private $genero;

	// Constructores
	function __construct(){
		$this->conexion 	= new Conexion();
		$this->daoGenero 	= new GeneroDAO($this->conexion);
		$this->genero 		= new Genero();
	}
	

	// Accesadores
	public function getConexion(){
		return $this->conexion;
	}
	public function getDaoGenero(){
		return $this->daoGenero;
	}
	public function getGenero(){
		return $this->Genero;
	}

	// Mutadores
	public function setConexion($conexion){
		$this->conexion = $conexion;
	}
	public function setDaoGenero($daoGenero){
		$this->daoActor = $daoGenero;
	}
	public function setGenero($genero){
		$this->genero = $genero;
	}

	

	public function comboGenero() {
		$generos = $this->daoGenero->listar();
		
		foreach ($generos as $generocombo){
			echo '<OPTION VALUE="'.$generocombo->getGeneroId().'">'.$generocombo->getDescripcion().'</option>';
			
		}
	}

}
?>