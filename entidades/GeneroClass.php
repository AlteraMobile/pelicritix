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
		$this->descripcion = "";
	}
	function __construct($descripcion){
		$this->descripcion 	= $descripcion;
	}

	// Accesadores
	public function getGeneroId(){
		return $this->genero_id;
	}
	public function getDescripcion(){
		return $this->descripcion;
	}

	// Mutadores
	public function setDescripcion($descripcion){
		$this->descripcion = $descripcion;
	}

} // end Clase
?>