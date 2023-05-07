<?php
    
    if(isset($_GET["action"])){
        switch($_GET["action"]){
            case "homepage": {
                include("./page/home_page.php");
                break;
            }
            
            case "productclassification":{
                include("./page/ajax.php");
                break;
            }
            case "locnangcao":{
                include("./page/testform.php");
                break;
            }
            
            case "sale":{
                include("modules/page/sale.php");
                break;
            }
            case "handbags":{
                include("modules/page/handbags.php");
                break;
            }
            case "accessories":{
                include("modules/page/accessories.php");
                break;
            }
            case "wallets":{
                include("modules/page/wallets.php");
                break;
            }
            case "menstore":{
                include("modules/page/menstore.php");
                break;
            }
            case "shoe":{
                include("modules/page/shoe.php");
                break;
            }
            case "vintage":{
                include("modules/page/vintage.php");
                break;
            }
            case "service":{
                include("modules/page/service.php");
                break;
            }
            case "detail":{
                include("./page/products_detail.php");
                break;
            }
            
            case "account":{
                include("./page/account.php");
                break;
            }
            case "dangki":{
                include("./page/account.php");
                break;
            }
            case "xulydn":{
                include("./page/xulydn.php");
                break;
            }
            case "register":{
                include("modules/page/register.php");
                break;
            }
            case "search":{
                include("./page/search_ajax.php");
                break;
            }
            
            case "test":{
                include("modules/page/test.php");
                break;
            }
            case "cart":{
                include("./page/cart1.php");
                break;
            }
            case "chonsp":{
                include("./page/chonsp.php");
                break;
            }
            case "login":{
                include("./page/login1.php");
                break;
            }
            case "xulidh":{
                include("./page/xulidh.php");
                break;
            }
            case "ctdh":{
                include("./page/ctdh.php");
                break;
            }
           
            case "xoadh":{
                include("./page/xoadh.php");
                break;
            }
            case "history":{
                include("./page/history.php");
                break;
            }
            case "dathang":{
                include("./page/dathang.php");
                break;
            }
            case "themkh":{
                include("./page/themkh.php");
                break;
            }
            case "logout_user":{
                include("./page/dangxuat.php");
                break;
            }
            case "logout_admin":{
                include("./page/dangxuat_admin.php");
                break;
            }
            default: {
                include("./page/error.php");
            }
        }
    }else{
        include("./page/home_page.php");
    }
?>