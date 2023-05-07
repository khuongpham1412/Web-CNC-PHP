
<?php

include("../action.php");
include("connect.php");
$select=new action();
if(!isset($_POST['select'])){
   
    ?>
    <script>
        alert("Yêu cầu lựa chọn chế độ thêm!!!");
        window.location.href="index.php?action=selection&act=them";
    </script>
    <?php
}
if(isset($_POST['submit'])){
    if(isset($_POST['select'])){
        if($_POST['select']=="1"){
            ?>
<form action="" class="addform" method="post" enctype="multipart/form-data">
    <label>Tên</label>
    <input type="hidden" name="select" value="" id="">
        <input type="text" name="tensp1" id=""><br>
    <label>Thể Loại</label>
        <select name="theloai" id="">
            <option value="">Option...</option>
                    <?php 
                    $sql="SELECT * FROM tbl_category";
                    $result=$connect->query($sql);
                    while($row=$result->fetch_array()){
                    ?>
                <option value="<?=$row['id_loai']?>"><?=$row['ten_loai']?></option>
                     <?php } ?>
         </select><br>
    <label>Size</label>
        <select name="size" id="">
            <option value="">Option...</option>
                    <?php 
                    $sql="SELECT * FROM tbl_size";
                    $result=$connect->query($sql);
                    while($row=$result->fetch_array()){
                    ?>
                <option value="<?=$row['id_size']?>"><?=$row['name']?></option>
                     <?php } ?>
         </select><br>
    <label>Color</label>
        <select name="color" id="">
            <option value="">Option...</option>
                    <?php 
                    $sql="SELECT * FROM tbl_color";
                    $result=$connect->query($sql);
                    while($row=$result->fetch_array()){
                    ?>
                <option value="<?=$row['id_color']?>"><?=$row['name']?></option>
                     <?php } ?>
         </select><br>





    <label>Giá</label>
    <input type="text" name="giasp" class="addtxt border border-danger rounded" value=""><br>
    <label>Số Lượng</label>
    <input type="number" name="sl" class="addtxt border border-danger rounded" value=""><br>
    <label>Chi tiết</label>
    <input type="textarea" name="ctsp" class="addtxt border border-danger rounded" value=""><br>
    <label>Hình</label>
    <input type="file" name="upload_file" class="addimg"><br>
    <input type="submit" name="themsp" class="btnthem"><br>
</form>
<?php
        }
        else{
            ?>
<form action="" class="addform" method="post" enctype="multipart/form-data">
    <label>Tên</label>
        <select name="tensp" id="">
            <option value="">Option...</option>
                    <?php 
                    $sql="SELECT id_product, `name` FROM tbl_products";
                    $result=$connect->query($sql);
                    while($row=$result->fetch_array()){
                    ?>
                   
                <option value="<?=$row['id_product']?>,<?=$row['name']?>"><?=$row['name']?></option>
                    <?php } ?>
        </select><br>
    <input type="hidden" name="select" value="" id="">

    <label>Size</label>
        <select name="size" id="">
            <option value="">Option...</option>
                    <?php 
                    $sql="SELECT * FROM tbl_size";
                    $result=$connect->query($sql);
                    while($row=$result->fetch_array()){
                    ?>
                <option value="<?=$row['id_size']?>"><?=$row['name']?></option>
                     <?php } ?>
         </select><br>
    <label>Color</label>
        <select name="color" id="">
            <option value="">Option...</option>
                    <?php 
                    $sql="SELECT * FROM tbl_color";
                    $result=$connect->query($sql);
                    while($row=$result->fetch_array()){
                    ?>
                <option value="<?=$row['id_color']?>"><?=$row['name']?></option>
                     <?php } ?>
         </select><br>

    <label>Số Lượng</label>
    <input type="number" name="sl" class="addtxt border border-danger rounded" value=""><br>
    <input type="submit" name="themsp" class="btnthem"><br>
</form>
<?php
        }
    }
}


