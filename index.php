<?php
  //iniciamos sesión
  session_start();
  //si existe la variable de sesión error la guardamos
  if(isset($_SESSION ['error'])){
    $error=$_SESSION['error'];
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
                echo "<p>Introduce usuario y contraseña</p>";
              }
            ?>
    <form name="Login" action="login.proc.php" class="login-form" onsubmit="return validar();">
      <input type="text" name="alias" placeholder="usuario" onfocus="document.Login.usu_alias.style.color='';" />
      <input type="password" name="pass" placeholder="contraseña" onfocus="document.Login.usu_pass.style.color='';"/>
      <button>Entrar</button>
      <p class="message">No estás registrado? <a href="form_registro.php">Crear una cuenta</a></p>
    </form>
  </div>
</div>
  
</body>
</html>

