<?php
require_once('ConexionClass.php');
require_once('/../entidades/CriticaClass.php');

class CriticaDAO{

	// Atributos
	private $conn;

	// Constructores
	function __construct($conn){
		$this->conn = $conn;
	}

	// Métodos
	public function agregar($critca) {

		$comentario 	= $critica->getComentario();
		$fechaCritica 	= $critica->getFechaCritica();
		$usuarioId 		= $critica->getUsuarioId();
		$peliculaId 	= $critica->getPeliculaId();
		$sql = "INSERT INTO criticas (comentario, fecha_critica, usuario_id, pelicula_id) VALUES ('".$comentario."', '".$fecha_critica."', '".$usuarioId."', '".$peliculaId."')";
		$this->conn->abrirConexion();
		if( $this->conn->querys($sql) ) { return true; 	}
		else 							{ return false; }
		$this->conn->cerrarConexion();
	}
	public function modificar($critica) {

		$criticaId 		= $critica->getCriticaId();
		$comentario 	= $critica->getComentario();
		$fechaCritica 	= $critica->getFechaCritica();
		$usuarioId 		= $critica->getUsuarioId();
		$peliculaId 	= $critica->getPeliculaId();

		$sql = "UPDATE criticas SET comentario = '$comentario', fecha_critica = '$fechaCritica', usuario_id = '$usuarioId', pelicula_id = '$peliculaId' WHERE critica_id = '$criticaId' ";
		$this->conn->abrirConexion();

		if( $this->conn->querys($sql) ) { return true; 	}
		else 							{ return false; }
		$this->conn->cerrarConexion();
	}
	public function listar()
		{
			$sql = "SELECT critica_id, comentario, fecha_critica, usuario_id, pelicula_id FROM criticas ORDER BY fecha_critica DESC";
			$this->conn->abrirConexion();
			$resultado = $this->conn->select($sql);
			$criticas = array();

			while( $fila = $resultado->fetch_array() ) {
				$critica = new Critica();
				$critica->setCriticaId($fila['critica_id']);
				$critica->setComentario($fila['comentario']);
				$critica->setFechCritica($fila['fecha_critica']);
				$critica->setUsuarioId($fila['usuario_id']);
				$critica->setPeliculaId($fila['pelicula_id']);
				$criticas[] = $critica;
			}
			
			return $criticas;
			$this->conn->cerrarConexion();
		}
	public function buscar($peliculaId) {
		$sql = "SELECT critica_id, comentario, fecha_critica, usuario_id, pelicula_id FROM criticas WHERE pelicula_id = '".$peliculaId."'";
		$this->conn->abrirConexion();
		$resultado = $this->conn->select($sql);
		$fila = $resultado->fetch_array();
			$critica = new Critica();
			$critica->setCriticaId($fila['critica_id']);
			$critica->setComentario($fila['comentario']);
			$critica->setFechaCritica($fila['fecha_critica']);
			$critica->setUsuarioId($fila['usuario_id']);
			$critica->setPeliculaId($fila['pelicula_id']);
		
		return $critica;
		$this->conn->cerrarConexion();
	}

}// end Class
?>