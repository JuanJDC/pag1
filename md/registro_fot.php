<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF8-8">
	<link rel="stylesheet" type="text/css" href="../vista/estilos.css">
	<title>
		Registro Ususario
	</title>
</head>
<body>
	<?php 
		session_start();
	if(isset($_SESSION['usr'])){
		$ses = $_SESSION['usr'];
		
	}else{
		header("location:../index.php");
	}
	 ?>
	<header>
		<h1 class="titulo_hea">Foto Perfil</h1>
		<h4 class="titulo_hea1"></h4>
	</header>
	<aside>
		<a class="omit" href="../vista/sec_usu.php">Omitir</a>
		<form action="../controladores/fot_reg.php" method="post" enctype="multipart/form-data" class="SubirImagen">
			<div class="arc_img">
			<input type="file" name="fot" class="arc"></div>

			<input class="env_fot_ini" type="submit" name="" value="Subir Foto">
		</form>


	</aside>
</body>
</html>