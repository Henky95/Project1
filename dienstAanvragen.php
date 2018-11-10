<?php
//header toevoegen
 include "shared/Header.php"; ?>
<?php 
include 'functions.php';

$Opleiding = $melding = "";
$Opleidingerror = $meldingerror = "";

$finalError = '';
	
if (isset($_POST["submit"]) && !empty($_POST["submit"])){// $_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["Opleiding"]) && !empty($_POST["Opleiding"]) &&
        isset($_POST["melding"]) && !empty($_POST["melding"])){


        $Opleiding = test_input($_POST["Opleiding"]);
        $melding = test_input($_POST["melding"]);

        //$query = "insert into mydb.services(services.Title, services.Description, services.ReturnService, services.IsRequest, services.Users_Id)
                  //value (false,'$Opleiding','false', $melding, 2)";

        //$query = "insert into service(service.Title, service.Description, service.ReturnService, service.IsRequest, service.Users_Id)
         //            value (false,'$Opleiding','false', $melding, 1)";

                     //        echo $query;

        $userId = GetCurrentUserId();

        $query = "INSERT INTO mydb.services (Title, Description, IsRequest, Users_Id) VALUES ('$Opleiding', '$melding', true, '$userId')";

        echo Query($query);
    } else {
        if (empty($_POST["Opleiding"])) {
            $Opleidingerror = "dat is verplicht";
        } else {
            $Opleiding = isset($_POST["Opleiding"]);
        }

        if (empty($_POST["melding"])) {
            $meldingerror = "Dat is verplicht";
        } else {
            $melding = isset($_POST["melding"]);
        }

        $finalError = 'vul alles in';
    }
}

	?>
	<!--formulier:-->
	<form method="post" action="<?php echo
htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<fieldset>
<legend></legend>
Opleiding: <br>
<input type="text" name="Opleiding" > <span class="error">*<?php echo $Opleidingerror;  ?> </span> <br><br>

Gevraaged:<span class="error">* <?php echo $meldingerror;  ?></span> <br>
<textarea name="melding" rows="5" cols="40" placeholder="Kan gebruikt worden
om uitgebreide berichten te typen"></textarea>  <br><br>
<input name="submit" type="submit" value = "Stuur">
</fieldset>

<?php
if (!empty($finalError))
{
    echo $finalError;
}
?>

<?php include "Shared/Footer.html"; ?>
