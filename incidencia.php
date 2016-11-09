
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
    
 <?php

    $sql2 = "SELECT * FROM `tbl_reserva` WHERE (`res_fecha_fin` IS NULL OR `res_hora_fin` IS NULL ) AND (`usu_id` = ".$_SESSION['id'].")";

    $reservas = mysqli_query($conexion, $sql2);  
    //echo $sql;
    if(mysqli_num_rows($reservas)>0){
      //echo "Número de productos: " . mysqli_num_rows($usuarios) . "<br/><br/>";
      while($reserva = mysqli_fetch_array($reservas)){
        
        echo "<div class = 'reserva' style='width:400px;'> ";
        $sql3 ="SELECT * FROM tbl_recursos WHERE rec_id =".$reserva['rec_id'] ;
        $recursos = mysqli_query($conexion, $sql3);
         if(mysqli_num_rows($recursos)>0){
           while($recurso = mysqli_fetch_array($recursos)){
        echo "<b>".$recurso['rec_nombre']  ."</b></br>";
          }
        }
        
        echo "Fecha: " .$reserva['res_fecha_ini'] ."</br>";
        echo "Hora: " .$reserva['res_hora_ini']."</br>";
        //si la disponibilidad es = 1 significa que esta disponible con un if le diremos que si esta disponible
        
        echo"<form name='incidencia' action='incidencia.proc.php' > </br><textarea rows='4' cols='50' name='inc_descripcion'>Describe el problema ...</textarea> <input type='hidden' name='rec_id' value=".$reserva['rec_id']."> <input type='submit' style='background:yellow;width:80px;'></form>  ";


        //echo"</br> <a href="."incidencia.proc.php?rec_id=".$reserva['rec_id']." style='text-decoration:none; font-size:14px;' > <div class='btn_devolver'>"."Incidencia"."</div></a> ";


        echo "</div>";
      }
    }
    else
    {
      echo "<br><span style='color:white;font-family:Roboto;font-size:20px;'>Si no hay reservas, no puedes poner incidencias...</span>";
    } 

?>


</main>




<nav id="left" class="column">
      <?php
      echo "<a href='intranet.php?rec_disponibilidad=' style= 'text-decoration:none; font-size:14px;position: fixed;width:180px;'><div class='navegacion'>Mostrar recursos</div></a>";
     echo "<a href='misreservas.php' style= 'text-decoration:none; font-size:14px;position: fixed;margin-top:52px;width:180px;'><div class='navegacion'>Mis reservas</div></a>";
     echo "<a href='incidencia.php' style= 'text-decoration:none; font-size:14px;position: fixed;margin-top:104px;width:180px;'><div class='navegacion'>Incidencias</div></a>";
     if ($_SESSION['tipo']== 'Administrador'){
         echo "<a href='administrar.php' style= 'text-decoration:none; font-size:14px;position: fixed;margin-top:156px;width:180px;'><div class='navegacion'>Administrar</div></a>";
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

   
    </div>
</body>
</html>



