<?php
//header toevoegen
 include "shared/Header.php"; ?>

<?php
include 'functions.php';

$voornaam=$achternaam=$TelNummer=$Opleiding=$email=$wachtwoord="";
	$voornaamErr=$achternaamErr=$TelNummerErr=$OpleidingErr=$emailErr=$wachtwoordErr="";

$finalError = '';
 
//Test
 
   //if ($_SERVER["REQUEST_METHOD"]== "post")
   if (isset($_POST["submit"]) && !empty($_POST["submit"])){
    
    

    if (isset($_POST["Voornaam"]) && !empty($_POST["Voornaam"]) && isset( $_POST["Achternaam"])&&!empty($_POST["Achternaam"]) && 
        isset( $_POST["TelNummer"])&&!empty($_POST["TelNummer"]) && isset( $_POST["Opleiding"])&&!empty($_POST["Opleiding"]) &&
         isset( $_POST["Gebruiknaam"])&&!empty($_POST["Gebruiknaam"]) && isset( $_POST["Wachtwoord"])&&!empty($_POST["Wachtwoord"])) {



        $voornaam = test_input($_POST["Voornaam"]);
        $achternaam = test_input($_POST["Achternaam"]);
        $TelNummer = test_input($_POST["TelNummer"]);
        $Opleiding = test_input($_POST["Opleiding"]);
        $email = test_input($_POST["Gebruiknaam"]);
        $wachtwoord = test_input($_POST["Wachtwoord"]);
//Database kopelling
      
        $query = "INSERT INTO mydb.users (FirstName, LastName, Studie, PhoneNumber, EmailAdress, Password, Adress_AdressId) VALUES ('$voornaam', '$achternaam', '$Opleiding','$TelNummer', '$email', '$wachtwoord', 1) ";
               var_dump($query);
               var_dump( Query($query));
    } else {
        
	//controle
	if (empty($_POST["Voornaam"])) {
	$voornaamErr = "Naam is verplicht";
	} else {
		
    $voornaam = isset($_POST["Voornaam"]);
    }
    if (empty($_POST["Achternaam"])) {
	$achternaamErr = "Naam is verplicht";
	} else {
    $achternaam = isset( $_POST["Achternaam"]);
    }
    if (empty($_POST["TelNummer"])) {
    	$TelNummerErr = "Dat is verplicht";
    } else{
    	$TelNummer= isset($_POST["TelNummer"]);
    }
    if (empty($_POST["Opleiding"])) {
       $OpleidingErr = "verplicht veld";
    } else{
    	$Opleiding =isset ($_POST["Opleiding"]);
    }
    if (empty($_POST["Gebruiknaam"])) {
    	$emailErr = "verplicht veld";
    } else {
    	$email =isset( $_POST["Gebruiknaam"]);
    }
    if (empty($_POST["Wachtwoord"])) {
    	$wachtwoordErr = "verplicht veld";
    } else {
    	$wachtwoord = isset($_POST["Wachtwoord"]);
    }
    $finalError = 'vul alles in';
}
}
?>
<!-- formuliermaken-->
	<form method="post" action="<?php echo
htmlspecialchars($_SERVER["PHP_SELF"]);?>">
Voornaam:<span class="error">* <?php echo $voornaamErr;  ?> </span> <br>
<input type="text" name="Voornaam" ><br>
Achternaam:<span class="error">* <?php echo $achternaamErr; ?></span> <br>
<input type="text" name="Achternaam"> <br>
Tel-Nummer:<span class="error">*<?php $TelNummerErr; ?> </span> <br>
<input type="nummer" name="TelNummer"> <br>
Opleiding: <span class="error">*<?php echo $OpleidingErr; ?> </span> <br>
<input type="text" name="Opleiding" > <br>
geslacht:<br>
<input type="radio" name="Geslacht" value="vrouw" checked> vrouw<br>
<input type="radio" name="Geslacht" value="man"> man<br>
E-mail:<span class="error">* <?php echo $emailErr; ?> </span><br>
<input type="email" name="Gebruiknaam"><br>
Wachtwoord:<span class="error">* <?php echo $wachtwoordErr; ?> </span><br>
<input type="password" name="Wachtwoord"><br><br>

<input type="submit" name="submit" value="aanmelden">
<?php

if (!empty($finalError))
{
    echo $finalError;
}
	?>
	<?php include "Shared/Footer.html"; ?>
