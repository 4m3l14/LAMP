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
$postreq = $_SERVER['REQUEST_METHOD'] == 'POST';

//Form di login
$html_form = <<<FORM
<form action="$_SERVER[PHP_SELF]" method="post">
  <label for="username"> </label><input type="text" name="username" placeholder="username" required/><br />
  <label for="password"> </label><input type="password" name="password" placeholder="Password" required/><br />
  <input type="submit" value="Login" /><input type="reset" value="Cancel" />
</form>
FORM;


// Connessione al database
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
// Verifica della connessione
if (!$conn) {die("Connessione fallita: " . mysqli_connect_error());}

//echo "Connessione al database riuscita<br>";

// Esegui la query per verificare le credenziali dell'utente
$query = "SELECT * FROM utente WHERE Username = '$username' AND Password = '$password';";
$result = mysqli_query($conn, $query);
//echo $query."<br>";
$login_check = false;
// Verifica se la query ha restituito risultati
if (mysqli_num_rows($result) > 0) {
    $login_msg = "Login riuscito. Benvenuto!"; // L'utente è autenticato con successo
    $login_check = true;
} else {
    $login_msg = "Credenziali non valide. Riprova."; // L'utente non è autenticato
}

// Chiudi la connessione al database
mysqli_close($conn);

if ($login_check == false) {

    $html = "<p class='error'>$login_msg</p>";
    $html .= $html_form;
    $html .= "Non hai un account? <a href='register.php'>Registrati adesso</a>.<br />";
    $html .= "Hai dimenticato la password? <a href='pwd_reset.php'>Resetta la password</a>.<br />";
    $html .= "<a href='index.php'>Torna alla Home Page</a>.<br />";
    
} else {


    $html = "<p class='error'>$errmsg</p>";
    $html .= "Non hai un account? <a href='register.php'>Registrati adesso</a>.<br />";
    $html .= "Hai dimenticato la password? <a href='pwd_reset.php'>Resetta la password</a>.<br />";
    $html .= "<a href='index.php'>Torna alla Home Page</a>.<br />";

}


?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        .error {color: red}
    </style> 
</head>
<body>
    <h3>Pagina di login</h3>
    <?=$html?>
</body>
</html>