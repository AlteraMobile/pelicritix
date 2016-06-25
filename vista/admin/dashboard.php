<?php
	require_once('header.php');
?>
	<header class="container">
		<div class="row">
			<?php
				require_once('menu.php');
			?>
			<h1 class="col-lg-12">{ Dashboard }</h1>
		</div>
	</header>

	<section class="container">
		<div class="row">
			<h3 class="col-sm-offset-2 col-xs-offset-1">Qué quieres hacer?</h3>
			<div class="espacio"></div>
			<div class="row">
				<a href="add_pelicula.php">
					<button class="btn btn-info btn-lg col-sm-2 col-sm-offset-2 col-xs-4 col-xs-offset-1 inicio"><span class="glyphicon glyphicon-film "> <br> <br>
						<h4>Nueva <br> Película </h4></span>
					</button>
				</a> 
				<a href="mod_pelicula.php">
					<button class="btn btn-info btn-lg col-sm-2 col-sm-offset-1 col-xs-4 col-xs-offset-1 inicio"><span class="glyphicon glyphicon-pencil "> <br> <br>
						<h4>Modificar<br> Película</h4></span>
					</button>
				</a>
				<a href="actores.php">
					<button class="btn btn-info btn-lg col-sm-2 col-sm-offset-1 col-xs-4 col-xs-offset-1 inicio"><span class="glyphicon glyphicon-star "> <br> <br>
						<h4> <br> Actores</h4></span>
					</button>
				</a>
				<a href="directores.php">
					<button class="btn btn-info btn-lg col-sm-2 col-sm-offset-2 col-xs-4 col-xs-offset-1 inicio"><span class="glyphicon glyphicon-film "> <br> <br>
						<h4> <br> Directores </h4></span>
					</button>
				</a> 
				<a href="sliders.php">
					<button class="btn btn-info btn-lg col-sm-2 col-sm-offset-1 col-xs-4 col-xs-offset-1 inicio"><span class="glyphicon glyphicon-picture"> <br> <br>
						<h4><br> Slider</h4></span>
					</button>
				</a>
				<a href="registro_usuario.php">
					<button class="btn btn-info btn-lg col-sm-2 col-sm-offset-1 col-xs-4 col-xs-offset-1 inicio"><span class="glyphicon glyphicon-user"> <br> <br>
						<h4> <br> Usuarios</h4></span>
					</button>
				</a>
			</div>
		</div>
	</section>
	</div>
	<?php 
		require_once('../footer.php');
		require_once('../js_link.php');
	?>
</body>
</html>