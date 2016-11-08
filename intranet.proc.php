<?php

		 //realizamos la conexión
    $conexion = mysqli_connect('localhost', 'root', '', 'u163772754_p2ir');

    //le decimos a la conexión que los datos los devuelva diréctamente en utf8, así no hay que usar htmlentities
    $acentos = mysqli_query($conexion, "SET NAMES 'utf8'");

    if (!$conexion) {
        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
        echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }
	extract($_REQUEST);

    $sql = "SELECT * FROM tbl_usuario WHERE usu_alias='".$usu_alias."' AND usu_pass='".$usu_pass."'";
    //echo $sql;

	$usuarios = mysqli_query($conexion, $sql);	
		//echo $sql;

    if(mysqli_num_rows($usuarios)>0){
			//echo "Número de productos: " . mysqli_num_rows($usuarios) . "<br/><br/>";
			while($usuario = mysqli_fetch_array($usuarios)){
				
				if(($usu_alias == $usuario['usu_alias']) && ($usu_pass == $usuario['usu_pass']  ) ){

		          $conexion->close();
                    header("location: index_intranet.php?usu_nombre=".$usuario['usu_nombre']."&usu_apellido=".$usuario['usu_apellido']."&usu_id=".$usuario['usu_id']);

        
                     //echo "Nombre: " . $usuario['usu_alias'] . "<br/>";
                    //echo "pass: " . $usuario['usu_pass'] . "<br/>";

                    }else {

                            //echo "<dialog>El login es incorrecto</dialog>";
                            header('location: index.php?errorusuario="si"');
        }
            }
        } 

?>


