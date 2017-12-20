<?php

include_once('includes/connection.php'); // Realiza a conexão ao banco de dados
include_once('includes/article.php'); // Mostra os posts do banco de dados

$article = new Article;
$articles = $article->fetch_all();

?>

<!-- ============================== # PÁGINA INICIAL # ============================== -->
<html>
<head>
	<meta charset="utf-8">
	<title>tinyCMS - Bem vindo!</title>
	<link rel="stylesheet" href="assets/style.css">
</head>
<body>
	<div class="container">

		<!-- MENU -->
		<h1><a href="index.php" id="logo">tinyCMS</a></h1>
		<a href="admin">Página do admin</a>
		<!-- FIM DO MENU -->

		<!-- POSTS -->
		<ol>
			<?php foreach ($articles as $article) { ?>
			<li>
				<h3><?php echo $article['article_title']; ?></h3>
				<p><?php echo $article['article_content']; ?></p>
			</li>
			<?php } ?>
		</ol>
		<!-- FIM DOS POSTS -->

	</div>
</body>
</html>