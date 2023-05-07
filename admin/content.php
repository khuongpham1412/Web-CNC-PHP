<?php
if(isset($_GET['action'])){
    switch($_GET['action']){
        case "quanlysp": {
            include("./page/quanlysp.php");
            break;
        }
        case "quanlykh": {
            include("./page/quanlykh.php");
            break;
        }
        case "suasp": {
            include("./page/suasp.php");
            break;
        }
        case "ctdh": {
            include("./page/ctdh.php");
            break;
        }
        case "themsp": {
            include("./page/themsp.php");
            break;
        }
        case "xoasp": {
            include("./page/xoasp.php");
            break;
        }
        
        case "selection": {
            include("./page/selection.php");
            break;
        }
        
        case "xulythemsp": {
            include("./page/xulythemsp.php");
            break;
        }
        case "quanlydh": {
            include("./page/quanlydh.php");
            break;
        }
    }
}
?>