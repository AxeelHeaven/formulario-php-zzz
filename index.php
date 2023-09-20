<?php
	session_start();

	if (isset($_SESSION['uuid'])) {
		$name = $_SESSION['name'];
		$email = $_SESSION['email'];
		$uuid = $_SESSION['uuid'];
	}

	//$_SESSION['uuid'] = null;
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Dashboard</title>
	</head>
	<body>

		<nav>
			<ul>
				<?php if (isset($name)) { ?>
					<li><a href="logout">Logout</a></li>
				<?php } else { ?>
					<li><a href="login">Login</a></li>
					<li><a href="register">Register</a></li>
				<?php } ?>
			</ul>
		</nav>

		<?php if (isset($name)) {?>
				<h1>Bienvenido de nuevo, <?= $name ?>!</h1>
				<p>Correo <?= $email ?>!</p>
				<p>UUID <?= $uuid ?>!</p>
		<?php } else { ?>
				<h1>Bienvenido, inicia sesion o registrate!</h1>
		<?php } ?>
	</body>
</html>