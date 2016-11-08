<?php
  //iniciamos sesión - SIEMPRE TIENE QUE ESTAR EN LA PRIMERA LÍNEA
  session_start();
  include("conexion.proc.php");
?>


<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Intranet</title> 
      <link rel="stylesheet" href="css/style.css">   
      <link rel="stylesheet" href="css/intranet_main.css">   
</head>

<body>


  
<?php
      if(isset($_SESSION['alias'])){
?>
  <header id="header">
        <!--<header id="cabecera">-->
          <div class="izq">Iridium</div>
            <div class="der">
            <?php 
            echo " Bienvenido: ".$_SESSION['nombre']." ".$_SESSION['apellido']."&nbsp; <a href='index.php' > | Desconectar</a>"; 
            ?>    
            </div>
  </header>

 <div id="container">

    <main id="center" class="column">

 <?php

    $sql2 = "SELECT * FROM `tbl_reserva` WHERE (`res_fecha_fin` IS NULL OR `res_hora_fin` IS NULL ) AND (`usu_id` = ".$_SESSION['id'].")";

    $reservas = mysqli_query($conexion, $sql2);  
    //echo $sql;
    if(mysqli_num_rows($reservas)>0){
      //echo "Número de productos: " . mysqli_num_rows($usuarios) . "<br/><br/>";
      while($reserva = mysqli_fetch_array($reservas)){
        
        echo "<div class = 'recurso'> ";
        $sql3 ="SELECT * FROM tbl_recursos WHERE rec_id =".$reserva['rec_id'] ;
        $recursos = mysqli_query($conexion, $sql3);
         if(mysqli_num_rows($recursos)>0){
           while($recurso = mysqli_fetch_array($recursos)){
        echo "Recurso reservado : " .$recurso['rec_nombre']  ."</br>";
          }
        }
        echo "Fecha de la reserva : " .$reserva['res_fecha_ini'] ."</br>";
        echo "Hora de la reserva: " .$reserva['res_hora_ini']."</br>";
        //si la disponibilidad es = 1 significa que esta disponible con un if le diremos que si esta disponible
      
        echo"</br> <a href="."devolucion.proc.php?res_id=".$reserva['res_id']."&rec_id=".$reserva['rec_id']." style='text-decoration:none; font-size:14px;' > <div class='btn_devolver'>"."Devolver"."</div></a> ";
        echo "</div>";
      }
    }
    else
    {
      echo "No tienes ninguna reserva";
    } 

?>
<div class="historial">
<table border>
<label>Historial de reservas</label>

  <?php

        $sql6 ="SELECT res_fecha_ini, res_hora_ini, rec_nombre  FROM `tbl_reserva`, `tbl_recursos` WHERE (".$_SESSION['id']." = tbl_reserva.usu_id )AND (tbl_recursos.rec_id = tbl_reserva.rec_id)";

        
        $historial = mysqli_query($conexion, $sql6);  
        if(mysqli_num_rows($historial)>0){
          //echo "Número de productos: " . mysqli_num_rows($usuarios) . "<br/><br/>";
          while($elementos = mysqli_fetch_array($historial)){
            
            echo"<tr>";
            echo"<td>".$elementos['res_fecha_ini']."</td>";
            echo"<td>".$elementos['res_hora_ini']."</td>";
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
    echo "<a href='intranet.php' style= 'text-decoration:none; font-size:14px;position: fixed;width:180px;'><div class='navegacion'>Mostrar recursos</div></a>";
     echo "<a href='misreservas.php' style= 'text-decoration:none; font-size:14px;position: fixed;margin-top:52px;width:180px;'><div class='navegacion'>Mis reservas</div></a>";
     echo "<a href='intranet.php' style= 'text-decoration:none; font-size:14px;position: fixed;margin-top:104px;width:180px;'><div class='navegacion'>Incidencias</div></a>";
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

