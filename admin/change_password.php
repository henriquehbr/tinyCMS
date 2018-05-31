<?php

##### TROCAR SENHA DO ADMINISTRADOR #####

session_start();

include_once("../includes/connection.php");

if (isset($_SESSION["logged_in"])) {
	if (isset($_POST['senha_atual'], $_POST['nova_senha'])) {
		$senha_atual = $_POST['senha_atual'];
		$nova_senha = $_POST['nova_senha'];

		// Se o usuário deixar algum campo em branco, essa mensagem será mostrada no formulário
		if (empty($senha_atual) or empty($nova_senha)) {
			$error = 'Preencha todos os campos!';
		} else {
			$query = $pdo->prepare("SELECT * FROM users WHERE user_password = ?");
			$query->bindValue(1, $senha_atual);
			$query->execute();

			$num = $query->rowCount();

			if ($num == 1) {
				// Usuário digitou a senha correta
				$query = $pdo->prepare("UPDATE users SET user_password = ? WHERE user_name = 'admin'");
				$query->bindValue(1, $nova_senha);
				$query->execute();
				
				header('Location: index.php');
				exit();
			} else {
				// Usuário digitou a senha incorreta
				$error = 'Senha atual incorreta!';	
			}
		}
	}
	?>

	<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>tinyCMS - Alterar senha</title>
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
				<a class="w3-bar-item w3-button" href="change_password.php"><i class="fas fa-key"></i> Alterar senha</a>
				<a class="w3-bar-item w3-button" href="logout.php"><i class="fas fa-sign-out-alt"></i> Sair</a>
				<a class="w3-bar-item w3-button w3-right" href="../index.php"><i class="fas fa-arrow-left"></i> Voltar ao inicio</a>
			</div>

			<h4>Alterar senha</h4>

			<!-- Essa é uma mensagem de erro, caso algo dê errado -->
			<?php if (isset($error)) { ?>
				<small style="color:#aa0000;"><?php echo $error; ?></small>
				<br /><br />
			<?php } ?>

			<form action="change_password.php" method="post" autocomplete="off">
				<input class="w3-input w3-border" type="password" name="senha_atual" placeholder="Digite sua senha atual..." /><br>
				<input class="w3-input w3-border" type="password" name="nova_senha" placeholder="Digite sua nova senha..."><br>
				<button class="w3-button w3-border" type="submit">
					<i class="fas fa-check"></i> Confirmar
				</button>
			</form>

		</div>

	</body>
	</html>

	<?php
} else {
	header("Location: index.php");
}

?>