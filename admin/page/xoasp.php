
<?php
$id=$_GET['id'];
$id_size=$_GET['id_size'];
$id_color=$_GET['id_color'];
$sql="DELETE FROM tbl_product_size_color WHERE id_product='$id' AND id_size='$id_size' AND id_color='$id_color'"; 
include("../action.php");
$select=new action();
$result=$select->select($sql);
if($result){
    echo "Xoa thanh cong";
}
else{
    echo "Xoa that bai";
}
?>