<?php

##### DELETAR POSTS #####

session_start();

include_once('../includes/connection.php'); // Realiza a conexão ao banco de dados
include_once('../includes/posts.php'); // Mostra os posts do banco de dados

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
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>tinyCMS - Deletar post</title>
		<link rel="stylesheet" href="../assets/w3.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
	</head>
	<body>

		<div class="w3-container">

			<a class="w3-xxlarge" href="/index.php">tinyCMS</a>
			<p>A stupidly simple content management system...</p>

			<div class="w3-bar w3-light-grey">
				<a class="w3-bar-item w3-button" href="add.php"><i class="fas fa-pencil-alt"></i> Escrever post</a>
				<a class="w3-bar-item w3-button" href="delete.php"><i class="fas fa-trash-alt"></i> Apagar post</a>
				<a class="w3-bar-item w3-button" href="logout.php"><i class="fas fa-sign-out-alt"></i> Sair</a>
				<a class="w3-bar-item w3-button w3-right" href="index.php"><i class="fas fa-arrow-left"></i> Voltar ao inicio</a>
			</div>

			<h4>Selecione o artigo a ser deletado:</h4>

			<form action="delete.php" method="get">
				<select class="w3-button w3-border" onchange="this.form.submit();" name="id">
					<option value=""># Escolha um artigo a ser deletado #</option>
					<?php foreach ($articles as $article) { ?>
						<option value="<?php echo $article['article_id']; ?>">
							<?php echo $article['article_title']; ?>
						</option>
					<?php } ?>
				</select>
			</form>

		</div>

	</body>
	</html>

	<?php
} else {
	header('Location: index.php');
}

?>