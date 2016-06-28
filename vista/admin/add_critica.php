<?php
	
	require_once('../../config/paths.php');
	require_once('../../entidades/CriticaClass.php');
	require_once('../../entidades/PeliculaClass.php');
	require_once('../../controlador/SessionControlClass.php');
	require_once('../../controlador/CriticaControlClass.php');
	require_once('../../controlador/PeliculaControlClass.php');

	$session = new SessionControl();

	if( isset($_GET['id']) && !is_null($_GET['id']) ) {
		$peliculaId 		= $_GET['id'];
		$pelicula 			= new Pelicula();
		$peliculaControl 	= new PeliculaControl();
	 	$pelicula 			= $peliculaControl->buscarPelicula($peliculaId);
	 	$titulo 			= $pelicula->getTitulo();

	 	$criticaControl = new CriticaControl();
	 	$resultado = $criticaControl->buscarCritica($peliculaId);

	 	if(!empty($resultado)) {
	 		$criticaId 		= $resultado->getCriticaId();
	 		$comentario 	= $resultado->getComentario();
	 		$fechaCritica 	= $resultado->getFechaCritica();
	 		$peliculaId 	= $resultado->getPeliculaId();
	 		$usuarioId 		= $resultado->getUsuarioId();
	 	}
	 	else{
	 		$criticaId 		= "";
	 		$comentario 	= "";
	 		$fechaCritica 	= "";
	 		$peliculaId 	= $peliculaId;
	 		$usuarioId 		= "1";
	 	}
	}
	else {
?>
 			<script type="text/javascript" >
				window.location.href = "list_pelicula.php";
			</script>
<?php
	}


	// Agregar nueva pelicula
	if( isset($_REQUEST['operacion']) && $_REQUEST['operacion'] == 'agregar' ) {

		if( isset($_REQUEST['comentario']) ) {
			$critica = new Critica();

			$critica->setCriticaId($_POST['criticaId']);
			$critica->setComentario($_POST['comentario']);
			$critica->setFechaCritica($_POST['fechaCritica']);
			$critica->setUsuarioId($_POST['usuarioId']);
			$critica->setPeliculaId($_POST['peliculaId']);

			$criticaControl = new CriticaControl();
			$criticaControl->setCritica($critica);
			if( empty($critica->getCriticaId()) ) {
				$return = $criticaControl->agregarNuevaCritica();
			}
			else {
				$return = $criticaControl->agregarCritica();
			}
			
			if( $return ) {
?>
 					<script type="text/javascript" >
 					alert("La critica fue agregado exitosamente!");
 					window.location.href = "list_pelicula.php";
 					</script>
<?php
 				}
 				else {
?>
 					<script type="text/javascript" >
 						alert("Ocurrió un error. La critica no fue guardado!.");
 						window.location.href = "add_critica.php";
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
			<h1 class="col-lg-12">{ Películas } <small>Agregar Crítica</small></h1>

		</div>
	</header>


	<section class="container">
		<div class="row">

			<form role="form" name="critica" method="post" onsubmit="return validarFormAddCritica()">
				<input type="hidden" name="operacion" value="agregar">
				<input type="hidden" name="criticaId" value="<?php echo $resultado->getCriticaId(); ?>">
				<input type="hidden" name="usuarioId" value="<?php echo $resultado->getUsuarioId(); ?>">
				<input type="hidden" name="peliculaId" value="<?php echo $resultado->getPeliculaId(); ?>">
				<div class="form-group col-lg-12 col-sm-12">
					<label for="titulo">Título*</label>
					<input type="text" class="form-control input-sm" id="titulo" name="titulo" value="<?php echo $titulo; ?>"">
				</div>
				<div class="form-group col-lg-2 col-sm-4">
					<label for="fechaCritica">Fecha de la Crítica</label>
					<input type="date" class="form-control input-sm" id="fechaCritica" name="fechaCritica" placeholder="Fecha Critica" value="<?php echo $resultado->getFechaCritica(); ?>">
				</div>

				<div class="form-group col-sm-10">
  					<label for="comentario">Crítica*</label>
				  	<textarea class="form-control input-sm" rows="5" id="comentario" name="comentario"><?php echo $resultado->getComentario(); ?></textarea>
				</div>

				<div class="clearfix visible-lg"></div>
				<button type="submit" class="btn btn-default col-xs-4 col-xs-offset-4 btn-info ">
					<span class="glyphicon glyphicon-ok"></span> Agregar</button>

			</form>
			
		</div>
	</section>
	</div>
	<?php
		require_once('../footer.php');
		require_once('../js_link.php');
	?>
	<script type="text/javascript">
		// Validar formulario Login
		function validarFormAddCritica() {
		    var comentario 		= document.forms["critica"]["comentario"].value.trim();
		    var fechaCritica 	= document.forms["critica"]["fechaCritica"].value;

	   		if (comentario == null || comentario ==""){
		    	alert("Debe ingresar una crítica");
		    	return false;
		    }
		    else if(fechaCritica == null || fechaCritica == ""){
		    	alert("Debe ingresar una fecha de crítica.");
		    	return false;
		    }
		    else{
		    	return true;
		    }
		};

	</script>
</body>
</html>