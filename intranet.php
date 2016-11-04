<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Bicis</title>
	<style>
		div {
			width: 200px;
			border: 2px solid black;
			float: left;
			margin-right: 20px;
			margin-bottom: 20px;
		}
	</style>
</head>
<body>
	<a href="161028_exercici1_insertar.php">Insertar producto</a><br/><br/>
	<?php

		//realizamos la conexión
		$conexion = mysqli_connect('localhost', 'root', '', 'ejemplo');

		//le decimos a la conexión que los datos los devuelva diréctamente en utf8, así no hay que usar htmlentities
		$acentos = mysqli_query($conexion, "SET NAMES 'utf8'");

		if (!$conexion) {
		    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
		    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		    exit;
		}

		$sql = "SELECT producto.pro_id, producto.pro_nombre, producto.pro_precio, producto.pro_foto, tipo.tip_nombre FROM producto, tipo WHERE producto.tip_id=tipo.tip_id";

		$productos = mysqli_query($conexion, $sql);

		if(mysqli_num_rows($productos)>0){
			echo "Número de productos: " . mysqli_num_rows($productos) . "<br/><br/>";
			while($producto = mysqli_fetch_array($productos)){
				echo "<div>";
				echo "Nombre: " . $producto['pro_nombre'] . "<br/>";
				echo "Precio: " . $producto['pro_precio'] . "<br/>";
				echo "Tipo: " . $producto['tip_nombre'] . "<br/>";
				$foto='img/'.$producto['pro_foto'];

				if (file_exists ($foto)){
					echo "<img src='" . $foto . "' width='100'/><br/><br/>";
				} else {
					echo "<img src='img/0.jpg' width='100'/><br/><br/>";
				}
				echo "<a href='161028_exercici1_modificar.php?pro_id=". $producto['pro_id'] ."'>Modificar</a><br/>";
				echo "<a href='161028_exercici1_eliminar.proc.php?pro_id=". $producto['pro_id'] ."'>Eliminar</a>";

				echo "</div>";
			}
		} else {
			echo "No hay datos que mostrar!";
		}

		mysqli_close($conexion);

	?>
</body>
</html>