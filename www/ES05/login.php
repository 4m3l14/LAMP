<?php
// Definizione delle costanti per la connessione al database
define('DB_SERVER', 'localhost');
define('DB_NAME', 'ES05');
define('DB_USERNAME', 'ES05_user'); 
define('DB_PASSWORD', 'mia_password');

//Form di login
$html_form = <<<FORM
<p class='error'>$errmsg</p>
<form action="$_SERVER[PHP_SELF]" method="post">
  <label for="email"> </label><input type="text" name="email" placeholder="Email" required/><br />
  <label for="password"> </label><input type="password" name="password" placeholder="Password" required/><br />
  <input type="submit" value="Login" /><input type="reset" value="Cancel" />
</form>
FORM;

$html_link = "Non hai un account? <a href='register.php'>Registrati adesso</a>.<br />";
$html_link .= "Hai dimenticato la password? <a href='pwd_reset.php'>Resetta la password</a>.<br />";
$html_link .= "<a href='index.php'>Torna alla Home Page</a>.<br />";

session_start();

// Recupera le credenziali dalla richiesta POST
$username = $_POST['username'] ?? "";
$password = $_POST['password'] ?? "";
$postreq = $_SERVER['REQUEST_METHOD'] == 'POST';


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


$html = $html_form;
$html .= $html_link;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h3>Pagina di login</h3>
    <?=$html?>
</body>
</html>



