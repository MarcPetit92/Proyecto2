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
            extract($_REQUEST);
            echo " Bienvenido: ".$_SESSION['nombre']." ".$_SESSION['apellido']. "&nbsp; <a href='index.php' > <img src='img/off.png' width='20px'/></a>";
            ?>    
            </div>
  </header>

  <div id="container">

    <main id="center" class="column">
<div class="form">

       <h3>Formulario reservar recurso </h3>
      <?php

       if(isset($_SESSION['error_reserva'])){
        echo "<div style='color = red';>";
        echo $_SESSION['error_reserva'] ;
        echo "</div>";
       }
      
      ?>
        <form name="registro" action="futura_reserva.proc.php" class="login-form" >
          <label>Reservar el dia : </label> 
          <?php $fecha= date("Y-m-d"); ?>
          <input type="date" name="res_fecha_ini"  min="<?php echo $fecha ; ?>" value="<?php echo $fecha ; ?>">
          
          <br/>
         <table width="500" border="0" cellspacing="0" cellpadding="2">
        <tr>
          De 

        </tr>
        <tr>
          <select name="res_hora_ini" id="hora">
          <?php
            for ($i=0;$i<24;$i++){
              echo ("<OPTION VALUE='");
              printf ("%02s",$i);
              echo ("'>");
              printf("%02s",$i);
              echo ("</OPTION>".salto);
            }
          ?>
          </select>
          <label> h</label>
        </tr>
        <tr>
         : 
        </tr>
        <tr>
          <select name="minutos_ini" id="minutos">
          <?php
            for ($i=0;$i<51;$i+=10){
              echo ("<OPTION VALUE='");
              printf ("%02s",$i);
              echo ("'>");
              printf("%02s",$i);
              echo ("</OPTION>".salto);
            }
          ?>
          </select>
          <label> min</label>
        </tr>
      </table>

            
            <br/>
         <table width="500" border="0" cellspacing="0" cellpadding="2">
        <tr>
         Hasta

        </tr>
        <tr>
          <select name="res_hora_fin" id="hora">
          <?php
            for ($i=0;$i<24;$i++){
              echo ("<OPTION VALUE='");
              printf ("%02s",$i);
              echo ("'>");
              printf("%02s",$i);
              echo ("</OPTION>".salto);
            }
          ?>
          </select>
          <label> h</label>
        </tr>
        <tr>
        :  
        </tr>
        <tr>
          <select name="minutos_fin" id="minutos">
          <?php
            for ($i=0;$i<51;$i+=10){
              echo ("<OPTION VALUE='");
              printf ("%02s",$i);
              echo ("'>");
              printf("%02s",$i);
              echo ("</OPTION>".salto);
            }
          ?>
          </select>
          <label> min</label>
        </tr>
      </table>

        <br/>
           <input type="text" name="rec_id"  style="display:none" value="<?php echo $rec_id ; ?>">
        

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