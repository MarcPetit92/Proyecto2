<?php
extract($_REQUEST);
?>


<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Flat HTML5/CSS3 Login Form</title>
  
  
  
      <link rel="stylesheet" href="css/style.css">

  
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
    <form name="Login" action="intranet.proc.php" class="login-form">
      <input type="text" name="usu_alias" placeholder="usuario"/>
      <input type="password" name="usu_pass" placeholder="contraseña"/>
      <button>Entrar</button>
   
    </form>
  </div>
</div>
  
</body>
</html>

