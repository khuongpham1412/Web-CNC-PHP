<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Products - RedStore</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<?php
    
    class action{
        function total_page(){
            include("admin/connect.php");
            $sql="SELECT * FROM tbl_products";
            $result=$connect->query($sql);
            $total=$result->num_rows;
            return $total;
        }
        function select($sql){
            include("admin/connect.php");
            $result=$connect->query($sql);
            return $result;
        }
        function sort_decrease($page){
            include("admin/connect.php");
            $limit=8;
            $start=($page-1)*$limit;
           
            $data="";
            $sql="SELECT * FROM tbl_products ORDER BY `name` DESC limit $start,$limit";
            $result=action::select($sql);
            ?>
            
             <?php
            while($row=$result->fetch_array()){
                $data.="<div class='col-4'>";
                $data.="<a href='index.php?id=".$row['id_product']."&action=detail'><img src='./admin/images/".$row['image']."'></a>";
                $data.="<h4>".$row['name']."</h4>";
                $data.="<div class='rating'><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star-o'></i></div><p>".$row['price']."</p></div>";   
            }
                ?>
                 
                 <?php
                
            return $data;
        }
        function aosomi1($theloai){
            include("admin/connect.php");
            $sql="SELECT * FROM `tbl_category`,`tbl_products` WHERE tbl_category.id_loai=tbl_products.id_loai AND tbl_category.ten_loai='$theloai'";
            $result=$connect->query($sql);
            $total=$result->num_rows;
            return $total;
        }

        function aosomi($page,$theloai){
            include("admin/connect.php");
            $limit=8;
            $start=($page-1)*$limit;
            
            $data="";
            $sql="SELECT * FROM `tbl_category`,`tbl_products` WHERE tbl_category.id_loai=tbl_products.id_loai AND tbl_category.ten_loai='$theloai' limit $start,$limit";
            $result=action::select($sql);
            ?>
            
             <?php
            while($row=$result->fetch_array()){
                $data.="<div class='col-4'>";
                $data.="<a href='index.php?id=".$row['id_product']."&action=detail'><img src='./admin/images/".$row['image']."'></a>";
                $data.="<h4>".$row['name']."</h4>";
                $data.="<div class='rating'><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star-o'></i></div><p>".$row['price']."</p></div>";   
            }
                ?>
                 
                 <?php
                
            return $data;
        }
        function aophong($page){
            include("admin/connect.php");
            $limit=8;
            $start=($page-1)*$limit;
           
            $data="";
            $sql="SELECT * FROM `tbl_category`,`tbl_products` WHERE tbl_category.id_loai=tbl_products.id_loai AND tbl_category.ten_loai='Áo Phông'";
            $result=action::select($sql);
            ?>
            
             <?php
            while($row=$result->fetch_array()){
                $data.="<div class='col-4'>";
                $data.="<a href='index.php?id=".$row['id_product']."&action=detail'><img src='./admin/images/".$row['image']."'></a>";
                $data.="<h4>".$row['name']."</h4>";
                $data.="<div class='rating'><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star-o'></i></div><p>".$row['price']."</p></div>";   
            }
                ?>
                 
                 <?php
                
            return $data;
        }
        function aohoodie($page){
            include("admin/connect.php");
            $limit=8;
            $start=($page-1)*$limit;
           
            $data="";
            $sql="SELECT * FROM `tbl_category`,`tbl_products` WHERE tbl_category.id_loai=tbl_products.id_loai AND tbl_category.ten_loai='Áo Hoodie'";
            $result=action::select($sql);
            ?>
            
             <?php
            while($row=$result->fetch_array()){
                $data.="<div class='col-4'>";
                $data.="<a href='index.php?id=".$row['id_product']."&action=detail'><img src='./admin/images/".$row['image']."'></a>";
                $data.="<h4>".$row['name']."</h4>";
                $data.="<div class='rating'><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star-o'></i></div><p>".$row['price']."</p></div>";   
            }
                ?>
                 
                 <?php
                
            return $data;
        }
        function aokhoac($page){
            include("admin/connect.php");
            $limit=8;
            $start=($page-1)*$limit;
           
            $data="";
            $sql="SELECT * FROM `tbl_category`,`tbl_products` WHERE tbl_category.id_loai=tbl_products.id_loai AND tbl_category.ten_loai='Áo Khoác' limit $start,$limit";
            $result=action::select($sql);
            ?>
            
            
             <?php
            while($row=$result->fetch_array()){
                $data.="<div class='col-4'>";
                $data.="<a href='index.php?id=".$row['id_product']."&action=detail'><img src='./admin/images/".$row['image']."'></a>";
                $data.="<h4>".$row['name']."</h4>";
                $data.="<div class='rating'><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star-o'></i></div><p>".$row['price']."</p></div>";   
            }
                ?>
                 
                 <?php
                
            return $data;
        }

        function sort_increase($page){
            include("admin/connect.php");
            $limit=8;
            $start=($page-1)*$limit;
           
            $data="";
            $sql="SELECT * FROM tbl_products ORDER BY `name` ASC limit $start,$limit";
            $result=action::select($sql);
            ?>
            
             <?php
            while($row=$result->fetch_array()){
                $data.="<div class='col-4'>";
                $data.="<a href='index.php?id=".$row['id_product']."&action=detail'><img src='./admin/images/".$row['image']."'></a>";
                $data.="<h4>".$row['name']."</h4>";
                $data.="<div class='rating'><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star-o'></i></div><p>".$row['price']."</p></div>";   
            }
                ?>
                 
                 <?php
                
            return $data;
        }
        function phantrang($page){
            include("admin/connect.php");
            $limit=8;
            $start=($page-1)*$limit;
           
            $data="";
            $sql="SELECT * FROM tbl_products ORDER BY id_product ASC limit $start,$limit";
            $result=action::select($sql);
            ?>
            
             <?php
            while($row=$result->fetch_array()){
                $data.="<div class='col-4'>";
                $data.="<a href='index.php?id=".$row['id_product']."&action=detail'><img src='./admin/images/".$row['image']."'></a>";
                $data.="<h4>".$row['name']."</h4>";
                $data.="<div class='rating'><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star-o'></i></div><p>".number_format($row['price'],0,",",".")."</p></div>";   
            }
                ?>
                 
                 <?php
                
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
            include("admin/connect.php");        
            $sql="SELECT * FROM tbl_products WHERE id_product='$idsp'";
            $result= action::select($sql);
            return $result;
        }
        
         
        function search($namesp){
            include("admin/connect.php");
            $sql="SELECT * FROM tbl_products WHERE `name` LIKE '%".$namesp."%'";
            $result=$connect->query($sql);
            $total=$result->num_rows;
            return $total;
        }
        function search1($namesp,$page){
            include("admin/connect.php");
            $limit=8;
            $start=($page-1)*$limit;
            $data="";
            $sql="SELECT * FROM tbl_products WHERE `name` LIKE '%".$namesp."%' ORDER BY id_product ASC limit $start,$limit";
            $result=action::select($sql);
            if(mysqli_num_rows($result)>0){
            while($row=$result->fetch_array()){
                $data.="<div class='col-4'>";
                $data.="<a href='index.php?id=".$row['id_product']."&action=detail'><img src='./admin/images/".$row['image']."'></a>";
                $data.="<h4>".$row['name']."</h4>";
                $data.="<div class='rating'><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star-o'></i></div><p>".$row['price']."</p></div>";   
            }
        }
            // $total_row=action::search($namesp);
            // $data.="<div class='page-btn'>";
            // for($i=1;$i<=ceil($total_row/2);$i++){
            //   $data.="<span page=".$i."><?=$i
            
            // <!-- //    $data.="</div>";  -->
            return $data;
        }
    }
?>