
    <div class="small-container">

       
        <div>
            <form action="" method="post">
                    <input type="text" name="namesp" value="<?php if(isset($_POST['search'])) echo $_POST['namesp'];  ?>" class="searchbar" placeholder="Search for your products...">
                    <input type="submit" name="search" value="Search" class="btnsearch">  
            </form>
        </div>
        <?php 
                include("admin/connect.php");
                include("action.php");
                $search=new action();
                if(isset($_POST['namesp']))
                $total_row=$search->search($_POST['namesp']);
    ?> 
        <div class="row row1"> </div>
        <?php if(ceil($total_row/8)>1){ ?>
        <h3 style="color:red";>Có <?=$total_row?> san pham tren <?=ceil($total_row/8);?> trang</h3>
        <?php } ?>
        <div class="page-btn">
        <?php for($i=1;$i<=ceil($total_row/8);$i++){ ?>
            <span id="<?=$i?>" page="<?=$i?>"><?=$i?></span>
        <?php } ?>
        
        
        <!-- <span>&#8594;</span> -->
        
        </div>
        </div>
        
    <!-- ------------footer----------- -->

        <script>
            var MenuItems = document.getElementById("MenuItems");

            MenuItems.style.maxHeight = "0px";

            function menutoggle() {
                if (MenuItems.style.maxHeight == "0px") {
                    MenuItems.style.maxHeight = "200px";
                }
                else {
                    MenuItems.style.maxHeight = "0px";
                }
            }

        </script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
$(document).ready(function(){
   // $(".btnsearch").on("click",function(){
        var name=$(".searchbar").val();
        var page=1;
        function phantrang(name,page){
            
       // alert("hu");
        $.ajax({
            type:"get",
            url:"./page/search.php",
            data:{name:name,page:page},
            success:function(data){
              if(data==0){
                  alert(data);
              }
              else{
                $(".small-container .row1").html(data);}
                // if(){
                //     $("span").html("hi");
                // }
            }
        });
    }
    
    phantrang(name,page);
  //  });
    
    //load();
    $("span").on("click", function(){
        
        var page=$(this).attr('page');
        
        var name=$(".searchbar").val();
        for(var i1=1;i1<=2;i1++){
               if(page==i1){
                document.getElementById(""+i1).style.background="red";
               }
               else{
                document.getElementById(""+i1).style.background="white";
               }
           }
        function phantrang(name,page){
       // alert("hu");
        $.ajax({
            type:"get",
            url:"./page/search.php",
            data:{name:name,page:page},
            success:function(data){
               //alert(data);
                $(".small-container .row1").html(data);
                // if(){
                //     $("span").html("hi");
                // }
            }
        });
    }
        phantrang(name,page);

    });
});
</script>





