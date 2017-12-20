<?php

session_start();

include_once('../includes/connection.php'); // Realiza a conexão ao banco de dados

if (isset($_SESSION['logged_in'])) {
	if (isset($_POST['title'], $_POST['content'])) {
		$title = $_POST['title'];
		$content = $_POST['content'];

		// Se o usuário deixar algum campo em branco, essa mensagem será mostrada no formulário
		if (empty($title) or empty($content)) {
			$error = 'Preencha todos os campos!';
		} else {
			$query = $pdo->prepare('INSERT INTO articles (article_title, article_content) VALUES (?, ?)');

			$query->bindValue(1, $title);
			$query->bindValue(2, $content);

			$query->execute();

			header('Location: index.php');
		}
	}
	// Mosta a página de escrever posts
	?>

	<html>
	<head>
		<meta charset="utf-8">
		<title>tinyCMS - Escrever post</title>
		<link rel="stylesheet" href="../assets/style.css">
	</head>
	<body>

		<!-- ============================== # PÁGINA DE ESCREVER POSTS # ============================== -->
		<div class="container">
			<h1><a href="../index.php" id="logo">tinyCMS</a></h1>

			<h4>Escrever artigo</h4>

			<!-- Essa é uma mensagem de erro, caso algo dê errado -->
			<?php if (isset($error)) { ?>
				<small style="color:#aa0000;"><?php echo $error; ?></small>
				<br /><br />
			<?php } ?>

			<form action="add.php" method="post" autocomplete="off">
				<input type="text" name="title" placeholder="Titulo do post" /><br /><br />
				<textarea rows="15" cols="50" placeholder="Senha" placeholder="Conteúdo do post" name="content"></textarea><br /><br />
				<input type="submit" value="Salvar artigo" />
			</form>

			<a href="index.php">&larr; Voltar</a>

		</div>

	</body>
	</html>

	<?php
} else {
	header('Location: index.php');
}

?>