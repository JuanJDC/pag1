<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link rel="stylesheet" type="text/css" href="estilos_sec_usu.css
">
	<title></title>
</head>
<body>


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
	<div class="fondo"></div>

	<header>
		<p class="nom_usu"><?php echo $nom;?> <?php echo $ape;?></p>
		<a href="../controladores/cerrar_sec.php" class="cer_sec">Cerrar Sesion</a>
	</header>
	<a href="../md/registro_fot.php">
	<div class="foto_per_usu">
		
		<?php echo "<img class='fot_per' src =\"../imaUsu/$fot\">";  ?>
		
	</div>
	</a>

	<div class="dat_usu" id="dat_usu">
		<div class="publi2" id="des_chat" onclick="desplegar()">Chat</div>
		<div class="cont_chat" id="cont_chat">

			<?php  

			$consulta4 = "SELECT * FROM datos_usr";
			$resultado4 = mysqli_query($conx, $consulta4);
			while ($fila4 =mysqli_fetch_assoc($resultado4) ) {
				echo "<div class='usu_chat'>";

				echo "<div class='fot_chat' style=\"background-image:url('../imaUsu/".$fila4['foto']."');width: 70px;height: 70px;border-radius:35px;display:inline-block\"></div>";
				echo "<div class='nom_usu_chat'>".$fila4['usuario']."</div>";

				echo "</div>";
			}
			?>

		</div>

		<br>
		<a href="../md/publicaciones.php" class="publi">Publicaciones</a><br><br>

		<form class="dat_usu_ed">
		
		<input  class="dat_usu_in" type="text" name="" disabled value="<?php echo  $nom ;?>">
		<input  class="dat_usu_in" type="text" name="" disabled value="<?php echo  $ape ;?>">
		<input  class="dat_usu_in" type="text" name="" disabled value="<?php echo  $tel ;?>">
		<input  class="dat_usu_in" type="text" name="" disabled value="<?php echo  $sex ;?>">
		<input  class="dat_usu_in" type="text" name="" disabled value="<?php echo  $cor ;?>">
		<input type="submit" class="flotar" value="Editar">
		</form>
	</div>
<?php } ?>
	<div class="publicacion">
			<form class="entrada_articulo" action="../controladores/publicar.php"  method="post" enctype="multipart/form-data">
				<input type="text" name="tit" class="int_art" placeholder="TITULO...">
				<textarea name="cont" class="int_art" placeholder="CONTENIDO..."></textarea>
				<div class="btn_fil">
					<p>Subir Img.</p>
				</div>
				<input type="file" name="fot_pu" class="fil">
			
				<input type="text" name="corr" class="int_art fon" value="<?php echo $ses ?>" disabled> 
					<input type="submit" name="" value="Crear" class="crear">
			</form>

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
		echo "<hr>";

		echo "<h2 class='tit_pub'>".$fila2['titulo'] ."</h2>";
		echo "<hr>";
		echo "<p class ='con_pub'>".$fila2['contenido']."</p>";
		if($fila2['foto'] != ""){
			echo "<img src = '../ima_pub/".$fila2['foto']."' class='img_pub'>";
		}
		echo "<hr>";
		echo "<h3>Publica : ".$fila2['usuario']."</h3>";
		echo "<h3 class='fech'>".$fila2['fecha']."</h3>";

		echo "</div>";
	}
	for ($i=1; $i <= $cantidad_pag ; $i++) { 
		echo "<div class='link_pag'>";
		echo "<a class='l_p' href='sec_usu.php?pag=".$i."'>".$i." </a>";
		echo "</div>";
			}

	mysqli_close($conx);
	?>
	</div>
	 <footer>
		<div class="div_foo">Informacion</div>
		<div class="div_foo">Politicas</div>
		<div class="div_foo">contacto</div>
	</footer>
<div class="menu" onclick="sacar()"></div>


<script type="text/javascript">
var cuen = 0;
var menu;

var cuen2 = 0;
var menu2;
	function sacar(){

	if(cuen == 0){
		menu = document.getElementById('dat_usu');
		menu.style.left = "0px";
		cuen = cuen + 1;
	}else{

		menu.style.left = "-420px";
		cuen =cuen - 1;
	}
}


function desplegar(){
	menu2 = document.getElementById('cont_chat');
if(cuen2 == 0){
		
		menu2.style.display = "block";
		cuen2 = cuen2 + 1;
	}else{

		menu2.style.display = "none";
		cuen2 =cuen2 - 1;
	}
}


</script>

</body>
</html>