<?php
try {
	// Tenta realizar uma conexão ao banco de dados com as credenciais abaixo
	$pdo = new PDO('mysql:host=localhost;dbname=cms', 'root', 'toor');
} catch (PDOException $e) {
	// Caso não seja possivel realizar uma conexão, é mostrada uma mensagem de erro
	exit('Não foi possivel conectar ao banco de dados.<hr>Verifique se o MySql está funcionando corretamente e se as credenciais de login do phpMyAdmin estão corretas no arquivo connection.php (linha 4)');
}

?>