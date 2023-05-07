<?php
include("../connect.php");
if(isset($_GET['status']) && isset($_GET['id'])){
    $id=$_GET['id'];
    $status=$_GET['status'];
    if($status==1){
        echo "Khong the thay doi";exit();
    }
    else{
        $sql="UPDATE tbl_order SET status='1' WHERE id_order='$id'";
    }
}
$result=mysqli_query($connect,$sql);
?>