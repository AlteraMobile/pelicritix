<?php
	$usuario 	= "";
	$pass		= "";

	function test_input($data) {
  		$data = trim($data);
  		$data = stripslashes($data);
  		$data = htmlspecialchars($data);
  		return $data;
	}

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if(empty($_POST["usuario"])){
			?>
				<script>alert("Usuario es requerido."); </script>
			<?php
		}
		else {
			$usuario = test_input($_POST["usuario"]);
		}
		if(empty($_POST["pass"])){
			?>
			<script> alert("Contraseña es requerido.");</script>
			<?php 
		}
		else {
			$pass = test_input($_POST["pass"]);
		}
	}




?>