<?php
include("../connect.php");
include("../action.php");
if(isset($_GET['page'])){
    $phantrang=new action();
    $result=$phantrang->hi($_GET['page']);
    echo $result;
    
}
?>