<?php
if(isset($_GET['edit_brand'])){
   $edit_brand=$_GET['edit_brand'];
   
   $get_brand="Select * from `brands` where brand_id=$edit_brand";
   $result=mysqli_query($conn,$get_brand);
   $row=mysqli_fetch_assoc($result);
   $brand_title=$row['brand_title'];
}

if(isset($_POST['edit_brand'])){
    $brand_title=$_POST['brand_title'];
    $update_query="Update `brands` set brand_title='$brand_title' where brand_id='$edit_brand'";
    $result_brand=mysqli_query($conn,$update_query);
    if($result_brand){
        echo "<script>alert('Brand is been updated')</script>";
        echo "<script>window.open('./index.php?view_brands.php','_self')</script>";
    }
}
?>


<div class="container mt-3">
    <h1 class="text-center">Edit Brands</h1>
    <form action="" method="post" class="text-center">
        <div class="form-outline mt-4 mb-4 w-50 m-auto">
            <label for="brand_title" class="form-label">Brand Title</label>
            <input type="text" name="brand_title" id="brand_title" class="form_control" value='<?php echo $brand_title;?>'>
        </div>
        <input type="submit" value="Update brand" class="btn btn-info px-3" name="edit_brand">
    </form>
</div>