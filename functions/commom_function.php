<?php


// include('./includes/connect.php');

function getProducts(){
    global $conn;
    if(!isset($_GET['category'])){
        if(!isset($_GET['brand'])){
    $select_query="Select * from `products` order by rand() LIMIT 0,3";
    $result_query=mysqli_query($conn,$select_query);
    while($row=mysqli_fetch_assoc($result_query)){
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_description=$row['product_description'];
        $product_keywords=$row['product_keywords'];
        $product_image1=$row['product_image1'];
        $product_price=$row['product_price'];
        $category_id=$row['category_id'];
        $brand_id=$row['brand_id'];

        echo "
            <div class='col-md-4'>
                <div class='card-prod'>
                    <div class='prod-img'><img src='./admin_area/product_images/$product_image1' class='prod-img' alt='Product'></div>
                    
                    <div class='prod-body'>
                        <h5 class='prod-title'>$product_title</h5>
                        <p class='prod-text'>$product_description</p>
                        <p class='prod-price'>₹$product_price</p>
                        <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to Cart</a>
                        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                    </div>
                </div>
            </div>
       
     ";
    }
}
}
}

function get_all_Products(){
    global $conn;
    if(!isset($_GET['category'])){
        if(!isset($_GET['brand'])){
    $select_query="Select * from `products` order by rand()";
    $result_query=mysqli_query($conn,$select_query);
    while($row=mysqli_fetch_assoc($result_query)){
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_description=$row['product_description'];
        $product_keywords=$row['product_keywords'];
        $product_image1=$row['product_image1'];
        $product_price=$row['product_price'];
        $category_id=$row['category_id'];
        $brand_id=$row['brand_id'];

        echo "
            <div class='col-md-4'>
                <div class='card-prod'>
                    <div class='prod-img'><img src='./admin_area/product_images/$product_image1' class='prod-img' alt='Product'></div>
                    
                    <div class='prod-body'>
                        <h5 class='prod-title'>$product_title</h5>
                        <p class='prod-text'>$product_description</p>
                        <p class='prod-price'>₹$product_price</p>
                        <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to Cart</a>
                        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                    </div>
                </div>
            </div>
       
     ";
    }
}
}
}

function get_unique_category(){
    global $conn;
    if(isset($_GET['category'])){
        $category_id=$_GET['category'];
    $select_query="Select * from `products` where category_id=$category_id";
    $result_query=mysqli_query($conn,$select_query);
    $num_0f_rows=mysqli_num_rows($result_query);
    if($num_0f_rows==0){
        echo "<h2 class='text-center text-danger'>No Products Found !!</h2>";
    }
    while($row=mysqli_fetch_assoc($result_query)){
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_description=$row['product_description'];
        $product_keywords=$row['product_keywords'];
        $product_image1=$row['product_image1'];
        $product_price=$row['product_price'];
        $category_id=$row['category_id'];
        $brand_id=$row['brand_id'];

        echo "
            <div class='col-md-4'>
                <div class='card-prod'>
                    <div class='prod-img'><img src='./admin_area/product_images/$product_image1' class='prod-img' alt='Product'></div>
                    
                    <div class='prod-body'>
                        <h5 class='prod-title'>$product_title</h5>
                        <p class='prod-text'>$product_description</p>
                        <p class='prod-price'>₹$product_price</p>
                        <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to Cart</a>
                        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                    </div>
                </div>
            </div>
       
     ";
    }
}
}

