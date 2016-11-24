<?php
	//iniciamos sesion (siempre tiene que estar en la primera linea)
	session_start();
	//incluimos el fichero conexion.proc.php que realiza la conexión a MySQL
	include("conexion.proc.php");
	//codificamos la contraseña
	//$pass_encriptada=md5($_REQUEST['pass']);
	//generamos la consulta para encontrar usuario Y contraseña
	$sql = "SELECT * FROM tbl_usuario WHERE usu_alias='$_REQUEST[alias]' AND usu_pass='$_REQUEST[pass]'";
	//ejecutamos la consulta
	$resultado = mysqli_query($conexion,$sql);

	//si la consulta devuelve un registro se ha encontrado coincidencia de usuario y contraseña con lo que el usuario es correcto
	if(mysqli_num_rows($resultado)==1){
		//extraemos los datos de ese usuario para poder coger el nivel de acceso
		$datos_usuario=mysqli_fetch_array($resultado);
		if($datos_usuario['usu_deshabilitado']==0){
		//creamos la variable de sesión alias
		$_SESSION['usu_id']=$datos_usuario['usu_id'];
		$_SESSION['alias']=$_REQUEST['alias'];
		$_SESSION['nombre']=$datos_usuario['usu_nombre'];
		$_SESSION['apellido']=$datos_usuario['usu_apellido'];
		$_SESSION['tipo']=$datos_usuario['usu_tipo'];

		
		//redirigimos a la página principal
		header("location: index_intranet.php");
	}else{
		$_SESSION['error']="El usuario está deshabilitado";
		header("location: index.php");
	}
	} else {
		//como no se ha encontrado usuario y contraseña, mandamos a la página index.php un mensaje de error
		$_SESSION['error']="Usuario o contraseña incorrectos";
		header("location: index.php");
	}

?>
