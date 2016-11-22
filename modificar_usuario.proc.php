<?php

  session_start();
  include("conexion.proc.php");

  extract($_REQUEST);

  //$sql = "SELECT * FROM tbl_usuario WHERE usu_alias= '".$usu_alias."'" ;

  	
$sql2= "UPDATE tbl_usuario SET  usu_alias = '".$usu_alias."' , usu_nombre =  '".$usu_nombre."' , usu_apellido = '".$usu_apellido."', usu_email = '".$usu_email."', usu_deshabilitado = '".$usu_deshabilitado."' WHERE usu_id = ".$usu_id ;
		echo $sql;

  $validar = mysqli_query($conexion, $sql); 
  


if(mysqli_num_rows($validar)>0){
		//si nos devuelve registros significa que ese recurso ya existe
		//$datos_recursos=mysqli_fetch_array($resultado);
		echo $sql;

		//$_SESSION['error_mod_usuario']='El nombre de usuario no está disponible';

		header("location: modificar_usuario.php?usu_id=$usu_id");

		exit;
	} 
		
		
		  $modificar = mysqli_query($conexion, $sql2); 
	
		header("location: administrar_usuarios.php");
	

        
?>