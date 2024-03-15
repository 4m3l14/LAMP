<?php
session_start();
if (isset($_SESSION['username'])) {
    header('Location: riservata.php');
    exit();
}

// Costanti per la connessione al database
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'db_user');
define('DB_PASSWORD', 'db_pwd');
define('DB_NAME', 'nome_database');

// Connessione al database
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Verifica della connessione
if (!$conn) {
    die("Connessione fallita: " . mysqli_connect_error());
}



$valido_s = 'mrossi';
$valido_p = 'Ciao123';
$err_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === $valido_s && $password === $valido_p) {
        $_SESSION['username'] = $username;
        header('Location: riservata.php');
        exit();
    } else {
        $err_message = 'Attenzione! Le credenziali inserite non sono corrette.';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>LOGIN</title>
</head>
<body>
    <h1>Vai all'area riservata del sito.</h1>
    <form method="POST">
        <label for="username">Nome utente:</label>
        <input type="text" name="username" id="username" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br><br>
        <input type="submit" value="Accedi">
    </form>
    <?php

    if (!empty($err_message)) {
        echo "<p>$err_message</p>";
    }
    ?>
</body>
</html>
