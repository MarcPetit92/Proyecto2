<?php
 //iniciamos sesión - SIEMPRE TIENE QUE ESTAR EN LA PRIMERA LÍNEA
        session_start();
        include("conexion.proc.php");

	   extract($_REQUEST);

    
     $time = time();

    $fecha= date("Y-m-d");

    $hora=date("H:i:s", $time);

    $sql_filtrar = "SELECT * FROM tbl_recursos JOIN tbl_reserva ON tbl_recursos.rec_id = tbl_reserva.rec_id AND tbl_reserva.res_fecha_ini<=NOW() AND tbl_reserva.res_fecha_fin>=NOW()";

   $sql = "INSERT INTO `tbl_reserva` (`res_fecha_ini`, `res_hora_ini`, `rec_id`, `usu_id`) VALUES ('".$fecha."','".$hora."',".$rec_id.",".$_SESSION['id'].")";

   $sql2 = "UPDATE tbl_recursos SET rec_disponibilidad = '0', rec_reservado= '1' WHERE rec_id = ".$rec_id ;


    
    //echo $sql;
		
		//echo $sql;
  


$filtrar = mysqli_query($conexion, $sql_filtrar)
        if(mysqli_num_rows($filtrar)>0){

                      if(mysqli_num_rows($reserva)>0){
                        $reserva = mysqli_query($conexion, $sql);
                          $actualizar = mysqli_query($conexion, $sql2);

                    //echo "Número de productos: " . mysqli_num_rows($usuarios) . "<br/><br/>";
                    if (mysqli_num_rows($actualizar)>0) {
                       header("location: misreservas.php?rec_id=".$rec_id );
                    }
                }
                                               
                } 
                else{
                        header("location: misreservas.php?rec_id=".$rec_id );

                }

?>


