<?php
#Functie voor het testen van de data die wordt ingeput, zodat deze veilig wordt gesubmit.
function test_input($data)
{
    $data = trim($data);

    $data = stripslashes($data);

    $data = htmlentities(mb_convert_encoding($data, 'UTF-8', 'ASCII'), ENT_SUBSTITUTE, "UTF-8");

    $data = str_replace("'","''",$data);

    return $data;
}


Function Query($query){
    $db = new mysqli("localhost","root" , "");

    $return = $db->query($query);

    return $return;
}
?>
