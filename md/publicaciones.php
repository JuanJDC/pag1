<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../vista/estilos_sec_usu.css
">
	<title>
		
	</title>
	<?php  
	session_start();

	if(isset($_SESSION['usr'])){
		$ses = $_SESSION['usr'];
		
	}else{
		header("location:../index.php");
	}


	$conx = mysqli_connect('localhost', 'root', '', 'Usuarios');
	
	$consulta = "SELECT * FROM datos_usr WHERE usuario = '$ses'";

	$resultado = mysqli_query($conx, $consulta);

	while ($fila = mysqli_fetch_assoc($resultado)){
		$fot = $fila['foto'];
		$nom = ucwords($fila['nombre']);
		$ape = ucwords($fila['apellido']);
		$tel = $fila['telefono'];
		$sex = ucwords($fila['sexo']);
		$cor = ucwords($fila['usuario']);

	?>
</head>
<body>
		<div class="fondo"></div>
	<header>
		<p class="red_blog">Publicaciones.</p>
		<a href="../controladores/cerrar_sec.php" class="cer_sec">Cerrar Sesion</a>
	</header>

	<div class="dat_usu dat_usus" id="dat_usu">
		<h2 class="nombre_barra"><?php echo $nom . " ".$ape;?></h2>
		<div class="publi2" id="des_chat" onclick="desplegar()">Chat</div>
		<div class="cont_chat" id="cont_chat">
			
		</div>

		<br>
		<a href="../vista/sec_usu.php" class="publi">Mis Publicaciones</a><br><br>

	</div>

	<div class="publicacion">
	<?php 

		if (isset($_GET['pag'])) {
		$pag  = $_GET['pag'];
	}else{
		$pag =1;
	}
	

	$consulta3 = "SELECT * FROM publicacion WHERE usuario = '$ses' ORDER BY fecha DESC";
	$resultado3 = mysqli_query($conx, $consulta3);
	$cantidad_publi = 4; 
	$cantidad = mysqli_num_rows($resultado3);
	$cantidad_pag = ceil($cantidad/$cantidad_publi);
	$desde = ($pag*4)-4;

	$consulta2 = "SELECT * FROM publicacion WHERE usuario = '$ses' ORDER BY fecha DESC LIMIT $desde, $cantidad_publi ";

	$resultado2 = mysqli_query($conx, $consulta2);

	while ($fila2 = mysqli_fetch_assoc($resultado2)){
		echo "<div class='publica'>";
		echo "<hr/>";
		echo "<h2 class='tit_pub'>".$fila2['titulo'] ."</h2>";
		echo "<hr/>";
		echo "<p class ='con_pub'>".$fila2['contenido']."</p>";
		if($fila2['foto'] != ""){
			echo "<img src = '../ima_pub/".$fila2['foto']."' class='img_pub'>";
		}
		echo "<hr/>";
		echo "<h3>Publica : ".$fila2['usuario'];
		echo $fila2['fecha']."</h3>";
			echo "</div>";
	}

		for ($i=1; $i <= $cantidad_pag ; $i++) { 
		echo "<div class='link_pag'>";
		echo "<a class='l_p' href='publicaciones.php?pag=".$i."'>".$i." </a>";
		echo "</div>";
			}

	mysqli_close($conx);
	?>



	</div>




	<div class="menu" onclick="sacar()"></div>
	<footer>
		<div class="div_foo">Informacion</div>
		<div class="div_foo">Politicas</div>
		<div class="div_foo">contacto</div>
	</footer>
	<script type="text/javascript">
var cuen = 0;
var menu;

	function sacar(){

	if(cuen == 0){
		menu = document.getElementById('dat_usu');
		menu.style.left = "-20px";
		cuen = cuen + 1;
	}else{

		menu.style.left = "-420px";
		cuen =cuen - 1;
	}
}
</script>
<?php } ?>
</body>
</html>
