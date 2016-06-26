<?php 
/**
*	Clase Genero
*	
*/
class Genero{

	// Atributos
	private $genero_id;
	private $descripcion;

	// Mutadores
	function __construct(){
		$this->generoId = "";
		$this->descripcion = "";
	}
	

	// Accesadores
	public function getGeneroId(){
		return $this->genero_id;
	}
	public function getDescripcion(){
		return $this->descripcion;
	}

	// Mutadores
	public function setGeneroId($generoId){
		return $this->genero_id = $generoId;
	}

	public function setDescripcion($descripcion){
		$this->descripcion = $descripcion;
	}

} // end Clase
?>