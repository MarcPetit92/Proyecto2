<?php

 		session_start();

        include("conexion.proc.php");

	   	extract($_REQUEST);

 	$fecha= date("Y-m-d");

//echo $rec_id;

//echo $inc_descripcion;



   $sql = "INSERT INTO `tbl_incidencias` (`inc_fecha_ini`, `inc_descripcion`, `rec_id`, `usu_id`) VALUES ('".$fecha."','".$inc_descripcion."',".$rec_id.",".$_SESSION['id'].")";

//echo $sql;
	$incidencias = mysqli_query($conexion, $sql);	

        if(mysqli_num_rows($incidencias)>0){
                   

                    header("location: incidencia.php");
                    
                                               
                } 
                else{
                      header("location: incidencia.php" );

                }

?>
