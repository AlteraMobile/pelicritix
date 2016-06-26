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
	public function buscarActorID($actor){
		
	}
	

	public function agregar($actor){
		echo "3";
		$nombres 			= $actor->getNombres();
		$apellidos 			= $actor->getApellidos();
		
		$sql = "INSERT INTO actores (nombres, apellidos) VALUES ('".$nombres."','".$apellidos."')";
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

	public function actualizar($actor){
		$nombres = $actor->getNombres();
		$apellidos = $actor->getApellidos();
		

		$query = $this->conn->getConexion()->prepare("UPDATE actores SET nombres=?, apellidos=?,  WHERE actor_id = ?");
		$query->bind_param($nombres, $apellidos, $actor_id);
		return $conn->execute();
	}

	public function eliminar($actorId){
		$query = $this->conn->getConexion()->prepare("DELETE FROM actores WHERE actor_id = ?");
		$query->bind_param($director_id);
		return $query->execute();
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