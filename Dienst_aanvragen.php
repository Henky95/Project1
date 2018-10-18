<!DOCTYPE html>
<html>
<head>
	<style>
.error {color: #FF0000;}
</style>
<
	<title></title>
</head>
<body>
	<h1>Dienst aanvragen <br/></h1> <p><span class="error">*
verplicht veld.</span></p>
<?php 
$Opleiding = $melding = "";
$Opleidingerror = $meldingerror = "";
if ($_SERVER["REQUEST_METHOD"]== "post") {
        $Opleiding = test_input($_POST["Opleiding"]);
		$melding = test_input($_POST["melding"]);
}
if (!empty($_POST["Opleiding"])) {
	$Opleidingerror = "dat is verplicht";
	} else {
    $Opleiding = ($_POST["Opleiding"]);
    }
    if (!empty($_POST["melding"])) {
	$meldingerror = "Dat is verplicht";
	} else {
    $melding = ($_POST["melding"]);
    }
	?>
	<form method="post" action="<?php echo
htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<fieldset>
<legend></legend>
Opleiding: <br>
<input type="text" name="Opleiding" > <span class="error">*<?php echo $Opleidingerror;  ?> </span> <br><br>
Ik heb een vraag voor: <span class="error">* </span> <br><br>
<input type="radio" name="vraag" value="medeweker" checked> medewerker<br>
<input type="radio" name="vraag" value="studenten"> studenten<br>
<input type="radio" name="vraag" value="allebei"> allebei<br>

Gevraaged:<span class="error">* <?php echo $meldingerror;  ?></span> <br>
<textarea name="melding" rows="5" cols="40">Kan gebruikt worden
om uitgebreide berichten te typen </textarea>  <br><br>
<input type="submit" value = "Stuur">
</fieldset>
</form> 
<?php
echo "<h2>Uw invoergegegevens:</h2>";
echo $Opleiding;
echo "<br>";
echo $melding;
echo "<br>";
?>
</body>
</html>