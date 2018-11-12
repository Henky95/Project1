<?php
/**
 * Created by PhpStorm.
 * User: lrutg
 * Date: 11/8/2018
 * Time: 4:54 PM
 */

include "shared/Header.php";

$id = GetCurrentUserId();

if ($id != null){
    Query("Delete From mydb.services where Users_Id = " . $id);
    Query("Delete From mydb.users where Id = $id");

    $_SESSION["Ingelogd"] = null;
    $_SESSION["naamEmail"] = null;
    $_SESSION["accountID"] = null;
}

?>


<p>
    Uw account is succesvol verwijdert
    <br>
    <a href="index.php">Naar home pagina</a>
</p>

<?php include "shared/Footer.html"; ?>