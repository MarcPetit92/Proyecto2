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



    $comprovar  = "SELECT * FROM tbl_recursos INNER JOIN tbl_reserva ON tbl_recursos.rec_id = tbl_reserva.rec_id where tbl_reserva.res_fecha_ini<=NOW() AND tbl_reserva.res_fecha_fin>=NOW()";

    echo $comprovar;
    echo "<br/>";

   $sql = "INSERT INTO `tbl_reserva` (`res_fecha_ini`, `res_hora_ini`, `res_fecha_fin`, `res_hora_fin`, `rec_id`, `usu_id`) VALUES ('".$res_fecha_ini."','".$res_hora_ini."','".$res_fecha_fin."','".$res_hora_fin."',".$rec_id.", ".$_SESSION['usu_id'].")";

   echo $sql;
    $condicion = mysqli_query($conexion, $comprovar);
 
if(($res_fecha_ini <  $fecha  )AND ($res_hora_ini < $hora AND $res_hora_fin < $hora )){

}else{
      if(mysqli_num_rows($condicion)>0){
                    
                    //SI HAY RESULTADOS EN ESTA CONSULTA SIGNIFICA QUE YA HAY RESERVAS EN ESA FECHA Y HORA

                    header("location: reserva.php?rec_id=".$rec_id."&error='ya está reservado en esa fecha y hora' "); 

                    
                }
                else{
                   
                   $reserva = mysqli_query($conexion, $sql);


                     $sql2 = "UPDATE tbl_recursos SET rec_reservado = '1' where rec_id = $rec_id";
                     $sql3 = "UPDATE tbl_reserva SET res_cerrada = '1' where rec_id = $rec_id";

                     $reserva = mysqli_query($conexion, $sql2);

                     $reserva2 = mysqli_query($conexion, $sql3);

                    header("location: misreservas.php ");
                    
                        

                }

  }

?>


