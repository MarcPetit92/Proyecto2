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


<?php

$sql = "SELECT rec_id, rec_nombre, rec_foto, rec_disponibilidad, tip_nombre, rec_deshabilitado FROM tbl_recursos, tbl_tipo_recurso  WHERE tbl_recursos.tip_id = tbl_tipo_recurso.tip_id";
 $recursos = mysqli_query($conexion, $sql);  
    //echo $sql;

    if(mysqli_num_rows($recursos)>0){
      
      while($recurso = mysqli_fetch_array($recursos)){
        if ($recurso['rec_deshabilitado'] == 0) {
          # code...
        
        echo "<div class = 'recurso'> ";
        echo "Nombre : " .$recurso['rec_nombre'] ."</br>";
        $foto='img/'. $recurso['rec_foto'];
        echo "<img src=".$foto." width='200' height='150'/></br>";
        echo "Tipo: " .$recurso['tip_nombre']."</br>";
        echo"</br> <a href='deshabilitar_recursos.proc.php?rec_id=".$recurso['rec_id']."' style= 'text-decoration:none; font-size:14px;' > <div class='btn_reserva'>"."Deshabilitar  Recurso"."</div></a> ";
        echo "</div>";
       
      }else{
        echo "<div class = 'recurso'> ";
        echo "Nombre : " .$recurso['rec_nombre'] ."</br>";
        $foto='img/'. $recurso['rec_foto'];
        echo "<img src=".$foto." width='200' height='150'/></br>";
        echo "Tipo: " .$recurso['tip_nombre']."</br>";
        echo"</br> <a href='deshabilitar_recursos.proc.php?rec_id=".$recurso['rec_id']."' style= 'text-decoration:none; font-size:14px;'  > <div class='btn_devolver'>"."Volver a habilitar"."</div></a> ";
        echo "</div>";

      }
      }
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