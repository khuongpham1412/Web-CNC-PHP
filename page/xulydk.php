<?php 
    include("../admin/connect.php");
    $user=$_POST['username'];
    $pass=$_POST['password'];
    $name=$_POST['name'];
    $address=$_POST['address'];
    $phone=$_POST['phone'];
    $sql="INSERT INTO `tbl_cutomer`(`name`, `address`, `phone`, `username`) VALUES ('$name','$address','$phone','$user')";
    $sql1="INSERT INTO `tbl_account`(`username`, `password`, `status`, `authority`) VALUES ('$user','$pass','1','0')";
    $result=$connect->query($sql);
    $result1=$connect->query($sql1);
    if($result==true && $result1==true){
        echo "Đăng Kí Thành Công";
    }
    else{
        echo "Đăng Kí Thất Bại";    
    }
?>