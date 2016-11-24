<?php
  //iniciamos sesión - SIEMPRE TIENE QUE ESTAR EN LA PRIMERA LÍNEA
  session_start();
  include("conexion.proc.php");
  include("disponibilidad.proc.php");
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
    <div class="filtrototal">

     <?php
    echo "<a href='intranet.php?rec_disponibilidad=1' style= 'text-decoration:none; font-size:14px;'><div class='filtro'>Disponibles</div></a>";
     echo "<a href='intranet.php?rec_disponibilidad=0' style= 'text-decoration:none; font-size:14px;'><div class='filtro'>No disponibles</div></a>";
     echo "<a href='intranet.php?rec_disponibilidad=' style= 'text-decoration:none; font-size:14px;'><div class='filtro'>Todos</div></a>";?>
    </div>

            <?php



                extract($_REQUEST);

                if ($rec_disponibilidad != "") {
                  $sql = "SELECT * FROM tbl_recursos, tbl_tipo_recurso WHERE tbl_recursos.tip_id = tbl_tipo_recurso.tip_id AND ".$rec_disponibilidad." = tbl_recursos.rec_disponibilidad";
                }else{
                  $sql = "SELECT * FROM tbl_recursos, tbl_tipo_recurso  WHERE tbl_recursos.tip_id = tbl_tipo_recurso.tip_id";

                }

  $recursos = mysqli_query($conexion, $sql);  
    //echo $sql;

    if(mysqli_num_rows($recursos)>0){
      
      while($recurso = mysqli_fetch_array($recursos)){
        
        echo "<div class = 'recurso'> ";
        echo "Nombre : " .$recurso['rec_nombre'] ."</br>";
        $foto='img/'. $recurso['rec_foto'];
        echo "<img src=".$foto." width='200' height='150'/></br>";
        echo "Tipo: " .$recurso['tip_nombre']."</br>";

        //si la disponibilidad es = 1 significa que esta disponible con un if le diremos que si esta disponible
       

//FALTA MODIFICAR ESTE APARTADO PARA QUE DEJE PODER RESERVAR RECURSOS QUE ESTEN LIBRES DESPUES DE LA RESERVA.
       if (($recurso['rec_disponibilidad'] == 1)AND ($recurso['rec_reservado']== 0) ){


            echo "</br><span class= 'disponible'> Si esta disponible" ."</span>";   
            echo"</br> <a href='reserva.php?rec_id=".$recurso['rec_id']."' style= 'text-decoration:none; font-size:14px;' > <div class='btn_reserva'>"."Reservar"."</div></a> ";

            
               
            }
        
      
        elseif($recurso['rec_deshabilitado']== 1){

        
            echo "</br> <span class= 'nodisponible'> No esta disponible" ."</span>";
            echo"<form name="."reservar". "action="."reserva.proc.php" ."class="."login-form".">";
            echo"<button type:"."button"." disabled >Reservar</button>";
            echo"</form>";
          
        }elseif($recurso['rec_reservado']== 1){

            echo "</br> <span class= 'nodisponible'> Ya está reservado" ."</span>";
            echo"<form name="."reservar". "action="."reserva.proc.php" ."class="."login-form".">";
            echo"<button type:"."button"." disabled >Reservar</button>";
            echo"</form>";
          
        }
        echo "</div>";
       
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
         echo "<a href='administracion.php' style= 'text-decoration:none; font-size:14px;position: fixed;margin-top:156px;width:180px;'><div class='navegacion'>Administrar</div></a>";
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