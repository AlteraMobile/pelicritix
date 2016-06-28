<?php 
	require_once('../../config/paths.php');
	require_once('../../entidades/PeliculaClass.php');
	require_once('../../controlador/SessionControlClass.php');
	require_once('../../controlador/PeliculaControlClass.php');

	$session = new SessionControl();

	// Eliminar Pelicula
	if( isset($_GET['operacion']) && $_GET['operacion'] == 'eliminar' ) {
		$peliculaId 		= $_GET['id'];
		$peliculaControl 	= new PeliculaControl();
		$return				= $peliculaControl->eliminarPelicula($peliculaId);
		if( $return ) {
			?>
				<script type="text/javascript">
					alert("La pelicula fue eliminado correctamente!");
					window.location.href = "list_pelicula.php";
				</script>
			<?php
		}
		else {
			?>
				<script type="text/javascript">
					alert("Error: La pelicula no fue eliminado.");
					window.location.href = "list_pelicula.php";
				</script>
			<?php
		}
	}
	require_once('header.php');
?>
		<header class="container">
			<div class="row">
				<?php 
					require_once('menu.php');
				?>
				<h1 class="col-lg-12">{ Películas }</h1>
			</div>
		</header>
		<section class="container">
			<div class="row">
				<div class="clearfix visible-lg"></div>
				<table id="list_peliculas" name="pelicula" class="display" cellspacing="0" width="100%" >
					<thead>
						<tr>
							<td>Id</td>
							<td>Título</td>
							<td>Fecha Estreno</td>
							<td>Acciones</td>
						</tr>
					</thead>
					<tbody>
<?php
						$peliculaControl = new PeliculaControl();
						$peliculaControl->listarPeliculas();
?>
					</tbody>
				</table>

			</div>
		</section>
		<p></p>
	</div>
	<?php
			require_once('../footer.php');
			require_once('../js_link.php');
	?>
	<script type="text/javascript">
		$("#list_peliculas").DataTable();

		function eliminar( id ) {
			window.location.href = "list_pelicula.php?operacion=eliminar&id="+id;
		};
		function modificar( id ) {
			window.location.href = "mod_pelicula.php?operacion=modificar&id="+id;
		};
		function categoria( id ) {
			window.location.href = "add_categoria.php?operacion=categoria&id="+id;
		};
		function actor( id ) {
			window.location.href = "add_actor.php?operacion=actor&id="+id;
		};
		function critica( id ) {
			window.location.href = "add_critica.php?operacion=critica&id="+id;
		};

	</script>

</body>
</html>