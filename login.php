<?php

	require_once('entidades/UsuarioClass.php');
	require_once('controlador/UsuarioControlClass.php');

	// Login
	if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
		if( isset($_REQUEST['usuario']) && isset($_REQUEST['pass']) && $_REQUEST['operacion'] == 'entrar' ) {
			$usuario 		= $_POST['usuario'];
			$pass 	 		= $_POST['pass'];
			$usuarioControl = new UsuarioControl();
			$resultado 		= $usuarioControl->loginUsuario($usuario, $pass);
			if( $resultado == 1) {
				session_start();
				$_SESSION['login_user'] = $usuario;
				header("location:vista/admin/dashboard.php");
			}
			else {
				?>
 					<script type="text/javascript" >
 						alert("Usted no tieme permiso para ingresar.");
 					</script>
 				<?php
			}
		}
	}

	require_once('vista/header.php');
?>
<header class="container">
	<div class="row jumbotron">
		<h1 class="col-xs-9 col-xs-offset-2">Ingreso Administración</h1>
	</div>
</header>
	<section class="container">
		<div class="row">
			<div class="col-lg-4 col-lg-offset-4 col-sm-8 col-sm-offset-2 col-xs-12">
				<p>Ingrese con sus credenciales.</p>	
				<form id="login" name="login" role="form" method="post" onsubmit="return validarFormLogin()">
				<input type="hidden" name="operacion" value="entrar">
					<div class="form-group">
						<label>Usuario:</label>
						<input id="usuario" name="usuario" type="text" class="form-control input-sm">
					</div>
					<div class="form-group">
						<label>Contraseña:</label>
						<input id="pass" name="pass" type="password" class="form-control input-sm" >
					</div>
						<button type="submit" class="btn btn-default btn-info col-xs-6 col-xs-offset-3" >
							<span class="glyphicon glyphicon-log-in"></span> Login
						</button>
					</div>
				</form>
			</div>
			
		</div>
	</section>
</div>
<?php
	require_once('vista/footer.php');
	require_once('vista/js_link.php');
?>
	<script type="text/javascript">
		function validarFormLogin() {
		    var usuario 		= document.forms["login"]["usuario"].value.trim();
		    var pass 			= document.forms["login"]["pass"].value.trim();
		   		    
		    if (usuario == null || usuario == "") {
		        alert("Debe ingresar su usuario.");
		        return false;
		    }
		    else if (pass == null || pass ==""){
		    	alert("Debe ingresar su contraseña.");
		    	return false;
		    }
			else{
		    	return true;
			}
		};
	</script>
</body>
</html>