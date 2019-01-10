<?php 
session_start();
if(isset($_SESSION['usr'])){
$ses = $_SESSION['usr'];
		
	}else{
		header("location:../index.php");
	}

date_default_timezone_set('America/Bogota');
$titulo = $_POST['tit'];
$contenido = $_POST['cont'];
$fot = $_FILES['fot_pu']['name'];
$fecha = date('Y-m-d H:i:s A');

	echo $titulo . "<br>". $contenido ."<br>". $ses ."<br>". $fot;


		$conx = mysqli_connect('localhost', 'root', '', 'usuarios');
		$consulta = "INSERT INTO publicacion (titulo, contenido, foto, usuario, fecha) VALUES ('$titulo', '$contenido', '$fot', '$ses', '$fecha')";


		$resultado = mysqli_query($conx, $consulta);
		$destino = $_SERVER['DOCUMENT_ROOT'] . "/pag1/ima_pub/";
		if($resultado){
			move_uploaded_file($_FILES['fot_pu']['tmp_name'], $destino.$fot);
			header("location:../vista/sec_usu.php");

		}

	mysqli_close($conx);
 ?>