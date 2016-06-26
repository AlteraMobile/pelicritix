<?php
require_once('ConexionClass.php');
require_once('/../entidades/GeneroClass.php');

class GeneroDAO{

	// Atributos
	private $conn;

	// Constructores
	function __construct($conn){
		$this->conn = $conn;
	}

	// Métodos
	
	public function listar()
		{
			$sql = "SELECT genero_id, descripcion FROM generos";
			$this->conn->abrirConexion();
			$resultado = $this->conn->select($sql);
			$generos = array();

			while( $fila = $resultado->fetch_array() ) {
				$genero = new Genero();
				$genero->setGeneroId($fila['genero_id']);
				$genero->setDescripcion($fila['descripcion']);
				$generos[] = $genero;
			}
			$this->conn->cerrarConexion();
			return $generos;
		}

}// end Class
?>