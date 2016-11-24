<?php
  //iniciamos sesión - SIEMPRE TIENE QUE ESTAR EN LA PRIMERA LÍNEA
  session_start();
  include("conexion.proc.php");
?>


<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Mis reservas</title> 
      <link rel="stylesheet" href="css/style.css">   
      <link rel="stylesheet" href="css/intranet_main.css">   

</head>

<body>


  <?php
      if(isset($_SESSION['alias'])){
?>
  <header id="header">
        <!--<header id="cabecera">-->
          <div class="izq" style="font-size:30px;"><b><a href="index_intranet.php">Iridium</a></b></div>
            <div class="der">
            <?php 
            echo " Bienvenido: ".$_SESSION['nombre']." ".$_SESSION['apellido']. "&nbsp; <a href='index.php' > <img src='img/off.png' width='20px'/></a>";
            ?>    
            </div>
  </header>

 <div id="container">

    <main id="center" class="column">
    <div class="centro">
 <?php

    $sql = "SELECT * FROM tbl_reserva, tbl_recursos WHERE ((tbl_reserva.rec_id = tbl_recursos.rec_id AND tbl_reserva.usu_id = ".$_SESSION['usu_id'].") AND (tbl_recursos.rec_reservado = 1) AND (tbl_reserva.res_cerrada = 1) ) ORDER BY  res_fecha_ini AND res_hora_ini DESC";


    
     $fecha_actual = date("Y-m-d");
     $hora_actual=date("H:i:s", $time);

    $rec_reservado = mysqli_query($conexion, $sql); 

    if(mysqli_num_rows($rec_reservado)>0){
 
           while($recurso = mysqli_fetch_array($rec_reservado)){

            if( ( ($recurso['res_fecha_ini'] >  $fecha_actual ) )  OR ($recurso['res_hora_ini'] > $hora_actual ) ) {
                
                  echo "<div class = 'reserva'> ";
                  echo "<b>".$recurso['rec_nombre']  ."</b></br>";   
                  echo "Fecha: " .$recurso['res_fecha_ini'] ."</br>";
                  echo "Hora: " .$recurso['res_hora_ini']."</br>";
                  echo "Fecha: " .$recurso['res_fecha_fin'] ."</br>";
                  echo "Hora: " .$recurso['res_hora_fin']."</br>";
                  if($recurso['rec_reservado'] == '1'){ 
                    echo "Reservado: si </br>";
                  }else{ 
                    echo "Reservado: no </br>";
                  }
                  
                  echo"</div>";
            }else{

                $sql = "UPDATE tbl_recursos SET rec_reservado = '0'  where rec_id = ".$recurso['rec_id'];
                $sql2 = "UPDATE tbl_reserva SET res_cerrada = '0'  where rec_id = ".$recurso['rec_id'];

                $actualizar = mysqli_query($conexion, $sql);
                  $actualizar2 = mysqli_query($conexion, $sql2);

            }

                 
                  
         }
                
    }else{
            echo "<br><span style='color:white;font-family:Roboto;font-size:20px;'>No tienes ninguna reserva...</span>";

    }
   

?></div>
<div class="historial">
<table border style="width:100%;border-collapse: collapse;border-color:#43A047;">
<h3>Historial de reservas</h3>

  <?php

        $sql6 ="SELECT res_fecha_ini, res_hora_ini, res_hora_fin, rec_nombre  FROM `tbl_reserva`, `tbl_recursos` WHERE (".$_SESSION['usu_id']." = tbl_reserva.usu_id )AND (tbl_recursos.rec_id = tbl_reserva.rec_id) ORDER BY  res_fecha_ini DESC";

        
        $historial = mysqli_query($conexion, $sql6);  
        if(mysqli_num_rows($historial)>0){

            echo "<tr>";
            echo "<td style='background:#43A047;color:white;border-color: white;'>Día:</td>";
            echo "<td style='background:#43A047;color:white;border-color: white;'>Desde:</td>";
            echo "<td style='background:#43A047;color:white;border-color: white;'>Hasta:</td>";
            echo "<td style='background:#43A047;color:white;border-color: white;'>Recurso:</td>";
            echo "</tr>";
          //echo "Número de productos: " . mysqli_num_rows($usuarios) . "<br/><br/>";
          while($elementos = mysqli_fetch_array($historial)){
            
            echo"<tr>";
            echo"<td>".$elementos['res_fecha_ini']."</td>";
            echo"<td>".$elementos['res_hora_ini']."</td>";
            echo"<td>".$elementos['res_hora_fin']."</td>";
            echo "<td>".$elementos['rec_nombre']."</td>";
            //aqui voy a motrar el nombre

            echo "</tr>";
          }


        }else{

        }

  ?>
  
</table>
</div>

</main>




<nav id="left" class="column">
      <?php
      echo "<a href='intranet.php?rec_disponibilidad=' style= 'text-decoration:none; font-size:14px;position: fixed;width:180px;'><div class='navegacion'>Mostrar recursos</div></a>";
     echo "<a href='misreservas.php' style= 'text-decoration:none; font-size:14px;position: fixed;margin-top:52px;width:180px;'><div class='navegacion'>Mis reservas</div></a>";
     echo "<a href='incidencia.php' style= 'text-decoration:none; font-size:14px;position: fixed;margin-top:104px;width:180px;'><div class='navegacion'>Incidencias</div></a>";
     if ($_SESSION['tipo']== 'Administrador'){
         echo "<a href='administracion.php' style= 'text-decoration:none; font-size:14px;position: fixed;margin-top:156px;width:180px;'><div class='navegacion'>Administrar</div></a>";
      }

   }
    else {
        //como han intentado acceder de manera incorrecta, redirigimos a la página index.php con un mensaje de error
        $_SESSION['error']="PILLÍN! Tienes que logarrte primero!";
        header("location: index.php");
      }

      //end if(isset($_SESSION['mail'])){
      ?>
    </nav>
    </div>
</body>
</html>

