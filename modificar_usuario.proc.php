<?php

  session_start();
  include("conexion.proc.php");

  extract($_REQUEST);

  

  $sql = "SELECT * FROM tbl_usuario WHERE usu_id = ".$usu_id ;

 $validar = mysqli_query($conexion, $sql); 

 if(isset($usu_alias)){

				

		}else{
			 $sql = "SELECT * FROM tbl_usuario WHERE usu_id = ".$usu_id ;

 $validar = mysqli_query($conexion, $sql); 

			while($datos_usuario = mysqli_fetch_array($validar)){
					$usu_alias = $datos_usuario['usu_alias'];
					echo"2";
				}
				
		}

		if(isset($usu_nombre)){

				
		}else{
			 $sql = "SELECT * FROM tbl_usuario WHERE usu_id = ".$usu_id ;

 $validar = mysqli_query($conexion, $sql); 

			while($datos_usuario=mysqli_fetch_array($validar)){
					$usu_nombre = $datos_usuario['usu_nombre'];
					echo'4';
				}

				
		}

		if(isset ($usu_apellido)){
				
		}else{
			 $sql = "SELECT * FROM tbl_usuario WHERE usu_id = ".$usu_id ;

 $validar = mysqli_query($conexion, $sql); 
			while($datos_usuario=mysqli_fetch_array($validar)){
					$usu_apellido = $datos_usuario['usu_apellido'];
				echo '6';
				}
				
		}

		if(isset($usu_email)){
				
		}else{
			 $sql = "SELECT * FROM tbl_usuario WHERE usu_id = ".$usu_id ;

 $validar = mysqli_query($conexion, $sql); 
			while($datos_usuario=mysqli_fetch_array($validar)){
					$usu_email = $datos_usuario['usu_email'];
					echo '8';
				}
				
		}

		if(isset ($usu_tipo )){
				

		}else{
			 $sql = "SELECT * FROM tbl_usuario WHERE usu_id = ".$usu_id ;

 $validar = mysqli_query($conexion, $sql); 
			while($datos_usuario=mysqli_fetch_array($validar)){
					$usu_tipo = $datos_usuario['usu_tipo'];
					echo '10';
				}
				
		}

		if(isset ($usu_deshabilitado)){
				

		}else{
			 $sql = "SELECT * FROM tbl_usuario WHERE usu_id = ".$usu_id ;

 $validar = mysqli_query($conexion, $sql); 
			while($datos_usuario=mysqli_fetch_array($validar)){
					$usu_deshabilitado = $datos_usuario['usu_deshabilitado'];
					echo '12';
				}
				
		}


echo $usu_alias." ";
  echo $usu_nombre." ";
  echo $usu_apellido." ";
  echo $usu_email." ";
  echo $usu_tipo ." ";
  echo $usu_deshabilitado." ";


  $sql = "SELECT * FROM tbl_usuario WHERE (usu_alias = '".$usu_alias."') AND (usu_email = '".$usu_email."') ";

  	
  $sql2= "UPDATE tbl_usuario SET  usu_alias = '".$usu_alias."' , usu_nombre =  '".$usu_nombre."' , usu_apellido = '".$usu_apellido."', usu_email = '".$usu_email."', usu_tipo = '".$usu_tipo."',  usu_deshabilitado = '".$usu_deshabilitado."' WHERE usu_id = ".$usu_id ;

		

  $validar = mysqli_query($conexion, $sql); 
  


if(mysqli_num_rows($validar)>0){
		//si nos devuelve registros significa que ese usuario ya existe
		
	

		$error = "El nombre o email ya estan en uso";

	header("location: modificar_usuario.php?usu_id=$usu_id&error=$error");

		exit;
	}else{




		
	
		$modificar = mysqli_query($conexion, $sql2); 

		header("location: administrar_usuarios.php");
	
}
        
?>