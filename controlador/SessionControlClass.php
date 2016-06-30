<?php

class SessionControl{

	// Atributos
	private $usuario;
	private $esActivo;
	
	// Constructores
	function __construct(){
		if(session_status() != PHP_SESSION_ACTIVE){
			session_start();
		}

		$this->verificarActivo();
	}

	// Métodos
	private function verificarActivo(){
		if(isset($_SESSION['usuario.activo'])){
			if($_SESSION['usuario.activo'] == "1"){
				$this->esActivo = true;
			}
		}
	}
	
	public function esLogged(){
		return isset($_SESSION['usuario.activo']);
	}

	public function getNombreUsuario(){
		if(isset($_SESSION['usuario.nombre_usuario'])){
			return $_SESSION['usuario.nombre_usuario'];
		}
		else{
			return "";
		}
	}

	public function cerrarSession(){
		session_destroy();
	}

	public function abrirSession($nombre_usuario, $activo){
		$_SESSION['usuario.nombre_usuario'] = $nombre_usuario;
		$_SESSION['usuario.activo'] = $activo;

		$this->verificarActivo();
	}

} // end Class

?>