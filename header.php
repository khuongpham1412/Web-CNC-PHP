<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RedStore | Ecommerce Website Design</title>
    <link rel="stylesheet" href="style3.css">
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="styleA.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
</head>

<body>
<script>
    function dropdownFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
    }

    // Close the dropdown menu if the user clicks outside of it
    window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
            openDropdown.classList.remove('show');
        }
        }
    }
    }
</script>
<div class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <a href="index.php"><img src="images/logo1.png" width="125px"></a>
                </div>
                <nav>
                    <ul id="MenuItems">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="index.php?action=productclassification">Products</a></li>
                        
                        <?php
                        session_start();
                        if(isset($_SESSION['dadangnhap'])){ ?>
                        <li><a href=""><i class="fas fa-democrat"></i><?=$_SESSION['name_cus']?></a></li>
                        <li>
                            <div class="dropdown">
                                <button onclick="dropdownFunction()" class="dropbtn fas fa-user"></button>
                                <div id="myDropdown" class="dropdown-content">
                                  
                                    <a href="index.php?action=history">Order History</a>
                                    <a href="index.php?action=logout_user">Logout</a>
                                </div>
                            </div>
                        </li>
                        <?php } else{ ?>
                            <li><a href="index.php?action=account">Login</a></li>
                            <?php } ?>
                    </ul>
                </nav>
                <a href="index.php?action=cart" class="btncart"><img src="images/cart.png" width="30px" height="30px"></a>
                <img src="images/menu.png" class="menu-icon" 
                onclick="menutoggle()">
            </div>
         
        </div>
    </div>
