<?php

include "shared/Header.php";

$account = GetCurrrentUser();

if ($account != null) {
    $name = $account["FirstName"];
    if (!empty($account["Insertion"])) {
        $name .= " " . $account["Insertion"];
    }
    $name .= " " . $account["LastName"];


    echo "<div>
            <h2 class='title' style='display: inline-block'> Hallo $name</h2> 
            <a href='Uitloggen.php' class='button right'>uitloggen</a><a href='AccountVerwijderen.php' class='button right'>Account verwijderen</a>
          </div> ";

    echo "<table>
            <tr>
                <th>
                    Voornaam
                </th>
                <th>
                    Tussenvoegsel
                </th>
                <th>
                    Achternaam
                </th>
            </tr>
            <tr>
                <td>
                    " . $account["FirstName"] . "
                </td>
                <td>
                    " . $account["Insertion"] . "
                </td>
                <td>
                    " . $account["LastName"] . "
                </td>
            </tr>
            <tr>
                <th>
                    Studie
                </th>
            </tr>
            <tr>
                <td>
                    " . $account["Studie"] . "
                </td>
            </tr>
            <tr>            
                <th>
                    Telefoon nummer
                </th>
            </tr>
            <tr>
                <td>
                    " . $account["PhoneNumber"] . "
                </td>            
            </tr>
            <tr>            
                <th>
                    E-mail
                </th>
            </tr>
            <tr>            
                <td>
                    " . $account["EmailAdress"] . "
                </td>
            </tr>
        </table>";

    echo "<a class='button' href='aanpas.php' >Account aanpassen</a>";
} else {
    header("location index.php");
}

?>

<?php include "shared/Footer.html"; ?>
