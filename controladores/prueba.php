<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php 

	
	$conx = mysqli_connect('localhost', 'root', '', 'datos_usr2');
	
	$consulta = "SELECT * FROM asd";

	$resultado = mysqli_query($conx, $consulta);

if ($resultado) {
while($fila = mysqli_fetch_assoc($resultado)){
	echo $fila['foto'];
	}
	}else{
		echo "Fracaso";
	} 

 ?>
</body>
</html>