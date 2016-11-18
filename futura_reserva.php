<?php
  //iniciamos sesión - SIEMPRE TIENE QUE ESTAR EN LA PRIMERA LÍNEA
  session_start();
  include("conexion.proc.php");
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Recursos</title> 
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
<div class="form">

       <h3>Formulario reservar recurso </h3>
        <form name="registro" action="futura_reserva.proc.php" class="login-form" >
          <input type="date" name="res_fecha_ini">

          <input type="time" name="hora">
              

          <button>Enviar</button>
      
        </form>
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


     }
     else {
        //como han intentado acceder de manera incorrecta, redirigimos a la página index.php con un mensaje de error
        $_SESSION['error']="PILLÍN! Tienes que loguearte primero!";
        header("location: index.php");
      }

      //end if(isset($_SESSION['mail'])){
      ?>
    </nav>
</div>
</body>
</html>