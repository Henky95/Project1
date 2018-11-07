<?php  

    #gemaakt door Swen:
    include 'header.php';
    include 'database.php';
    include 'functions.php';
    $id = $_GET['product_Id']; 
    $query = "SELECT `description`, `Id`, `IsRequest`, `ReturnService`, `Title`, `Users_id` FROM Services WHERE id=$id;";
    $result = mysqli_query($dbConnection, $query);
    $row = mysqli_fetch_array($result);
    $desc = $row['description'];
    $title = $row['Title'];
    $user = $row['Users_id'];
    
    $query1 ="SELECT `firstName`,`LastName` , `emailAdress`FROM users WHERE id=$user";
    $result1 = mysqli_query($dbConnection,$query1);
    $row1 = mysqli_fetch_array($result1);
    $firstName = $row1['firstName'];
    $lastName = $row1['LastName'];
    $emailAdress = $row1['emailAdress'];
    Echo "<h1 class='dienst'> Je hebt gekozen voor $title</h1>\n";
    echo "<p class='dienst'> de beschrijving: <br /> $desc \n
";
    echo "<p class='naam'> Deze dienst is aangeboden door $firstName $lastName \n</p>";
    echo "<p class='naam'> Het email adress van deze persoon is $emailAdress \n</p>";
    Echo "<form action=mailto:$emailAdress method='get'>";
    echo "<input name='subject' type='text' placeholder='Subject'/><br/><br/>\n";
    echo "<textarea name='body' placeholder='Hier kun je je interesse tonen'></textarea>";
    echo "<input type='submit' value='Send'/>";
    echo "</form>";
    mysqli_free_result($result);

    include 'shared/footer.html';
?>

<body>


</body>