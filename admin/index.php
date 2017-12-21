<?php

session_start();

include_once('../includes/connection.php');
include_once('../includes/header-footer.php');

if (isset($_SESSION['logged_in'])) {
	// Se estiver logado, mostra a página do admin (index)
	?>

	<!-- ============================== # PÁGINA DO ADMIN # ============================== -->
	<html>
	<head>
		<meta charset="utf-8">
		<title>tinyCMS - Admin</title>
		<link rel="stylesheet" href="../assets/style.css">
		<script src="../assets/fontawesome-all.min.js"></script>
	</head>
	<body>

		<!-- MENU -->
		<div class="container">
			<?php headercms(); ?>

			<ol>
				<li><a href="add.php"><i class="fas fa-pencil-alt"></i> Escrever post</a></li>
				<li><a href="delete.php"><i class="fas fa-trash-alt"></i> Apagar post</a></li>
				<li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Sair</a></li>
			</ol>

			<?php footercms(); ?>
			<a style="float: right;" href="../index.php"><i class="fas fa-arrow-left"></i> Voltar ao inicio</a>

		</div>
		<!-- FIM DO MENU -->

	</body>
	</html>
	<!-- ############################## = FIM DA PÁGINA DO ADMIN = ############################## -->

	<?php
} else {
	// Senão, mostra a página de login
	if (isset($_POST['username'], $_POST['password'])) {
		$username = $_POST['username'];
		$password = md5($_POST['password']);

		// Caso deixe todos os campos em branco, uma mensagem de erro é mostrada
		if (empty($username) or empty($password)) {
			$error = 'Preencha todos os campos!';
		} else {
			$query = $pdo->prepare("SELECT * FROM users WHERE user_name = ? AND user_password = ?");

			$query->bindValue(1, $username);
			$query->bindValue(2, $password);

			$query->execute();

			$num = $query->rowCount();

			if ($num == 1) {
				// Usuário digitou login e senha corretos
				$_SESSION['logged_in'] = true;
				
				header('Location: index.php');
				exit();
			} else {
				// Usuário digitou login e senha incorretos
				$error = 'Nome/senha estão incorretos!';	
			}
		}
	}

	?>

	<!-- ============================== # PÁGINA DE LOGIN # ============================== -->
	<html>
	<head>
		<meta charset="utf-8">
		<title>tinyCMS - Login</title>
		<link rel="stylesheet" href="../assets/style.css">
		<script src="../assets/fontawesome-all.min.js"></script>
	</head>
	<body>

		<!-- MENU -->
		<div class="container">
			<?php headercms(); ?> <!-- Mostra o cabeçalho -->

			<h4>Digite seu login e senha para continuar:</h4>

			<?php if (isset($error)) { ?>
				<small style="color:#aa0000;"><?php echo $error; ?></small>
				<br /><br />
			<?php } ?>

			<!-- LOGIN -->
			<form action="index.php" method="post" autocomplete="off">
				<input type="text" name="username" placeholder="Usuário" />
				<input type="password" name="password" placeholder="Senha" />
				<input type="submit" value="Login" />
			</form>

			<?php footercms(); ?>
			<a style="float: right;" href=".."><i class="fas fa-arrow-left"></i> Voltar ao inicio</a>

		</div>
		<!-- FIM DO MENU -->

	</body>
	</html>
	<!-- ############################## = FIM DA PÁGINA DE LOGIN = ############################## -->

	<?php
}
?>