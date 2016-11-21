<?php
  //iniciamos sesión - SIEMPRE TIENE QUE ESTAR EN LA PRIMERA LÍNEA
  session_start();

?>


<!DOCTYPE html>
<html>
<head>
	<title>Iridium</title>
	<link rel="stylesheet" href="css/style.css">   
    <link rel="stylesheet" href="css/intranet_main.css">   
</head>
<body>
    <?php
      if(isset($_SESSION['alias'])){
        ?>
  <div id="header">
        <!--<header id="cabecera">-->
          <div class="izq" style="font-size:30px;"><b><a href="index_intranet.php">Iridium</a></b></div>
            <div class="der">
            <?php 
            echo " Hola! ".$_SESSION['nombre']." ".$_SESSION['apellido']. "&nbsp; <a href='index.php' > <img src='img/off.png' width='20px'/></a>"; ?>

            
                
            </div>
            </div>
  <div class="opciones">
      <?php
      echo "<a href='intranet.php?rec_disponibilidad='> <div class='opcion'><br>Mostrar recursos</div></a>";
      echo "<a href='misreservas.php'><div class='opcion'><br>Mis reservas</div></a>";
      echo "<a href='incidencia.php'><div class='opcion'><br>Incidencias</div></a>";
       if ($_SESSION['tipo']== 'Administrador'){
         echo "<a href='administracion.php'><div class='opcion'><br>Administrar </div></a>";

         
         
      }
      ?>
      </div>
      <?php
     }
     else {
        //como han intentado acceder de manera incorrecta, redirigimos a la página index.php con un mensaje de error
        $_SESSION['error']="PILLÍN! Tienes que loguearte primero!";
        header("location: index.php");
      }

      //end if(isset($_SESSION['mail'])){
      ?>
</body>
</html>