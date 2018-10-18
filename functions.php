<?php
#Functie voor het testen van de data die wordt ingeput, zodat deze veilig wordt gesubmit.
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  ?>
