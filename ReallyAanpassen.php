<?php
    Session_start();
    include 'header.php';
    include 'database.php';
    $gaTerug =" <br /> <a href='inputnaam.php'> Klik hier om terug te gaan </a>";
    $firstName = $_POST['voornaam1'];
    $lastName = $_POST['achternaam'];
    $emailAdress = $_POST['Emailadress'];
    $_POST['account_id'] = $_SESSION['input'];
    $input = mysqli_real_escape_string($dbConnection, $_POST['account_id']);
    $wijzigVoornaam = "UPDATE users SET firstName ='$firstName' where id = '$input'";
    $wijzigAchternaam = "UPDATE users SET lastName ='$lastName' where id = '$input'";
    $wijzigEmail = "UPDATE users SET emailAdress='$emailAdress' WHERE id = '$input'";
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
        }
        

    
    echo $gaTerug;

    echo "<h1> De gegevens van dit account zijn: \n <br/>";
    




















?>