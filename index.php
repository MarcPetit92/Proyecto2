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
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="icon" type="image/gif" href="imagenes/iridium.gif" />
		<link rel="stylesheet" href="css/style.css">
	  <script type="text/javascript" src="js/validacion.js"> </script>
		<script type="text/javascript" src="js/index.js"> </script>
		<title>IRIDIUMcademy</title>
	</head>
	<body>
		<div class="login-page">
			<div class="form">
				<h1>IRIDIUMcademy</h1>
					<p>Introduce usuario y contraseña</p>
						<?php
							if(isset($error)){
								echo "<font color="."red"."><b>ERROR: . $error</b></font>";
								echo "<br/><br/>";
							}
						?>
						<form name="Login" action="login.proc.php" class="login-form" onsubmit="return validar();">
			      	<input type="text" name="alias" placeholder="usuario" onfocus="document.Login.alias.style.color='';" />
			      	<input type="password" name="pass" placeholder="contraseña" onfocus="document.Login.pass.style.color='';"/>
			      	<button onclick=validar()>Entrar</button>
			    	</form>
					</div>
				</div>
		<!--<footer id="pie">
			Drets reservats &copy;2015 - David Marín
		</footer>-->
	</body>
</html>
