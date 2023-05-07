<?php
$connect=mysqli_connect("localhost","root","","cnc");

$data="";
if(isset($_GET['theloai']) && isset($_GET['to']) && isset($_GET['from'])){
    $theloai=$_GET['theloai'];
    $to=$_GET['to'];
    $from=$_GET['from'];
    $sql="SELECT * FROM tbl_products WHERE id_loai='$theloai' AND price>='$from' AND price<='$to' GROUP BY id_product ASC";
   
    $result=mysqli_query($connect,$sql);
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_array($result)){
            $data.="<div class='col-4'>";
            $data.="<a href='index.php?id=".$row['id_product']."&action=detail'><img src='./admin/images/".$row['image']."'></a>";
            $data.="<h4>".$row['name']."</h4>";
            $data.="<div class='rating'><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star-o'></i></div><p>".number_format($row['price'],0,",",".")."</p></div>";   
        }
        echo $data;
        exit;
    }
    else{
        echo "Khong tim thay san pham";
        exit;
    }

    

    
    
}
if(isset($_GET['theloai']) && isset($_GET['to'])){
    $theloai=$_GET['theloai'];
    $to=$_GET['to'];
    $sql="SELECT * FROM tbl_products WHERE id_loai='$theloai' AND price<='$to' GROUP BY id_product ASC";
    $result=mysqli_query($connect,$sql);
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_array($result)){
            $data.="<div class='col-4'>";
            $data.="<a href='index.php?id=".$row['id_product']."&action=detail'><img src='./admin/images/".$row['image']."'></a>";
            $data.="<h4>".$row['name']."</h4>";
            $data.="<div class='rating'><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star-o'></i></div><p>".number_format($row['price'],0,",",".")."</p></div>";   
        }
        echo $data;
        exit;
    }
    else{
        echo "Khong tim thay san pham";
        exit;
    }
}
else if(isset($_GET['theloai']) && isset($_GET['from'])){
    $theloai=$_GET['theloai'];
    $from=$_GET['from'];
    $sql="SELECT * FROM tbl_products WHERE id_loai='$theloai' AND price>='$from' GROUP BY id_product ASC";
    $result=mysqli_query($connect,$sql);
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_array($result)){
            $data.="<div class='col-4'>";
            $data.="<a href='index.php?id=".$row['id_product']."&action=detail'><img src='./admin/images/".$row['image']."'></a>";
            $data.="<h4>".$row['name']."</h4>";
            $data.="<div class='rating'><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star-o'></i></div><p>".number_format($row['price'],0,",",".")."</p></div>";   
        }
        echo $data;
        exit;
    }
    else{
        echo "Khong tim thay san pham";
        exit;
    }
}
else if(isset($_GET['from']) && isset($_GET['to'])){
    $to=$_GET['to'];
    $from=$_GET['from'];
    $sql="SELECT * FROM tbl_products WHERE price>='$from' AND price<='$to' GROUP BY id_product ASC";
    $result=mysqli_query($connect,$sql);
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_array($result)){
            $data.="<div class='col-4'>";
            $data.="<a href='index.php?id=".$row['id_product']."&action=detail'><img src='./admin/images/".$row['image']."'></a>";
            $data.="<h4>".$row['name']."</h4>";
            $data.="<div class='rating'><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star-o'></i></div><p>".number_format($row['price'],0,",",".")."</p></div>";   
        }
        echo $data;
        exit;
    }
    else{
        echo "Khong tim thay san pham";
        exit;
    }
}
if(isset($_GET['from'])){
    $from=$_GET['from'];
    $sql="SELECT * FROM tbl_products WHERE price>='$from' GROUP BY id_product ASC";
    $result=mysqli_query($connect,$sql);
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_array($result)){
            $data.="<div class='col-4'>";
            $data.="<a href='index.php?id=".$row['id_product']."&action=detail'><img src='./admin/images/".$row['image']."'></a>";
            $data.="<h4>".$row['name']."</h4>";
            $data.="<div class='rating'><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star-o'></i></div><p>".number_format($row['price'],0,",",".")."</p></div>";   
        }
        echo $data;
        exit;
    }
    else{
        echo "Khong tim thay san pham";
        exit;
    }
}
else if(isset($_GET['to'])){
    $to=$_GET['to'];
    $sql="SELECT * FROM tbl_products WHERE price<='$to' GROUP BY id_product ASC";
    $result=mysqli_query($connect,$sql);
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_array($result)){
            $data.="<div class='col-4'>";
            $data.="<a href='index.php?id=".$row['id_product']."&action=detail'><img src='./admin/images/".$row['image']."'></a>";
            $data.="<h4>".$row['name']."</h4>";
            $data.="<div class='rating'><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star-o'></i></div><p>".number_format($row['price'],0,",",".")."</p></div>";   
        }
        echo $data;
        exit;
    }
    else{
        echo "Khong tim thay san pham";
        exit;
    }
}
else if(isset($_GET['theloai'])){
    $theloai=$_GET['theloai'];
    $sql="SELECT * FROM tbl_products WHERE id_loai='$theloai'";
    $result=mysqli_query($connect,$sql);
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_array($result)){
            $data.="<div class='col-4'>";
            $data.="<a href='index.php?id=".$row['id_product']."&action=detail'><img src='./admin/images/".$row['image']."'></a>";
            $data.="<h4>".$row['name']."</h4>";
            $data.="<div class='rating'><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star-o'></i></div><p>".number_format($row['price'],0,",",".")."</p></div>";   
        }
        echo $data;
        exit;
    }
    else{
        echo "Khong tim thay san pham";
        exit;
    }
}
?>