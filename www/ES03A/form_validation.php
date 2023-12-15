<html>
<head>
<title>FORM VALIDATION-Amelia</title>
<style>
.errore {color: #FF0000;} 
</style>
</head>
<body>
<?php
$errNome = $errCog = $errEta = $errEmail = $errCell = $errVia = $errNciv = $errCap = $errCom = $errProv = $errNick = $errPass = ""; //dichiarazione variabili di errore vuoto
$nome = $cog = $eta = $email = $cell = $via = $nCiv = $cap = $com = $prov = $nick = $pass = "";                                     //dichiarazione variabili campi form vuoto
if ($_SERVER["REQUEST_METHOD"]=="POST") {
	//campo nome
	if(empty($_POST["nome"])){
		$errNome="Inserisci il nome!";                                                                                              
	}
	else{
		$nome=controllo($_POST["nome"]);
		if(!preg_match("/^[a-zA-Z ]*$/",$nome)){
			$errNome="Solo caratteri alfabetici consentiti!";
		}
	}
	//campo cognome
	if(empty($_POST["cognome"])){
		$errCog="Inserisci il cognome!";
	}
	else{
	    $cog=controllo($_POST["cognome"]);
		if(!preg_match("/^[a-zA-Z-' ]*$/",$cog)){
			$errCog="Solo caratteri alfabetici consentiti!";
		}
	}
	//campo data di nascita
	if(empty($_POST["età"])){
		$errEta="Inserisci la data di nascita!";
	}
	else{
		$eta=controllo($_POST["età"]);
		if(!preg_match("~^([0-9]{2})/([0-9]{2})/([0-9]{4})$~", $eta,$part)){
			$errEta="Data di nascita non valida!";
		}
		elseif(!checkdate($part[1],$part[2],$part[3])){
			$errEta="Data di nascita non valida! I mesi devono essere tra 1 e 12 e i giorni validi per quel mese";
		}
	}
	//campo e-mail
	if(empty($_POST["email"])){
		$errEmail="Inserisci l'indirizzo e-mail!";
	}
	else{
		$email=controllo($_POST["email"]);
		if(!filter_var($email,FILTER_VALIDATE_EMAIL))
		{
			$errEmail="E-mail non valida!";
		}
	}
	//campo cellulare
	if(empty($_POST["cellulare"]))
	{
		$cell="";
	}
	else{
		$cell=controllo($_POST["cellulare"]);
		if(!preg_match("/^39-[0-9]{10}$/",$cell)){
			$errCell="Numero di cellulare non valido! Deve avere 10 numeri";
		}
	}
	//campo via
	if(empty($_POST["via"])){
		$errVia="Inserisci la via/piazza!";
	}
	else{
		$via=controllo($_POST["via"]);
		if(!preg_match("/^([a-zA-Z- '])*$/",$via)){
			$errVia="Indirizzo non valido!";
		}
	}
	//campo numero civico
	if(empty($_POST["numCivico"])){
		$errNciv="Inserisci il numero civico!";
	}
	else
	{
		$nCiv=controllo($_POST["numCivico"]);
		if(!preg_match("/^[0-9]{2}$/",$nCiv)){
			$errNciv="Numero civico non valido!";
		}
	}
	//campo CAP
	if(empty($_POST["cap"])){
		$errCap="Inserisci il CAP!";
	}
	else
	{
		$cap=controllo($_POST["cap"]);
		if(!preg_match("/^[0-9]{5}$/",$cap)){
			$errCap="CAP non valido!";
		}
    }
	//campo comune
	if(empty($_POST["comune"])){
		$errCom="Inserisci il comune!";
	}
	else{
		$com=controllo($_POST["comune"]);
		if(!preg_match("/^([a-zA-Z- '])*$/",$com)){
			$errCom="Comune non valido!";
		}
	}
	//campo provincia
	if(empty($_POST["provincia"])){
		$errProv="Inserisci la provincia!";
	}
	else{
		$prov=controllo($_POST["provincia"]);
		if(!preg_match("/^([a-zA-Z- '])*$/",$prov)){
			$errProv="Provincia non valido!";
		}
	}
	//campo nickname
	if(empty($_POST["nickname"])){
		$errNick="Inserisci il nickname!";
	}
	else{
	    $nick=controllo($_POST["nickname"]);
		if($_POST["nickname"]==$_POST["nome"]||$_POST["nickname"]==$_POST["cognome"]){
			$errNick="Il nickname deve essere diverso da nome e cognome!";
		}
	}
	//campo password
	if(empty($_POST["password"])){
		$errPass="Inserisci la password!";
	}
	else{
		$pass=controllo($_POST["password"]);
		$maiuscola = preg_match("@[A-Z]@",$pass);
        $numero = preg_match("@[0-9]@",$pass);
        $charspec = preg_match("@[^\w]@",$pass);
		if(strlen($pass)<8|| !$maiuscola || !$numero || !$charspec){
			$errPass="La password deve avere almeno una maiuscola, un numero, un carattere speciale e deve essere lunga almeno 8 caratteri!";
		}
	}	
}

function controllo($info){
	$info=trim($info);             //toglie gli spazi in eccesso
	$info=stripslashes($info);     //rimuove gli slash 
    $info=htmlspecialchars($info); //converte caratteri speciali in caratteri HTML
    return $info;
}
?>
<font color=#FF0000>
<h1>BENVENUTI NEL FORM</h1>
</font>
<h4>Inserire i dati richiesti:</h4>
<p><span class="errore">* campo obbligatorio</span></p>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
Nome: 
<input type="text" name="nome" placeholder="Es. Mario"> 
<span class="errore">* <?php echo $errNome; ?> </span>
<br> <br>
Cognome: 
<input type="text" name="cognome" placeholder="Es. Rossi"> 
<span class="errore">* <?php echo $errCog; ?> </span>
<br> <br> 
Età: 
<input type="text" name="età" placeholder="MM/GG/AAAA">
<span class="errore">* <?php echo $errEta; ?> </span>
<br> <br>
E-mail: 
<input type="text" name="email" placeholder="Es. mariorossi@gmail.com">
<span class="errore">* <?php echo $errEmail; ?> </span>
<br> <br>
Cellulare: 
<input type="tel" name="cellulare">
<span class="errore"> <?php echo $errCell; ?> </span>
<br> <br>
Via/Piazza: 
<input type="text" name="via" placeholder="Es. Via Monte">
<span class="errore">* <?php echo $errVia; ?> </span>
Numero civico: 
<input type="tel" name="numCivico" placeholder="Es. 22">
<span class="errore">* <?php echo $errNciv; ?> </span>
CAP: 
<input type="tel" name="cap" placeholder="Es. 20020"> 
<span class="errore">* <?php echo $errCap; ?> </span>
<br> <br>
Comune: 
<input type="text" name="comune" placeholder="Es. Bollate"> 
<span class="errore">* <?php echo $errCom; ?> </span>
Provincia: 
<input type="text" name="provincia" placeholder="Milano"> 
<span class="errore">* <?php echo $errProv; ?> </span>
<br> <br>
Nickname:
<input type="text" name="nickname" placeholder="Es. Mar200"> 
<span class="errore">* <?php echo $errNick; ?> </span>
<br> <br>
Password:
<input type="password" name="password"> 
<span class="errore">* <?php echo $errPass; ?> </span>
<br> <br>
<input type="submit"  name="invio" value="invio"> 
<br> <br>
<input type="reset"   value="cancella"> 
</br>
</form>
<?php