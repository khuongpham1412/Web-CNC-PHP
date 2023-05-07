<?php 
    include("../connect.php");
    include("../action.php");
    $phantrang=new action();
    if(isset($_GET['page'])){
        $result=$phantrang->sort_increase($_GET['page']);
        echo $result;
        
    }
    
    
    ?>  
   