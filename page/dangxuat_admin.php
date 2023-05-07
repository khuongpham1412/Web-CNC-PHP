<?php session_start();
 unset($_SESSION["id_staff"]);
 unset($_SESSION["name_staff"]);
 unset($_SESSION["address"]);
 unset($_SESSION["phone"]);
header("Location: index.php");
?>