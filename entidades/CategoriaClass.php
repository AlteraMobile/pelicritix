<?php 
/**
*	Clase Categoria
*	
*/
class Categoria{

	// Atributos
	private $categoria_id;
	private $descripcion;

	// Constructores
	function __construct(){
		$this->descripcion = "";
	}
	function __construct($descripcion){
		$this->descripcion 	= $descripcion;
	}

	// Accesadores
	public function getCategoriaId(){
		return $this->categoria_id;
	}	
	public function getDescripcion(){
		return $this->descripcion;
	}

	// Mutadores
	public function setDescripcion(){
		$this->descripcion;
	}
} // end Class
?>