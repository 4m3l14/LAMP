<?php
session_start();

// Verifica se l'utente è già autenticato e reindirizza alla pagina di benvenuto
if (isset($_SESSION["username"])) {
    header('Location: riservata.php');
    exit;
}

// Verifica se il modulo di accesso è stato inviato
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST["username"] ?? "";
    $password = $_POST["password"] ?? ""; 

    // Verifica se le credenziali sono corrette (Questo è solo un esempio dimostrativo)
    if ($username === 'mrossi' && $password === "Ciao123") {
        // Credenziali corrette, crea una variabile di sessione per l'autenticazione
        $_SESSION["username"] = $username;
        header('Location: riservata.php');
        exit;
    } else {
        $error_message = 'Credenziali non valide. Riprova.';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Accesso</h1>
    <?php if (isset($error_message)) echo '<p style="color: red;">' . $error_message . '</p>'; ?>
    <h4>Credenziali:</h4>
    <h4>username: mrossi</h4>
    <h4>password: Ciao123</h4>

    <form method="POST" action="">
        <label for="username">Nome utente:</label>
        <input type="text" name="username" required><br><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br><br>

        <input type="submit" value="Accedi">
    </form>
</body>
</html>