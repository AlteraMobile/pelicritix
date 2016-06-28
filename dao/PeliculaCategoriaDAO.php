<?php
require_once('ConexionClass.php');
require_once('/../entidades/PeliculaCategoriaClass.php');

class PeliculaCategoriaDAO{

	// Atributos
	private $conn;

	// Constructores
	function __construct($conn){
		$this->conn = $conn;
	}

	// Métodos
	public function agregar($categoriaId, $peliculaId){
		
		$sql = "INSERT INTO peliculacategorias (pelicula_id, categoria_id) VALUES ('".$peliculaId."','".$categoriaId."')";
		$this->conn->abrirConexion();
		if( $this->conn->querys($sql) )	{	return true;	}
		else 							{	return false;	}
		$this->conn->cerrarConexion();
	}
	public function eliminar($peliculaId){
		$sql = "DELETE FROM peliculacategorias WHERE pelicula_id ='".$peliculaId."'";
		$this->conn->abrirConexion();
		if( $this->conn->querys($sql) )	{	return true;	}
		else 							{	return false;	}
		$this->conn->cerrarConexion();
	}
	public function buscar($peliculaId){
		$sql = "SELECT pelicula_id, categoria_id  FROM peliculacategorias WHERE pelicula_id = '".$peliculaId."'";
		$this->conn->abrirConexion();
		$resultado = $this->conn->select($sql);
		$categorias = array();

		while( $fila = $resultado->fetch_array() ) {
			$peliculaCategoria = new PeliculaCategoria();
			$peliculaCategoria->setCategoriaId($fila['categoria_id']);
			$categorias[] = $peliculaCategoria;
		}
		
		return $categorias;
		$this->conn->cerrarConexion();
	}

}// end Class
?>