

    <?php include("header.php"); ?>
    
    <!-- ------------- featured categorries ---------------- -->
    
    <!-- ------------- featured products ---------------- -->
    <?php include("content.php") ?>
 

    <!-- ------------footer----------- -->

    <?php include("footer.php"); ?>
        <!-- ------------------- js for toggle menu-------------- -->
    <script>
        var MenuItems = document.getElementById("MenuItems");
        
        MenuItems.style.maxHeight = "0px";

        function menutoggle(){
            if(MenuItems.style.maxHeight == "0px")
            {
                MenuItems.style.maxHeight = "200px";
            }
        else
            {
                MenuItems.style.maxHeight = "0px";
            }
        }

    </script>
