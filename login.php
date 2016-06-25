<?php
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
				<form id="login" name="login" role="form" method="post" action=<?php echo htmlspecialchars($control_path.'login.php'); ?> onsubmit="return validarFormLogin()">
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
</body>
</html>