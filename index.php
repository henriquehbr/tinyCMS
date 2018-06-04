<?php

##### PÁGINA INICIAL #####

include_once('includes/conectar_bd.php');
include_once('includes/artigo.php');

$artigo = new Artigo;
$artigos = $artigo->obter_todos();

?>

<!-- ============================== # PÁGINA INICIAL # ============================== -->
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>tinyCMS - Bem vindo!</title>
	<link rel="stylesheet" href="assets/w3.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
</head>
<body>

		<div class="w3-container">
			<a href="/tinyCMS/" class="w3-xxlarge">My Website</a>
			<p>The description goes here...</p>

			<div class="w3-bar w3-light-grey">
				<a class="w3-bar-item w3-button" href="admin"><i class="fas fa-lock"></i> Página do admin</a>
			</div>

			<br>

			<!-- ########## POSTS ########## -->
			<ul class="w3-ul w3-card">
				<?php foreach ($artigos as $artigo) { ?>
				<li>
					<a href="includes/artigo_pagina.php?id=<?php echo $artigo['artigo_id']; ?>" class="w3-xlarge"><?php echo $artigo["artigo_titulo"]; ?></a><br>
					<?php echo date("F j, Y, g:i a", $artigo['artigo_data']); ?><br><br>
					<?php echo $artigo['artigo_conteudo']; ?>
				</li>
				<?php } ?>
			</ul>
			<!-- ########## FIM DOS POSTS ########## -->
		</div>

		<br>

</body>
</html>