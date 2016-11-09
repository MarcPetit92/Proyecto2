<?php
  //iniciamos sesión - SIEMPRE TIENE QUE ESTAR EN LA PRIMERA LÍNEA
  session_start();
  include("conexion.proc.php");
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Administrar</title> 
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


<div class="historial">
<table border style="width:100%;border-collapse: collapse;border-color:#43A047;">
<label>Incidencias abiertas</label>
<tr>
<td>Nombre recurso</td>
<td>Fecha incidencia</td>
<td>Usuario que la ha abierto</td>
</tr>

<?php

$sql2 = "SELECT inc_id, inc_fecha_inicio, tbl_recursos.rec_nombre, tbl_usuario.usu_id , tbl_usuario.usu_apellido FROM tbl_recursos, tbl_usuario, tbl_incidencias where tbl_recursos.rec_id = tbl_reserva.rec_id and tbl_usuario.usu_id = tbl_reserva.usu_id ";


  $incidencias= mysqli_query($conexion, $sql2);
      

        if(mysqli_num_rows($incidencias)>0){

           while($incidencia = mysqli_fetch_assoc($incidencias)){
            
            echo"<tr>";
            echo"<td>" .$incidencia['rec_nombre'] ."</td>";
            echo"<td>" .$incidencia['usu_nombre'] ." ".$incidencia['usu_apellido']." </td>";
            echo"<td>" .$incidencia['inc_fecha_ini'] ."</td>";
            echo"<td><a href="."cerrar_inc.proc.php?inc_id=".$incidencia['inc_id']."style='text-decoration:none; font-size:14px;' > <div class='btn_devolver'>"."(x) cerrar incidencia"."</div></a> </td>";
            echo "</tr>";
          
        }
      }else{
        echo"No hay incidencias";
      }

        

?>

</table>
</div>
<div class="historial">
<table border style="width:100%;border-collapse: collapse;border-color:#43A047;">
<label>Estadística reservas</label>
<tr>
<td style='background:#43A047;color:white;border-color: white;'>Recurso solicitado </td>
<td style='background:#43A047;color:white;border-color: white;'>Total de veces solicitado</td>
<td style='background:#43A047;color:white;border-color: white;'>Usuario que más lo ha solicitado</td>
</tr>
<?php


           $sql = "SELECT tbl_reserva.rec_id, sum(1)as veces, tbl_recursos.rec_nombre, tbl_usuario.usu_nombre, tbl_usuario.usu_apellido FROM `tbl_reserva`, tbl_recursos, tbl_usuario where tbl_recursos.rec_id = tbl_reserva.rec_id and tbl_usuario.usu_id = tbl_reserva.usu_id group by rec_id";




         $estadisticas = mysqli_query($conexion, $sql);  





        if(mysqli_num_rows($estadisticas)>0){
           while($estadistica = mysqli_fetch_assoc($estadisticas)){
            
            echo"<tr>";
            echo"<td>" .$estadistica['rec_nombre'] ."</td>";
            echo"<td> " .$estadistica['veces'] ."</td>";
            echo"<td> " .$estadistica['usu_nombre'] ." ".$estadistica['usu_apellido']." </td>";
            echo "</tr>";
          }

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
         echo "<a href='administrar.php' style= 'text-decoration:none; font-size:14px;position: fixed;margin-top:156px;width:180px;'><div class='navegacion'>Administrar</div></a>";
      }

     } else {
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