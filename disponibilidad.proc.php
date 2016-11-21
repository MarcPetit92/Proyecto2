<?php
		session_start();
  		include("conexion.proc.php");

  		$sql = "UPDATE tbl_recursos, tbl_reserva SET rec_disponibilidad = '0'

  		WHERE (res_fecha_ini <= ".$_SESSION['fecha_actual']." AND res_hora_ini <= ".$_SESSION['hora_actual'].") AND (rec_id = res_id)";


  		$actualizar = mysqli_query($conexion, $sql);


?>