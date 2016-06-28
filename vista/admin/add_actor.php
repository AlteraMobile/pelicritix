<?php
	
	require_once('../../config/paths.php');
	require_once('../../entidades/ActorClass.php');
	require_once('../../entidades/PeliculaClass.php');
	require_once('../../entidades/PeliculaActorClass.php');
	require_once('../../controlador/SessionControlClass.php');
	require_once('../../controlador/ActorControlClass.php');
	require_once('../../controlador/PeliculaControlClass.php');
	require_once('../../controlador/PeliculaActorControlClass.php');

	$session = new SessionControl();

	if( isset($_GET['id']) && !is_null($_GET['id']) ) {
		$peliculaId 			= $_GET['id'];
		$pelicula 				= new Pelicula();
		$peliculaControl 		= new PeliculaControl();
	 	$pelicula 				= $peliculaControl->buscarPelicula($peliculaId);
	 	$titulo 				= $pelicula->getTitulo();

	 	$peliculaActorControl 	= new PeliculaActorControl();
	 	$actoresActuales 		= $peliculaActorControl->buscarPeliculaActor($peliculaId);

	 	for ( $i=0;$i<count($actoresActuales);$i++) {
	 		$actor = $actoresActuales[$i]->getActorId();
	 	}
	}
	else {
		?>
			<script type="text/javascript" >
				window.location.href = "list_pelicula.php";
			</script>
		<?php
	}

	// Agregar actores
	if( isset($_REQUEST['operacion']) && $_REQUEST['operacion'] == 'agregar' ) {
		if( isset($_REQUEST['actor']) ) {
			$peliculaId = $_POST['peliculaId'];
			$actor 		= $_POST['actor'];

			$peliculaActorControl = new PeliculaActorControl();
			$peliculaActorControl->eliminarPeliculaActor($peliculaId);

			for ( $i=0;$i<count($actor);$i++) {
				$peliculaActorControl 	= new PeliculaActorControl();
				$actorId 				= $actor[$i];
				$return 				= $peliculaActorControl->agregarPeliculaActor($actorId, $peliculaId);
				if($return == false) {
					?>
						<script type="text/javascript" >
	 						alert("Ocurrió un error. Los actores no se modificarón!.");
	 						window.location.href = "add_actor.php";
	 					</script>
 					<?php
				}
			} 
			if( $return ) {
 				?>
 					<script type="text/javascript" >
 					alert("Los actores fueron modificados exitosamente!");
 					window.location.href = "list_pelicula.php";
 					</script>
 				<?php
 				}
 				else {
 				?>
 					<script type="text/javascript" >
 						alert("Ocurrió un error. Los actores no se modificarón!.");
 						window.location.href = "add_actor.php";
 					</script>
 				<?php
 			}
   		}
	}
	require_once('header.php');
?>
	<header class="container">
		<div class="row">
		<?php 
			require_once('menu.php');
		?>
			<h1 class="col-lg-12">{ Películas } <small>Agregar Reparto</small></h1>

		</div>
	</header>
	<section class="container">
		<div class="row">

			<form role="form" name="peliculaCategoria" method="post" >
				<input type="hidden" name="operacion" value="agregar">
                <input type="hidden" name="peliculaId" value="<?php echo $peliculaId; ?>"  />
                <div class="form-group col-lg-12 col-sm-12">
					<label for="titulo">Título*</label>
					<input type="text" class="form-control input-sm" id="titulo" name="titulo" value="<?php echo $titulo; ?>"">
				</div>

				<div class="form-group col-lg-3 col-sm-6">
					<label for="actor">Actores*</label>
				    <select multiple size="25" class="form-control input-sm" id="actor" name="actor[]">
					    <?php
							$actorControl = new ActorControl();
							$actorControl->comboReparto();
						?>
				    </select>
				</div>
				 <div class="clearfix visible-lg"></div>
				<button type="submit" class="btn btn-default col-xs-4 col-xs-offset-4 btn-info ">
					<span class="glyphicon glyphicon-ok"></span> Cambiar</button>

			</form>
			
		</div>
	</section>
	</div>
	<?php
		require_once('../footer.php');
		require_once('../js_link.php');
	?>
</body>
</html>