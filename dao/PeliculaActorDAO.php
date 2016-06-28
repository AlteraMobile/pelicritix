<?php
require_once('ConexionClass.php');
require_once('/../entidades/PeliculaActorClass.php');

class PeliculaActorDAO{

	// Atributos
	private $conn;

	// Constructores
	function __construct($conn){
		$this->conn = $conn;
	}

	// Métodos
	public function agregar($actorId, $peliculaId){
		$sql = "INSERT INTO peliculaactores (pelicula_id, actor_id) VALUES ('".$peliculaId."','".$actorId."')";
		$this->conn->abrirConexion();
		if( $this->conn->querys($sql) )	{	return true;	}
		else 							{	return false;	}
		$this->conn->cerrarConexion();
	}
	public function eliminar($peliculaId){

		$sql = "DELETE FROM peliculaactores WHERE pelicula_id ='".$peliculaId."'";
		$this->conn->abrirConexion();

		if( $this->conn->querys($sql) )	{	return true;	}
		else 							{	return false;	}
		$this->conn->cerrarConexion();
	}
	public function buscar($peliculaId){
		$sql = "SELECT pelicula_id, actor_id  FROM peliculaactores WHERE pelicula_id = '".$peliculaId."'";
		$this->conn->abrirConexion();
		$resultado = $this->conn->select($sql);
		$actores = array();

		while( $fila = $resultado->fetch_array() ) {
			$peliculaActor = new PeliculaActor();
			$peliculaActor->setActorId($fila['actor_id']);
			$actores[] = $peliculaActor;
		}
		
		return $actores;
		$this->conn->cerrarConexion();
	}
}// end Class
?>