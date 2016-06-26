<?php
require_once('ConexionClass.php');
require_once('/../entidades/CategoriaClass.php');

class CategoriaDAO{

	// Atributos
	private $conn;

	// Constructores
	function __construct($conn){
		$this->conn = $conn;
	}

	// Métodos
	
	public function listar()
		{
			$sql = "SELECT categoria_id, descripcion FROM categorias";
			$this->conn->abrirConexion();
			$resultado = $this->conn->select($sql);
			$categorias = array();

			while( $fila = $resultado->fetch_array() ) {
				$categoria = new Categoria();
				$categoria->setCategoriaId($fila['categoria_id']);
				$categoria->setDescripcion($fila['descripcion']);
				$categorias[] = $categoria;
			}
			$this->conn->cerrarConexion();
			return $categorias;
		}

}// end Class
?>