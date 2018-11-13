<?php
include "functions.php";
include "dienstDB.php";
include "Header.php";
?>

<h3>Dienst aanpassen</h3>
<?php
if (isset($_POST["confirmation"])) {
	$naam = mysqli_real_escape_string($db, $_POST["naam"]);
	$omschrijving = mysqli_real_escape_string($db, $_POST["omschrijving"]);
	
	$query = "UPDATE Services SET
		Title = '".$naam."',
		Description = '".$omschrijving."'";
		
	$result = mysqli_query($db, $query);
} else {
// HIER NOG VAN MAKEN DAT HIJ OPHAALT WAT HET EMAILADRES IS VAN DE INGELOGDE PERSOON
	$emailAdress = "piet@pieter.nl";
	$query = "SELECT Title, Description FROM Services JOIN Users ON Services.Users_id=Users.Id WHERE EmailAdress='".$emailAdress."'";
	$result = mysqli_query($db, $query);
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$naam = $row["Title"];
			$omschrijving = $row["Description"];
		}
	}
}
?>
<form action="<?php echo($_SERVER["PHP_SELF"]);?>" method="post">
<input type="hidden" name="confirmation" value="1">
<table>
	<tr><td>Titel:</td><td><input type="text" name="naam" value="<?php echo($naam);?>" size="30"></td></tr>
	<tr><td>Omschrijving:</td><td><textarea rows="5" cols="40" name="omschrijving" size="30"><?php echo($omschrijving);?></textarea></td></tr>
</table>
<hr>
	<input type ="Submit" value="Opslaan">
	<input type="Button" value="Terug" onclick="javascript:history.back();">
</form>

<?php include "Footer.php" ?>
