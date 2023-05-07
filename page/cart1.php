<!-- 
<div class="small-container cart-page"> -->

<?php if(isset($_SESSION['idsp'])){ ?>
    <!-- -----------------cart item details------------------- -->
    <div class="small-container cart-page row3">
        <table>
            <tr>
                <th>Product</th>
                <th>Size</th>
                <th>Color</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>
            <?php
          // session_start();
        //session_destroy();exit;
//            unset($_SESSION['idsp']);
//   exit();
// var_dump($_SESSION['idsp']);
// echo count($_SESSION['idsp'][1]['size'][0]);
// exit;
        
               foreach($_SESSION['idsp'] as $key => $value){
                    for($i=0;$i<count($_SESSION['idsp'][$key]['quantity']);$i++){
                       if(isset($_SESSION['idsp'][$key]['size'][$i]) && isset($_SESSION['idsp'][$key]['color'][$i]) && isset($_SESSION['idsp'][$key]['quantity'][$i])){
               ?>
            <tr>
                <td>
                    <div class="cart-info">
                        <img src="./admin/images/<?=$_SESSION['idsp'][$key]['image'][$i]?>">
                        <div>
                            <p><?=$_SESSION['idsp'][$key]['name'][$i]?></p>
                            <small>Price: <?=$_SESSION['idsp'][$key]['price'][$i]?></small>
                            <br>
                            <a href="./page/test1.php?id=<?=$_SESSION['idsp'][$key]['idsp1'][$i]?>&size=<?=$_SESSION['idsp'][$key]['size'][$i]?>&color=<?=$_SESSION['idsp'][$key]['color'][$i]?>&quantity=<?=$_SESSION['idsp'][$key]['size'][$i]?>&index=<?=$i?>">Removed</a>
                        </div>
                    </div>
                </td>
                    
                    <td><div class="productSize"><?=$_SESSION['idsp'][$key]['size'][$i]?></div></td>
                    <td><div class="productColor"><?=$_SESSION['idsp'][$key]['color'][$i]?></div></td>
                    <td>
                        <input type="text" class="<?=$_SESSION['idsp'][$key]['idsp1'][$i].[$i]?>" value="<?=$_SESSION['idsp'][$key]['quantity'][$i]?>">
                        <button onclick="giam(`<?=$_SESSION['idsp'][$key]['idsp1'][$i]?>`,`<?=$_SESSION['idsp'][$key]['quantity'][$i]?>`,`<?=$_SESSION['idsp'][$key]['price'][$i]?>`,`<?=$i?>`)" class="removebutton">-</button>
                        <button onclick="tang(`<?=$_SESSION['idsp'][$key]['idsp1'][$i]?>`,`<?=$_SESSION['idsp'][$key]['quantity'][$i]?>`,`<?=$_SESSION['idsp'][$key]['price'][$i]?>`,`<?=$i?>`)" class="addbutton">+</button>
                    </td>
                     <td><?=$_SESSION['idsp'][$key]['tongtien'][$i]?></td>
                
                
                        
            </tr>
           
            <?php } } }  ?>
        </table>

        <div class="total-price">
            <table>
                <tr>
                    <td>Subtotal</td>
                    <td><?=$_SESSION['tonghoadon'][0]?></td>
                </tr>
            </table>

        </div>


    </div>
    <div>
        <?php if(isset($_SESSION['dadangnhap'])){ ?>
    <form action="index.php?action=dathang" method="post" class="orderform">
            <label>Ten Khach Hang: </label>
            <input type="text" name="tenkh" id="" class="ordertxt" value="<?=$_SESSION['name_cus']?>"><br>
            <label>Dia Chi: </label>
            <input type="text" name="diachi" id="" class="ordertxt" value="<?=$_SESSION['address_cus']?>"><br>
            <label>Phone: </label>
            <input type="text" name="sdt" id="" class="ordertxt" value="<?=$_SESSION['phone_cus']?>"><br>
            <label>Ghi Chu: </label>
            <input type="text" name="ghichu" id="" class="ordernote"><br>
            <input type="submit" name="muahang" class="buybutton" value="DAT HANG">
    </form>
    <?php }  } else{ ?>
    <img src="images/empty.png" class="emptycart">
    <h1 class="emptytxt">Hiện tại chưa có sản phẩm trong đơn hàng...</h1>
    <?php } ?>
    </div>


    <!-- ------------footer----------- -->

    
        <!-- ------------------- js for toggle menu-------------- -->
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
        <script src="main.js"></script>
            <script>
                function tang(idsp,quantity,price,i) {
                    
                   // alert(idsp+i);
                    $.ajax({
                        type:"get",
                        url:"./page/tang_giamsp.php",
                        data:{idsp:idsp, quantity:quantity,price:price,i:i,action:"tang"},
                        success: function(data){
                          // alert(data);
                            $(".row3").html(data);
                        }
                    })
                  }
                  function giam(idsp,quantity,price,i) {
                    
                    // alert(idsp+i);
                     $.ajax({
                         type:"get",
                         url:"./page/tang_giamsp.php",
                         data:{idsp:idsp, quantity:quantity,price:price,i:i,action:"giam"},
                         success: function(data){
                           // alert(data);
                             $(".row3").html(data);
                         }
                     })
                   }
            </script>
</body>

</html>