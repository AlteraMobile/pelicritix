<?php 
/**
*	Clase Usuario
*	
*/
class Usuario{

	// Atributos
	private $usuarioId;
	private $nombres;
	private $apellidos;
	private $fecha_nacimiento;
	private $nombre_usuario;
	private $pass;
	private $pass2;
	private $activo;

	// Constructores
	function __construct(){
		$this->usuarioId = "";
		$this->nombres = "";
		$this->apellidos = "";
		$this->fecha_nacimiento = "";
		$this->nombre_usuario = "";
		$this->pass = "";
		$this->pass2 = "";
		$this->activo = "";
	}
	function Usuario($usuarioId, $nombres, $apellidos, $fecha_nacimiento, $nombre_usuario, $pass, $pass2, $activo){
		$this->usuarioId = '';
		$this->nombres 	= $nombres;
		$this->apellidos = $apellidos;
		$this->fecha_nacimiento = $fecha_nacimiento;
		$this->nombre_usuario = $nombre_usuario;
		$this->pass = $pass;
		$this->pass2 = $pass2;
		$this->activo = $activo;
	}

	// Accesadores
	public function getUsuarioId(){
		return $this->usuarioId;
	}
	public function getNombres(){
		return $this->nombres;
	}
	public function getApellidos(){
		return $this->apellidos;
	}
	public function getFechaNacimiento(){
		return $this->fecha_nacimiento;
	}
	public function getNombreUsuario(){
		return $this->nombre_usuario;
	}
	public function getPass(){
		return $this->pass;
	}
	public function getPass2(){
		return $this->pass;
	}
	public function getActivo(){
		return $this->activo;
	}

	// Mutadores
	public function setUsuarioId($usuarioId){
		$this->usuarioId = $usuarioId;
	}
	public function setNombres($nombres){
		$this->nombres = $nombres;
	}
	public function setApellidos($apellidos){
		$this->apellidos = $apellidos;
	}
	public function setFechaNacimiento($fecha_nacimiento){
		$this->fecha_nacimiento = $fecha_nacimiento;
	}
	public function setNombreUsuario($nombre_usuario){
		$this->nombre_usuario = $nombre_usuario;
	}
	public function setPass($pass){
		$this->pass = $pass;
	}
	public function setPass2($pass2){
		$this->pass2 = $pass2;
	}
	public function setActivo($activo){
		$this->activo = $activo;
	}

	// Métodos

	
} // end Class
?>