<?php

  session_start();
  include("conexion.proc.php");

  extract($_REQUEST);

  $sql = "SELECT * FROM tbl_recurso WHERE rec_nombre='$_REQUEST[rec_nombre]' ";
	//ejecutamos la consulta
	$resultado = mysqli_query($conexion,$sql);
echo $sql;
	//si la consulta devuelve un registro se ha encontrado coincidencia de nombre de recurso
	if(mysqli_num_rows($resultado)>0){
		//si nos devuelve registros significa que ese recurso ya existe
		//$datos_recursos=mysqli_fetch_array($resultado);


		$_SESSION['error_recurso']="Recurso ya registrado";
		header("location: anadir_recursos.php");
	} else {
		//como no se ha encontrado coincidencias realizamos el registro
		
		$sql = "INSERT INTO `tbl_recursos` (`rec_nombre`, `rec_disponibilidad`, `rec_foto`, `tip_id`,`rec_deshabilitado`) VALUES ('$_REQUEST[rec_nombre]','1','$_REQUEST[rec_foto]', '$_REQUEST[tip_id]' , 0 )";

		echo $sql;
		$anadir = mysqli_query($conexion,$sql);

	
		header("location: intranet.php");
	}

?>