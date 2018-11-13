
<?php 
    include 'shared/header.php';
    include 'database.php';
    $_POST['voornaam1'] = "";
    $input = mysqli_real_escape_string($dbConnection, $_SESSION['accountID']);
    $query = "SELECT firstName, lastName, emailAdress, PostalCode,housenumber FROM users AS A JOIN adress ON a.Adress_adressId WHERE a.id=$input;";
    $result = mysqli_query($dbConnection, $query);
    if(!$result){
        echo "Error %s\n", mysqli_error($dbConnection);
    }
    else{
        $row = mysqli_fetch_array($result);
        $firstName = $row['firstName'];
        $lastName = $row['lastName'];
        $emailAdress = $row['emailAdress'];
        $adress = $row['PostalCode'];
        $adress .= $row['housenumber'];
        
    }

?>
<div class='input'>
    <h1> Hier kunt u uw gegevens aanpassen </h1>
    <p class = 'inputnaam'> Welkom <?php echo $firstName, " " , $lastName;?> </p> 
    <p class = 'aanpassing'> Hieronder kunt u kiezen welke gegevens je wilt aanpassen.
    <form method = "post" action = "ReallyAanpassen.php">
        <p class ='Form'> Voornaam:<input type = "input" name = "voornaam1" placeholder='Voornaam'> <br />
        <p class ='Form'> Achternaam:<input type = "input" name = "achternaam" placeholder='Achternaam'> <br />
        <p class ='Form'> Email Adress: <input type = "input" name = "Emailadress" placeholder='EmailAdress'><br />
        <p class ='Form'> Studie: <input type = "input" name = "studie" placeholder='Studie'><br />
        <p class ='Form'> Telefoonnummer: <input type = "input" name = "phonenumber" placeholder='Telefoonnummer'><br />
        <p class ='Form'> Adres: <input type = "input" name = "adress" placeholder='Adress'> <br/> 
        <p class ='Form'> Postcode <input type = "input" name = "postcode" placeholder='Postcode'><br/> 
        <p class ='Form'> Huisnummer:<input type = "input" name = "Huisnummer" placeholder='Huisnummer'><br/> <br/> <br/> 
        <input type ='submit' value = 'Aanpassen' name='submit'>
    </form> </p> 



</div>
 </body>