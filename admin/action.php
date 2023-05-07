
<?php
    
    class action{
        function total_page(){
            include("connect.php");
            $sql="SELECT tbl_product_size_color.id_size,tbl_product_size_color.id_color,tbl_product_size_color.quantity, tbl_products.image,tbl_products.id_product,tbl_products.name,tbl_products.price,tbl_category.ten_loai FROM tbl_products,tbl_category,tbl_product_size_color WHERE tbl_products.id_product=tbl_product_size_color.id_product AND tbl_category.id_loai=tbl_products.id_loai";
            $result=$connect->query($sql);
            $total=$result->num_rows;
            return $total;
        }
        function select($sql){
            include("connect.php");
            $result=$connect->query($sql);
            return $result;
        }
        function hi($page){
            include("connect.php");
            $limit=8;
            $start=($page-1)*$limit;
           
            $data="";
            // $sql1="SELECT * FROM tbl_size";
            // $result1=action::select($sql1);
            // $row1=$result1->fetch_array();
            // $sql2="SELECT * FROM tbl_color";
            // $result2=action::select($sql2);
            // $row2=$result2->fetch_array();
            $sql3="SELECT tbl_product_size_color.id_size,tbl_product_size_color.id_color,tbl_product_size_color.quantity, tbl_products.image,tbl_products.id_product,tbl_products.name,tbl_products.price,tbl_category.ten_loai FROM tbl_products,tbl_category,tbl_product_size_color WHERE tbl_products.id_product=tbl_product_size_color.id_product AND tbl_category.id_loai=tbl_products.id_loai ORDER BY tbl_products.id_product ASC limit $start,$limit";
            $result3=action::select($sql3);
            ?>
            
             <?php
            while($row3=$result3->fetch_array()){
                $size=$row3['id_size'];
                $color=$row3['id_color'];

                $sql4="SELECT tbl_size.name FROM tbl_size WHERE id_size='$size'";
                $result4=action::select($sql4);
                $row4=$result4->fetch_assoc();
                $sql5="SELECT tbl_color.name FROM tbl_color WHERE id_color='$color'";
                $result5=action::select($sql5);
                $row5=$result5->fetch_assoc();
               $data.="<tr><td><img style='min-width: 150px;min-height:150px;max-width: 150px;max-height: 150px;' src='images/".$row3['image']."'; alt=''></td><td>".$row3['name']."</td><td>".number_format($row3['price'],0,",",".")."</td><td>".$row3['ten_loai']."</td><td>".$row4['name']."</td><td>".$row5['name']."</td><td>".$row3['quantity']."</td><td>".date("d,m,Y H:i")."</td><td><button onclick='xoasp(".$row3['id_product'].",".$row3['id_size'].",".$row3['id_color'].")'>Xóa</button></td></tr>";            
            }
            return $data;
        }
        function sort_decrease($page){
            include("connect.php");
            $limit=8;
            $start=($page-1)*$limit;
           
            $data="";
            $sql3="SELECT tbl_product_size_color.id_size,tbl_product_size_color.id_color,tbl_product_size_color.quantity, tbl_products.image,tbl_products.id_product,tbl_products.name,tbl_products.price,tbl_category.ten_loai FROM tbl_products,tbl_category,tbl_product_size_color WHERE tbl_products.id_product=tbl_product_size_color.id_product AND tbl_category.id_loai=tbl_products.id_loai ORDER BY tbl_products.name DESC limit $start,$limit";
            $result3=action::select($sql3);
            ?>
            
             <?php
            while($row3=$result3->fetch_array()){
                $size=$row3['id_size'];
                $color=$row3['id_color'];

                $sql4="SELECT tbl_size.name FROM tbl_size WHERE id_size='$size'";
                $result4=action::select($sql4);
                $row4=$result4->fetch_assoc();
                $sql5="SELECT tbl_color.name FROM tbl_color WHERE id_color='$color'";
                $result5=action::select($sql5);
                $row5=$result5->fetch_assoc();
               $data.="<tr><td><img style='min-width: 150px;min-height:150px;max-width: 150px;max-height: 150px;' src='images/".$row3['image']."'; alt=''></td><td>".$row3['name']."</td><td>".number_format($row3['price'],0,",",".")."</td><td>".$row3['ten_loai']."</td><td>".$row4['name']."</td><td>".$row5['name']."</td><td>".$row3['quantity']."</td><td>".date("d,m,Y H:i")."</td><td><button onclick='xoasp(".$row3['id_product'].",".$row3['id_size'].",".$row3['id_color'].")'>Xóa</button></td></tr>";            
            }
            return $data;
        }
        function sort_increase($page){
            include("connect.php");
            $limit=8;
            $start=($page-1)*$limit;
           
            $data="";


            $sql3="SELECT tbl_product_size_color.id_size,tbl_product_size_color.id_color,tbl_product_size_color.quantity, tbl_products.image,tbl_products.id_product,tbl_products.name,tbl_products.price,tbl_category.ten_loai FROM tbl_products,tbl_category,tbl_product_size_color WHERE tbl_products.id_product=tbl_product_size_color.id_product AND tbl_category.id_loai=tbl_products.id_loai ORDER BY tbl_products.name ASC limit $start,$limit";
            $result3=action::select($sql3);
            ?>
            
             <?php
            while($row3=$result3->fetch_array()){
                $size=$row3['id_size'];
                $color=$row3['id_color'];

                $sql4="SELECT tbl_size.name FROM tbl_size WHERE id_size='$size'";
                $result4=action::select($sql4);
                $row4=$result4->fetch_assoc();
                $sql5="SELECT tbl_color.name FROM tbl_color WHERE id_color='$color'";
                $result5=action::select($sql5);
                $row5=$result5->fetch_assoc();
               $data.="<tr><td><img style='min-width: 150px;min-height:150px;max-width: 150px;max-height: 150px;' src='images/".$row3['image']."'; alt=''></td><td>".$row3['name']."</td><td>".number_format($row3['price'],0,",",".")."</td><td>".$row3['ten_loai']."</td><td>".$row4['name']."</td><td>".$row5['name']."</td><td>".$row3['quantity']."</td><td>".date("d,m,Y H:i")."</td><td><button onclick='xoasp(".$row3['id_product'].",".$row3['id_size'].",".$row3['id_color'].")'>Xóa</button></td></tr>";            
            }
            return $data;
        }
        function test($page){
            if($page==1){
                $result = action::total_page();
                for($i=1;$i<=$result;$i++){
                    echo $i;
                }
            }
        }
        function details($idsp){
            include("connect.php");        
            $sql="SELECT * FROM tbl_products WHERE id_product='$idsp'";
            $result= action::select($sql);
            return $result;
        }
      
       
        
    }
?>