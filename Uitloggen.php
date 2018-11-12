<?php
/**
 * Created by PhpStorm.
 * User: lrutg
 * Date: 11/8/2018
 * Time: 5:16 PM
 */

include "shared/Header.php";


if (LoggedIn()){
    $_SESSION["Ingelogd"] = null;
    $_SESSION["naamEmail"] = null;
    $_SESSION["accountID"] = null;
}
?>

<p>
    Uw bent succesvol uitgelogd
    <br>
    <br>
    <a href="index.php">Naar home pagina</a>
</p>

<?php include "shared/Footer.html"; ?>
