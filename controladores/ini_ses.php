<!DOCTYPE >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<lang = "es">
	<title></title>
</head>
<body>

<?php 
	$nom = $_POST['nom_usu_ini'];
	$cont = $_POST['con_usu_ini'];

	$conx = mysqli_connect('localhost', 'root', '', 'Usuarios');
	
	$consulta = "SELECT * FROM datos_usr WHERE usuario = '$nom'";

	$resultado = mysqli_query($conx, $consulta);
		


	if($fila = mysqli_fetch_assoc($resultado)){

		$contr = $fila['contrasena'];

		echo $contr;
		echo $cont;
		$comprueba = password_verify("$cont", "$contr");
		if($comprueba){
			echo $comprueba . "es Verdad";
		}	else{
			echo $comprueba . "es Mentira";
		}

				}
		else{
		//header('location:../index.php');
			echo "error";
		}
		echo $comprueba;

		if($comprueba){
		session_start();
		$_SESSION['usr']=$nom;
				echo $contr;

		header('location:../vista/sec_usu.php');
		}


	mysqli_close($conx);
 ?>
 </body>
</html>