<?php

$servername = "localhost";
$dbname = "cms";
$username = "root";
$password = "toor";

try {
	// Tenta realizar uma conexão ao banco de dados com as credenciais abaixo
	$pdo = new PDO('mysql:host=$servername;dbname=$dbname', '$username', '$password');
} catch (PDOException $e) {
	// Caso não seja possivel realizar uma conexão, é mostrada uma mensagem de erro
	echo '<link rel="stylesheet" href="../assets/w3.css">';
	exit('<div style="margin:0;padding:10px;" class="w3-panel w3-red w3-card"><h3>Não foi possivel conectar ao banco de dados!</h3>Verifique se o MySql está funcionando corretamente e se as credenciais de login do phpMyAdmin estão corretas no inicio do arquivo connection.php</div>');
}

?>