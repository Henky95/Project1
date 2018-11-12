<?php include "shared/Header.php";?>
<link href="contact.css"rel="stylesheet">
<form name="sendmail" action="" method="post">
<div class="center">
<label>naam:</label>
<input class="nice" type="text" name="naam"/><br><br>
<label>email:</label>
<input class="nice" type="text" name="email"/><br><br>
<label>onderwerp:</label>
<input class="nice" type="text" name="subject"/><br><br>
<label>boodschap:</label>
<textarea type="text" name="message"></textarea><br><br>
<input class="centered" type="submit" name="submit" value="send email"/>
</form>
<?php
if(isset($_POST['submit'])){
echo	
	$name=$_POST['naam'];
	$email=$_POST['email'];
	$subject=$_POST['subject'];
	$message=$_POST['message'];
	$adminwebsite="StudentenHulp.contact@gmail.com";
	
		$headers="From: $email";
		mail($adminwebsite,$subject,$message,$headers);
}
?>
</div>
<?php include "shared/Footer.html"?>