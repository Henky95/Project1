<?php
/**
 * Created by PhpStorm.
 * User: lrutg
 * Date: 11/8/2018
 * Time: 4:54 PM
 */

include "functions.php";

$id = GetCurrentUserId();

if ($id != null){
    Query("Delete From mydb.services where Users_Id = $id");
    Query("Delete From mydb.users where Id = $id");
}

header("location: index.php");