<?php include 'shared/header.php';?>
<div class='geheel'>

<?php 
    #Gemaakt door Swen:
    include 'database.php';
    #Query om te runnen binnen de DATABASE:
    $query = 'SELECT `description`, `Id`, `IsRequest`, `ReturnService`, `Title`, `Users_id` FROM Services;';
    #Resultaat van de query die gerund wordt in de database
    $result = mySQLI_query($dbConnection, $query);
    while($row = mysqli_fetch_array($result)){
        $id = $row['Id'];
        $title = $row['Title'];
        $rand = rand(0,4);
        $randomize = '"img/bg'.$rand . '.png"';
        echo "<a href='bestel.php?product_Id=$id' class='dienstbestellen'> \n";
        echo "<div class='dienstbestellen' style='background-image:url($randomize)'>";
        echo "Bestel hier $title <br />";
        echo "</div> </a> \n";
        
    }
    include 'shared/footer.html'
?>
 </body>