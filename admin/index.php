<?php

##### PAINEL DE CONTROLE DO ADMINISTRADOR #####

session_start();

include_once('../includes/conectar_bd.php');

if (isset($_SESSION['logged_in'])) {
	// Se estiver logado, mostra a página do admin (index)
	?>

	<!-- ============================== # PÁGINA DO ADMIN # ============================== -->
	<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>tinyCMS - Admin</title>
		<link rel="stylesheet" href="../assets/w3.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
	</head>
	<body>

		<div class="w3-container">

			<a class="w3-xxlarge" href="/tinyCMS/">tinyCMS</a>
			<p>Um sistema de gerenciamento de conteúdo extremamente simples...</p>

			<div class="w3-bar w3-light-grey">
				<a class="w3-bar-item w3-button" href="add.php"><i class="fas fa-pencil-alt"></i> Escrever post</a>
				<a class="w3-bar-item w3-button" href="delete.php"><i class="fas fa-trash-alt"></i> Apagar post</a>
				<a class="w3-bar-item w3-button" href="change_password.php"><i class="fas fa-key"></i> Alterar senha</a>
				<a class="w3-bar-item w3-button" href="logout.php"><i class="fas fa-sign-out-alt"></i> Sair</a>
				<a class="w3-bar-item w3-button w3-right" href="../index.php"><i class="fas fa-arrow-left"></i> Voltar ao inicio</a>
			</div>

		</div>

	</body>
	</html>
	<!-- ############################## = FIM DA PÁGINA DO ADMIN = ############################## -->

	<?php
} else {
	// Senão, mostra a página de login
	if (isset($_POST['username'], $_POST['password'])) {
		$usuario_nome = $_POST['username'];
		$usuario_senha = $_POST['password'];

		// Caso deixe todos os campos em branco, uma mensagem de erro é mostrada
		if (empty($usuario_nome) or empty($usuario_senha)) {
			$erro = 'Preencha todos os campos!';
		} else {
			$db = $conectar->prepare("SELECT * FROM usuarios WHERE usuario_nome = BINARY ? AND usuario_senha = BINARY ?");

			$db->bindValue(1, $usuario_nome);
			$db->bindValue(2, $usuario_senha);

			$db->execute();

			$colunas = $db->rowCount();

			if ($colunas == 1) {
				// Usuário digitou login e senha corretos
				$_SESSION['logged_in'] = true;
				
				header('Location: index.php');
				exit();
			} else {
				// Usuário digitou login e senha incorretos
				$erro = 'Nome/senha estão incorretos!';	
			}
		}
	}

	?>

	<!-- ============================== # PÁGINA DE LOGIN # ============================== -->
	<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>tinyCMS - Login</title>
		<link rel="stylesheet" href="../assets/w3.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
	</head>
	<body>

		<div class="w3-container">

			<a class="w3-xxlarge" href="/tinyCMS/">tinyCMS</a>
			<p>Um sistema de gerenciamento de conteúdo extremamente simples...</p>

			<hr>

			<h4>Digite seu login e senha para continuar:</h4>

			<?php if (isset($erro)) { ?>
				<small style="color:#aa0000;"><?php echo $erro; ?></small>
				<br /><br />
			<?php } ?>

			<form class="w3-bar w3-light-grey w3-padding" action="index.php" method="post" autocomplete="off">
				<input class="w3-bar-item w3-border w3-margin-right" type="text" name="username" placeholder="Usuário" />
				<input class="w3-bar-item w3-border w3-margin-right" type="password" name="password" placeholder="Senha" />
				<button class="w3-bar-item w3-button w3-teal w3-border" type="submit">
					<i class="fas fa-sign-in-alt"></i> Login
				</button>
				<a class="w3-bar-item w3-button w3-right" href="/index.php"><i class="fas fa-arrow-left"></i> Voltar ao inicio</a>
			</form>

		</div>

	</body>
	</html>
	<!-- ############################## = FIM DA PÁGINA DE LOGIN = ############################## -->

	<?php
}
?>