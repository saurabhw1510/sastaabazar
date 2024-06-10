

<?php
if(isset($_GET['edit_products'])){
    $edit_id = intval($_GET['edit_products']); // Ensure $edit_id is an integer

    $get_data = "SELECT * FROM `products` WHERE product_id = $edit_id";
    $result = mysqli_query($conn, $get_data);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_keywords = $row['product_keywords'];
        $category_id = $row['category_id'];
        $brand_id = $row['brand_id'];
        $product_image1 = $row['product_image1'];
        $product_image2 = $row['product_image2'];
        $product_price = $row['product_price'];
    } else {
        echo "<script>alert('Product not found.');</script>";
        echo "<script>window.open('index.php','_self');</script>";
        exit();
    }

    // Fetch category name
    $select_category = "SELECT * FROM `categories` WHERE category_id = $category_id";
    $result_category = mysqli_query($conn, $select_category);
    $category_title = ($result_category && mysqli_num_rows($result_category) > 0) ? mysqli_fetch_assoc($result_category)['category_title'] : '';

    // Fetch brand name
    $select_brand = "SELECT * FROM `brands` WHERE brand_id = $brand_id";
    $result_brand = mysqli_query($conn, $select_brand);
    $brand_title = ($result_brand && mysqli_num_rows($result_brand) > 0) ? mysqli_fetch_assoc($result_brand)['brand_title'] : '';
}
?>

<div class="container mt-5">
    <h1 class="text-center">Edit Product</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto mb-3">
            <label for="product_title" class="form-label">Product Title</label>
            <input type="text" id="product_title" value="<?php echo htmlspecialchars($product_title); ?>" name="product_title" class="form-control" required>
        </div>
        <div class="form-outline w-50 m-auto mb-3">
            <label for="product_desc" class="form-label">Product Description</label>
            <input type="text" id="product_desc" value="<?php echo htmlspecialchars($product_description); ?>" name="product_desc" class="form-control" required>
        </div>
        <div class="form-outline w-50 m-auto mb-3">
            <label for="product_keywords" class="form-label">Product Keywords</label>
            <input type="text" id="product_keywords" value="<?php echo htmlspecialchars($product_keywords); ?>" name="product_keywords" class="form-control" required>
        </div>
        <div class="form-outline w-50 m-auto mb-3">
            <label for="product_category" class="form-label">Product Categories</label>
            <select name="product_category" class="form-select">
                <option value="<?php echo htmlspecialchars($category_id); ?>"><?php echo htmlspecialchars($category_title); ?></option>
                <?php
                $select_category_all = "SELECT * FROM `categories`";
                $result_category_all = mysqli_query($conn, $select_category_all);
                while ($row_category_all = mysqli_fetch_assoc($result_category_all)) {
                    $category_title = $row_category_all['category_title'];
                    $category_id = $row_category_all['category_id'];
                    echo "<option value='$category_id'>$category_title</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-outline w-50 m-auto mb-3">
            <label for="product_brands" class="form-label">Product Brands</label>
            <select name="product_brands" class="form-select">
                <option value="<?php echo htmlspecialchars($brand_id); ?>"><?php echo htmlspecialchars($brand_title); ?></option>
                <?php
                $select_brand_all = "SELECT * FROM `brands`";
                $result_brand_all = mysqli_query($conn, $select_brand_all);
                while ($row_brand_all = mysqli_fetch_assoc($result_brand_all)) {
                    $brand_title = $row_brand_all['brand_title'];
                    $brand_id = $row_brand_all['brand_id'];
                    echo "<option value='$brand_id'>$brand_title</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image1" class="form-label">Product Image1</label>
            <div class="d-flex">
                <input type="file" id="product_image1" name="product_image1" class="form-control w-90 m-auto">
                <img src="./product_images/<?php echo htmlspecialchars($product_image1); ?>" alt="" class="product_img">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image2" class="form-label">Product Image2</label>
            <div class="d-flex">
                <input type="file" id="product_image2" name="product_image2" class="form-control w-90 m-auto">
                <img src="./product_images/<?php echo htmlspecialchars($product_image2); ?>" alt="" class="product_img">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-3">
            <label for="product_price" class="form-label">Product Price</label>
            <input type="text" id="product_price" value="<?php echo htmlspecialchars($product_price); ?>" name="product_price" class="form-control" required>
        </div>
        <div class="text-center">
            <input type="submit" name="edit_product" value="Update Product" class="btn btn-info px-3 mb-3">
        </div>
    </form>
</div>

<?php
if(isset($_POST['edit_product'])){
    $product_title = mysqli_real_escape_string($conn, $_POST['product_title']);
    $product_desc = mysqli_real_escape_string($conn, $_POST['product_desc']);
    $product_keywords = mysqli_real_escape_string($conn, $_POST['product_keywords']);
    $product_category = intval($_POST['product_category']);
    $product_brands = intval($_POST['product_brands']);
    $product_price = mysqli_real_escape_string($conn, $_POST['product_price']);

    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];

    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];

    // Check if required fields are empty
    if($product_title == '' || $product_desc == '' || $product_keywords == '' || $product_category == '' || $product_brands == '' || $product_price == ''){
        echo "<script>alert('Fill all fields')</script>";
    } else {
        // Only move and update images if they are uploaded
        if($product_image1 != '') {
            move_uploaded_file($temp_image1, "./product_images/$product_image1");
        } else {
            $product_image1 = $row['product_image1'];
        }
        if($product_image2 != '') {
            move_uploaded_file($temp_image2, "./product_images/$product_image2");
        } else {
            $product_image2 = $row['product_image2'];
        }

        $update_product = "UPDATE `products` SET 
            product_title = '$product_title', 
            product_description = '$product_desc', 
            product_keywords = '$product_keywords', 
            category_id = '$product_category', 
            brand_id = '$product_brands', 
            product_image1 = '$product_image1', 
            product_image2 = '$product_image2', 
            product_price = '$product_price', 
            date = NOW() 
            WHERE product_id = $edit_id";

        $result_update = mysqli_query($conn, $update_product);
        if($result_update){
            echo "<script>alert('Product Updated')</script>";
            echo "<script>window.open('insert_product.php', '_self')</script>";
        }
    }
}
?>
