<?php
include "database.php";
include "shared/Header.php";

if(isset($_POST["accountnaam"], $_POST["wachtwoord"])) {
	$nameEmail = test_input($_POST["accountnaam"]);
	$nameEmail = mysqli_real_escape_string($dbConnection, $nameEmail);
	$password = test_input($_POST["wachtwoord"]);
	$password = mysqli_real_escape_string($dbConnection, $password);
	
	$query = "SELECT EmailAdress, Password FROM Users WHERE EmailAdress ='".$nameEmail."' AND Password = '".$password."'";
	$result1 = mysqli_query($dbConnection,$query);
	
	if(mysqli_num_rows($result1) > 0) {
		$_SESSION["Ingelogd"] = true;
		$_SESSION["naamEmail"] = $nameEmail;
		$queryAccountID = "SELECT id FROM Users WHERE EmailAdress='".$nameEmail."'";
		$_SESSION["accountID"] = mysqli_fetch_assoc(mysqli_query($dbConnection,$queryAccountID))["id"];
		echo "Login succesvol, welkom!<br>";
	} else {
		echo "De gebruikersnaam of wachtwoord is onjuist!<br>";
	}
}

?>
<a href = "index.php">Naar home pagina</a>

<?php 
include "shared/Footer.html";
?>
