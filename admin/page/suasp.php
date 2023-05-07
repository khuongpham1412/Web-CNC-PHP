
<?php
include("../action.php");
include("./connect.php");
$select=new action();
if(isset($_POST['suasanpham']) && $_POST['suasanpham']=='Option...'){
    ?>
    <script>
        alert("Yêu cầu chọn san pham muon sua thong tin!!!");
        window.location.href="index.php?action=selection&act=sua";
    </script>
    <?php
}
if(isset($_POST['submit'])){
   
$id=$_POST['suasanpham'];
$sql="SELECT * FROM tbl_products WHERE id_product='$id'"; 

$result=$connect->query($sql);
$row=mysqli_fetch_assoc($result);
?>
<form action="" class="addform" method="post" enctype="multipart/form-data">
<label>Tên</label>
<input type="text" name="tensp" class="addtxt border border-danger rounded" value="<?=$row['name']?>"><br>
<input type="hidden" name="idsp" value="<?=$row['id_product']?>" id="">
<label>Giá</label>
<input type="text" name="giasp" class="addtxt border border-danger rounded" value="<?=$row['price']?>"><br>
<label>Chi tiết</label>
<input type="textarea" name="ctsp" class="addtxt border border-danger rounded" value="<?=$row['details']?>"><br>
<label>Hình</label>
<img src="images/<?=$row['image']?>" alt="" class="addimg"><br>
<input type="file" name="upload_file" class="addimg"><br>

<input type="submit" class="btnthem" name="suasp">

</form>
<?php }
if(isset($_POST['suasp'])){
    $name=$_POST['tensp'];
    $id=$_POST['idsp'];
    $price=$_POST['giasp'];
    $details=$_POST['ctsp'];
    $hinhanh=$_FILES['upload_file']['name'];
    if(strlen($hinhanh)>0){
        $sql="UPDATE `tbl_products` SET `name`='$name', `price`='$price',`details`='$details',`image`='$hinhanh' WHERE `id_product`='$id'";
        $result=$connect->query($sql);
        if($result){
            move_uploaded_file($_FILES['upload_file']['tmp_name'],'images/'.$_FILES['upload_file']['name']);
            ?>
           <script>
               alert("Sua san pham thanh cong");
               window.location.href="index.php?action=quanlysp";
           </script>
       <?php
        }
        else{
            echo "sua san pham that bai";
        }
    }
    else{
        $sql="UPDATE `tbl_products` SET `name`='$name',`price`='$price',`details`='$details' WHERE `id_product`='$id'";
        $result=$connect->query($sql);
        if($result){
            ?>
            <script>
                alert("Sua san pham thanh cong");
                window.location.href="index.php?action=quanlysp";
            </script>
        <?php
        }
        else{
            echo "sua san pham that bai";
        }
    }
    
}
?>
