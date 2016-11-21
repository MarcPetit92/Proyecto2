<?php
 //iniciamos sesión - SIEMPRE TIENE QUE ESTAR EN LA PRIMERA LÍNEA
        session_start();
        include("conexion.proc.php");

	   extract($_REQUEST);

    
     $time = time();

    $fecha= date("Y-m-d");

    $hora=date("H:i:s", $time);

//COMPROVAMOS PRIMERO SI AL HACER UNA CONSULTA CON LAS FECHAS INTRODUCIDAS , SI NOS DEVUELVE RESULTADOS SIGNIFICA QUE YA HAY UNA RESERVA CON ESA FECHA SINO, SIGNIFICA QUE ESTA LIBRE
$res_hora_ini = $res_hora_ini.':'.$minutos_ini.':00';
$res_hora_fin = $res_hora_fin.':'.$minutos_fin.':00';
$res_fecha_fin = $res_fecha_ini ;


    //$sql2 = "SELECT * FROM  `tbl_reserva` WHERE( (`res_fecha_ini` = '". $res_fecha_ini."') OR (`res_hora_ini` < '".$res_hora_ini."' ) ) AND (rec_id = ". $rec_id.") ";


   $sql = "INSERT INTO `tbl_reserva` (`res_fecha_ini`, `res_hora_ini`, `res_fecha_fin`, `res_hora_fin`, `rec_id`, `usu_id`) VALUES ('".$res_fecha_ini."','".$res_hora_ini."','".$res_fecha_fin."','".$res_hora_fin."',".$rec_id.", ".$_SESSION['id'].")";
    
        echo $sql;
		
		echo $sql2;

    //$condicion = mysqli_query($conexion, $sql2);
 

      if(mysqli_num_rows($condicion)>0){
                    //echo "Número de productos: " . mysqli_num_rows($usuarios) . "<br/><br/>";
                         //   $_SESSION['error_reserva'] = "No hay fechas diponibles";
                         header("location: futura_reserva.php?rec_id=".$rec_id ); 

                    $sql_actualizar= "UPDATE tbl_recursos SET rec_disponibilidad = '1' WHERE rec_id = ".$rec_id ;
                }
                else{
                   
                   $reserva = mysqli_query($conexion, $sql);

                     //   $_SESSION['error_reserva'] = "";
                    header("location: misreservas.php?rec_id=".$rec_id );
                    
                        

                }

?>


