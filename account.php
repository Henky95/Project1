<!DOCTYPE html>
<html>
<head>
	<title>account aanmaken</title>
	<style>
.error {color: #FF0000;}
</style>
</head>
<body>
<h1>Account aanmaken <br/></h1> <p><span class="error">*
verplicht veld.</span></p>

	<?php  
	$voornaam=$achternaam=$Studentnummer=$Opleiding=$email=$wachtwoord="";
	$voornaamErr=$achternaamErr=$StudentnummerErr=$OpleidingErr=$emailErr=$wachtwoordErr="";
	if ($_SERVER["REQUEST_METHOD"]== "post") {
        $voornaam = test_input($_POST["voornaam"]);
		$achternaam = test_input($_POST["achternaam"]);
		$Studentnummer = test_input($_POST["Studentnummer"]);
		$Opleiding = test_input($_POST["Opleiding"]);
		$email = test_input($_POST["email"]);
		$wachtwoord = test_input($_POST["wachtwoord"]);
	}


	if (!empty($_POST["voornaam"])) {
	$voornaamErr = "Naam is verplicht";
	} else {
    $voornaam = $_POST["voornaam"];
    }
    if (!empty($_POST["achternaam"])) {
	$achternaamErr = "Naam is verplicht";
	} else {
    $achternaam = $_POST["achternaam"];
    }
    if (!empty($_POST["Studentnummer"])) {
    	$StudentnummerErr = "Studentnummer is verplicht";
    } else{
    	$Studentnummer=$_POST["$Studentnummer"];
    }
    if (!empty($_POST["Opleiding"])) {
       $OpleidingErr = "verplicht veld";
    } else{
    	$Opleiding = $_POST["Opleiding"];
    }
    if (!empty($_POST["email"])) {
    	$emailErr = "verplicht veld";
    } else {
    	$email = $_POST["email"];
    }
    if (!empty($_POST["wachtwoord"])) {
    	$wachtwoordErr = "verplicht veld";
    } else {
    	$wachtwoord = $_POST["wachtwoord"];
    }
	
	?>
	<form method="post" action="<?php echo
htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		
	Voornaam:<span class="error">* <?php echo $voornaamErr;  ?> </span> <br>
<input type="text" name="voornaam" ><br>
Achternaam:<span class="error">* <?php echo $achternaamErr; ?></span> <br>
<input type="text" name="achternaam"> <br>
Studentnummer:<span class="error">*<?php $StudentnummerErr; ?> </span> <br>
<input type="nummer" name="Studentnummer"> <br>
Opleiding: <span class="error">*<?php echo $OpleidingErr; ?> </span> <br>
<input type="text" name="Opleiding" > <br>
geslacht:<br>
<input type="radio" name="geslacht" value="vrouw" checked> vrouw<br>
<input type="radio" name="geslacht" value="man"> man<br>
E-mail:<span class="error">* <?php echo $emailErr; ?> </span><br>
<input type="Email" name="gebruiknaam"><br>
Wachtwoord:<span class="error">* <?php echo $wachtwoordErr; ?> </span><br>
<input type="password" name="wachtwoord"><br><br>

<input type="submit" value = "Aanmelden">


</form> 

<?php
echo "<h2>Uw invoergegegevens:</h2>";
echo $voornaam;
echo "<br>";
echo $achternaam;
echo "<br>";
echo $Studentnummer;
echo "<br>";
echo $Opleiding;
echo "<br>";
echo $email;
echo "<br>";
echo $wachtwoord;
?>

</body>
</html>