<?php
/**
 * Created by PhpStorm.
 * User: lrutg
 * Date: 11/8/2018
 * Time: 5:16 PM
 */

include "functions.php";


if (LoggedIn()){
    $_SESSION["Ingelogd"] = null;
    $_SESSION["naamEmail"] = null;
    $_SESSION["accountID"] = null;
}

header("location: index.php");