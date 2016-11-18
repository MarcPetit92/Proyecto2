<?php
	session_start();
	//incluimos el fichero conexion.proc.php que realiza la conexión a MySQL
	include("conexion.proc.php");
	//codificamos la contraseña
	//$pass_encriptada=md5($_REQUEST['pass']);
	//generamos la consulta para encontrar usuario Y contraseña

	$sql = "SELECT * FROM tbl_usuario WHERE usu_alias='$_REQUEST[alias]' OR usu_email='$_REQUEST[email]' ";
	//ejecutamos la consulta
	$resultado = mysqli_query($conexion,$sql);

	//si la consulta devuelve un registro se ha encontrado coincidencia de usuario y contraseña con lo que el usuario es correcto
	if(mysqli_num_rows($resultado)>0){
		//si nos devuelve registros significa que ese usuario o contraseña ya existe
		$datos_usuario=mysqli_fetch_array($resultado);


		//echo $datos_usuario['usu_alias'];
		//echo $datos_usuario['usu_pass'];
		//redirigimos a la página principal
		$_SESSION['error_registro']="Usuario o email ya registrado";
		header("location: form_registro.php");
	} else {
		//como no se ha encontrado coincidencias realizamos el registro
		
		$sql = "INSERT INTO `tbl_usuario` (`usu_alias`, `usu_pass`, `usu_nombre`, `usu_apellido`, `usu_email`, `usu_tipo`) VALUES ('$_REQUEST[alias]','$_REQUEST[pass]','$_REQUEST[nombre]','$_REQUEST[apellido]', '$_REQUEST[email]', 'usuario')";
		$registro = mysqli_query($conexion,$sql);

		//extraemos los datos de ese usuario para poder coger el nivel de acceso
		//$datos_usuario=mysqli_fetch_array($registro);
		//redirigimos a la página principal para que el usuario haga login
		header("location: index.php");
	}

?>
