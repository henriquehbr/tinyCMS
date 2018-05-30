<?php

##### PÁGINA INICIAL #####

include_once('includes/connection.php');
include_once('includes/posts.php');

$article = new Article;
$articles = $article->fetch_all();

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

			<h1>My Website</h1>
			<p>The description goes here...</p>

			<div class="w3-bar w3-light-grey">
				<a class="w3-bar-item w3-button" href="admin"><i class="fas fa-lock"></i> Página do admin</a>
			</div>

			<hr>

			<!-- ########## POSTS ########## -->
			<ul class="w3-ul w3-card">
				<?php foreach ($articles as $article) { ?>
				<li>
					<h3><?php echo $article['article_title']; ?></h3>
					<p><?php echo $article['article_content']; ?></p>
				</li>
				<?php } ?>
			</ul>
			<!-- ########## FIM DOS POSTS ########## -->
		</div>

</body>
</html>