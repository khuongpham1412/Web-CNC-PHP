
    

    <!-- ---------- single Products detail ----------- -->
    <?php 
                 include("action.php");
                 include("./admin/connect.php");
                 $id=$_GET['id'];
                
               
                 $details=new action();
                 $row=$details->details($_GET['id'])->fetch_assoc();

         
            ?>
    <div class="small-container single-product">
        <div class="row">
            <div class="col-2">
                <img src="./admin/images/<?=$row['image']?>" width="100%" id="productImg">
                
                <div class="small-img-row">
                   
                   
                    
                </div>

            </div>
    
            <div class="col-2">
                <p>Home / T-Shirt</p>
                <h1><?=$row['name']?></h1>
                <h4><?=$row['price']?></h4>
                <form action="index.php?action=xulidh" method="post">
                   <input type="hidden" name="idsp" value="<?=$_GET['id']?>" id="">
                   

                                <select name="size">
                                <option>Option Size...</option>

                                    <?php
                                    $sql1="SELECT id_size FROM tbl_product_size_color WHERE id_product='$id' GROUP BY id_size";
                                    $result1=$connect->query($sql1);
                                    while($row1=$result1->fetch_array()){
                                        $id_size=$row1['id_size'];
                                       $sql2="SELECT `name` FROM tbl_size WHERE id_size='$id_size'";
                                       $result2=$connect->query($sql2);
                                       $row2=$result2->fetch_assoc();
                                    ?>
                                    <option><?=$row2['name']?></option>
                                  
                                    <?php } ?>
                                </select>

                                <select name="color">
                                <option>Option Color...</option>

                                <?php 
                                 $sql3="SELECT id_color FROM tbl_product_size_color WHERE id_product='$id' GROUP BY id_color";
                                 $result3=$connect->query($sql3);
                                 while($row3=$result3->fetch_array()){
                                     $id_color=$row3['id_color'];
                                    $sql4="SELECT `name` FROM tbl_color WHERE id_color='$id_color'";
                                    $result4=$connect->query($sql4);
                                    $row4=$result4->fetch_assoc();
                                ?>
                                    <option><?=$row4['name']?></option>
                                <?php  } ?>
                                </select>
                                    <input min=1 type="number" value="1" id="quantity" name="quantity">
                                    <input type="submit" value="Add To Card" name="add_card" class="btn">
                </form>
                    <h3>Product Detail
                        <i class="fa fa-indent"></i>
                    </h3>
                    <br>
                    <p>Surrounded affronting favourable no mr. Lain knew like half she yet joy. Be than dull as seen
                        very shot. Attachment ye so am travelling estimating projecting is. Off fat address attacks his
                        besides. Suitable settling mr attended no doubtful feelings. Any over for say bore such sold
                        five but hung</p>
            </div>
        </div>
    </div>

  <div style="height: 300px;"></div>

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
        <script>
        </script>

<!-- ------------------- JS for  product gallery------------------------         -->
        <script>
            var ProductImg = document.getElementById("productImg");
            var SmallImg = document.getElementsByClassName("small-img");

            SmallImg[0].onclick = function()
            {
                ProductImg.src = SmallImg[0].src;
            }
            SmallImg[1].onclick = function()
            {
                ProductImg.src = SmallImg[1].src;
            }
            SmallImg[2].onclick = function()
            {
                ProductImg.src = SmallImg[2].src;
            }
            SmallImg[3].onclick = function()
            {
                ProductImg.src = SmallImg[3].src;
            }

        </script>
</body>

</html>