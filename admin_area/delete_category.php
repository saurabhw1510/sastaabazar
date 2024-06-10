<?php
if(isset($_GET['delete_category'])){
    $delete_id=$_GET['delete_category'];
    

    $delete_query="Delete from `categories` where category_id=$delete_id";
    $result_category=mysqli_query($conn,$delete_query);
    if($result_category){
        echo "<script>alert('Catgeory deleted successfully')</script>";
        echo "<script>window.open('./index.php','_self')</script>";
    }
}

?>