<?php

  session_start();
  include("conexion.proc.php");

  extract($_REQUEST);

  $sql= "UPDATE tbl_recursos SET `rec_deshabilitado` = '0' WHERE rec_id = ".$rec_id ;

  $sql2 = "UPDATE `tbl_recursos` SET `rec_disponibilidad` = '1' WHERE tbl_recursos.rec_id = ". $rec_id;

  $deshabilitar = mysqli_query($conexion, $sql); 
  $disponible = mysqli_query($conexion, $sql2); 

  header("location: eliminar_recursos.php");

?>