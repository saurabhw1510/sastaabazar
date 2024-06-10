<?php
include('../includes/connect.php');
include('../functions/commom_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SastaBazar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="main-nav">
        <nav class="navbar navbar-expand-lg bg-body-info">
            <div class="container-fluid">
                <a class="navbar-brand logo" href="index.php"><img src="../assets\images\logo.png" alt="Logo"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../display_all.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="profile.php">My Account</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php  cart_item() ;?></sup></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Total Price:<?php total_cart_price();?></a>
                        </li>
                    </ul>
                    <form class="d-flex"  action="../search_products.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                        <!-- <button class="btn btn-outline-success" type="submit">Search</button> -->
                        <input type="submit" value="Search" class="btn btn-outline-success" name="search_data_product">
                    </form>
                </div>
            </div>
        </nav>
    </div> 
    <?php 
     cart();
          ?>
    <nav class="navbar admin navbar-expand-lg navbar-dark bg-secondary">
        <ul class="navbar-nav me-auto">
        <?php
            if(!isset($_SESSION['username'])){
                echo "<li class='nav-item'>
                <a href='#' class='nav-link'>Welcome Guest</a>
            </li>";
            }else{
                echo "<li class='nav-item'>
                <a href='#' class='nav-link'>Welcome ".$_SESSION['username']."</a>
            </li>";
            }
            ?>
            <?php
            if(!isset($_SESSION['username'])){
                echo "<li class='nav-item'>
                <a href='user_login.php' class='nav-link'>Login</a>
            </li>";
            }else{
                echo "<li class='nav-item'>
                <a href='logout.php' class='nav-link'>Logout</a>
            </li>";
            }
            ?>
        </ul>
    </nav>

    <div class="bg-light tag">
        <h3 class="text-center">Hidden Store</h3>
        <h6 class="text-center">Communication is at the heart of e-commerce and community</h6>
    </div>

    <div class="row">
        <div class="col-md-2 ">
            <ul class="navbar-nav bg-secondary text-center" style="height:70vh">
            <li class="nav-item bg-info">
                            <a class="nav-link text-light"  href="#"><h4>Your Profile</h4></a>
                        </li>
                        <?php
                        $username=$_SESSION['username'];
                        $user_image="Select * from `user_table` where username='$username'";
                        $user_image=mysqli_query($conn,$user_image);
                        $row_image=mysqli_fetch_array($user_image);
                        $user_image=$row_image['user_image'];
                        echo "<li class='nav-item mx-2 mt-3 mb-1'>
                        <img src='./user_images/$user_image' class='profile-img' alt=''>
                     </li>"
                        ?>
                        
                        <li class="nav-item ">
                            <a class="nav-link text-light"  href="profile.php">Pending Orders</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link text-light"  href="profile.php?edit_account">Edit Account</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link text-light"  href="profile.php?my_orders">My Orders</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link text-light"  href="profile.php?delete_account">Delete Account</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link text-light"  href="logout.php">Logout</a>
                        </li>
                        
            </ul>
        </div>
        <div class="col-md-10 text-center">
            <?php
            get_user_order_details();
            if(isset($_GET['edit_account'])){
                include('edit_account.php');
            }
            
            if(isset($_GET['my_orders'])){
                include('user_orders.php');
            }

            if(isset($_GET['delete_account'])){
                include('delete_account.php');
            }
            ?>
            
        </div>
    </div>


</div>

    <?php
    include("../includes/footer.php");
    ?>
</body>
</html>

