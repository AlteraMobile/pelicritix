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
	public function buscar($categoriaId) {
		$sql = "SELECT categoria_id, descripcion FROM categorias WHERE categoria_id = '".$categoriaId."'";
		$this->conn->abrirConexion();
		$resultado = $this->conn->select($sql);
		$fila = $resultado->fetch_array();
			$categoria = new Categoria();
			$categoria->setCategoriaId($fila['categoria_id']);
			$categoria->setDescripcion($fila['descripcion']);
		
		return $categoria;
		$this->conn->cerrarConexion();
	}
	public function listar()
		{
			$sql = "SELECT categoria_id, descripcion FROM categorias ORDER BY descripcion ASC";
			$this->conn->abrirConexion();
			$resultado = $this->conn->select($sql);
			$categorias = array();
			while( $fila = $resultado->fetch_array() ) {
				$categoria = new Categoria();
				$categoria->setCategoriaId($fila['categoria_id']);
				$categoria->setDescripcion($fila['descripcion']);
				$categorias[] = $categoria;
			}
			
			return $categorias;
			$this->conn->cerrarConexion();
		}

}// end Class
?>