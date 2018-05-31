<?php

##### PÁGINA INICIAL #####

include_once('includes/connection.php');
include_once('includes/article.php');

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
			<a href="/index.php" class="w3-xxlarge">My Website</a>
			<p>The description goes here...</p>

			<div class="w3-bar w3-light-grey">
				<a class="w3-bar-item w3-button" href="admin"><i class="fas fa-lock"></i> Página do admin</a>
			</div>

			<hr>

			<!-- ########## POSTS ########## -->
			<ul class="w3-ul w3-card">
				<?php foreach ($articles as $article) { ?>
				<li>
					<a href="includes/article_page.php?id=<?php echo $article['article_id']; ?>" class="w3-xlarge"><?php echo $article["article_title"]; ?></a><br>
					<?php echo date("F j, Y, g:i a", $article['article_timestamp']); ?><br><br>
					<?php echo $article['article_content']; ?>
				</li>
				<?php } ?>
			</ul>
			<!-- ########## FIM DOS POSTS ########## -->
		</div>

		<br>

</body>
</html>