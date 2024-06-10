<?php
include('../includes/connect.php');
include('../functions/commom_function.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="../assets/css/admin.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <style>
        body{
            overflow:hidden;
        }
    </style>
</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">
            Admin Registration
        </h2>
        <div class="row d-flex justify-content-center a">
            <div class="col-lg-6 col-xl-5">
                <img src="../assets/images/login.jpg">
            </div>
            <div class="col-lg-6 col-xl-5">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" id="usename" name="username" placeholder="Enter your username" required="required" class="form-control">
    </div>
                    <div class="form-outline mb-4">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required="required" class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required="required" class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                    <label for="confirm_password" class="form-label">Confirm Password</label>
                    <input type="password" id="confirm_password" name="confirm_password" placeholder="Enter your password" required="required" class="form-control">
                    </div>
                    <div>
                        <input type="submit" class="bg-info py-2 px-3 border-0" name="admin_registration" value="Register">
                        <p class="small fw-bold mt-2 pt-1">Do you have an account?<a href="admin_login.php" class="link-danger">Login</a></p>
                    </div>
                </form>
            </div>

        </div>
    </div>
</body>
</html>
<?php
if(isset($_POST['admin_registration'])){
    $admin_username=$_POST['username'];
    $admin_email=$_POST['email'];
    $admin_password=$_POST['password'];
    $admin_hash_password=password_hash($admin_password,PASSWORD_DEFAULT);
    $admin_confirm_password=$_POST['confirm_password'];
    $user_ip=getIPAddress() ;

    $select_query="Select * from `admin_table` where  admin_email='$admin_email'";
    $result=mysqli_query($conn,$select_query);
    $row_count=mysqli_num_rows($result);
    if($row_count>0){
        echo "<script>alert('Username or Email already exists')</script>";
    }
    else if($admin_password!=$admin_confirm_password){
        echo "<script>alert('Passwords doesnot match')</script>";
    }else{
    $insert_query="insert into `admin_table` (admin_name,admin_email,admin_password) values ('$admin_username','$admin_email','$admin_hash_password')";
    $sql_execute=mysqli_query($conn,$insert_query);
    
}

}
?>