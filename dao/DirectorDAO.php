<?php
require_once('ConexionClass.php');
require_once('/../entidades/DirectorClass.php');

class DirectorDAO{

	// Atributos
	private $conn;

	// Constructores
	function __construct($conn){
		$this->conn = $conn;
	}

	// Métodos
	public function buscarDirectorID($director){
		
	}
	

	public function agregar($director){
		echo "3";
		$nombres 			= $director->getNombres();
		$apellidos 			= $director->getApellidos();
		
		$sql = "INSERT INTO directores (nombres, apellidos) VALUES ('".$nombres."','".$apellidos."')";
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

	public function actualizar($director){
		$nombres = $director->getNombres();
		$apellidos = $director->getApellidos();
		

		$query = $this->conn->getConexion()->prepare("UPDATE directores SET nombres=?, apellidos=?,  WHERE director_id = ?");
		$query->bind_param($nombres, $apellidos, $director_id);
		return $conn->execute();
	}

	public function eliminar($directorId){
		$query = $this->conn->getConexion()->prepare("DELETE FROM directores WHERE director_id = ?");
		$query->bind_param($director_id);
		return $query->execute();
	}
	public function listar()
		{
			$sql = "SELECT director_id, nombre, apellido FROM directores";
			$this->conn->abrirConexion();
			$resultado = $this->conn->select($sql);
			$directores = array();

			while( $fila = $resultado->fetch_array() ) {
				$director = new Director();
				$director->setDirectorId($fila['director_id']);
				$director->setNombre($fila['nombre']);
				$director->setApellido($fila['apellido']);
				$directores[] = $director;
			}
			$this->conn->cerrarConexion();
			return $directores;
		}

}// end Class
?>