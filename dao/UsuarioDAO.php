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
	public function buscarUsuarioID($nombreUsuario){
		
	}
	public function login($nombreUsuario, $pass){

	}

	public function agregar($usuario){
		echo "3";
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
			echo "2";
		}
		else {
			return false;
		}
		$this->conn->cerrarConexion();
	}

	public function actualizar($usuario){
		$nombres = $usuario->getNombres();
		$apellidos = $usuario->getApellidos();
		$fecha_nacimiento = $usuario->getFechaNacimiento();
		$nombre_usuario = $usuario->getNombreUsuario();
		$pass = $usuario->getPass();
		$activo = $usuario->getActivo();

		$query = $this->conn->getConexion()->prepare("UPDATE usuarios SET nombres=?, apellidos=?, fecha_nacimiento=?, nombre_usuario=?, pass=?, activo=? WHERE usuario_id = ?");
		$query->bind_param($nombres, $apellidos, $fecha_nacimiento, $nombre_usuario, $pass, $activo, $usuario_id);
		return $conn->execute();
	}

	public function eliminar($usuarioId){
		$query = $this->conn->getConexion()->prepare("DELETE FROM usuarios WHERE usuario_id = ?");
		$query->bind_param($usuario_id);
		return $query->execute();
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