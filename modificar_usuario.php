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

      <script type="text/javascript" src="js/funciones.js"></script>   
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
<table>
<?php
extract($_REQUEST);

 
        echo "<h2 style='color:#43A047;'>Formulario modificar usuario</h1>";
        echo "<h4 style='color:red;'>".$error."</h1>";     
            
 $sql = "SELECT * FROM tbl_usuario WHERE usu_id = '".$usu_id."'";
  //echo $sql;
 $usuario= mysqli_query($conexion, $sql);


        if(mysqli_num_rows($usuario)>0){

           while($dato_usuario = mysqli_fetch_assoc($usuario)){
          
            

            echo"<form name='modificar_usuario' action='modificar_usuario.proc.php' class='login-form' onsubmit='return validar_registro();''>";


           echo"<tr><td colspan='1'>";
           echo"<div class='modificar_usuario' class='check' width='25%' >";
            ?>
          
             <input type='checkbox' name='checkbox1' onclick="mostrar_alias()">  <br> 
           
            <?php
            echo"</div></td>";
            echo"<td colspan='1'> <div class='modificar_usuario'   > ";
           
            echo"<label id='label_usu_alias'  disabled >Alias del usuario </label> ";
            echo "</div> </td>";

            echo"<td colspan='1'> <div class='modificar_usuario'  >";
            echo"<input type='text' id='usu_alias' name='usu_alias' disabled value=".$dato_usuario['usu_alias']."> ";
           
            echo "</div></td></tr>";
            echo"<tr><td colspan='1'>";
            echo"<div class='modificar_usuario'>";



            ?>
            <input type='checkbox' name='checkbox2' onclick="mostrar_nombre()">  <br>
            <?php
            echo"</div></td>";
            echo"<td colspan='1'> <div class='modificar_usuario'  > ";

       

            echo"<label id='label_usu_nombre' disabled >Nombre del Usuario</label>";
            echo "</div> </td>";
          
            echo"<td colspan='1'> <div class='modificar_usuario'  >";
            echo"<input type='text' id='usu_nombre' disabled name='usu_nombre' value=".$dato_usuario['usu_nombre'].">";
           echo "</div></td></tr>";
           echo"<tr><td colspan='1'>";
            echo"<div class='modificar_usuario'>";
           
             ?>

            <input type='checkbox' name='checkbox3' onclick="mostrar_apellido()"> <br>

            <?php

             echo"</div></td>";
            echo"<td colspan='1'> <div class='modificar_usuario'   > ";

            echo"<label id='label_usu_apellido' disabled>Apellido de Usuario</label>";
            
             echo "</div> </td>";          
            echo"<td colspan='1'> <div class='modificar_usuario'  >";
           
            echo"<input type='text'  id='usu_apellido' disabled name='usu_apellido' value=".$dato_usuario['usu_apellido'].">";

             echo "</div></td></tr>";
           echo"<tr><td colspan='1'>";
            echo"<div class='modificar_usuario'>";

              ?>

            <input type='checkbox' name='checkbox4' onclick="mostrar_email()">  <br>

            <?php
           echo"</div></td>";
            echo"<td colspan='1'> <div class='modificar_usuario'   > ";

            echo"<label id='label_usu_email' disabled> Email del Usuario</label>";

            echo "</div> </td>";          
            echo"<td colspan='1'> <div class='modificar_usuario'  >";
           
            echo"<input type='tex'  id='usu_email' disabled name='usu_email' value=".$dato_usuario['usu_email'].">";
            echo "</div></td></tr>";
           echo"<tr><td colspan='1'>";
            echo"<div class='modificar_usuario'>";
          
            ?>

            <input type='checkbox' name='checkbox5' onclick="mostrar_rango()">  <br>

            <?php
            
            echo"</div></td>";
            echo"<td colspan='1'> <div class='modificar_usuario'   > ";

            echo"<label id='label_usu_tipo' disabled>Rango del Usuario</label><br/>";

            echo "</div> </td>";          
            echo"<td colspan='1'> <div class='modificar_usuario'  >";

            echo"<select name='usu_tipo' id='usu_tipo' disabled >
              <option value='Administrador'>Administrador</option>
              <option value='Usuario'>Usuario</option>
              </select> <br/>";

              echo" <input type='text' name='usu_id'  style='display:none' value=".$usu_id.">";
            
           echo "</div></td></tr>";
           echo"<tr><td colspan='1'>";
            echo"<div class='modificar_usuario'>";
            
               ?>

            <input type='checkbox' name='checkbox6' onclick="mostrar_deshabilitado()">  <br>

            <?php
            
            echo"</div></td>";
            echo"<td colspan='1'> <div class='modificar_usuario' style= width:100px  > ";

            echo"<label id='label_usu_deshabilitado' disabled>Estado Usuario</label><br/>";           

            echo "</div> </td>";          
            echo"<td colspan='1'> <div class='modificar_usuario'  style= width:227px>";

              echo"<select name='usu_deshabilitado' id='usu_deshabilitado' disabled >
              <option value='0'>Habilitado</option>
              <option value='1'>Deshabilitado</option>
              </select> <br/><br/><br/>";

          echo "</div></td></tr>";


           echo"<tr><td colspan='3'>";
            echo"<div class='modificar_usuario'>";
              
            echo"<button>Enviar</button>";
      echo "</div></td></tr>";


       echo"</form>";

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