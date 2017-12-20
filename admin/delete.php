<?php

session_start();

include_once('../includes/connection.php'); // Realiza a conexão ao banco de dados
include_once('../includes/article.php'); // Mostra os posts do banco de dados

$article = new Article;

if (isset($_SESSION['logged_in'])) {
	// Mostra a página de deletar posts
	if (isset($_GET['id'])) {
		$id = $_GET['id'];

		$query = $pdo->prepare('DELETE FROM articles WHERE article_id = ?');
		$query->bindValue(1, $id);
		$query->execute();

		header('Location: delete.php');
	}

	$articles = $article->fetch_all();

	?>

	<!-- ============================== # PÁGINA PARA REMOVER POSTS # ============================== -->
	<html>
	<head>
		<meta charset="utf-8">
		<title>tinyCMS - Deletar post</title>
		<link rel="stylesheet" href="../assets/style.css">
	</head>
	<body>

		<!-- MENU -->
		<div class="container">
			<h1><a href="../index.php" id="logo">CMS</a></h1>

			<h4>Escolha o artigo a ser deletado:</h4>

			<form action="delete.php" method="get">
				<select onchange="this.form.submit();" name="id">
					<?php foreach ($articles as $article) { ?>
						<option value="<?php echo $article['article_id']; ?>">
							<?php echo $article['article_title']; ?>
						</option>
					<?php } ?>
				</select>
			</form>

			<a href="index.php">&larr; Voltar</a>

		</div>
		<!-- FIM DO MENU -->

	</body>
	</html>

	<?php
} else {
	header('Location: index.php');
}

?>