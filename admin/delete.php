<?php

session_start();

include_once('../includes/connection.php'); // Realiza a conexão ao banco de dados
include_once('../includes/posts.php'); // Mostra os posts do banco de dados
include_once('../includes/functions.php'); // Cabeçalho e rodapé da página

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
		<link rel="stylesheet" href="../assets/w3.css">
		<script src="../assets/fontawesome-all.min.js"></script>
	</head>
	<body>

		<div class="container">

			<?php cms_header(); ?> <!-- Mostra o cabeçalho -->

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

			<?php cms_footer(); ?> <!-- Mostra o rodapé -->
			<a style="float: right;" href="index.php"><i class="fas fa-arrow-left"></i> Voltar</a>

		</div>

	</body>
	</html>

	<?php
} else {
	header('Location: index.php');
}

?>