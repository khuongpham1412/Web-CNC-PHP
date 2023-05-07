<?php
   if(isset($_POST['tenkh']) && !empty($_POST['tenkh']) && isset($_POST['diachi']) && !empty($_POST['diachi']) && isset($_POST['sdt']) && !empty($_POST['sdt'])){
       include("./admin/connect.php");
      // $id_customer = $_SESSION['id'];
       $id_customer=$_SESSION['id_customer'];
       $name = $_POST['tenkh'];
       $diachi = $_POST['diachi'];
       $sdt = $_POST['sdt'];
       $total_money = $_SESSION['tonghoadon'][0];
        $sql= "INSERT INTO `tbl_order`(`id_customer`, `ten_kh`, `ngay_dat`, `address`, `phone`, `status`, `notes`, `total_money`) VALUES ('$id_customer','$name',".time().",'$diachi','$sdt','0','NULL','$total_money')";
       $result=$connect->query($sql);
        if($result){
        $sql1="SELECT id_order FROM tbl_order ORDER BY id_order DESC";
        $result1=$connect->query($sql1);
        $row1=mysqli_fetch_assoc($result1);
        $id_order=$row1['id_order'];
        foreach($_SESSION['idsp'] as $key => $value){
            for($i=0;$i<count($_SESSION['idsp'][$key]['quantity']);$i++){
              
                if(isset($_SESSION['idsp'][$key]['quantity'][$i])){
                 $idsp=$_SESSION['idsp'][$key]['idsp1'][$i];
                 $price=$_SESSION['idsp'][$key]['price'][$i];
                 $quantity=$_SESSION['idsp'][$key]['quantity'][$i];
                 $size=$_SESSION['idsp'][$key]['size'][$i];
                 $color=$_SESSION['idsp'][$key]['color'][$i];
                 $total_money=$_SESSION['idsp'][$key]['tongtien'][$i];
               
                $sql1="SELECT `id_size` FROM tbl_size WHERE `name`='$size'";
                $sql2="SELECT `id_color` FROM tbl_color WHERE `name`='$color'";
                $result1=$connect->query($sql1);
                $result2=$connect->query($sql2);
                $row=$result1->fetch_row();
                $id_size=$row[0];
                 
                $row2=$result2->fetch_row();
                $id_color=$row2[0];
                $sql3="SELECT quantity FROM tbl_product_size_color WHERE id_product='$idsp' AND id_size='$id_size' AND id_color='$id_color'";
                $result3=$connect->query($sql3);
                $row3=$result3->fetch_assoc();
                $sl=$row3['quantity']-$quantity;
                 
                    
                 $sql4="UPDATE `tbl_product_size_color` SET `quantity`='$sl' WHERE id_product='$idsp' AND id_size='$id_size' AND id_color='$id_color'";
                 $result4=$connect->query($sql4);
                $sql5="INSERT INTO `tbl_detail_order`(`id_order`, `id_product`, `size`, `color`, `quantity`, `price`, `total_money`) VALUES ('$id_order','$idsp','$size','$color','$quantity','$price','$total_money')";
                $result5=$connect->query($sql5);
                }    
            }
        }
        ?>
        <script>alert("Đặt Hàng Thành Công!");
     window.location.href="index.php";
    </script>
        <?php
        unset($_SESSION['idsp']);
        unset($_SESSION['tonghoadon']);
    }
   }
   else{
       echo "that bia";
   }
?>