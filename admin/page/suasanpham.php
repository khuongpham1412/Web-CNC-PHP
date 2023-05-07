<?php if(isset($_POST['suasp'])){
        $id=$_POST['idsp'];
        echo $id;
        $price=$_POST['giasp'];
        echo $price;
        $details=$_POST['ctsp'];
        $hinhanh=$_FILES['upload_file']['name'];
        echo $hinhanh;exit;
        $sql="UPDATE `tbl_products` SET `price`='$price',`details`='$details',`image`='$hinhanh' WHERE `id_product`='$id'";
        $result=$connect->query($sql);
        if($result){
            move_uploaded_file($_FILES['upload_file']['tmp_name'],'images/'.$_FILES['upload_file']['name']);
            echo "sua san pham thanh cong";
        }
        else{
            echo "sua san pham that bai";
        }
}
?>