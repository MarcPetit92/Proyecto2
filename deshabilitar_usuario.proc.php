<?php

  session_start();
  include("conexion.proc.php");

  extract($_REQUEST);

	$sql= "UPDATE tbl_usuario SET  usu_deshabilitado = '1' WHERE usu_id = ".$usu_id;

	echo $sql;

	$modificar = mysqli_query($conexion, $sql); 
	
	header("location: administrar_usuarios.php");
	

        
?>