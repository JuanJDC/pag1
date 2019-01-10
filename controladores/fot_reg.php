<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
<?php 
	session_start();
	$ses = $_SESSION['usr'];

	$foto_nom = $_FILES['fot']['name'];
	$foto_tip = $_FILES['fot']['type'];
	$foto_tam = $_FILES['fot']['size'];

	$foto_err = $_FILES['fot']['error'];
	$destino = $_SERVER['DOCUMENT_ROOT'] . "/pag1/imaUsu/";

	$conx = mysqli_connect('localhost', 'root', '', 'Usuarios');
	
	$consulta = "UPDATE datos_usr SET foto = '$foto_nom' WHERE usuario = '$ses'" ;

	$resultado = mysqli_query($conx, $consulta);

	move_uploaded_file($_FILES['fot']['tmp_name'], $destino.$foto_nom);



	if ($resultado) {
		header('location:../vista/sec_usu.php');
	}else{
		echo "Fracaso";
	} 

 ?>

</body>
</html>