<?php 
    $host = "localhost";
    $port = "3306";
    $username = "axeelheaven";
    $password = "axeelheaven";
    $database = "axeelheaven";

    $connection = new mysqli($host, $username, $password, $database);;
    
    if ($connection->connect_error) {
        die("Error de conexión: " . $connection->connect_error);
    }

    $table = "CREATE TABLE IF NOT EXISTS registros (id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, uuid TEXT, name TEXT, email TEXT, password TEXT, register_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP);";

    $connection->query($table);
?>