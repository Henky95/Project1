<?php
    include 'shared/header.php';
    include 'database.php';
    $gaTerug =" <br /> <a href='account.php'> Klik hier om terug te gaan </a>";
    $firstName = $_POST['voornaam1'];
    $lastName = $_POST['achternaam'];
    $emailAdress = $_POST['Emailadress'];
    $studie = $_POST['studie'];
    $phonenumber = $_POST['phonenumber'];
    $adres = $_POST['adress'];
    $postcode = $_POST['postcode'];
    $huisnummer = $_POST['Huisnummer'];
    $wachtwoord = $_POST['wachtwoord'];
    $verificatieWachtwoord = $_POST['verificatieWachtwoord'];
    $_POST['account_id'] = $_SESSION['input'];
    $input = mysqli_real_escape_string($dbConnection, $_SESSION['accountID']);
    $adress = "SELECT id FROM adress WHERE StreetName LIKE $adres";
    $adressid = mysqli_query($dbConnection, $adress);
    $wijzigVoornaam = "UPDATE users SET firstName ='$firstName' where id = '$input'";
    $wijzigAchternaam = "UPDATE users SET lastName ='$lastName' where id = '$input'";
    $wijzigEmail = "UPDATE users SET emailAdress='$emailAdress' WHERE id = '$input'";
    $wijzigStudie = "UPDATE users SET studie = $studie WHERE id = '$input'";
    $wijzigTelefoonnummer = "UPDATE users SET PhoneNumber = $phonenumber WHERE id= '$input'";
    $wijzigAdress = "UPDATE users SET Address_AdressID = $adressid WHERE id = $input";
    $wijzigWachtwoord = "UPDATE users SET password = $wachtwoord where id = $input";
    
    #Als er in de vorige pagina op submit gedrukt is:
    if(isset($_POST['submit'])){
        #Kijk of Firstname empty is
        if(!empty($firstName)){
            if(preg_match("/^[a-zA-z]*$/",$firstName)){
                echo "De voornaam is gewijzigd naar $firstName <br />";
                mysqli_query($dbConnection, $wijzigVoornaam);
                mysqli_errno($dbConnection) . mysqli_error($dbConnection);
            }
            else{
                echo "Er is geen voornaam ingevoerd  <br />";
            }
        }
        if(!empty($lastName)){
            if(preg_match("/^[a-zA-z]*$/", $lastName)){
                echo "De achternaam is aangepast naar $lastName <br />";
                mysqli_query($dbConnection, $wijzigAchternaam);
            }
        }
            else{echo "Er is geen achternaam ingevoerd <br />";}
        if(!empty($emailAdress)){
            if((filter_var($emailAdress, FILTER_VALIDATE_EMAIL))){
                echo "Het emailadress is gewijzigd naar $emailAdress <br />";
                mysqli_query($dbConnection, $wijzigEmail);
            }
        }
            else{echo "Er is geen emailadress ingevoerd <br />";}
        if(!empty($studie)){
            if(preg_match("/^[a-zA-z]*$/", $studie)){
            echo "De studie is gewijzigd naar $studie";
            mysqli_query($dbConnection, $wijzigStudie);}
        }
        else{echo "Er is geen studie ingevoerd <br />";}

        if(!empty($phonenumber)){
            echo "Het telefoonnummer is gewijzigd naar $phonenumber";
            mysqli_query($dbConnection, $wijzigTelefoonnummer);
        }
        else{Echo "Er is geen telefoonnummer ingevoerd <br />";}

        if(!empty($adress) && !empty($postcode) && !empty($huisnummer)){
            echo "Het adress is aangepast naar $adress, met als postcode $postcode , en het huisnummer is $huisnummer ";
            mysqli_query($dbConnection, $wijzigAdress);
        }
        else{echo "Het adress is niet ingevoerd. <br />";}
        }
        if(!empty($wachtwoord) && !empty($verificatieWachtwoord) && $wachtwoord == $verificatieWachtwoord){
            if(strlen($wachtwoord) >= 8){
            echo "Het wachtwoord is aangepast <br />";
            mysqli_query($dbConnection, $wijzigWachtwoord);
        }
        else{Echo "Het wachtwoord voldoet niet aan de eisen.";}
        }
        elseif(empty($wachtwoord) && empty($verificatieWachtwoord)){
            echo "U heeft er voor gekozen geen wachtwoord wijziging door te voeren <br />";
        }
        elseif($wachtwoord != $verificatieWachtwoord){
            echo "De wachtwoorden komen niet overeen, klik <a href='aanpas.php'> hier </a> om terug te gaan <br />";
        }
    
    echo $gaTerug;
    




















?>