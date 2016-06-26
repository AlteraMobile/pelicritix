<?php
require_once('ConexionClass.php');
require_once('/../entidades/UsuarioClass.php');

class UsuarioDAO{

	// Atributos
	private $conn;

	// Constructores
	function __construct($conn){
		$this->conn = $conn;
	}

	// Métodos
	
	public function login($nombreUsuario, $pass){

	}

	public function agregar($usuario){
		$nombres 			= $usuario->getNombres();
		$apellidos 			= $usuario->getApellidos();
		$fechaNacimiento 	= $usuario->getFechaNacimiento();
		$nombreUsuario 		= $usuario->getNombreUsuario();
		$pass 				= $usuario->getPass();
		$activo 			= $usuario->getActivo();

		$sql = "INSERT INTO usuarios (nombres, apellidos, fecha_nacimiento, nombre_usuario, pass, activo) VALUES ('".$nombres."','".$apellidos."','".$fechaNacimiento."','".$nombreUsuario."','".$pass."','".$activo."')";
		$this->conn->abrirConexion();
		if( $this->conn->querys($sql) ){
			return true;
		}
		else {
			return false;
		}
		$this->conn->cerrarConexion();
	}
	public function buscar($id){
		$sql = "SELECT usuario_id, nombres, apellidos, fecha_nacimiento, nombre_usuario, pass, activo  FROM usuarios WHERE usuario_id = '".$id."'";
		$this->conn->abrirConexion();
			$resultado = $this->conn->select($sql);
			$usuarios = array();

			while( $fila = $resultado->fetch_array() ) {
				$usuario = new Usuario();
				$usuario->setUsuarioId($fila['usuario_id']);
				$usuario->setNombres($fila['nombres']);
				$usuario->setApellidos($fila['apellidos']);
				$usuario->setFechaNacimiento($fila['fecha_nacimiento']);
				$usuario->setNombreUsuario($fila['nombre_usuario']);
				$usuario->setPass($fila['pass']);
				$usuario->setActivo($fila['activo']);
				$usuarios[] = $usuario;
			}
			$this->conn->cerrarConexion();
			return $usuarios;
	}
	public function modificar($usuario){

		$usuarioId 			= $usuario->getUsuarioId();
		$nombres 			= $usuario->getNombres();
		$apellidos 			= $usuario->getApellidos();
		$fechaNacimiento 	= $usuario->getFechaNacimiento();
		$nombreUsuario 		= $usuario->getNombreUsuario();
		$pass 				= $usuario->getPass();
		$activo 			= $usuario->getActivo();

		$sql = "UPDATE usuarios 
				SET nombres = '".$nombres."'
				  , apellidos = '".$apellidos."'
				  , fecha_nacimiento = '".$fechaNacimiento."'
				  , nombre_usuario = '".$nombreUsuario."',
				  , pass = '".$pass."' WHERE usuario_id = ".$usuarioId;
		$this->conn->abrirConexion();
		//return $preparar_consulta->execute();
		if( $this->conn->querys($sql) ){
			return true;
		}
		else {
			return false;
		}
		$this->conn->cerrarConexion();
	}
	public function eliminar($usuarioId){
		$sql = "DELETE FROM usuarios WHERE usuario_id ='".$usuarioId."'";
		$this->conn->abrirConexion();
		if( $this->conn->querys($sql) ){
			return true;
		}
		else {
			return false;
		}
		$this->conn->cerrarConexion();
	}
	public function listar()
		{
			$sql = "SELECT usuario_id, nombres, apellidos, fecha_nacimiento, nombre_usuario FROM usuarios WHERE activo = '1'";
			$this->conn->abrirConexion();
			$resultado = $this->conn->select($sql);
			$usuarios = array();

			while( $fila = $resultado->fetch_array() ) {
				$usuario = new Usuario();
				$usuario->setUsuarioId($fila['usuario_id']);
				$usuario->setNombres($fila['nombres']);
				$usuario->setApellidos($fila['apellidos']);
				$usuario->setFechaNacimiento($fila['fecha_nacimiento']);
				$usuario->setNombreUsuario($fila['nombre_usuario']);
				$usuarios[] = $usuario;
			}
			$this->conn->cerrarConexion();
			return $usuarios;
		}

}// end Class
?>