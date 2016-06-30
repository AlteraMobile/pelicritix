<?php 
	if( isset($_SESSION['login_user']) ){
		session_destroy();
	}

	require_once('entidades/PeliculaClass.php');
	require_once('controlador/PeliculaControlClass.php');

	require_once('vista/header.php');
	require_once('vista/menu_principal.php');
	include_once('vista/slider.php');
?>

		<section id="cont_contenido" class="container">
			<div class="row">
				<div class="grid">
				<?php
					$peliculaControl = new PeliculaControl();
					$peliculaControl->mostrarPeliculas();
				?>
				</div>
			</div>
		</section>

	</div>

<?php
	require_once('vista/footer.php'); 
?>

<?php
	require_once('vista/js_link.php');
?>
<script type="text/javascript">

	function validarFormBuscar(){
		var buscar = document.forms["frm_buscar"]["buscar"].value.trim();

		if( buscar == null || buscar == ""){
			alert("Para buscar debe ingresar texto para buscar.")
			return false;
		}
		else{
			return true;
		}
	};

</script>
</body>
</html>