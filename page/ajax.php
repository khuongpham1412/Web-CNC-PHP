

 <?php include("action.php");
    $phantrang=new action();
    $i1=$phantrang->total_page();
    
    ?>  

    <div class="small-container">

        <div class="row row-2">
            <h2>All Products</h2>
            <div>
                <a href="index.php?action=locnangcao">LOC NANG CAO</a>
                <select id="sort" onchange="sortChanged(this)">
                    <option value="">Sort by...</option>
                    <option value="sort_increase">Sort by name (increase)</option>
                    <option value="sort_decrease">Sort by name (decrease)</option>
                </select>
                
                
                <select id="phanloai" onchange="phanloaiChanged(this)">
                <option value="">Filter by...</option>
                <?php 
                include("./admin/connect.php");
                $sql="SELECT * FROM tbl_category";
                $result=$connect->query($sql);
                while($row=$result->fetch_array()){
                ?>
                    <option value="<?=$row['ten_loai']?>"><?=$row['ten_loai']?></option>
                   
                    <?php } ?>
                
                    
                    
                </select>
            </div>
        </div>
        <div id="theloai">
        <div>
            <form action="index.php?action=search" method="post">
                    <input type="text" name="namesp" class="searchbar" placeholder="Search for your products...">
                    <input type="submit" name="search" value="Search" class="btnsearch">  
            </form>
        </div>
        <div class="row row1">
        </div>
        <?php if(ceil($i1/8)>1){ ?>
        <h3 style="color:black;font-size:15px;">Có <?=ceil($i1/8);?> trang</h3>
        <?php } ?>
        <div id="page1" style="color:red;font-size:20px;"></div>
       <div class="page-btn">
       
        <?php for($i=1;$i<=ceil($i1/8);$i++){ 
            ?>
        <span id="<?=$i?>" page="<?=$i?>"><?=$i?></span>
        <?php } ?>
        </div>
        
        </div>
        
    </div>
    
    <!-- ------------footer----------- -->

   





    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
// $(document).ready(function(){
    
    function phantrangsort(page){
        
        for(var i1=1;i1<=<?=ceil($i1/8)?>;i1++){
               if(page==i1){
                document.getElementById(""+i1).style.background="red";
               }
               else{
                document.getElementById(""+i1).style.background="white";
               }
           }
       // alert("hu");
        $.ajax({
            type:"get",
            url:"./page/sort_increase.php",
            data:{page:page},
            success:function(data){
            //    alert(data);
                $(".small-container .row1").html(data);
                // if(){
                //     $("span").html("hi");
                // }
            }
        });
    }
    function phantrangsortgiam(page){
        
        for(var i1=1;i1<=<?=ceil($i1/8)?>;i1++){
               if(page==i1){
                document.getElementById(""+i1).style.background="red";
               }
               else{
                document.getElementById(""+i1).style.background="white";
               }
           }
       // alert("hu");
        $.ajax({
            type:"get",
            url:"./page/sort_decrease.php",
            data:{page:page},
            success:function(data){
            //    alert(data);
                $(".small-container .row1").html(data);

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
function aosomi(page,theloai){
   
        $.ajax({
            type:"get",
            url:"./page/sort.php",
            data:{page:page,theloai:theloai},
            success:function(data){
               console.log(data);
                $("#theloai").html(data);
                // if(){
                //     $("span").html("hi");
                // }
            }
        });
    }
    
   
    
    function phanloaiChanged(obj){
        var value=obj.value;
        if(value==='Áo Sơ Mi'){
            aosomi(1,"Áo Sơ Mi");
        }
        else if(value==='Áo Phông'){
            aosomi(1,"Áo Phông");
        }
        else if(value==='Áo Hoodie'){
            aosomi(1,"Áo Hoodie");
        }else if(value==='Áo Khoác'){
            aosomi(1,"Áo Khoác");
        }
}

function hello(page){
    
    if($("#phanloai").val()==='Áo Sơ Mi'){
    aosomi(page,"Áo Sơ Mi");
    
    }
    else if($("#phanloai").val()==='Áo Phông'){
        aosomi(page,"Áo Phông");
    }
    else if($("#phanloai").val()==='Áo Hoodie'){
        aosomi(page,"Áo Hoodie");
    }
    else if($("#phanloai").val()==='Áo Khoác'){
        aosomi(page,"Áo Khoác");
    }
}

    
// })




$(document).ready(function(){
   
    function load(){
        phantrang(1);
        document.getElementById("1").style.background="red";

    }
    function phantrang(page){
       // alert("hu");
      
        $.ajax({
            type:"get",
            url:"./page/products.php",
            data:{page:page},
            success:function(data){
              
                $(".small-container .row1").html(data);

                // if(){
                //     $("span").html("hi");
                // }
            }
        });
    }
    load();
    $("span").on("click", function(){
        var page=$(this).attr('page');
        var i=$(this).attr('id');
        
            
        
           for(var i1=1;i1<=<?=ceil($i1/8)?>;i1++){
               if(i==i1){
                document.getElementById(""+i1).style.background="red";
               }
               else{
                document.getElementById(""+i1).style.background="white";
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
</script>


  




























    
    
        
        
  
    