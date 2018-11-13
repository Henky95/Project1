<?php include "shared/Header.php"; ?>

    <h3 class="header">
        Voeg een dienst Toe
    </h3>

    <form method="post">
        <div class="center">
            <label for="title">Titel: </label>
            <input name="title" id="title" type="text"/>
        </div>
        <br/>
        <div class="center">
            <label for="Description">Omschrijving</label>
            <br/>
            <textarea name="Description" id="Description" rows="10" cols="100"></textarea>
        </div>
        <div class="center">
            <label for="ReturnService">retourdienst</label>
            <br/>
            <textarea name="ReturnService" id="ReturnService" rows="10"
                      cols="100">&euro; 10,- s'il vous pla&icirc;t</textarea>
        </div>
        <input type="submit" value="Aanbieden">
    </form>

<?php
if (!empty($_POST)) {
    if (isset($_POST['title']) && !empty($_POST['title']) &&
        isset($_POST['Description']) && !empty($_POST['Description']) &&
        isset($_POST['ReturnService']) && !empty($_POST['ReturnService'])) {

        $title = test_input($_POST['title']);
        $Description = test_input($_POST['Description']);
        $ReturnService = test_input($_POST['ReturnService']);
        $userId = $_SESSION["accountID"];

        $query = "insert into mydb.services (services.Title, services.Description, services.ReturnService, services.IsRequest, services.Users_Id)
                     value ('$title','$Description','$ReturnService', false, $userId)";

//        echo $query;

        Query($query);
    } else {
        echo 'vul alles in';
    }
}
?>

<?php include "Shared/Footer.html"; ?>