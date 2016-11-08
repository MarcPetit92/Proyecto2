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
<html>
<head>
	<title>Iridium</title>
	<link rel="stylesheet" href="css/style.css">   
    <link rel="stylesheet" href="css/intranet_main.css">   
</head>
<body>
  <div id="header">
  <div class="izq">Iridium</div>
    
  <div class = "der">
  <?php

  extract($_REQUEST);
  echo "Hola! " . $usu_nombre . " " . $usu_apellido . " ";
  ?>
  </div>
  </div>
  <div class="opciones">
  		<?php
  		echo "<a href='intranet.php?usu_nombre=".$usu_nombre."&usu_apellido=".$usu_apellido."&usu_id=".$usu_id."'><div class='opcion'><br>Mostrar recursos</div></a>";
  		echo "<a href='misreservas.php?usu_nombre=".$usu_nombre."&usu_apellido=".$usu_apellido."&usu_id=".$usu_id."'><div class='opcion'><br>Mis reservas</div></a>";
  		echo "<a href='intranet.php?usu_nombre=".$usu_nombre."&usu_apellido=".$usu_apellido."&usu_id=".$usu_id."'><div class='opcion'><br>Incidencias</div></a>";?>
  </div>
</body>
</html>