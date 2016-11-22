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
<div class="form">
<?php
extract($_REQUEST);

 
        echo "<h2 style='color:#43A047;'>Formulario modificar usuario</h1>";
              
            
 $sql = "SELECT * FROM tbl_usuario WHERE usu_id = '".$usu_id."'";
  //echo $sql;
 $usuario= mysqli_query($conexion, $sql);


        if(mysqli_num_rows($usuario)>0){

           while($dato_usuario = mysqli_fetch_assoc($usuario)){
           
            

            echo"<form name='modificar_usuario' action='modificar_usuario.proc.php' class='login-form' onsubmit='return validar_registro();''>";

            echo"<label>Alias del usuario</label>";
            echo"<input type='text' name='usu_alias' value=".$dato_usuario['usu_alias'].">";

            echo"<label>Nombre del Usuario</label>";
            echo"<input type='text' name='usu_nombre' value=".$dato_usuario['usu_nombre'].">";

            echo"<label>Apellido de Usuario</label>";
            echo"<input type='text' name='usu_apellido' value=".$dato_usuario['usu_apellido'].">";

            echo"<label> Email del Usuario</label>";
            echo"<input type='tex' name='usu_email' value=".$dato_usuario['usu_email'].">";


            echo"<label>Rango del Usuario</label><br/>";
            echo"<select name='usu_tipo' >
              <option value='Administrador'>Administrador</option>
              <option value='Usuario'>Usuario</option>
              </select> <br/>";
              echo" <input type='text' name='usu_id'  style='display:none' value=".$usu_id.">";

            echo"<label>Estado Usuario</label><br/>";
              echo"<select name='usu_deshabilitado' >
              <option value='0'>Habilitado</option>
              <option value='1'>Deshabilitado</option>
              </select> <br/><br/><br/>";
            echo"<button>Enviar</button>";
      
       echo"</form>";

           }

         }

  ?> 

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