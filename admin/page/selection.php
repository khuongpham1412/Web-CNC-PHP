<?php if(isset($_GET['act'])){
    if($_GET['act']=="them"){
        ?>
        <div style="border: 0;margin:auto;min-height:150px;min-width:500px;text-align:center;background-color:#e6e6e6;">
            <form action="index.php?action=themsp" method="post">
            <input type="radio" value="1" name="select" id=""><p style="display:inline;font-size:24px;">Thêm Sản Phẩm Mới</p> <br>
            <input type="radio" value="2" name="select" id=""><p style="display:inline;font-size:24px;">Thêm Sản Phẩm Mới đã có trong kho</p> <br>
            <input type="submit" name="submit" id="" style="background-color:red;color:white;height:30px;
            width:100px;border-radius:10px;font-size:18px;
            margin-top:17px;">
            </form>
        </div>
        <?php
    }
    else{
        include("connect.php");
        ?>
        <div style="border: 0;margin:auto;min-height:75px;min-width:700px;text-align:center;background-color:#e6e6e6;">
            <form action="index.php?action=suasp" method="post">
                <select name="suasanpham" id="" style="width:500px;margin-top:20px;height:30px;">
                <option>Option...</option>
                <?php 
                $sql="SELECT * FROM `tbl_products`";
                $result=$connect->query($sql);
                while($row=$result->fetch_array()){
                ?>
                <option value="<?=$row['id_product']?>"><?=$row['id_product']?>-<?=$row['name']?></option>
                <?php } ?>
                </select>
                <input type="submit" name="submit" id="" style="background-color:red;color:white;height:30px;
            width:100px;border-radius:10px;font-size:18px;
            margin-top:17px;">
            </form>
        </div>
        <?php
    }
}
?>
 