function get_unique_brand(){
    global $conn;
    if(isset($_GET['brand'])){
        $brand_id=$_GET['brand'];
    $select_query="Select * from `products` where brand_id=$brand_id";
    $result_query=mysqli_query($conn,$select_query);
    $num_0f_rows=mysqli_num_rows($result_query);
    if($num_0f_rows==0){
        echo "<h2 class='text-center text-danger'>No Products Found !!</h2>";
    }
    while($row=mysqli_fetch_assoc($result_query)){
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_description=$row['product_description'];
        $product_keywords=$row['product_keywords'];
        $product_image1=$row['product_image1'];
        $product_price=$row['product_price'];
        $category_id=$row['category_id'];
        $brand_id=$row['brand_id'];

        echo "
            <div class='col-md-4'>
                <div class='card-prod'>
                    <div class='prod-img'><img src='./admin_area/product_images/$product_image1' class='prod-img' alt='Product'></div>
                    
                    <div class='prod-body'>
                        <h5 class='prod-title'>$product_title</h5>
                        <p class='prod-text'>$product_description</p>
                        <p class='prod-price'>₹$product_price</p>
                        <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to Cart</a>
                        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                    </div>
                </div>
            </div>
       
     ";
    }
}
}

function getBrands(){
    global $conn;
    $select_brands = 'Select * from `brands`';
    $result_brands = mysqli_query($conn, $select_brands);
    while ($row_data = mysqli_fetch_assoc($result_brands)) {
        $brand_title = $row_data['brand_title'];
        $brand_id = $row_data['brand_id'];
        echo "<li class='nav-item'>
                        <a href='index.php?brand=$brand_id' class='nav-link btnn text-light'><h6>$brand_title</h6></a>
                 </li>";
}
}

function getCategories(){
    global $conn;
    $select_categories = 'Select * from `categories`';
$result_categories = mysqli_query($conn, $select_categories);
while ($row_data = mysqli_fetch_assoc($result_categories)) {
    $cat_title = $row_data['category_title'];
    $cat_id = $row_data['category_id'];
    echo "<li class='nav-item'>
                    <a href='index.php?category=$cat_id' class='nav-link btnn text-light'><h6>$cat_title</h6></a>
                  </li>";
}
}

function search_products(){
    global $conn;
    if(isset($_GET['search_data_product'])){
        $search_data_values=$_GET['search_data'];
        $search_query="Select * from `products` where product_keywords like '%$search_data_values%'";
    $select_query="Select * from `products`";
    $result_query=mysqli_query($conn,$search_query);
    while($row=mysqli_fetch_assoc($result_query)){
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_description=$row['product_description'];
        $product_keywords=$row['product_keywords'];
        $product_image1=$row['product_image1'];
        $product_price=$row['product_price'];
        $category_id=$row['category_id'];
        $brand_id=$row['brand_id'];

        echo "
            <div class='col-md-4'>
                <div class='card-prod'>
                    <div class='prod-img'><img src='./admin_area/product_images/$product_image1' class='prod-img' alt='Product'></div>
                    
                    <div class='prod-body'>
                        <h5 class='prod-title'>$product_title</h5>
                        <p class='prod-text'>$product_description</p>
                        <p class='prod-price'>₹$product_price</p>
                        <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to Cart</a>
                        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                    </div>
                </div>
            </div>
       
     ";
    }
}
}

function viewmore(){
    global $conn;
    if(isset($_GET['product_id'])){
    if(!isset($_GET['category'])){
        if(!isset($_GET['brand'])){
            $product_id=$_GET['product_id'];
    $select_query="Select * from `products` where product_id=$product_id";
    $result_query=mysqli_query($conn,$select_query);
    while($row=mysqli_fetch_assoc($result_query)){
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_description=$row['product_description'];
        $product_keywords=$row['product_keywords'];
        $product_image1=$row['product_image1'];
        $product_image2=$row['product_image2'];
        $product_price=$row['product_price'];
        $category_id=$row['category_id'];
        $brand_id=$row['brand_id'];

        echo "
            <div class='col-md-4'>
                <div class='card-prod'>
                    <div class='prod-img'><img src='./admin_area/product_images/$product_image1' class='prod-img' alt='Product'></div>
                    
                    <div class='prod-body'>
                        <h5 class='prod-title'>$product_title</h5>
                        <p class='prod-text'>$product_description</p>
                        <p class='prod-price'>₹$product_price</p>
                        <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to Cart</a>
                        <a href='index.php' class='btn btn-secondary'>Go Home</a>
                    </div>
                </div>
            </div>

            <div class='col-md-8'>
        <div class='row'>
            <div class='col-md-12'>
                <h4 class='text-center text-info mb-5'>Related Products</h4>
            </div>
            <div class='col-md-6'>
                <img src='./admin_area/product_images/$product_image2' class='card-img-top' alt='$product_title'>
            </div>
        </div>

    </div>
       
     ";
    }
}
}
}
}

