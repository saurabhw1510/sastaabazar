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
    <title>Admin DashBoard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="../assets/css/admin.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <style>
        .product_img{
            width:15%;
            object-fit:contain;
        }
    </style>
</head>
<body>
    <!--navbar-->
    <div class="container-fluid p-0">
        <nav class="admin-nav navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../assets/images/logo.png">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <?php
            if(isset($_SESSION['admin_name'])){
                echo "<li class='nav-item'>
                <a href='#' class='nav-link'>Welcome ".$_SESSION['admin_name']."</a>
            </li>";
            }else{
                echo "<li class='nav-item'>
                <a href='#' class='nav-link'>Welcome</a>
            </li>";
            }
            ?>
            <?php
            if(!isset($_SESSION['admin_name'])){
                echo "<li class='nav-item'>
                <a href='./admin_login.php' class='nav-link'>Login</a>
            </li>";
            }else{
                echo "<li class='nav-item'>
                <a href='../users_area/logout.php' class='nav-link'>Logout</a>
            </li>";
            }
            ?>
                    </ul>
                </nav>
            </div>  
        </nav>
        <!-- end of first child -->

        <div class="bg-secondary">
            <h3 class="text-center p-3">Manage Products</h3>
        </div>

        <div class="roow">
            <div class="user col-md-12 bg-light p-1  align-items-center">
                <div>
                   
                    <h3 class="text-dark text-center fw-bold f-size-30"><?php
            if(isset($_SESSION['admin_name'])){
                echo  "Have a look ".$_SESSION['admin_name']."";
            }else{
                echo "<li class='nav-item'>
                <a href='#' class='nav-link'>Welcome</a>
            </li>";
            }
            ?></h3>
                </div>
                <div class="actions button text-center">
                    <button><a href="insert_product.php" class="nav-link text-Dark my-1">Insert Products</a></button>
                    <button><a href="index.php?view_products" class="nav-link text-Dark my-1">View Products</a></button>
                    <button><a href="index.php?insert_categories" class="nav-link text-Dark my-1">Insert Categories</a></button>
                    <button><a href="index.php?view_categories" class="nav-link text-Dark my-1">View Categories</a></button>
                    <button><a href="index.php?insert_brands" class="nav-link text-Dark my-1">Insert Brands</a></button>
                    <button><a href="index.php?view_brands" class="nav-link text-Dark my-1">View Brands</a></button>
                    <button><a href="index.php?list_orders" class="nav-link text-Dark my-1">All orders</a></button>
                    <button><a href="index.php?list_payments" class="nav-link text-Dark my-1">All  Payments</a></button>
                    <button><a href="index.php?list_users" class="nav-link text-Dark my-1">List users</a></button>
                </div>
            </div>
        </div>

        <div class="container my-4">
            <?php
            if (isset($_GET['insert_categories'])) {
                include 'insert_categories.php';
            }
            if (isset($_GET['insert_brands'])) {
                include 'insert_brands.php';
            }
            if (isset($_GET['view_products'])) {
                include 'view_products.php';
            }
            if (isset($_GET['edit_products'])) {
                include 'edit_products.php';
            }
            if (isset($_GET['delete_product'])) {
                include 'delete_product.php';
            }
            if (isset($_GET['view_categories'])) {
                include 'view_categories.php';
            }
            if (isset($_GET['view_brands'])) {
                include 'view_brands.php';
            }
            if(isset($_GET['edit_category'])){
                include 'edit_category.php';
            }
            if(isset($_GET['edit_brand'])){
                include 'edit_brands.php';
            }
            if(isset($_GET['delete_category'])){
                include 'delete_category.php';
            }
            if(isset($_GET['delete_brand'])){
                include 'delete_brand.php';
            }
            if(isset($_GET['list_orders'])){
                include 'list_orders.php';
            }
            if(isset($_GET['list_payments'])){
                include 'list_payments.php';
            }
            if(isset($_GET['list_users'])){
                include 'list_users.php';
            }
            ?>
        </div>
    </div>

    <?php
    include("../includes/footer.php");
    ?>
    
</body>
</html>