<!DOCTYPE html>
<html>
<head>
	<title>account aanmaken</title>
	<?php
include 'project.php';

?>
	<style>
.error {color: #FF0000;}
</style>
</head>
<body>
<h1>Account aanmaken <br/></h1> <p><span class="error">*
verplicht veld.</span></p

	<?php  
	$voornaam=$achternaam=$Studentnummer=$Opleiding=$email=$wachtwoord="";
	$voornaamErr=$achternaamErr=$StudentnummerErr=$OpleidingErr=$emailErr=$wachtwoordErr="";
	if ($_SERVER["REQUEST_METHOD"]== "post") {
        $voornaam = test_input($_POST["Voornaam"]);
		$achternaam = test_input($_POST["Achternaam"]);
		$Studentnummer = test_input($_POST["Studentnummer"]);
		$Opleiding = test_input($_POST["Opleiding"]);
		$email = test_input($_POST["Gebruiknaam"]);
		$wachtwoord = test_input($_POST["Wachtwoord"]);
	}


	if (!empty($_POST["Voornaam"])) {
	$voornaamErr = "Naam is verplicht";
	} else {
		
    $voornaam = isset($_POST["Voornaam"]);
    }
    if (!empty($_POST["Achternaam"])) {
	$achternaamErr = "Naam is verplicht";
	} else {
    $achternaam = isset( $_POST["Achternaam"]);
    }
    if (!empty($_POST["Studentnummer"])) {
    	$StudentnummerErr = "Studentnummer is verplicht";
    } else{
    	$Studentnummer= isset($_POST["Studentnummer"]);
    }
    if (!empty($_POST["Opleiding"])) {
       $OpleidingErr = "verplicht veld";
    } else{
    	$Opleiding =isset ($_POST["Opleiding"]);
    }
    if (!empty($_POST["Gebruiknaam"])) {
    	$emailErr = "verplicht veld";
    } else {
    	$email =isset( $_POST["Gebruiknaam"]);
    }
    if (!empty($_POST["Wachtwoord"])) {
    	$wachtwoordErr = "verplicht veld";
    } else {
    	$wachtwoord = isset($_POST["Wachtwoord"]);
    }
	
	?>
	
	
	
	<form method="post" action="<?php echo
htmlspecialchars($_SERVER["PHP_SELF"]);?>">
Voornaam:<span class="error">* <?php echo $voornaamErr;  ?> </span> <br>
<input type="text" name="Voornaam" ><br>
Achternaam:<span class="error">* <?php echo $achternaamErr; ?></span> <br>
<input type="text" name="Achternaam"> <br>
Studentnummer:<span class="error">*<?php $StudentnummerErr; ?> </span> <br>
<input type="nummer" name="Studentnummer"> <br>
Opleiding: <span class="error">*<?php echo $OpleidingErr; ?> </span> <br>
<input type="text" name="Opleiding" > <br>
geslacht:<br>
<input type="radio" name="Geslacht" value="vrouw" checked> vrouw<br>
<input type="radio" name="Geslacht" value="man"> man<br>
E-mail:<span class="error">* <?php echo $emailErr; ?> </span><br>
<input type="email" name="Gebruiknaam"><br>
Wachtwoord:<span class="error">* <?php echo $wachtwoordErr; ?> </span><br>
<input type="password" name="Wachtwoord"><br><br>

<input type="submit" value = "Aanmelden">
<?php
	//Gegevens invoegen.
$query = "insert into account_maken( 'Voornaam' , 'Achternaam', 'Opleiding', 'Student_nummer ','Gebruiknaam/email', 'Wachtwoord')";
    $query = "	value (".$voornaam."','".$achternaam."','".$Opleiding."','".$Studentnummer."','".$email."','".$wachtwoord.") ";
// controle.
    $controle = mysqli_query($db,$query);
     if ($controle == TRUE) {
       echo "Voornaam ". $voornaam. " " . $achternaam. " is toegevoegd aan de
       database."."<br/> ";
     echo "De verdere details zijn: Opleiding ".$Opleiding.",
     student_nummer " .$Studentnummer. ", Gebruiknaam/email " .$email. ", Wachtwoord " .
      $wachtwoord ."."; }
     else {
     die("Foutje geconstateerd.");
       }
?>	
</form> 

<?php

       
//  Gegevens tonen
$query = "select * from account_maken";
$result = mysqli_query($db, $query);
while($account_maken = mysqli_fetch_assoc($result)) {
	echo "<table>";
    echo "<tr>";
    echo '<td colspan="4" ><h2 align="center">Overzicht klanten</h2></td>';
    echo "</tr>";
    echo  "<tr>";
    echo "<th>".$voornaam['Voornaam']."</th>";
    echo "<th>".$achternaam['Achternaam']."</th>";
    echo "<th>".$Studentnummer['Studentnummer']."</th>";
    echo "<th>".$Opleiding['Opleiding']."</th>";
	echo "<th>".$email['Gebruiknaam']."</th>";
	echo "<th>".$wachtwoord['Wachtwoord']."</th>";
    echo "</tr>";
    echo "</table>";

}
?>
		

</form> 


</body>
</html>