<?php

 		session_start();

        include("conexion.proc.php");

	   	extract($_REQUEST);

 	$fecha= date("Y-m-d");

//echo $rec_id;

//echo $inc_descripcion;



   $sql= "UPDATE tbl_incidencias SET `inc_fecha_fin` = '".$fecha."' WHERE inc_id = ".$inc_id.";";

//echo $sql;
	$incidencias = mysqli_query($conexion, $sql);	

        if(mysqli_num_rows($incidencias)>0){
                   

                    header("location: administrar.php");
                    
                                               
                } 
                else{
                      header("location: administrar.php" );

                }

?>
