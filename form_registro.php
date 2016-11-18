<?php
  //iniciamos sesión
  session_start();
  //si existe la variable de sesión error la guardamos
  if(isset($_SESSION ['error_registro'])){
    $error=$_SESSION['error_registro'];

  }
  //destruimos la sesión para no poder llegar de manera indirecta a ninguna página posterior a la de login
  session_destroy();
?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Iridium</title>
  <link rel="stylesheet" href="css/style.css">
  <script type="text/javascript" src="js/validacion.js"> </script>
</head>

<body>
  <div class="login-page">
  <div class="form">
  <h1 style="color:#43A047;">Iridium</h1>
          
          <?php
              if(isset($error)){
                echo "<font color="."red".">$error</font>";
                echo "<br/><br/>";
              } else{
                echo "<h2 style='color:#43A047;'>Formulario de registro</h1>";
              }
            ?>
    <form name="registro" action="registro.proc.php" class="login-form" onsubmit="return validar_registro();">

      <input type="text" name="alias" placeholder="Usuario" onfocus="document.registro.alias.style.borderColor='#F2F2F2'; document.registro.alias.placeholder='Usuario';" />
      <input type="password" name="pass" placeholder="Contraseña" onfocus="document.registro.pass.style.borderColor='#F2F2F2'; document.registro.pass.placeholder='Contraseña'; "/>
      <input type="password" name="validar_pass" placeholder="Validar Contraseña" onfocus="document.registro.validar_pass.style.borderColor='#F2F2F2'; document.registro.validar_pass.placeholder='Validar Contraseña';"/>
      <input type="text" name="nombre" placeholder="Nombre" onfocus="document.registro.nombre.style.borderColor='#F2F2F2'; document.registro.nombre.placeholder='Nombre';" />
      <input type="text" name="apellido" placeholder="Apellido" onfocus="document.registro.apellido.style.borderColor='#F2F2F2'; document.registro.apellido.placeholder='Apellido';" />
      <input type="text" name="email" placeholder="Email" onfocus="document.registro.email.style.borderColor='#F2F2F2'; document.registro.email.placeholder='Email';" />
      <button>Enviar</button>
      
    </form>
  </div>
</div>
  
</body>
</html>

