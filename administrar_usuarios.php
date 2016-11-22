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

<table border style="width:95%;border-collapse: collapse;border-color:#43A047;background:white;">

 

<?php

$sql = "SELECT * FROM tbl_usuario ";

echo "<h3>Lista de Usuarios</h3>";
echo "<tr>";
           
            echo "<td style='background:yellow;color:black;border-color: green;'>Alias usuario</td>";
            echo "<td style='background:yellow;color:black;border-color: green;'>Nombre Usuario</td>";
            echo "<td style='background:yellow;color:black;border-color: green;'>Apellido Usuario</td>";
            echo "<td style='background:yellow;color:black;border-color: green;'>Email Usuario</td>";
            echo "<td style='background:yellow;color:black;border-color: green;'>Categoria Usuario</td>";
             echo "<td style='background:yellow;color:black;border-color: green;'>Deshabilitado</td>";
            echo "<td style='background:yellow;color:black;border-color: green;'>Administrar</td>";
             echo "</tr>";
    $usuarios= mysqli_query($conexion, $sql);
      

        if(mysqli_num_rows($usuarios)>0){

           while($dato_usuario = mysqli_fetch_assoc($usuarios)){
            
            if ($dato_usuario['usu_deshabilitado'] == '1') {

            echo"<tr style='color:grey; font-weight: bold'> ";
            }else{
              echo"<tr>";
            }
            echo"<td>" .$dato_usuario['usu_alias'] ."</td>";
            echo"<td>" .$dato_usuario['usu_nombre']."</td>";  
            echo"<td>".$dato_usuario['usu_apellido']."</td>";
            echo"<td>" .$dato_usuario['usu_email'] ."</td>";
            echo"<td>" .$dato_usuario['usu_tipo'] ."</td>";
            if ($dato_usuario['usu_deshabilitado'] == '0') {
             echo"<td>Habilitado</td>";
            }else{
              echo"<td>Deshabilitado</td>";
            }
            


            echo"<td><a href='modificar_usuario.php?usu_id=".$dato_usuario['usu_id']."' style='text-decoration:none; font-size:14px; ' >"."<img src='img/modificar.png' width='20px'/>"." </a> | <a href='deshabilitar_usuario.proc.php?usu_id=".$dato_usuario['usu_id']."' style='text-decoration:none; font-size:14px;' >"."<img src='img/delete.png' width='20px'/>"." </a>    </td>";
            echo "</tr>";
          
        }
      }
?>

</table>
    </main>

    <nav id="left" class="column">
      <?php
      echo "<a href='intranet.php?rec_disponibilidad=' style= 'text-decoration:none; font-size:14px;position: fixed;width:180px;'><div class='navegacion'>Mostrar recursos</div></a>";
     echo "<a href='misreservas.php' style= 'text-decoration:none; font-size:14px;position: fixed;margin-top:52px;width:180px;'><div class='navegacion'>Mis reservas</div></a>";
     echo "<a href='incidencia.php' style= 'text-decoration:none; font-size:14px;position: fixed;margin-top:104px;width:180px;'><div class='navegacion'>Incidencias</div></a>";
     if ($_SESSION['tipo']== 'Administrador'){
         echo "<a href='administracion.php' style= 'text-decoration:none; font-size:14px;position: fixed;margin-top:156px;width:180px;'><div class='navegacion'>Administrar</div></a>";
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