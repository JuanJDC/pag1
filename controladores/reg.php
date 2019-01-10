<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1' >
	<title></title>
</head>
<body>
<?php 



	$nom = $_POST['nom_reg'];
	$ape = $_POST['ape_reg'];
	$tel = $_POST['telefono'];
	$cor= $_POST['correo'];
	$sex= $_POST['sexo'];
	$con = $_POST['contrasena'];
	$con2 = $_POST['contras'];
	

$conx = mysqli_connect('localhost', 'root', '', 'usuarios');
$consul = "SELECT * FROM datos_usr WHERE usuario = '$cor'";
$resul = mysqli_query($conx, $consul);
if($fila = mysqli_fetch_assoc($resul)){
 header('location:../md/registro.php?er=4');
}else if($nom == "" || $ape == "" || $tel == "" || $cor == "" || $sex == "" || $con == "" || $con2 == ""){
		header('location:../md/registro.php?er=3');
}
else if($con == $con2){
		
			$con = password_hash($con2, PASSWORD_DEFAULT);
			$consulta = "INSERT INTO datos_usr(nombre , apellido, telefono, sexo, usuario, contrasena) VALUES (
				'$nom', '$ape', '$tel', '$sex', '$cor', '$con')";

			$resultado = mysqli_query($conx, $consulta);

			if ($resultado) {
				session_start();
				$_SESSION['usr'] = $cor;
				header("location:../md/registro_fot.php");
			}else{
				header('location:../md/registro.php?er=2');
			} 
			
		}else{
		header('location:../md/registro.php?er=1');
}


 ?>

</body>
</html>