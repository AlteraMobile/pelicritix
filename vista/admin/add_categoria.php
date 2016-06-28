<?php
	
	require_once('../../config/paths.php');
	require_once('../../entidades/CategoriaClass.php');
	require_once('../../entidades/PeliculaClass.php');
	require_once('../../entidades/PeliculaCategoriaClass.php');
	require_once('../../controlador/SessionControlClass.php');
	require_once('../../controlador/CategoriaControlClass.php');
	require_once('../../controlador/PeliculaControlClass.php');
	require_once('../../controlador/PeliculaCategoriaControlClass.php');

	$session = new SessionControl();

	if( isset($_GET['id']) && !is_null($_GET['id']) ) {
		$peliculaId 		= $_GET['id'];
		$pelicula 			= new Pelicula();
		$peliculaControl 	= new PeliculaControl();
	 	$pelicula 			= $peliculaControl->buscarPelicula($peliculaId);
	 	$titulo 			= $pelicula->getTitulo();

	 	$peliculaCategoriaControl = new PeliculaCategoriaControl();
	 	$categoriasActuales = $peliculaCategoriaControl->buscarPeliculaCategoria($peliculaId);

	 	/*for ( $i=0;$i<count($categoriasActuales);$i++) {
	 		$categoria = $categoriasActuales[$i]->getCategoriaId();
	 	}*/
	}
#	else {
#		window.location.href = "mod_pelicula.php";
#	}

	// Agregar catgorias
	if( isset($_REQUEST['operacion']) && $_REQUEST['operacion'] == 'agregar' ) {
		if( isset($_REQUEST['categoria']) ) {
			$peliculaId = $_POST['peliculaId'];
			$categoria = $_POST['categoria'];

			$peliculaCategoriaControl = new PeliculaCategoriaControl();
			$peliculaCategoriaControl->eliminarPeliculaCategoria($peliculaId);

			for ( $i=0;$i<count($categoria);$i++) {
				$peliculaCategoriaControl = new PeliculaCategoriaControl();
				$categoriaId = $categoria[$i];
				$return = $peliculaCategoriaControl->agregarPeliculaCategoria($categoriaId, $peliculaId);
				if($return == false) {
					?>
						<script type="text/javascript" >
	 						alert("Ocurrió un error. Las categorías no se modificarón!.");
	 						window.location.href = "add_categoria.php";
	 					</script>
 					<?php
				}
			} 
			if( $return ) {
 				?>
 					<script type="text/javascript" >
 					alert("El usuario fue modificado exitosamente!");
 					window.location.href = "list_pelicula.php";
 					</script>
 				<?php
 				}
 				else {
 				?>
 					<script type="text/javascript" >
 						alert("Ocurrió un error. El usuario no se modificó!.");
 						window.location.href = "add_categoria.php";
 					</script>
 				<?php
 				}
   		}
		else{

		}
	}


	/*if( isset($_REQUEST['operacion']) && $_REQUEST['operacion'] == 'agregar' ) {

		if( isset($_REQUEST['titulo']) && isset($_REQUEST['categoria']) 
			&& isset($_REQUEST['critica'])	&& $_REQUEST['nota'] ) {

			$pelicula = new Pelicula();

			$pelicula->setTitulo($_POST['titulo']);
			$pelicula->setSubtitulo($_POST['subtitulo']);
			$pelicula->setFechaEstreno($_POST['fechaEstreno']);
			$pelicula->setAnoProduccion($_POST['anoProduccion']);
			$pelicula->setDuracion($_POST['duracion']);
			$pelicula->setNota($_POST['nota']);
			$pelicula->setColor($_POST['color']);
			$pelicula->setLoMejor($_POST['loMejor']);
			$pelicula->setLoPeor($_POST['loPeor']);
			$pelicula->setImgPortada($_POST['ImgPortada']);
			$pelicula->setUrlTrailer($_POST['urlTrailer']);
			$pelicula->setGeneroId($_POST['generoId']);
			$pelicula->setCriticaId($_POST['criticaId']);
			$pelicula->setDirectorId($_POST['directorId']);

			$peliculaControl = new PeliculaControl();
			$peliculaControl->setPelicula($pelicula);
			$return = $peliculaControl->agregarPeliculo();

			if( $return ) {
				?>
 					<script type="text/javascript" >
 					alert("La pelicula fue agregado exitosamente!");
 					window.location.href = "add_pelicula.php";
 					</script>
 				<?php
 				}
 				else {
 				?>
 					<script type="text/javascript" >
 						alert("Ocurrió un error. La pelicula no fue guardado!.");
 						window.location.href = "add_pelicula.php";
 					</script>
 				<?php	
			}			
		}
	}*/
	
	require_once('header.php');
	
?>
	<header class="container">
		<div class="row">
		<?php 
			require_once('menu.php');
		?>
			<h1 class="col-lg-12">{ Películas } <small>Agregar Categorías</small></h1>

		</div>
	</header>


	<section class="container">
		<div class="row">

			<form role="form" name="peliculaCategoria" method="post" onsubmit="return validarFormAddPelicula()">
				<input type="hidden" name="operacion" value="agregar">
                <input type="hidden" name="peliculaId" value="<?php echo $peliculaId; ?>"  />
                <div class="form-group col-lg-12 col-sm-12">
					<label for="titulo">Título*</label>
					<input type="text" class="form-control input-sm" id="titulo" name="titulo" value="<?php echo $titulo; ?>"">
				</div>

				<div class="form-group col-lg-3 col-sm-6">
					<label for="categoria">Categoría*</label>
				    <select multiple size="25" class="form-control input-sm" id="categoria" name="categoria[]">
					    <?php
							$categoriaControl = new CategoriaControl();
							$categoriaControl->listarCategorias();
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