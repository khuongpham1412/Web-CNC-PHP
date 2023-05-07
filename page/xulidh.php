<?php
include("./admin/connect.php");
if(!isset($_SESSION["dadangnhap"])){
    ?> <script>alert("Mời bạn đăng nhập để mua hàng");
    window.location.href="index.php?action=account";
    </script>
     <?php
   // header("Location: index.php?action=account");
}
else if($_POST['size']=='Option Size...' || $_POST['color']=='Option Color...'){
    ?> <script>alert("Yeu cau chon size va mau");
    window.location.href="index.php?action=detail&id=<?=$_POST['idsp']?>";
    </script>
     <?php
}
else{
    if(isset($_POST['idsp']) && isset($_POST['size']) && isset($_POST['color']) && isset($_POST['quantity'])){
        $idsp=$_POST['idsp'];
        $size=$_POST['size'];
        $color=$_POST['color'];
        $quantity=$_POST['quantity'];
        $sql="SELECT id_size FROM tbl_size WHERE `name`='$size'";
        $result=$connect->query($sql);
        $row=$result->fetch_assoc();
        $id_size=$row['id_size'];
        $sql1="SELECT id_color FROM tbl_color WHERE `name`='$color'";
        $result1=$connect->query($sql1);
        $row1=$result1->fetch_assoc();
        $id_color=$row1['id_color'];
        $sql2="SELECT quantity FROM tbl_product_size_color WHERE id_product='$idsp' AND id_size='$id_size' AND id_color='$id_color'";
        $result2=$connect->query($sql2);
        if(mysqli_num_rows($result2)>0){
        $row2=$result2->fetch_assoc();
        if($row2['quantity']<$quantity){
            ?> <script>alert("Sản Phẩm Trong kho chỉ còn <?=$row2['quantity']?>");
            window.location.href="index.php?id=<?=$idsp?>&action=detail";
            </script>
             <?php
        }
        else{
            // $sl=$row['quantity']-$quantity;
            // $size1=$row['id_size'];
            // $color1=$row['id_color'];

            // $sql1="UPDATE `tbl_product_size_color` SET `quantity`='$sl' WHERE id_product='$idsp' AND id_size='$size1' AND id_color='$color1'";
            // $result=$connect->query($sql1);
//session_destroy();exit();
$tonghoadon=0;
$tongtien=0; ?>
<?php
if(!isset($_SESSION['idsp'])){
    $_SESSION['idsp']=array();
}
if(!isset($_SESSION['tongtien'])){
    $_SESSION['tongtien']=array();
}
if(!isset($_SESSION['idsp1'])){
    $_SESSION['idsp1']=array();
}
if(!isset($_SESSION['color'])){
    $_SESSION['color']=array();
}
if(!isset($_SESSION['size'])){
    $_SESSION['size']=array();
}
if(!isset($_SESSION['quantity'])){
    $_SESSION['quantity']=array();
}
if(!isset($_SESSION['image'])){
    $_SESSION['image']=array();
}
if(!isset($_SESSION['name'])){
    $_SESSION['name']=array();
}
if(!isset($_SESSION['price'])){
    $_SESSION['price']=array();
}
if(!isset($_SESSION['tonghoadon'])){
    $_SESSION['tonghoadon']=array();
}
// session_destroy();
if(isset($_POST['idsp']) && !empty($_POST['idsp'])){
    $id=$_POST['idsp'];
    $size=$_POST['size'];
    $color=$_POST['color'];
    $sl=$_POST['quantity'];
    $idsp1=$_POST['idsp'];
    $result=mysqli_query($connect,"SELECT * FROM tbl_products WHERE id_product='$id'");
    $row=mysqli_fetch_assoc($result);
    
    //session_destroy();exit();

    $dem=0;
    if(isset($_SESSION['idsp'][$id]))
    {
        $i1;
        for($i=0;$i<count($_SESSION['idsp'][$id]['color']);$i++){
            if($_SESSION['idsp'][$id]['color'][$i]==$color && $_SESSION['idsp'][$id]['size'][$i]==$size){
                $dem++;
                $i1=$i;
            }
        }
        if($dem==0){
            $_SESSION['idsp'][$id]['color'][]=$color;
            $_SESSION['idsp'][$id]['size'][]=$size;
            $_SESSION['idsp'][$id]['quantity'][]=$sl;
            $_SESSION['idsp'][$id]['image'][]=$row['image'];
            $_SESSION['idsp'][$id]['price'][]=$row['price'];
            $_SESSION['idsp'][$id]['name'][]=$row['name'];
            $_SESSION['idsp'][$id]['idsp1'][]=$row['id_product'];
            $_SESSION['idsp'][$id]['tongtien'][]=$sl*$row['price'];
            $_SESSION['tonghoadon'][0]+=$sl*$row['price'];
        }
        else{
            $_SESSION['idsp'][$id]['quantity'][$i1]+=$sl;
            $_SESSION['idsp'][$id]['tongtien'][$i1]+=$row['price'];
            $_SESSION['tonghoadon'][0]+=$sl*$row['price'];
        }
    }
    else{
       
        $_SESSION['idsp'][$id]['color'][]=$color;
        $_SESSION['idsp'][$id]['size'][]=$size;
        $_SESSION['idsp'][$id]['quantity'][]=$sl;
        $_SESSION['idsp'][$id]['image'][]=$row['image'];
        $_SESSION['idsp'][$id]['price'][]=$row['price'];
        $_SESSION['idsp'][$id]['name'][]=$row['name'];
        $_SESSION['idsp'][$id]['idsp1'][]=$row['id_product'];
        $_SESSION['idsp'][$id]['tongtien'][]=$sl*$row['price'];
        $_SESSION['tonghoadon'][0]+=$sl*$row['price'];
    }
}
   
    header("Location: index.php?action=cart");
}
    }else{
        ?>
        <script>
        alert("San Pham da het hang");
        window.location.href="index.php?id=<?=$idsp?>&action=detail";

        </script>
        <?php
    }

}}
  ?>