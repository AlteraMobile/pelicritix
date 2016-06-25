<?php
require_once('/../entidades/UsuarioClass.php');
require_once('/../dao/UsuarioDAO.php');
require_once('/../dao/ConexionClass.php');

class UsuarioControl{

	// Atributos
	private $conexion;
	private $daoUsuario;
	private $usuario;

	// Constructores
	function __construct(){
		$this->conexion 	= new Conexion();
		$this->daoUsuario 	= new UsuarioDAO($this->conexion);
		$this->usuario 		= new Usuario();
	}
	function UsuarioControl($usuario){

		$this->conexion 	= new Conexion();
		$this->daoUsuario 	= new UsuarioDAO($this->conexion);
		$this->usuario 		= $usuario;
	}

	// Accesadores
	public function getConexion(){
		return $this->conexion;
	}
	public function getDaoUsuario(){
		return $this->daoUsuario;
	}
	public function getUsuario(){
		return $this->usuario;
	}

	// Mutadores
	public function setConexion($conexion){
		$this->conexion = $conexion;
	}
	public function setDaoUsuario($daoUsuario){
		$this->daoUsuario = $daoUsuario;
	}
	public function setUsuario($usuario){
		$this->usuario = $usuario;
	}

	// Métodos
	public function agregarUsuario() {
		echo "3";
		// Validación de Formulario para agregar Usuario
		$usuario = $this->usuario;

		$nombres 			= $usuario->getNombres();
		$apellidos 			= $usuario->getApellidos();
		$fechaNacimiento 	= $usuario->getFechaNacimiento();
		$nombreUsuario 		= $usuario->getNombreUsuario();
		$pass 				= $usuario->getPass();
		$pass2 				= $usuario->getPass2();
		$activo 			= $usuario->getActivo();

		if( empty($nombres) || is_null($nombres) || strlen($nombres) < 3 ){
			return false;
		}
		elseif( empty($apellidos) || is_null($apellidos) || strlen($apellidos) < 3 ) {
			return false;
		}
		elseif( empty($fechaNacimiento) || is_null($fechaNacimiento) ){
			return false;
		}
		elseif( empty($nombreUsuario) || is_null($nombreUsuario) || strlen($nombreUsuario) < 3 ) {
			return false;
		}
		elseif( empty($pass) || is_null($pass) || empty($pass2) || is_null($pass2) ){
			return false;
		}
		elseif ( $pass != $pass2 ) {
			return false;
		}
		elseif ( strlen($pass) < 6 ) {
			return false;
		}
		else {
			echo "4";
			$resultado = $this->daoUsuario->agregar($usuario);
			$this->conexion->cerrarConexion();
			//unset($this->usuario);
			return $resultado;
		}
	}

	public function listarUsuarios() {
		$usuarios = $this->daoUsuario->listar();
		
		foreach ($usuarios as $usuario){
			echo '<tr><td>'.$usuario->getUsuarioId().'</td>';
			echo '<td>'.$usuario->getNombres().'</td>';
			echo '<td>'.$usuario->getApellidos().'</td>';
			echo '<td>'.$usuario->getFechaNacimiento().'</td>';
			echo '<td>'.$usuario->getNombreUsuario().'</td>';
			echo '<td>';
			echo '<button class="btn btn-default btn-xs modificar_usuario" id="'.$usuario->getUsuarioId().'">
				<span class="glyphicon glyphicon-pencil"></span>
			</button>
			<button class="btn btn-default btn-xs eliminar_usuario" id="'.$usuario->getUsuarioId().'">
				<span class="glyphicon glyphicon-remove" ></span>
			</button></td></tr>';
		}
	}

}
?>