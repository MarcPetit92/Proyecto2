<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Intranet</title> 
      <link rel="stylesheet" href="css/style.css">   
</head>

<body>

  <div class="login-page">

  <div class="form">
    <h1>Estas dentro de la intranet</h1>

<?php

  extract($_REQUEST);
  echo "Hola:" . $usu_nombre . " " . $usu_apellido ;
  ?>
  </div>
</div>
 
</body>
</html>