var validar=function() {
  
  var usuario = document.Login.usu_alias;
  var pass = document.Login.usu_pass;

  var ok = true;

  if (usuario.value == "" ) {
	usuario.style.color="red";
  	usuario.placeholder = "Escriba el usuario";
  	
  	//alert("Falta escribir el usuario")
  	ok = false;

  }


  if  (pass.value == ""){
  	pass.style.color='red';
  	pass.placeholder = "Escriba la contraseña";

  	//alert("falta escribir la contraseña")
  	ok = false;
  }

	if (ok == false){



		return false;

	}else{

		
		return true;

	}

}