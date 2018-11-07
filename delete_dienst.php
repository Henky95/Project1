<?php include "shared/Header.php";?>
<?php 
//connectie maken met host
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "ProjectDB"; //naam  van de database
$db = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
//test of het werkt
	if(mysqli_connect_errno()){
		die("verbinding ging fout".
		mysqli_connect_error()."(".
		mysqli_connect_errno().")");
	}
	
$query = "SELECT Id, Title, Description FROM Services ";/* WHERE User_Id = 1*/
$result = mysqli_query($db,$query) or die('Error querying database.');

?>
 <form method="post">
         <div class="center">
		 <label for="dienst">Naam dienst: </label>
<select name="dienst">

<?php //selecteer 1 dienst
	while ($row = mysqli_fetch_assoc($result)){
	 echo "<option value =\"" . $row['Id'] ."\"> " . $row['d\Title'] . " </option>\n";
	 }

?>
</select>
</div>
<br>
<br>
<input type="submit" value="select">
</form>

<?php
 if(!isset($_POST['submit'])){
	echo("Geselceteerde dienst:" . $_POST['Title'] ."<br>");
	echo("omschrijving:<br/>" . $_POST['Description'] ."<br>");
 }
 ?> 

<?php include"shared/Footer.html" ?>