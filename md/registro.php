<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../vista/estilos.css">
	<title>
		Registro Ususario
	</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
	<header>
		<h1 class="titulo_hea">Registro</h1>
	</header>
	<aside>


		<form action="../controladores/reg.php" method="post">
			<input class = "inp_reg" type="email" name="correo" placeholder="Correo Electronico">
			<input class = "inp_reg" type="text" name="nom_reg" placeholder="Nombre">
			<input class = "inp_reg" type="text" name="ape_reg" placeholder="Apellidos">
			<input class = "inp_reg" type="text" name="telefono" placeholder="Telefono">
			<input class = "inp_reg" type="password" name="contrasena" placeholder="Contraseña">
			<input class = "inp_reg" type="password" name="contras" placeholder="Repita Contraseña">
			
			<select value="sexo" name="sexo" class="sexo">
				<option value="Hombre">Hombre</option>
				<option value="Mujer">Mujer</option>
				<option value="Otro">Otro</option>
			</select>
			
			
			
			<input class="env_usu_reg" type="submit" name="Enviar" value="Finalizar">


		</form>
			<a href="../index.php" class="vol">Volver a Inicio</a>

	</aside>
	<h1 class="titulo_hea">
	<?php if(isset($_GET['er'])){
		if($_GET['er'] == 1){
		echo "Las contraseñas no Coinciden";
		}else if($_GET['er'] == 2){
		echo "Hay una Falla en la consulta";
		}else if($_GET['er'] == 3){
		echo "Por favor Llenar todos los Campos";
		}else if($_GET['er'] == 4){
		echo "Correo ya REgistrado";
		}
	}

	?>
	</h1>
</body>
</html>