if(isset($_POST['themsp'])){
    $size=$_POST['size'];
    $color=$_POST['color'];
    
    
    $quantity=$_POST['sl'];
    
    
    
    if(isset($_POST['tensp'])){
    if(!empty($_POST['tensp']) && isset($_POST['sl']) && !empty($_POST['sl'])){
        $b=array();
        $a=explode(",",$_POST['tensp']);
        $b[]=$a;
        $tensp=$b[0][0];
        //$tensp1=$b[0][1];
        
        $sql="SELECT * FROM tbl_product_size_color";
        $result=$connect->query($sql);
        while($row=$result->fetch_array()){
            if($tensp==$row['id_product'] && $size==$row['id_size'] && $color==$row['id_color']){
                $sl=$row['quantity']+$quantity;
                $sql1="UPDATE `tbl_product_size_color` SET `quantity`='$sl' WHERE id_product='$tensp' AND id_size='$size' AND id_color='$color'";
                $result1=$connect->query($sql1);
                // $sql2="UPDATE `tbl_products` SET `price`='$price',`image`='$hinhanh' WHERE id_product='$tensp'";
                // $result2=$connect->query($sql2);
                // move_uploaded_file($_FILES['upload_file']['tmp_name'],'images/'.$_FILES['upload_file']['name']);
                ?>
                    <script>
                        alert("Them san pham thanh cong");
                        window.location.href="index.php?action=quanlysp";
                    </script>
                <?php
                exit();
            }
        }
        if(isset($_POST['tensp'])){
        // $sql3="UPDATE `tbl_products` SET `price`='$price',`image`='$hinhanh' WHERE id_product='$tensp'";
        // $result3=$connect->query($sql3);
        // $sql3="INSERT INTO tbl_products(`name`,price,details,`status`,`image`,`id_loai`) VALUES ('$tensp1','$price','$details','1','$hinhanh','$theloai')";
        // $result3=$select->select($sql3);
        $sql4="INSERT INTO `tbl_product_size_color`(`id_product`, `id_size`, `id_color`, `quantity`) VALUES ('$tensp','$size','$color','$quantity')";
        $result4=$select->select($sql4);
        if($result4){
           // move_uploaded_file($_FILES['upload_file']['tmp_name'],'images/'.$_FILES['upload_file']['name']);
           ?>
           <script>
               alert("Them san pham thanh cong");
               window.location.href="index.php?action=quanlysp";
           </script>
       <?php

        }
        else{
            echo "them san pham that bai";
        }
    }
    }else{
        ?>
           <script>
               alert("Yeu cau nhap day du");
              
           </script>
       <?php
    }
}else{
    if(!empty($_POST['tensp1']) && isset($_POST['theloai']) && !empty($_POST['theloai']) && isset($_POST['giasp']) && !empty($_POST['giasp']) && isset($_POST['sl']) && !empty($_POST['sl'])){
        $price=$_POST['giasp'];
        $details=$_POST['ctsp'];
        $theloai=$_POST['theloai'];
        $hinhanh=$_FILES['upload_file']['name'];
        $tensp1=$_POST['tensp1'];
        $sql="INSERT INTO `tbl_products`(`name`, `price`, `details`, `status`, `image`, `id_loai`) VALUES ('$tensp1','$price','$details','1','$hinhanh','$theloai')";
        $result=$connect->query($sql);
        $sql1="SELECT id_product FROM tbl_products ORDER BY id_product DESC";
        $result1=$connect->query($sql1);
        $row1=$result1->fetch_assoc();
        $idsp=$row1['id_product'];
        $sql2="INSERT INTO `tbl_product_size_color`(`id_product`, `id_size`, `id_color`, `quantity`) VALUES ('$idsp','$size','$color','$quantity')";
        $result2=$connect->query($sql2);
        if($result2){
            move_uploaded_file($_FILES['upload_file']['tmp_name'],'images/'.$_FILES['upload_file']['name']);
            ?>
                    <script>
                        alert("Them san pham thanh cong");
                        window.location.href="index.php?action=quanlysp";
                    </script>
                <?php
        }
        else{
            echo "them san pham that bai";
        }
    }
}
}