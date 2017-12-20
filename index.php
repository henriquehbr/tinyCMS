<?php

include_once('includes/connection.php'); // Realiza a conexão ao banco de dados
include_once('includes/posts.php'); // Mostra os posts do banco de dados
include_once('includes/header-footer.php'); // Cabeçalho e rodapé da página

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

		<?php headercms(); ?> <!-- Mostra o cabeçalho -->

		<!-- ########## POSTS ########## -->
		<ol>
			<?php foreach ($articles as $article) { ?>
			<li>
				<h3><?php echo $article['article_title']; ?></h3>
				<p><?php echo $article['article_content']; ?></p>
			</li>
			<?php } ?>
		</ol>
		<!-- ########## FIM DOS POSTS ########## -->

		<?php footercms(); ?> <!-- Mostra o rodapé -->
		<a style="float: right;" href="admin">Página do admin</a>

	</div>
</body>
</html>