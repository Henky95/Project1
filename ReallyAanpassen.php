<?php
    Session_start();
    include 'header.php';
    include 'database.php';
    include 'functions.php';
    $gaTerug =" <br /> <a href='inputnaam.php'> Klik hier om terug te gaan </a>";
    $firstName = $_POST['voornaam1'];
    $lastName = $_POST['achternaam'];
    $emailAdress = $_POST['Emailadress'];
    $studie = $_POST['studie'];
    $telefoonNummer = $_POST['phonenumber'];
    $adres = $_POST['adress'];
    $postcode = $_POST['postcode'];
    $huisnummer = $_POST['Huisnummer'];
    $_POST['account_id'] = $_SESSION['input'];
    $input = mysqli_real_escape_string($dbConnection, $_POST['account_id']);
    $adress = "SELECT id FROM adress WHERE StreetName LIKE $adress";
    $adressQuery = mysqli_query($dbConnection, $adress);
    $wijzigVoornaam = "UPDATE users SET firstName ='$firstName' where id = '$input'";
    $wijzigAchternaam = "UPDATE users SET lastName ='$lastName' where id = '$input'";
    $wijzigEmail = "UPDATE users SET emailAdress='$emailAdress' WHERE id = '$input'";
    $wijzigStudie = "UPDATE users SET studie = $studie WHERE id = '$input'";
    $wijzigTelefoonnummer = "UPDATE users SET PhoneNumber = $phonenumber WHERE id= '$input'";
    $wijzigAdress = "UPDATE users SET Address_AdressID = $adressid WHERE id = $input";
    
    #Als er in de vorige pagina op submit gedrukt is:
    if(isset($_POST['submit'])){
        #Kijk of Firstname empty is
        if(!empty($firstName)){
            if(preg_match("/^[a-zA-z]*$/",$firstName)){
                echo "De voornaam is gewijzigd naar $firstName <br />";
                mysqli_query($dbConnection, $wijzigVoornaam);
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
        else{Echo "Er is geen telefoonnummer ingevoerd";}

        if(!empty($adress) && !empty($postcode) && !empty($huisnummer)){
            echo "Het adress is aangepast naar $adress, met als postcode $postcode , en het huisnummer is $huisnummer ";
            mysqli_query($dbConnection, $wijzigAdress);
        }
        else{echo "Het adress is niet ingevoerd.";}
        }
        
    
    echo $gaTerug;

    echo "<h1> De gegevens van dit account zijn: \n <br/>";
    




















?>