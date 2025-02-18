<?php
session_start();
if (isset($_SESSION["isLoggedInhris"])){
    $_SESSION["isLoggedInhris"] = $_SESSION["isLoggedInhris"];
    $_SESSION["userakseshris"] = $_SESSION["userakseshris"];
    $_SESSION["superadminhris"] = $_SESSION["superadminhris"];
    $_SESSION["namahris"] = $_SESSION["namahris"];
    $_SESSION["jabatanhris"] = $_SESSION["jabatanhris"];
    $_SESSION["emailhris"] = $_SESSION["emailhris"];
    
    $isLoggedInhris = $_SESSION["isLoggedInhris"];
    $userhris = $_SESSION["userakseshris"];
    $superadminhris = $_SESSION["superadminhris"];
    $namahris = $_SESSION["namahris"];
    $jabatanhris = $_SESSION["jabatanhris"];
    $emailhris = $_SESSION["emailhris"];
    
}
?>