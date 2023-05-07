<?php 
include("../admin/connect.php");
    include("../action.php");
    $phantrang=new action();
    if(isset($_GET['name']) && isset($_GET['page'])){
        $result=$phantrang->search1($_GET['name'],$_GET['page']);
        if($result==""){
            echo "<img src='images/nothing.png' alt='ur mom' style='display:block;'></img> </br> <h1 style='color:darkblue;display:block;'>Không tìm thấy sản phẩm</h1>";
        }
        else{
            echo $result;
        }
        
    }
    
    
    ?>  