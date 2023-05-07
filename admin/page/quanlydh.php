



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

  <table style="border: 2px solid #2759BD; text-align: center; font-size: 14px; font-style: oblique";>
    <tr style="background:#CCFFFF;height:40px;";  >
        <td style="border: 2px solid #2759BD;" width="100px" ><b>STT</b></td>
        <td style="border: 2px solid #2759BD;" width="100px" ><b>MaHD</b></td>
        <td style="border: 2px solid #2759BD;" width="100px" ><b>MaKH</b></td>
        <td style="border: 2px solid #2759BD;" width="400px" ><b>Tên KH</b></td>
        <td style="border: 2px solid #2759BD;" width="400px" ><b>Địa Chỉ</b></td>
        <td style="border: 2px solid #2759BD;" width="250px" ><b>Điện thoại</b></td>
        <td style="border: 2px solid #2759BD;" width="250px" ><b>Ngày lập</b></td>
        <td style="border: 2px solid #2759BD;" width="200px" ><b>Tổng Tiền</b></td>
        <td style="border: 2px solid #2759BD;" width="200px" ><b>CTDH</b></td>
        <td style="border: 2px solid #2759BD;" width="200px" ><b>Xu ly don hang</b></td>

    </tr>
    <?php include("connect.php"); 
        $dem=0;
        $sql="SELECT * FROM `tbl_order`";
        $result=mysqli_query($connect,$sql);
        while($row=mysqli_fetch_array($result)){
    ?>   
    <tr  >
             <td><?=$dem++?></td>
            <td><?=$row['id_order']?></td>
            <td><?=$row['id_customer']?></td>
           
            

            <td><?=$row['ten_kh']?></td>
           <td><?=$row['address']?></td>
           <td><?=$row['phone']?></td>
           <td><?=date('d/m/Y H:i')?></td>
            <td><?=$row['total_money']?></td>
            <td><a href="index.php?action=ctdh&mahd=<?=$row['id_order']?>">CTDH</a></td>
            <td><input type="checkbox" name="" id="action"  onclick="xulydh(<?=$row['id_order']?>,<?=$row['status']?>)" <?php if($row['status']==1){ ?> checked="true" <?php } ?>></td>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
  function xulydh(id,status){
    if(status==1){
      $.ajax({
            type:"get",
            url:"./page/xulydh.php",
            data:{id:id,status:status},
            success:function(data){
              alert(data);
               location.reload();
              //  $(".small-container .row1").html(data);
                // if(){
                //     $("span").html("hi");
                // }
            }
        });
    }
    else{
      $.ajax({
            type:"get",
            url:"./page/xulydh.php",
            data:{id:id,status:status},
            success:function(data){
              location.reload();
               
              //  $(".small-container .row1").html(data);
                // if(){
                //     $("span").html("hi");
                // }
            }
        });
    }
    
  }
</script>



