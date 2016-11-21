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

<div class="centro" style="background:white;text-align:center;padding-left:16px;padding-bottom:16px;text-align: center;align-items: center;justify-content: center;">



 <form name="form_recursos" action="anadir_recursos.proc.php " class="login-form" onsubmit="return validar_recurso();">
<?php
  if(isset($_SESSION['error_recurso'])){
    echo"<label>".$_SESSION['error_recurso']."</label>";
  }
?>
      <input type="text" name="rec_nombre" placeholder="Nombre del recurso" onfocus="document.registro.rec_nombre.style.borderColor='#F2F2F2'; document.registro.alias.placeholder='Nombre del recurso';" />
          <label>Tipo de recurso</label>
          <select name="tip_id" >
          <option value="1">Aula teoria</option>
          <option value="3">Aula informatica</option>
          <option value="4">Despacho</option>
          <option value="5" >Sala reuniones</option>
          <option value="6">Proyector</option>
          <option value="7">Carrito</option>
          <option value="8">Portatil</option>
          <option value="9" >Movil</option>
        </select> 
        
        <input type="file" name="rec_foto" accept="image/*">
        
        
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