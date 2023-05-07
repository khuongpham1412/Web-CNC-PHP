



<div class="container-fluid">

<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="#">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Quản lý don hang</li>
</ol>

<!-- Area Chart Example-->
<div class="card mb-3">
  <div class="card-header">
    <i class="fas fa-users-cog"></i>
    Bruh</div>
  <div class="card-body">
  <table  >
  <table width="1000px" class="tb_a2" >
    <tr style="background:#CCFFFF;height:40px;" >
        <td width="300px" ><b>Tên sản phẩm</b></td>
        <td width="100px" ><b>Size</b></td>
        <td width="100px" ><b>Màu</b></td>
        <td width="100px" ><b>Số lượng</b></td>
        <td width="200px" ><b>Đơn giá</b></td>
        <td width="200px" ><b>Thành tiền</b></td>
    </tr>
    <?php include("connect.php"); 
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



  </div>
  <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>

<p class="small text-center text-muted my-5">
  <em>More chart examples coming soon...</em>
</p>

</div>



