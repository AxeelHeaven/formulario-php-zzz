<?php 
    session_start();

    include("database/connection.php");

    if (isset($_SESSION['uuid'])) {
        header("Location: index.php");
        exit();
	}

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (empty($email) || empty($password)) {
            header('Location: login.php');
        } else {
            if ($statment = $connection->prepare("SELECT uuid, name, email, password FROM registros WHERE email=?")) {
                $statment->bind_param("s", $email);
                $statment->execute();
            }
            
            $statment->store_result();
            if ($statment -> num_rows > 0) {
                $statment->bind_result($uuid, $name, $email, $password);
                $statment->fetch();

                //if (password_verify($password, $hashFromDatabase)) {
                if ($password === $_POST['password']) {
                    session_regenerate_id();
                    $_SESSION['loggedin'] = TRUE;
                    $_SESSION['uuid'] = $uuid;
                    $_SESSION['name'] = $name;
                    $_SESSION['email'] = $email;
                    header('Location: index.php');
                }
            } else {
                header('Location: index.php');
            }
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </head>

    <body>
        <h1>Inicia Sesión</h1>

        <form id="loginForm" action="login.php" method="POST">
            <div>
                <label>Correo</label>
                <input name="email" type="email" placeholder="correo@axeltristan.com"/>
            </div>

            <div>
                <label>Contraseña</label>
                <input name="password" type="password" placeholder="123456789"/>
            </div>

            <input type="submit" value="Iniciar Sesión"/>
        </form>
    </body>
</html>