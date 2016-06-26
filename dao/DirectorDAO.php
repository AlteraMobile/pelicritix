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
		$nombres 	= $director->getNombre();
		$apellidos	= $director->getApellido();
		$sql = "INSERT INTO directores (nombre, apellido) VALUES ('".$nombres."','".$apellidos."')";
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
		$sql = "SELECT director_id, nombre, apellido FROM directores WHERE director_id = '".$id."'";
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
	public function modificar($director) {
		$id 		= $director->getDirectorId();
		$nombre 	= $director->getNombre();
		$apellido 	= $director->getApellido();

		$sql = "UPDATE directores SET nombre = '".$nombre."', apellido='".$apellido."' WHERE director_id = ".$id;
		$this->conn->abrirConexion();
		if( $this->conn->querys($sql) ) {
			return true;
		}
		else {
			return false;
		}
		$this->conn->cerrarConexion();
	}
	public function eliminar($directorId){
		$sql = "DELETE FROM directores WHERE director_id ='".$directorId."'";
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