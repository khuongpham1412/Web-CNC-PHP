<table width="1000px" class="tb_a2" >
    <tr style="background:#CCFFFF;height:40px;" >
        <td width="300px" ><b>Tên sản phẩm</b></td>
        <td width="100px" ><b>Size</b></td>
        <td width="100px" ><b>Màu</b></td>
        <td width="100px" ><b>Số lượng</b></td>
        <td width="200px" ><b>Đơn giá</b></td>
        <td width="200px" ><b>Thành tiền</b></td>
    </tr>
    <?php include("./admin/connect.php"); 
        $dem=0;
        $mahd=$_GET['mahd'];
        $sql="SELECT * FROM `tbl_detail_order` WHERE id_order='$mahd'";
        $result=mysqli_query($connect,$sql);
        while($row=mysqli_fetch_array($result)){
            $idsp=$row['id_product'];
            $sql1="SELECT `name` FROM `tbl_products` WHERE id_product='$idsp'";
            $result1=mysqli_query($connect,$sql1);
            $row1=mysqli_fetch_assoc($result1);
    ?>   
    <tr  >
    <tr class="a_1" >
                    <td><?=$row1['name']?></td>
                    <td> <?=$row['size']?></td>
                    <td> <?=$row['color']?></td>
                   <td><?=$row['quantity']?></td>
                   <td><?=$row['price']?></td>
                   <td><?=$row['total_money']?></td>
    </tr>   
        <?php  } ?>     
        </table>