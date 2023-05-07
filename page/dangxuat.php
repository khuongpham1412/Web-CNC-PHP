<?php session_start();
 unset($_SESSION["dadangnhap"]);
 unset($_SESSION["id_customer"]);
 unset($_SESSION["name_cus"]);
 unset($_SESSION["address_cus"]);
 unset($_SESSION["phone_cus"]);
 unset($_SESSION['idsp']);
header("Location: index.php");
?>