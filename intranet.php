<?php

     //realizamos la conexión
    $conexion = mysqli_connect('localhost', 'root', '', 'u163772754_p2ir');

    //le decimos a la conexión que los datos los devuelva diréctamente en utf8, así no hay que usar htmlentities
    $acentos = mysqli_query($conexion, "SET NAMES 'utf8'");

    if (!$conexion) {
        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
        echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }
 
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


  <header id="header">
  <div class="izq">Iridium</div>
    
  <div class = "der">

  <?php

  extract($_REQUEST);
  echo "Intranet de " . $usu_nombre . " " . $usu_apellido ."" ;
  ?>
  </div>
  </div>
  </header>

  <div id="container">

    <main id="center" class="column">
    <div class="filtrototal">

     <?php
    echo "<a href='intranet.php?usu_nombre=".$usu_nombre."&usu_apellido=".$usu_apellido."&usu_id=".$usu_id."&rec_disponibilidad=1' style= 'text-decoration:none; font-size:14px;'><div class='filtro'>Disponibles</div></a>";
     echo "<a href='intranet.php?usu_nombre=".$usu_nombre."&usu_apellido=".$usu_apellido."&usu_id=".$usu_id."&rec_disponibilidad=0' style= 'text-decoration:none; font-size:14px;'><div class='filtro'>No disponibles</div></a>";
     echo "<a href='intranet.php?usu_nombre=".$usu_nombre."&usu_apellido=".$usu_apellido."&usu_id=".$usu_id."&rec_disponibilidad=' style= 'text-decoration:none; font-size:14px;'><div class='filtro'>Todos</div></a>";?>
    </div>

            <?php

    //$sql = "SELECT rec_id, rec_nombre, rec_foto, rec_disponibilidad, tip_nombre FROM tbl_recursos, tbl_tipo_recurso  WHERE tbl_recursos.tip_id = tbl_tipo_recurso.tip_id";

                if ($rec_disponibilidad != "") {
                  $sql = "SELECT rec_id, rec_nombre, rec_foto, rec_disponibilidad, tip_nombre FROM tbl_recursos, tbl_tipo_recurso  WHERE tbl_recursos.tip_id = tbl_tipo_recurso.tip_id AND ". $rec_disponibilidad."= tbl_recursos.rec_disponibilidad";
                }else{
                  $sql = "SELECT rec_id, rec_nombre, rec_foto, rec_disponibilidad, tip_nombre FROM tbl_recursos, tbl_tipo_recurso  WHERE tbl_recursos.tip_id = tbl_tipo_recurso.tip_id";

                }

  $recursos = mysqli_query($conexion, $sql);  
    //echo $sql;

    if(mysqli_num_rows($recursos)>0){
      //echo "Número de productos: " . mysqli_num_rows($usuarios) . "<br/><br/>";
      while($recurso = mysqli_fetch_array($recursos)){
        
        echo "<div class = 'recurso'> ";
        echo "Nombre : " .$recurso['rec_nombre'] ."</br>";
        $foto='img/'. $recurso['rec_foto'];
        echo "<img src=".$foto." width='200' height='150'/></br>";
        echo "Tipo: " .$recurso['tip_nombre']."</br>";

        //si la disponibilidad es = 1 significa que esta disponible con un if le diremos que si esta disponible
       if ($recurso['rec_disponibilidad'] == 1){

        echo "</br><span class= 'disponible'> Si esta disponible" ."</span>";


            //echo"<form name='reservar' action='reserva.proc.php?rec_id=".$recurso['rec_id']."&usu_id=".$usu_id."'>";
            //echo"<input type='submit' value='Reservar'/>";
            //echo"</form>";
           
            
                
            echo"</br> <a href='reserva.proc.php?rec_id=".$recurso['rec_id']."&usu_id=".$usu_id."' style= 'text-decoration:none; font-size:14px;' > <div class='btn_reserva'>"."Reservar"."</div></a> ";
               
            }
        
      
        else{

            echo "</br> <span class= 'nodisponible'> No esta disponible" ."</span>";
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
    echo "<a href='intranet.php?usu_nombre=".$usu_nombre."&usu_apellido=".$usu_apellido."&usu_id=".$usu_id."' style= 'text-decoration:none; font-size:14px;position: fixed;width:180px;'><div class='navegacion'>Mostrar recursos</div></a>";
     echo "<a href='misreservas.php?usu_nombre=".$usu_nombre."&usu_apellido=".$usu_apellido."&usu_id=".$usu_id."' style= 'text-decoration:none; font-size:14px;position: fixed;margin-top:52px;width:180px;'><div class='navegacion'>Mis reservas</div></a>";
     echo "<a href='intranet.php?usu_nombre=".$usu_nombre."&usu_apellido=".$usu_apellido."&usu_id=".$usu_id."' style= 'text-decoration:none; font-size:14px;position: fixed;margin-top:104px;width:180px;'><div class='navegacion'>Incidencias</div></a>";?>
    
    </nav>
</div>
</body>
</html>