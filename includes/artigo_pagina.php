<?php

##### PÁGINA DINÂMICA DOS ARTIGOS #####

include("conectar_bd.php");
include("artigo.php");

$artigo = new Artigo;

if (isset($_GET["id"])) {
	$id = $_GET["id"];
	$artigo_id = $artigo->obter_dados($id);
	?>

	<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title><?php echo $artigo_id["artigo_titulo"]; ?></title>
		<link rel="stylesheet" href="../assets/w3.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
	</head>
	<body>

		<div class="w3-container">
			<a href="/tinyCMS/" class="w3-xxlarge">My Website</a>
			<p>The description goes here...</p>

			<div class="w3-bar w3-light-grey">
				<a class="w3-bar-item w3-button" href="../index.php"><i class="fas fa-arrow-left"></i> Voltar</a>
				<a class="w3-bar-item w3-button w3-right" href="../admin"><i class="fas fa-lock"></i> Página do admin</a>
			</div>

			<br>

			<!-- ########## POST ########## -->
			<div class="w3-ul w3-card w3-padding">
				<h3><?php echo $artigo_id["artigo_titulo"]; ?></h3>
				<?php echo date("F j, Y, g:i a", $artigo_id["artigo_data"]); ?><br><br>
				<?php echo $artigo_id["artigo_conteudo"]; ?>
			</div>
			<!-- ########## FIM DO POST ########## -->

			<br>
			
		</div>

	</body>
	</html>

	<?php
} else {
	header("Location: index.php");
	exit();
}

?>