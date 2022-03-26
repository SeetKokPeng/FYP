<?php
include("dataconnection.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="view_product_list.css">
    
 
    <title>Manage order List</title>
</head>
<?php
   $order_list=mysqli_query($connect ,"SELECT * FROM manage_product_list");

?>
<body>
<h1>View Order Detail</h1>
    <div class="outer-wrapper">
    <div class="table-wrapper">
    <table id="emp-table">
        <head>
            <th col-index = 1>No</th>
            <th col-index = 2>Order Number
            </th>
            <th col-index = 3>Customer ID
            </th>
			<th col-index = 4>Product Name
            </th>
			<th col-index = 5>Quantity
            </th>
            <th col-index = 6>Unit Price(RM)
            </th>
            <th col-index = 7>Payment Method
            </th>
			<th col-index = 8>Total (included shipping fee)
            </th>
			<th col-index = 9>Customer Address
            </th>
			<th col-index = 10>Order Date 
            </th>
			<th col-index = 11>Status 
            </th>
			<th col-index = 12>Shippinh option 
            </th>
			<th col-index = 13>tracking  
            </th>
			<th col-index = 14>Select 
            </th>
            
        </head>
        <body>
		<?php
	
		while($row=mysqli_fetch_assoc($order_list))
		{
		?>
            <tr>
                <td><?php echo $row["order_id"];?></td>
				<td><?php echo $row["order_number"];?></td>
				<td><?php echo $row["customer_id"];?></td>
                <td><?php echo $row["order_product_name"];?></td>
                <td><?php echo $row["order_quantity"];?></td>
                <td><?php echo $row["order_unit_price"];?></td>
				<td><?php echo $row["order_payment_method"];?></td>
                <td><?php echo $row["order_Total"];?></td>
				<td><?php echo $row["order_Customer"];?></td>
				<td><?php echo $row["order_Date"];?></td>
				<td><?php echo $row["order_Status"];?></td>
				<td><?php echo $row["order_Shippinh_option"];?></td>
				<td><?php echo $row["order_tracking"];?></td>
				<td id="select"> <input type="checkbox" name="select" value="del_1"> </td>
				
            </tr>
		<?php
		}
		?>
        </body>
    </table>
</div>
<a href="">Update</a>
<a href="">Delete</a>
<a href="">Add Order</a>
</div>

</body>

</html>