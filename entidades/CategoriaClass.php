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
		$this->categoria_id = "";
		$this->descripcion = "";
	}

	// Accesadores
	public function getCategoriaId(){
		return $this->categoria_id;
	}	
	public function getDescripcion(){
		return $this->descripcion;
	}

	// Mutadores
	public function setCategoriaId($categoriaId){
		$this->categoria_id= $categoriaId;
	}
	public function setDescripcion($descripcion){
		$this->descripcion= $descripcion;
	}
} // end Class
?>