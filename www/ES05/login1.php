<?php
// Definizione delle costanti per la connessione al database
define('DB_SERVER', 'localhost');
define('DB_NAME', 'ES05');
define('DB_USERNAME', 'ES05_user'); 
define('DB_PASSWORD', 'mia_password');

session_start();

// Recupera le credenziali dalla richiesta POST
$username = $_POST['username'] ?? "";
$password = $_POST['password'] ?? "";

// Connessione al database
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
// Verifica della connessione
if (!$conn) {die("Connessione fallita: " . mysqli_connect_error());}

echo "Connessione al database riuscita<br>";

// Esegui la query per verificare le credenziali dell'utente
$query = "SELECT * FROM utente WHERE Username = '$username' AND Password = '$password';";
$result = mysqli_query($conn, $query);
echo $query."<br>";

// Verifica se la query ha restituito risultati
if (mysqli_num_rows($result) > 0) {
    echo "Login riuscito. Benvenuto!"; // L'utente è autenticato con successo
} else {
    echo "Credenziali non valide. Riprova."; // L'utente non è autenticato
}

// Chiudi la connessione al database
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h3>Pagina di login</h3>
    <?php if (isset($error_message)) echo '<p style="color: red;">' . $error_message . '</p>'; ?>
    <h4>Credenziali:</h4>
    <h4>username: admin</h4>
    <h4>password: admin</h4>

    <form method="POST" action="">
        <label for="username">Nome utente:</label>
        <input type="text" name="username" required><br><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br><br>

        <input type="submit" value="Accedi">
    </form>
</body>
</html>



