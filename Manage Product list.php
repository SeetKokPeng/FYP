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
    
    <title>Manage Product List</title>
</head>
<?php
   $product_list=mysqli_query($connect ,"SELECT * FROM manage_order_list");

?>
<body>
<h1>View Product List</h1>
    <div class="outer-wrapper">
    <div class="table-wrapper">
    <table id="emp-table">
        <head>
            <th col-index = 1>No</th>
            <th col-index = 2>Product Name
            </th>
            <th col-index = 3>Product Category
            </th>
			<th col-index = 4>Product price
            </th>
			<th col-index = 5>Product stock
            </th>
            <th col-index = 6>Product sold
            </th>
            <th col-index = 7>Status
            </th>
			<th id="select"> Select
			</th>
            
        </head>
        <body>
		<?php
	
		while($row=mysqli_fetch_assoc($product_list))
		{
		?>
            <tr>
                <td><?php echo $row["Product_id"];?></td>
                <td><?php echo $row["Product_name"];?></td>
                <td><?php echo $row["Product_category"];?></td>
                <td>RM<?php echo $row["Product_price"];?></td>
				<td><?php echo $row["Product_stock"];?></td>
                <td><?php echo $row["Product_sold"];?></td>
				<td><?php echo $row["Product_status"];?></td>
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