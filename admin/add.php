<?php

##### CRIAR POSTS #####

session_start();

include_once('../includes/conectar_bd.php'); // Realiza a conexão ao banco de dados

if (isset($_SESSION['logged_in'])) {
	if (isset($_POST['title'], $_POST['content'])) {
		$titulo = $_POST['title'];
		$conteudo = $_POST['content'];

		// Se o usuário deixar algum campo em branco, essa mensagem será mostrada no formulário
		if (empty($titulo) or empty($conteudo)) {
			$erro = 'Preencha todos os campos!';
		} else {
			$db = $conectar->prepare('INSERT INTO artigos (artigo_titulo, artigo_conteudo, artigo_data) VALUES (?, ?, ?)');

			$db->bindValue(1, $titulo);
			$db->bindValue(2, $conteudo);
			$db->bindValue(3, time());

			$db->execute();

			header('Location: index.php');
		}
	}
	// Mosta a página de escrever posts
	?>

	<!-- ============================== # PÁGINA DE ESCREVER POSTS # ============================== -->
	<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>tinyCMS - Escrever post</title>
		<link rel="stylesheet" href="../assets/w3.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
	</head>
	<body>

		<div class="w3-container">

			<a class="w3-xxlarge" href="/tinyCMS/">tinyCMS</a>
			<p>Um sistema de gerenciamento de conteúdo extremamente simples...</p>

			<div class="w3-bar w3-light-grey">
				<a class="w3-bar-item w3-button" href="add.php"><i class="fas fa-pencil-alt"></i> Escrever post</a>
				<a class="w3-bar-item w3-button" href="delete.php"><i class="fas fa-trash-alt"></i> Apagar post</a>
				<a class="w3-bar-item w3-button" href="change_password.php"><i class="fas fa-key"></i> Alterar senha</a>
				<a class="w3-bar-item w3-button" href="logout.php"><i class="fas fa-sign-out-alt"></i> Sair</a>
				<a class="w3-bar-item w3-button w3-right" href="../index.php"><i class="fas fa-arrow-left"></i> Voltar ao inicio</a>
			</div>

			<h4>Escrever artigo</h4>

			<!-- Essa é uma mensagem de erro, caso algo dê errado -->
			<?php if (isset($erro)) { ?>
				<small style="color:#aa0000;"><?php echo $erro; ?></small>
				<br /><br />
			<?php } ?>

			<form action="add.php" method="post" autocomplete="off">
				<input class="w3-input w3-border" type="text" name="title" placeholder="Titulo do post" /><br>
				<textarea class="w3-input w3-border" rows="10" cols="100" placeholder="Conteúdo do post" name="content"></textarea><br>
				<button class="w3-button w3-border" type="submit">
					<i class="fas fa-check"></i> Salvar artigo
				</button>
			</form>

		</div>

		<script src="//cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
		<script>CKEDITOR.replace("content");</script>
	</body>
	</html>

	<?php
} else {
	header('Location: index.php');
}

?>