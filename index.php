<?php
extract($_REQUEST);
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
  <h1>Acceso a la Intranet</h1>
  <?php
  if ($errorusuario==""){
  
    echo"Introduce usuario y contraseña </br></br>";
  
  }
  else{
  
  echo "<font color="."red"."><b>Datos incorrectos</b></font>  </br></br>";
  }
  ?>
    <form name="Login" action="intranet.proc.php" class="login-form" onsubmit="return validar();">
      <input type="text" name="usu_alias" placeholder="usuario" onfocus="document.Login.usu_alias.style.color='';" />
      <input type="password" name="usu_pass" placeholder="contraseña" onfocus="document.Login.usu_pass.style.color='';"/>
      <button>Entrar</button>
   
    </form>
  </div>
</div>
  
</body>
</html>

