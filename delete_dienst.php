<?php include "shared/Header.php";
/*database code :
INSERT INTO services (Id,Title,Description,ReturnService,Users_Id,IsRequest) 
VALUES(1,'Wiskunde Bijles','Bijles voor een Examen','20 euro per les',1,1);*/

//connectie maken met host
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "mydb"; //naam  van de database
$db = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
//test of het werkt
	if(mysqli_connect_errno()){
		die("verbinding ging fout".
		mysqli_connect_error()."(".
		mysqli_connect_errno().")");
	}
	
$query = "SELECT Id, Title, Description FROM mydb.Services";//WHERE User_Id = $id";
$result = mysqli_query($db,$query) or die('Error querying database.');

?>
 <form method="POST">
         <div class="center">
		 <label for="dienst">Naam dienst: </label>
<select name="dienst">

<?php //selecteer 1 dienst
	while ($row = mysqli_fetch_assoc($result)){
	 echo "<option value =\"" . $row['Id'] ."\"> " . $row['Title'] . " </option>\n";
	 }

?>
</select>

<br>
<input type="submit" name="selected" value="select">
<br>
</form>

<?php
 if(isset($_POST['selected'])){
	 $dienstid = $_POST['dienst'];
	 $query2 = "SELECT Title, Description FROM mydb.Services WHERE Id = $dienstid";
	 $result2 = mysqli_query($db,$query2) or die('Error querying 2nt time in database.');
	 $row2 = mysqli_fetch_assoc($result2);
	 echo "<br>";
	echo("Geselceteerde dienst: " . $row2['Title'] ."<br><br>");
	echo("omschrijving: " . $row2['Description'] ."<br><br>");
	echo ('<input type="submit" name="delete" value="delete">');
	 }

 
 elseif(isset($_POST['delete'])){ 
 $dienstid = $_POST['dienst'];
 $query3 = " DELETE FROM mydb.Services WHERE Id = $dienstid ";
 echo "deleted";
 mysqli_query($db,$query3);
 } 
 else{ 
	echo("selecteer een dienst <br>");
 }?> 
</div>
</form>
<?php include"shared/Footer.html" ?>