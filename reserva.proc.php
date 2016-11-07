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

    
     $time = time();

    $fecha= date("Y-m-d");

    $hora=date("H:i:s", $time);

   $sql = "INSERT INTO `tbl_reserva` (`res_fecha_ini`, `res_hora_ini`, `rec_id`, `usu_id`) VALUES ('".$fecha."','".$hora."',".$rec_id.",".$usu_id.")";


    
    //echo $sql;
	$reserva = mysqli_query($conexion, $sql);	
		//echo $sql;

    if(mysqli_num_rows($reserva)>0){
			//echo "Número de productos: " . mysqli_num_rows($usuarios) . "<br/><br/>";
			
				
       			header("location: misreservas.php?usu_id=".$usu_id);

        
		} 
        else{
                header("location: misreservas.php?usu_id=".$usu_id);

        }

?>


