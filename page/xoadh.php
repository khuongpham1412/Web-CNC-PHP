<?php  

if(isset($_GET['check'])){
    $check=$_GET['check'];
    if($check=="true"){
        include("../admin/connect.php");
        $id_order=$_GET['id'];
        $sql="SELECT * FROM tbl_detail_order WHERE id_order='$id_order'";
        $result=$connect->query($sql);
        while($row=$result->fetch_array()){
            $sl_mua=$row['quantity'];
            $id=$row['id_product'];
            $size=$row['size'];
            $color=$row['color'];
            $sql1="SELECT id_size FROM tbl_size WHERE `name`='$size'";
            $result1=$connect->query($sql1);
            $row1=$result1->fetch_assoc();
            $id_size=$row1['id_size'];
            $sql2="SELECT id_color FROM tbl_color WHERE `name`='$color'";
            $result2=$connect->query($sql2);
            $row2=$result2->fetch_assoc();
            $id_color=$row2['id_color'];
            $sql3="SELECT quantity FROM tbl_product_size_color WHERE id_product='$id' AND id_size='$id_size' AND id_color='$id_color'";
            $result3=$connect->query($sql3);
            $row3=$result3->fetch_assoc();
            $sl_khohang=$row3['quantity'];
            $sl=$sl_mua+$sl_khohang;
            $sql4="UPDATE `tbl_product_size_color` SET `quantity`='$sl' WHERE id_product='$id' AND id_size='$id_size' AND id_color='$id_color'";
            $result4=$connect->query($sql4);
        }

        $sql5="DELETE FROM tbl_order WHERE id_order='$id_order'";
        $result5=$connect->query($sql5);
        $sql6="DELETE FROM tbl_detail_order WHERE id_order='$id_order'";
        $result6=$connect->query($sql6);
        if($result5 && $result6){
            echo "Huy thanh cong";
        }
    }
    else{
        echo "Huy that bai";
    }
}
else{
    if($_GET['status']==1){
        echo "Don hang da duoc xu ly!!!";
        exit;
    }
}

    
    
?>