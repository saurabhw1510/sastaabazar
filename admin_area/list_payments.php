<h3 class="text-center text-success">All Payments</h3>
    <table class="table table-bordered mt-3 mb-3">
        <thead class="bg-info">

        <?php
        $get_payments="Select * from `user_payments`";
        $result=mysqli_query($conn,$get_payments);
        $row_count=mysqli_num_rows($result);
        echo "<tr>
        <th>Sr no.</th>
        <th>Invoice Number</th>
        <th>Amount</th>
        <th>Payment Mode</th>
        <th>Order date</th>
        <th>Delete</th>
    </tr>
</thead>
<tbody class='bg-secondary'>";

if($row_count==0){
    echo "<h2 class='bg-danger text-center>No payments yet</h2>";
}
else{
    $number=0;
    while($row_data=mysqli_fetch_assoc($result)){
        $order_id=$row_data['order_id'];
        $payment_id=$row_data['payment_id'];
        $amount=$row_data['amount'];
        $invoice_number=$row_data['invoice_number'];
        $payment_mode=$row_data['payment_mode'];
        $date=$row_data['date'];
        $number++;
        echo " <tr>
        <td>$number</td>
        <td>$invoice_number</td>
        <td>$amount</td>
        <td>$payment_mode</td>
        <td>$date</td>
        <td><a href=''class='text-dark'><i class='fa-solid fa-trash'></i></a></td>
    </tr>";
    }
}
        ?>
            
           
        </tbody>
    </table>
