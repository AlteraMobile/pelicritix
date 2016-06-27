<?php
require_once('ConexionClass.php');
require_once('/../entidades/ActorClass.php');

class ActorDAO{

	// Atributos
	private $conn;

	// Constructores
	function __construct($conn){
		$this->conn = $conn;
	}

	// Métodos
	public function agregar($actor){
		$nombres 	= $actor->getNombre();
		$apellidos 	= $actor->getApellido();

		$sql = "INSERT INTO actores (nombre, apellido)
				VALUES ('".$nombres."','".$apellidos."')";
		$this->conn->abrirConexion();

		if( $this->conn->querys($sql) ) 	{ return true;	}
		else 								{ return false;	}

		$this->conn->cerrarConexion();
	}
	public function buscar($id){
		$sql = "SELECT actor_id, nombre, apellido 
				FROM actores 
				WHERE actor_id = '".$id."'";

		$this->conn->abrirConexion();
		$resultado = $this->conn->select($sql);
		$actores = array();

		while( $fila = $resultado->fetch_array() ) {
			$actor = new Actor();
			$actor->setActorId($fila['actor_id']);
			$actor->setNombre($fila['nombre']);
			$actor->setApellido($fila['apellido']);

			$actores[] = $actor;
		}
		$this->conn->cerrarConexion();
		return $actores;
	}
	public function modificar($actor) {
		$id = $actor->getActorId();
		$nombre = $actor->getNombre();
		$apellido = $actor->getApellido();

		$sql = "UPDATE actores SET nombre = '".$nombre."', apellido = '".$apellido."' WHERE actor_id = '".$id."' ";
		$this->conn->abrirConexion();
		if($this->conn->querys($sql)) {
			return true;
		}
		else {
			return false;
		}
		$this->conn->cerrarConexion();
	}
	public function eliminar($actorId){
		$sql = "DELETE FROM actores WHERE actor_id = '".$actorId."' ";
		$this->conn->abrirConexion();
		if( $this->conn->querys($sql) ) {
			return true;
		}
		else {
			return false;
		}
		$this->conn->cerrarConexion();
	}
	public function listar()
		{
			$sql = "SELECT actor_id, nombre, apellido FROM actores";
			$this->conn->abrirConexion();
			$resultado = $this->conn->select($sql);
			$actores = array();

			while( $fila = $resultado->fetch_array() ) {
				$actor = new Actor();
				$actor->setActorId($fila['actor_id']);
				$actor->setNombre($fila['nombre']);
				$actor->setApellido($fila['apellido']);
				$actores[] = $actor;
			}
			$this->conn->cerrarConexion();
			return $actores;
		}

}// end Class
?>