function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  

//cart

function cart(){
    if(isset($_GET['add_to_cart'])){
    global $conn;
    $get_ip_add=getIPAddress();
    $get_product_id=$_GET['add_to_cart'];
    $select_query="Select * from `card-details` where ip_address='$get_ip_add' and product_id=$get_product_id";
    $result_query=mysqli_query($conn,$select_query);
    $num_0f_rows=mysqli_num_rows($result_query);
    if($num_0f_rows>0){
        echo "<script>alert('THis item already present inside cart')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }else{
        $insert_query="insert into `card-details` (product_id,ip_address,quantity) values ($get_product_id,'$get_ip_add',0)";
        $result_query=mysqli_query($conn,$insert_query);
        // echo "<script>alert('Item added to cart')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }
}
}

//card-item-num
function cart_item(){
    if(isset($_GET['add_to_cart'])){
        global $conn;
        $get_ip_add=getIPAddress();
        $select_query="Select * from `card-details` where ip_address='$get_ip_add'";
        $result_query=mysqli_query($conn,$select_query);
        $count_cart_items=mysqli_num_rows($result_query);
    }else{
        global $conn;
        $get_ip_add=getIPAddress();
        $select_query="Select * from `card-details` where ip_address='$get_ip_add'";
        $result_query=mysqli_query($conn,$select_query);
        $count_cart_items=mysqli_num_rows($result_query);
        }
    echo $count_cart_items;
}

//total price function
function total_cart_price(){
    global $conn;
    $get_ip_add=getIPAddress();
    $total_price=0;
    $cart_query="Select * from `card-details` where ip_address='$get_ip_add'";
    $result=mysqli_query($conn,$cart_query);
    while($row=mysqli_fetch_array($result)){
        $product_id=$row['product_id'];
        $select_products="Select * from `products` where product_id='$product_id'";
        $result_products=mysqli_query($conn,$select_products);
        while($row_product_price=mysqli_fetch_array($result_products)){
            $product_price=array($row_product_price['product_price']);
            $product_values=array_sum($product_price);
            $total_price+=$product_values;
        }
}
echo $total_price;
}

// orders details
 function get_user_order_details(){
    global $conn;
    $username=$_SESSION['username'];
    $get_details="Select * from `user_table` where username='$username'";
    $result_query=mysqli_query($conn,$get_details);
    while($row_query=mysqli_fetch_array($result_query)){
        $user_id=$row_query['user_id'];
        if(!isset($_GET['edit_account'])){
            if(!isset($_GET['my_orders'])){
                if(!isset($_GET['delete_account'])){
                    $get_orders="Select * from `user_orders` where user_id=$user_id and order_status='pending'";
                    $result_orders_query=mysqli_query($conn,$get_orders);
                    $row_count=mysqli_num_rows($result_orders_query);
                    if($row_count>0){
                        echo "<h3 class='text-center text-success mt-4 mb-2'>You have <span class='text-danger'>$row_count</span> pending orders </h3>
                        <a  class='text-center' href='profile.php?my_orders'><h4>Order Details</h4></a>";
                    }else{
                        echo "<h3 class='text-center text-success mt-4 mb-2'>You have 0 pending orders </h3>
                        <a  class='text-center' href='../index.php'><h4>Explore Products</h4></a>";
                    }
                }
            }
        }
    }
 }

?>

