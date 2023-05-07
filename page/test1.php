<?php
session_start();
//echo "xin chao";
// echo $_GET['id'];
// echo $_GET['size'];
        //session_destroy();exit();
 //echo $_GET['index'];exit();
if(isset($_GET['id']) && isset($_GET['size']) && isset($_GET['color']) && isset($_GET['quantity']) && isset($_GET['index'])){
    $id=$_GET['id'];
    $size=$_GET['size'];
    $color=$_GET['color'];
    $quantity=$_GET['quantity'];
    $index=$_GET['index'];
    $tongtien=$_GET['tongtien'];
    $_SESSION['tonghoadon'][0]-=$_SESSION['idsp'][$id]['tongtien'][$index];
    if($index<count($_SESSION['idsp'][$id]['size'])){
        for($i=$index;$i<count($_SESSION['idsp'][$id]['size'])-1;$i++){
            $_SESSION['idsp'][$id]['size'][$i]=$_SESSION['idsp'][$id]['size'][$i+1];
            $_SESSION['idsp'][$id]['quantity'][$i]=$_SESSION['idsp'][$id]['quantity'][$i+1];
            $_SESSION['idsp'][$id]['color'][$i]=$_SESSION['idsp'][$id]['color'][$i+1];
            $_SESSION['idsp'][$id]['tongtien'][$i]=$_SESSION['idsp'][$id]['tongtien'][$i+1];
        }
    }
   
    $index1=count($_SESSION['idsp'][$id]['size'])-1;
    echo $index1;
    unset($_SESSION['idsp'][$id]['size'][$index1]);
    unset($_SESSION['idsp'][$id]['color'][$index1]);
    unset($_SESSION['idsp'][$id]['quantity'][$index1]);
    
    
    unset($_SESSION['idsp'][$id]['tongtien'][$index1]);
    if($_SESSION['tonghoadon'][0]==0){
        unset($_SESSION['idsp']);
        unset($_SESSION['tonghoadon']);
    }
   // unset($_SESSION['idsp'][$id]['quantity'][$index]);

    header("Location:../index.php?action=cart");  
}

?>