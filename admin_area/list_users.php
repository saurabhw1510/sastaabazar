<h3 class="text-center text-success">All Users</h3>
    <table class="table table-bordered text-center mt-3 mb-3">
        <thead class="bg-info">

        <?php
        $get_user="Select * from `user_table`";
        $result=mysqli_query($conn,$get_user);
        $row_count=mysqli_num_rows($result);
        echo "<tr>
        <th>Sr no.</th>
        <th>Username</th>
        <th>User email</th>
        <th>User image</th>
        <th>User address</th>
        <th>User mobile</th>
        <th>Delete</th>
    </tr>
</thead>
<tbody class='bg-secondary'>";

if($row_count==0){
    echo "<h2 class='bg-danger text-center>No user yet</h2>";
}
else{
    $number=0;
    while($row_data=mysqli_fetch_assoc($result)){
        $user_id=$row_data['user_id'];
        $username=$row_data['username'];
        $user_email=$row_data['user_email'];
        $user_image=$row_data['user_image'];
        $user_address=$row_data['user_address'];
        $user_mobile=$row_data['user_mobile'];
        $number++;
        echo " <tr>
        <td>$number</td>
        <td>$username</td>
        <td>$user_email</td>
        <td><img src='../users_area/user_images/$user_image' width=100 height=100></td>
        <td>$user_address</td>
        <td>$user_mobile</td>
        <td><a href=''class='text-dark'><i class='fa-solid fa-trash'></i></a></td>
    </tr>";
    }
}
        ?>
            
           
        </tbody>
    </table>
