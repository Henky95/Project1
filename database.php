<?php

    $dbHost = "127.0.0.1";
    $dbUser = "root";
    $dbPass = "";
    $dbName = "mydb";
    $dbConnection = mysqli_connect($dbHost,$dbUser, $dbPass,$dbName);

    if (mysqli_connect_errno()){
       die('De verbinding met de database is mislukt' . mysqli_connect_error() ."(" . mysqli_connect_errno() .")" );
    }
    
?>