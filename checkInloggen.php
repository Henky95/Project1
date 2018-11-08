<?php
include "functions.php";
include "dienstDB.php";
include "Header.php";

if(isset($_POST["accountnaam"], $_POST["wachtwoord"])) {
	$nameEmail = test_input($_POST["accountnaam"]);
	$nameEmail = mysqli_real_escape_string($db, $nameEmail);
	$password = test_input($_POST["wachtwoord"]);
	$password = mysqli_real_escape_string($db, $password);
	
	$query = "SELECT EmailAdress, Password FROM Users WHERE EmailAdress ='".$nameEmail."' AND Password = '".$password."'";
	$result1 = mysqli_query($db,$query);
	
	if(mysqli_num_rows($result1) > 0) {
		$_SESSION["Ingelogd"] = true;
		$_SESSION["naamEmail"] = $nameEmail;
		$queryAccountID = "SELECT id FROM Users WHERE emailAdres='".$nameEmail."'";
		$_SESSION["accountID"] = mysqli_query($db,$queryAccountID);
		echo "Login succesvol, welkom!<br>";
	} else {
		echo "De gebruikersnaam of wachtwoord is onjuist!<br>";
	}
}

include "Footer.php";
?>
<a href = "Inloggen.php">Naar inlogpagina</a>
