<?php
include '../includes/connect.php';
if(isset($_POST['insert_product'])){
  
  $product_title=$_POST['product_title'];
  $product_desciption=$_POST['product_desciption'];
  $product_keywords=$_POST['product_keywords'];
  $product_category=$_POST['product_category'];
  $product_brand=$_POST['product_brand'];
  $product_price=$_POST['product_price'];
  $product_status="true";


  $product_image1=$_FILES['product_image1']['name'];
  $product_image2=$_FILES['product_image2']['name'];
  


  $temp_image1=$_FILES['product_image1']['tmp_name'];
  $temp_image2=$_FILES['product_image2']['tmp_name'];
 

  if($product_title=='' or $product_desciption=='' or $product_keywords=='' or $product_category=='' or $product_brand=='' or $product_price='' or $product_image1=='' or $product_image2==''){
    echo "<script>alert('Please fill all the avaible fields')</script>";
    exit();
  }else{
     move_uploaded_file($temp_image1,"./product_images/$product_image1");
     move_uploaded_file($temp_image2,"./product_images/$product_image2");
    //  move_uploaded_file($temp_image3,"./product_images/$product_image3");

     $insert_products="insert into `products`(product_title,product_description,product_keywords,category_id,brand_id,product_image1,product_image2,product_price,date,status) values ('$product_title','$product_desciption','$product_keywords','$product_category','$product_brand','$product_image1','$product_image2','$product_price',NOW(),'$product_status')";

     $result_query=mysqli_query($conn,$insert_products);
     if($result_query){
      echo "<script>alert('Product succcessfully added')</script>";
     }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Insert Products-Admin Dashboard</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous" />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"></script>
    <link href="../assets/css/admin.css" rel="stylesheet" />
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
      rel="stylesheet" />
  </head>
  <body class="bg-light">
    <div class="container">
      <h1 class="text-center my-4">Insert Products</h1>
      <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline mb-4 w-50 m-auto">
          <label for="product_title" class="form-label">Product Title</label>
          <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter Product Title" autocomplete="off" required>  
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
          <label for="product_desciption" class="form-label">Product Description</label>
          <input type="text" name="product_desciption" id="product_desciption" class="form-control" placeholder="Enter Product Description" autocomplete="off" required>  
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
          <label for="product_keywords" class="form-label">Keywords</label>
          <input type="text" name="product_keywords" id="product_keywords" class="form-control" placeholder="Enter keywords" autocomplete="off" required>  
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
          <select name="product_category" id="" class="form-select">
            <option value="">Select a Category</option>
            <?php
            $select_query="Select * from `categories`";
            $result_query=mysqli_query($conn,$select_query);
            while($row=mysqli_fetch_assoc($result_query)){
              $cate_tit=$row['category_title'];
              $cate_id=$row['category_id'];
              echo  "<option value='$cate_id'>$cate_tit</option>";
            }
            ?>
          </select>
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
          <select name="product_brand" id="" class="form-select">
            <option value="">Select a Brand</option>
            <?php
            $select_query="Select * from `brands`";
            $result_query=mysqli_query($conn,$select_query);
            while($row=mysqli_fetch_assoc($result_query)){
              $brand_tit=$row['brand_title'];
              $brand_id=$row['brand_id'];
              echo  "<option value='$brand_id'>$brand_tit</option>";
            }
            ?>
          </select>
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
          <label for="product_image1" class="form-label">Product Image 1</label>
          <input type="file" name="product_image1" id="product_image1" class="form-control" required>  
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
          <label for="product_image2" class="form-label">Product Image 2</label>
          <input type="file" name="product_image2" id="product_image2" class="form-control" required>  
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
          <label for="product_price" class="form-label">Product Price</label>
          <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter Product Price" autocomplete="off" required>  
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
          <input type="submit" name="insert_product"  class="btn btn-info mb-3 px-3" value="Insert Products"  >  
        </div>
      </form>
    </div>
  </body>
</html>
