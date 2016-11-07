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

    //$sql = "INSERT INTO `tbl_reserva` (`res_fecha_fin`, `res_hora_fin`) VALUES ('".$fecha."','".$hora."',".$rec_id.",".$usu_id.") WHERE res_id = ".$res_id;

    
    echo $fecha;
    echo $hora;

    //ponemos el fin de la fecha y hora de la reserva
    $sql= "UPDATE tbl_reserva SET `res_fecha_fin` = '".$fecha."' WHERE res_id = ".$res_id.";";

    $sql2= "UPDATE tbl_reserva SET `res_hora_fin` = '".$hora."' WHERE res_id = ".$res_id.";";


    //ponemos a 1 la disponibilidad del recurso
    $sql3 = "UPDATE `tbl_recursos` SET `rec_disponibilidad` = '1' WHERE tbl_recursos.rec_id = ". $rec_id;
    
    echo $sql;
    echo $sql2;
    echo $sql3;
       

    $devolver = mysqli_query($conexion, $sql); 

    $devolver2 = mysqli_query($conexion, $sql2);

    $devolver3 = mysqli_query($conexion, $sql3);

    if(mysqli_num_rows($devolver)>0){
      if (mysqli_num_rows($devolver2)>0) {
        if (mysqli_num_rows($devolver3)>0) {

              header("location: misreservas.php?usu_id=".$usu_id);
            }
                             
    } 
  }
        else{
                header("location: misreservas.php?usu_id=".$usu_id);

        }

?>


