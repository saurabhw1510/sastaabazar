<?php
include '../includes/connect.php';
if (isset($_POST['insert_cat'])) {
    $category_title = $_POST['cat_title'];

    $select_query = "Select * from `categories` where category_title='$category_title'";
    $result_select = mysqli_query($conn, $select_query);
    $number = mysqli_num_rows($result_select);
    if ($number > 0) {
        echo "<script>alert('Already Present')</script>";
    } else {
        $insert_query = "insert into `categories` (category_title) values ('$category_title')";
        $result = mysqli_query($conn, $insert_query);
        if ($result) {
            echo "<script>alert('Category Added')</script>";
        }
    }
}
?>
<h2 class="text-center my-3">Insert Categories</h2>
<form action="" method="post" class="mb-2">
  <div class="input-group w-90 mb-3">
    <span class="input-group-text bg-info" id="basic-addon1"
      ><i class="fa-solid fa-receipt"></i
    ></span>
    <input
      type="text"
      class="form-control"
      name="cat_title"
      placeholder="Insert Categories"
      aria-label="Categories"
      aria-describedby="basic-addon1" />
  </div>

  <div class="input-group w-10 mb-3">
    <input type="submit" class="bg-info border-0 p-2" name="insert_cat" value="Insert Categories">
  </div>
</form>
