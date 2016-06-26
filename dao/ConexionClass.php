<?php
/**
*	Clase Conexion
*
*/

class Conexion{
	
	// Atributos
	private $host		= "localhost";
	private $user		= "pelicritix";
	private $pass		= "pelicritix123";
	private $database	= "pelicritix";
	private $conn 		= "";

	// Constructores
	function __construct(){
		$this->conn = new mysqli($this->host, $this->user, $this->pass, $this->database);
		$this->conn->set_charset("utf8");
	}	

	// Accesadores
	public function getConexion(){
		return $this->conn;
	}

	// Métodos
	public function abrirConexion(){
		if($this->conn->connect_errno){
			die("Error al conectarse a la base de datos. ERROR: ". $this->conn->connect_errno);
		}
	}
	public function cerrarConexion(){
		$this->conn->close();
	}
	public function querys($query){
		$comprobador = false;
		if( $this->conn->query($query) ){
			if( $this->conn->affected_rows > 0 ){

				$comprobador = true;
			}
		}
		return $comprobador;
	}
	public function select($query)
		{			
			$resultado = $this->conn->query($query);
			return $resultado;
		}
	
}// end class

?>