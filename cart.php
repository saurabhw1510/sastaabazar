<?php
include('./includes/connect.php');
include('./functions/commom_function.php');
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
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="main-nav">
        <nav class="navbar navbar-expand-lg bg-body-info">
            <div class="container-fluid">
                <a class="navbar-brand logo" href="index.php"><img src="assets\images\logo.png" alt="Logo"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="display_all.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./users_area/user_login.php">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php  cart_item() ;?></sup></a>
                        </li>
                    </ul>
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
                <a href='./users_area/user_login.php' class='nav-link'>Login</a>
            </li>";
            }else{
                echo "<li class='nav-item'>
                <a href='./users_area/logout.php' class='nav-link'>Logout</a>
            </li>";
            }
            ?>
        </ul>
    </nav>

    <div class="bg-light tag">
        <h3 class="text-center">Hidden Store</h3>
        <h6 class="text-center">Communication is at the heart of e-commerce and community</h6>
    </div>

    <div class="container">
        <div class="row">
            <form action="" method="post">
            <table class="table table-bordered text-center">
                
                <tbody>
                    <?php
                     global $conn;
                     $get_ip_add=getIPAddress();
                     $total_price=0;
                     $cart_query="Select * from `card-details` where ip_address='$get_ip_add'";
                     $result=mysqli_query($conn,$cart_query);
                     $result_count=mysqli_num_rows($result);
                     if($result_count>0){
                //         echo "<thead>
                //         <tr>
                //             <th>Product Title</th>
                //             <th>Product Image</th>
                //             <th>Quantity</th>
                //             <th>Product Price</th>
                //             <th>Remove</th>
                //             <th colspan='2'>Operations</th>
                //             </tr>
                //             </thead>
                // </tbody>";
                     while($row=mysqli_fetch_array($result)){
                         $product_id=$row['product_id'];
                         $select_products="Select * from `products` where product_id='$product_id'";
                         $result_products=mysqli_query($conn,$select_products);
                         while($row_product_price=mysqli_fetch_array($result_products)){
                             $product_price=array($row_product_price['product_price']);
                             $price_table=$row_product_price['product_price'];
                             $product_title=$row_product_price['product_title'];
                             $product_image1=$row_product_price['product_image1'];
                             $product_values=array_sum($product_price);
                             $total_price+=$product_values;
                       
                    ?>
               <thead>
                        <tr>
                            <th>Product Title</th>
                            <th>Product Image</th>
                            <th>Quantity</th>
                            <th>Product Price</th>
                            <th>Remove</th>
                            <th colspan='2'>Operations</th>
                            </tr>
                            </thead>
                </tbody>
                    <tr>
                        <td><?php echo $product_title?></td>
                        <td><img src="./admin_area/product_images/<?php echo $product_image1?>" class="cart_img"></td>
                        <td><input type="text" name="qty" class="form-input w-50" placeholder=1 ></td>
                        <?php
$get_ip_add=getIPAddress();
if(isset($_POST['update_cart'])){
    $quantities=$_POST['qty'];
    $update_cart="update `card-details` set quantity=$quantities where ip_address='$get_ip_add'";
    $result_products_quantity=mysqli_query($conn,$update_cart);
     $total_price=$total_price*$quantities;
}
 
                        ?>
                        <td><?php echo $price_table?></td>
                        <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
                        <td>
                            <input type="submit" value="Update Cart" class="bg-info px-3 py-2 border-0 mx-3" name="update_cart">
                            <input type="submit" value="Remove Item" class="bg-info px-3 py-2 border-0 mx-3" name="remove_cart">
                        </td>
                    </tr>
                <?php  }
                 }}
                 else{
                    echo "<h2 class='text-center text-danger'>Cart is Empty</h2>";
                 }?>
            </table>
            <div class="d-flex mb-5">
            <?php
                     global $conn;
                     $get_ip_add=getIPAddress();
                     $total_price=0;
                     $cart_query="Select * from `card-details` where ip_address='$get_ip_add'";
                     $result=mysqli_query($conn,$cart_query);
                     $result_count=mysqli_num_rows($result);
                     if($result_count>0){
                    echo "<h4 class='px-3'>Subtotal:<strong><?php echo $total_price?></strong></h4>
                    <input type='submit' value='Continue Shopping ' class='bg-info px-3 py-2 border-0 mx-3' name='continue_shopping'>
                   <button class='bg-secondary p-3 py-2 border-0'><a href='./users_area/checkout.php' class='text-light text-decoration-none'>Checkout</a></button>";
                    }
                    else{
                        echo "<input type='submit' value='Continue Shopping ' class='bg-info px-3 py-2 border-0 mx-3' name='continue_shopping'>";
                    }
                    if(isset($_POST['continue_shopping'])){
                        echo "<script>window.open('index.php','_self')</script>";
                    }
                    ?>
                
            </div>
         
            
        </div>
    </div>
       </form>
    <?php
            function remove_cart_item(){
            global $conn;
            if(isset($_POST['remove_cart'])){
               foreach($_POST['removeitem'] as $remove_id){
echo $remove_id;
$delete_query="Delete from `card-details` where product_id=$remove_id";
$run_delete=mysqli_query($conn,$delete_query);
if($run_delete){
    echo "<script>window.open('cart.php','_self')</script>";
}
               }            }}
               echo $remove_item=remove_cart_item();
            ?>
    </div>

    <?php
    include("./includes/footer.php");
    ?>
</body>

</html>

