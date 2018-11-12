<?php
/*Just for your server-side code*/
header('Content-Type: text/html; charset=ISO-8859-1');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Page Title</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="home.css">
</head>
<body>

<div class="header">
    <h1>Student Help</h1>
    <p>Voor en Door Studenten</p>
</div>

<div class="navbar">
    <a href="index.php">HOME</a>
    <a href="Add_service.php">Aanbieden</a>
    <a href="bestellen.php">Bestellen</a>
    <a href="dienstAanvragen.php">Aanvragen</a>
	<a href="delete_dienst.php">Verwijderen</a>
	<a href="sendemail.php">Contact
    <?php
    include "functions.php";

    if (LoggedIn()){
        echo "<a href='account.php' class='right'>My Account</a>";
    }else {
        echo "<a href='accountAanmelden.php' class='right'>Account aanmaken</a> <a href='inloggen.php' class='right'>log in</a>";
    }

    ?>
</div>
