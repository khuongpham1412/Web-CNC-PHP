
<?php include("action.php");
$page=new action();
    
$trang=$page->total_page();
?>
<div class="container-fluid">

<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="#">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Quản lý sản phẩm</li>
</ol>

<!-- Area Chart Example-->
<div class="card mb-3">
  <div class="card-header">
    <i class="fas fa-users-cog"></i>
    Bruh</div>
  <div class="card-body">

  <button id="btnAdd"><a href="index.php?action=selection&act=them">Thêm sản phẩm</a></button>
  <button id="btnAdd"><a href="index.php?action=selection&act=sua">Sửa sản phẩm</a></button>
  <select id="sort" onchange="sortChanged(this)" style="position:absolute;right:0;border:2px lightgrey solid;">
                    <option value="">Sort by...</option>
                    <option value="sort_increase">Sort by name (increase)</option>
                    <option value="sort_decrease">Sort by name (decrease)</option>
                </select>
                <BR></BR>
   <table class="table" tabindex="1">
     
    <tr>
        <th>Ảnh</th>
        <th>Tên</th>
        <th>Giá</th>
        <th>Thể Loại</th>
        <th>Size</th>
        <th>Color</th>
        <th>Quantity</th>
        <th>Ngày tạo</th>
        <th>Xóa</th>
    </tr>
    <tbody id="sanpham">
    
    </tbody>
    
    
   </table>
   
<div class="page-btn">
       
<?php for($i=1;$i<=ceil($trang/8);$i++){ 
    ?>
<span id="<?=$i?>" page="<?=$i?>" onmouseover="this.style.color='white'" onmouseout="this.style.color='black'" style="background-color: gray;padding:10px;cursor: pointer;"><?=$i?></span>
<?php } ?>
</div>
  </div>
  <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>

<p class="small text-center text-muted my-5">
  <em>More chart examples coming soon...</em>
</p>

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$(document).ready(function(){
  function load(){
  phantrang(1);
  document.getElementById("1").style.background="red";

  }
  function phantrang(page){
       // alert("hu");
        $.ajax({
            type:"get",
            url:"./page/ajax.php",
            data:{page:page},
            success:function(data){
               // alert(data);
                $("#sanpham").html(data);
                // if(){
                //     $("span").html("hi");
                // }
            }
        });
    }
    load();
    $("span").on("click", function(){
     // ceil($trang/8)
     
        var page=$(this).attr('page');
        for(var i1=1;i1<=<?=ceil($trang/8)?>;i1++){
               if(page==i1){
                document.getElementById(""+i1).style.background="red";
               }
               else{
                document.getElementById(""+i1).style.background="gray";
               }
           }
        if($("#sort").val()==='sort_increase'){
            phantrangsort(page);
            
        }
        else if($("#sort").val()==='sort_decrease'){
           
            phantrangsortgiam(page);
        }
        else{
           
            // var p=$("#sort").val();
            

            phantrang(page);
        }
        

    })
})
  function xoasp(id,id_size,id_color){
   // alert("hello");
    var check=confirm("Bạn có muốn xóa sản phẩm?");
    if(check){
      $.ajax({
            type:"get",
            url:"./page/xoasp.php",
            data:{id:id,id_size:id_size,id_color:id_color},
            success:function(data){
                alert(data);
                location.reload();
               // $("#sanpham").html(data);
              
                // if(){
                //     $("span").html("hi");
                // }
            }
        });
    }
  }
  function phantrangsort(page){
    for(var i1=1;i1<=<?=ceil($trang/8)?>;i1++){
               if(page==i1){
                document.getElementById(""+i1).style.background="red";
               }
               else{
                document.getElementById(""+i1).style.background="gray";
               }
           }
        $.ajax({
            type:"get",
            url:"./page/sort_increase.php",
            data:{page:page},
            success:function(data){
              // alert(data);
               $("#sanpham").html(data);
                // if(){
                //     $("span").html("hi");
                // }
            }
        });
    }
    function phantrangsortgiam(page){
      for(var i1=1;i1<=<?=ceil($trang/8)?>;i1++){
               if(page==i1){
                document.getElementById(""+i1).style.background="red";
               }
               else{
                document.getElementById(""+i1).style.background="gray";
               }
           }
        $.ajax({
            type:"get",
            url:"./page/sort_decrease.php",
            data:{page:page},
            success:function(data){
                //alert(data);
            $("#sanpham").html(data);

                // if(){
                //     $("span").html("hi");
                // }
            }
        });
    }
  function sortChanged(obj){
       // alert("ki");
    var value=obj.value;
    if(value==='sort_increase'){
        phantrangsort(1);
    }
    else if(value==='sort_decrease'){
      
        phantrangsortgiam(1);
    }
}
</script>
