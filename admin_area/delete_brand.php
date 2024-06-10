<?php
if(isset($_GET['delete_brand'])){
    $delete_id=$_GET['delete_brand'];
    

    $delete_query="Delete from `brands` where brand_id=$delete_id";
    $result_brand=mysqli_query($conn,$delete_query);
    if($result_brand){
        echo "<script>alert('Brand deleted successfully')</script>";
        echo "<script>window.open('./index.php','_self')</script>";
    }
}

?>