// Validar formulario Login
	function validarFormLogin() {
	    var usuario = 	document.forms["login"]["usuario"].value.trim();
	    var pass = 		document.forms["login"]["pass"].value.trim();
	    if (usuario == null || usuario == "") {
	        alert("Debe ingresar un usuario.");
	        return false;
	    }
	    else if (pass == null || pass ==""){
	    	alert("Debe ingresar un contraseña.");
	    	return false;
	    }
	    else{
	    	return true;
	    }
	};