<?php
include("../connect.php");
if(isset($_GET['status']) && isset($_GET['id'])){
    $id=$_GET['id'];
    
    $status=$_GET['status'];
    $sql="SELECT * FROM tbl_cutomer WHERE id_customer='$id'";
    $result=mysqli_query($connect,$sql);
    $row=$result->fetch_assoc();
    $username=$row['username'];
    if($status==1){
        $sql1="UPDATE tbl_account SET status='0' WHERE username='$username'";
    }
    else{
        $sql1="UPDATE tbl_account SET status='1' WHERE username='$username'";
    }
}
$result1=mysqli_query($connect,$sql1);
?>