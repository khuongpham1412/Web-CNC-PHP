


    


<?php 
include("../admin/connect.php");
    include("../action.php");
    $phantrang=new action();
    if(isset($_GET['page'])){
        $result=$phantrang->aohoodie($_GET['page']);
        echo $result;
        
    }
    
    
    ?>  
   