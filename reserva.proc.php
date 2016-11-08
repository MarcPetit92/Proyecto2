<?php
 //iniciamos sesión - SIEMPRE TIENE QUE ESTAR EN LA PRIMERA LÍNEA
        session_start();
        include("conexion.proc.php");

	   extract($_REQUEST);

    
     $time = time();

    $fecha= date("Y-m-d");

    $hora=date("H:i:s", $time);

   $sql = "INSERT INTO `tbl_reserva` (`res_fecha_ini`, `res_hora_ini`, `rec_id`, `usu_id`) VALUES ('".$fecha."','".$hora."',".$rec_id.",".$_SESSION['id'].")";

   $sql2 = "UPDATE tbl_recursos SET rec_disponibilidad = 0 WHERE rec_id = ".$rec_id ;
    
    //echo $sql;
	$reserva = mysqli_query($conexion, $sql);	
		//echo $sql;
    $actualizar = mysqli_query($conexion, $sql2);

        if(mysqli_num_rows($reserva)>0){
                    //echo "Número de productos: " . mysqli_num_rows($usuarios) . "<br/><br/>";
                    if (mysqli_num_rows($actualizar)>0) {
                       header("location: misreservas.php?rec_id=".$rec_id );
                    }
                                               
                } 
                else{
                        header("location: misreservas.php?rec_id=".$rec_id );

                }

?>


