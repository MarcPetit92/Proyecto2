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


var validar_registro=function() {
  
  var usuario = document.registro.alias;
  var pass = document.registro.pass;
  var validar_pass = document.registro.validar_pass;
  var nombre = document.registro.nombre;
  var apellido = document.registro.apellido;
  var email = document.registro.email;

  var ok = true;

  if (usuario.value == "" ) {
   
    usuario.placeholder = "Escriba el usuario";
    usuario.style.borderColor="red";
    ok = false;

  }


  if  (pass.value == ""){
    
    pass.placeholder = "Escriba la contraseña";
    pass.style.borderColor="red";
    ok = false;
  }

  if  (validar_pass.value == ""){
    
   validar_pass.placeholder = "Escriba la validacion de contraseña";
    validar_pass.style.borderColor="red";
    ok = false;
  }

  if  (validar_pass.value != pass.value){
   validar_pass.value= "";
    validar_pass.placeholder = "Las contraseñas no coinciden";
    validar_pass.style.borderColor="red";
    pass.value = "";
    pass.placeholder = "Las contraseñas no coinciden";
    pass.style.borderColor="red";
    ok = false;
  }

  if  (nombre.value == ""){
    
    nombre.placeholder = "Escriba su nombre";
    nombre.style.borderColor="red";
    ok = false;
  }

  if  (apellido.value == ""){
    
    apellido.placeholder = "Escriba su apellido";
    apellido.style.borderColor="red";
    ok = false;
  }

  if  (email.value == ""){
    
    email.placeholder = "Escriba su email";  
    email.style.borderColor="red";
    ok = false;
  }

emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
   
    if (! (emailRegex.test(email.value))) {
            email.placeholder = "Su email es incorrecto";  
          email.style.borderColor="red";
          ok = false;
    }


  if (ok == false){return false;

  }else{  return true;
  }

}
