<?php 
/**
*	Clase Critica
*	
*/
class Critica{

	// Atributos
	private $critica_id;
	private $comentario;
	private $fecha_critica;
	private $usuario_id;

	// Constructores
	function __construct(){
		$this->comentario = "";
		$this->fecha_critica = "";
		$this->usuario_id = "";
	}
	function Critica($comentario, $fecha_critica, $usuario_id){
		$this->comentario 	= $comentario;
		$this->fecha_critica = $fecha_critica;
		$this->usuario_id = $usuario_Id;
	}

	// Accesadores
	public function getCriticaId(){
		return $this->critica_id;
	}
	public function getComentario(){
		return $this->comentario;
	}
	public function getFechaCritica(){
		return $this->fecha_critica;
	}
	public function getUsuarioId(){
		return $this->usuario_id;
	}

	// Mutadores
	public function setComentario($comentario){
		$this->comentario = $comentario;
	}
	public function setFechaCritica($fecha_critica){
		$this->fecha_critica = $fecha_critica;
	}
	public function setUsuarioId($usuario_id){
		$this->usuario_id = $usuario_id;
	}

} // end Class
?>