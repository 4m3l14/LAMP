<?php
session_start();

if (!isset($_SESSION["username"])) {
    $error_message = "Attenzione! Prima di accedere alla sezione riservata dle sito e' necessario effetuare il login.";
    header("Location: login.php?error=".urlencode($err_message));
    exit;
}
if (isset($_GET['logout'])) {
    header("Location: logout.php");
    exit;
}
?>

<html>
<head>
    <title>Riservata</title>
</head>
<body>
<h2>Ciao, mrossi. Benvenuto nell'area riservata del sito.</h2>
    <p><a href="logout.php">Logout</a></p>
</body>
</body>
</html>