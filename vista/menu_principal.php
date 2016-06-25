<?php
	require_once('/../controlador/paths.php');
?>

<header class="container">
	<div class="row">
		<nav class="navbar navbar-default ">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
	   				</button>
			    	
		      		<a class="navbar-brand" href="#">{ PeliCritix }</a>
		    	</div>
		    	<form class="navbar-form navbar-left" role="search" name="frm_buscar" onsubmit="return validarFormBuscar()">
			        <div class="form-group">
			        	<input type="text" name="buscar" class="form-control input-sm" placeholder="Buscar">
				    </div>
					<button type="submit" class="btn btn-info btn-sm">Buscar</button>
				</form>
		    	<div class="collapse navbar-collapse" id="menu">
		    		<ul class="nav navbar-nav navbar-right">
					   	<li>
					   		<a href=<?php echo $host.'login.php'; ?>>
					   			<span class="glyphicon glyphicon-log-in"></span> Login
					   		</a>
					   	</li>
				    </ul>
				</div>
		 	</div>
		</nav>
	</div>
</header>