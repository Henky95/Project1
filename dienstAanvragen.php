<?php
//header toevoegen
 include "shared/Header.php"; ?>
<?php 

$Opleiding = $melding = "";
$Opleidingerror = $meldingerror = "";

if (!empty($_POST["Opleiding"])) {
	$Opleidingerror = "dat is verplicht";
	} else {
    $Opleiding = isset($_POST["Opleiding"]);
    }
    if (!empty($_POST["melding"])) {
	$meldingerror = "Dat is verplicht";
	} else {
    $melding = isset($_POST["melding"]);
    }
	
	?>
	<!--formulier:-->
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

<?php
if ($_SERVER["REQUEST_METHOD"]== "post") {
        $Opleiding = test_input($_POST["Opleiding"]);
		$melding = test_input($_POST["melding"]);

		$query = "insert into mydb.services(services.Title, services.Description, services.ReturnService, services.IsRequest, services.Users_Id)
                     value (false,'$Opleiding','false', $melding, 1)";
                     //        echo $query;

        echo Query($query);
    } else {
        echo 'vul alles in';
    }

?>

<?php include "Shared/Footer.html"; ?>
