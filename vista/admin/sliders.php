<?php 
	require_once('header.php');
?>
		<header class="container">
			<div class="row">
			<?php 
				require_once('menu.php');
			?>	
				<h1 class="col-lg-12">{ Sliders }</h1>

			</div>
		</header>

		<section class="container">

			<div class="row">
				<div class="col-xs-2 col-xs-offset-10">
					<button id="btn_nuevo_slider" class="btn btn-info"><span class="glyphicon glyphicon-plus"></span> Nuevo</button>
				</div>
			</div>

			<div class="espacio"></div>

			<div class="row">
				<table id="tbl_slider" name="slider" class="display" cellspacing="0" width="100%" >
					<thead>
						<tr>
							<td>Id</td>
							<td>Imagen</td>
							<td>Título</td>
							<td>Acciones</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>
								<img src=<?php echo $img_path."slider/captain_america.jpg" ;?> height="80px">
							</td>
							<td>Capitan America</td>
							<td>
								<button id="1" class="btn btn-default btn-xs btn_mod_slider"><span class="glyphicon glyphicon-pencil"></span> </button> 
								<button class="btn btn-default btn-xs"><span class="glyphicon glyphicon-remove "></span></button>
							</td>
						</tr>
						<tr>
							<td>2</td>
							<td>
								<img src="img/slider/CIVIL_WAR_BANNER_HD.jpg" height="80px">
							</td>
							<td>Civil War</td>
							<td>
								<button id="2" class="btn btn-default btn-xs btn_mod_slider"><span class="glyphicon glyphicon-pencil"></span> </button> 
								<button class="btn btn-default btn-xs"><span class="glyphicon glyphicon-remove "></span></button>
							</td>
						</tr>
						<tr>
							<td>3</td>
							<td>
								<img src="img/slider/maxresdefault-2.jpg" height="80px">
							</td>
							<td>X-Men Apocalypse</td>
							<td>
								<button id="3" class="btn btn-default btn-xs btn_mod_slider"><span class="glyphicon glyphicon-pencil"></span> </button> 
								<button class="btn btn-default btn-xs"><span class="glyphicon glyphicon-remove "></span></button>
							</td>

						</tr>
				
					</tbody>
				</table>				
			</div>

			<div class="espacio"></div>
		</section>
		<div id="form_mod_slider" title="Modificar Slider">
			<form name="mod_slider" role="form" class="form-horizontal">
				<input type="hidden" name="id">
					<div class="form-group">
						<label for="título" class="col-lg-2 col-lg-offset-1 control-label">Título:</label>
						<div class="col-lg-7">
							<input type="text" class="form-control" name="nombres" placeholfer="Título">
						</div>
					</div>
					
					 <div class="form-group">
	    				<div class="col-lg-6 col-lg-offset-3">
	      					 <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-pencil"></span> Modificar</button>
	    				</div>
			</form>
		</div>

		<div id="form_slider" title="Nuevo Slider">
			<form name="nuevo_slider" role="form" class="form-horizontal" onsubmit="return validarFormSlider()">
				<input type="hidden" name="id">
					<div class="form-group">
						<label for="título" class="col-lg-2 col-lg-offset-1 control-label">Título:</label>
						<div class="col-lg-7">
							<input type="text" class="form-control" name="nombres" placeholfer="Título">
						</div>
					</div>

					<div class="form-group">
						<label for="imagen" class="col-lg-2 col-lg-offset-1 control-label">*Imágen:</label>
						<div class="col-lg-7">
							<input type="file" class="form-control input-sm" id="imagen" name="imagen" placeholder="Seleccione la imagen del slider.">
						</div>
					</div >
					
					 <div class="form-group">
	    				<div class="col-lg-6 col-lg-offset-3">
	      					 <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-ok"></span> Crear</button>
	    				</div>
	    			</div>
			</form>
		</div>

	</div>
<?php 
	require_once('../footer.php');
	require_once('../js_link.php');
?>
	<script type="text/javascript">
		 $("#tbl_slider").DataTable();

		 function validarFormSlider() {
		    var imagen = document.forms["nuevo_slider"]["imagen"].value;

		    if (!imagen) {
		        alert("Debe seleciconar una imagen para el slider.");
		        return false;
		    }};
	</script>

</body>
</html>