<?php

##### REALIZA UMA CONEXÃO AO BANCO DE DADOS #####

$servername = "localhost";
$dbname = "cms";
$username = "root";
$password = "";

try {
	// Tenta realizar uma conexão ao banco de dados com as credenciais abaixo
	$conectar = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

	// Declara a tabela de artigos
	$tabela_artigos = "CREATE TABLE artigos (
		artigo_id INT AUTO_INCREMENT PRIMARY KEY,
		artigo_titulo VARCHAR(255) NOT NULL,
		artigo_conteudo TEXT NOT NULL,
		artigo_data INT(11)
	)";

	// Declara a tabela de usuários
	$tabela_usuarios = "CREATE TABLE usuarios (
		usuario_id INT AUTO_INCREMENT PRIMARY KEY,
		usuario_nome VARCHAR(255) NOT NULL,
		usuario_senha VARCHAR(255) NOT NULL
	)";

	// Cria a tabela de artigos no banco de dados
	$conectar->exec($tabela_artigos);

	// Cria a tabela de usuários no banco de dados
	$conectar->exec($tabela_usuarios);

} catch (PDOException $e) {
	// Caso não seja possivel realizar uma conexão, é mostrada uma mensagem de erro
	?>

	<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>tinyCMS - Erro de conexão</title>
		<link rel="stylesheet" href="../assets/w3.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
	</head>
	<body>

		<div class="w3-container">
			<a class="w3-xxlarge" href="/index.php">tinyCMS</a>
			<p>Um sistema de gerenciamento de conteúdo absurdamente simples...</p>

			<div class="w3-panel w3-red w3-card">
				<h3><i class="fas fa-exclamation-triangle"></i> Não foi possivel conectar ao banco de dados!</h3>
				<b>Possíveis soluções:</b>
				<ul>
					<li>Verifique se o MySQL está instalado e funcionando corretamente no servidor.</li>
					<li>Verifique se as credenciais de login do phpMyAdmin estão corretas no inicio do arquivo <code class="w3-codespan w3-round">connection.php</code></li>
				</ul>
			</div>
		</div>

	</body>
	</html>

	<?php
	exit();
}

?>