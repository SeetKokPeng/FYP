<?php
$connect = mysqli_connect("localhost", "root", "", "admin site");
if(isset($_GET["confirmbtn"]))
{
	$Yourname=$_GET["Your_name"];
	$Cvv=$_GET["Cvv"];
	$Cardnumber=$_GET["Card_number"];
	$Month=$_GET["months"];
	$Years=$_GET["years"];

	$connect=mysqli_query($connect,"INSERT INTO transaction(your_name,user_cvv,card_number,card_month,card_year) VALUES('$Yourname','$Cvv','$Cardnumber','$Month','$Years')");
	
}
?>
<!DOCTYPE html>
<html lang="en">
<head>  
    <title>Payment Method</title>
    <link rel="stylesheet" href="Payment.css">
</head>
<?php
	if(isset($_GET["view_product"]))
	{
		$product_id=$_GET["id"];
		$single_product=mysqli_query($connect,"SELECT * FROM product WHERE product_id='$product_id'" );
		$row=mysqli_fetch_assoc($single_product);
		$product_list=mysqli_query($connect ,"SELECT * FROM product WHERE product_isDelete=0");
		
	}

?>
<body>
<form name="user_form" method="GET" action="" >
    <div class="container">
        <h1>Make Payment</h1>
		<div>Please enter you card details:</div>
       <div class="first-row">
            <div class="owner">
                <h3>Full Name</h3>
                <div class="input-field">
                    <input type="text" name="Your_name">
                </div>
            </div>
            <div class="cvv">
                <h3>CVV</h3>
                <div class="input-field">
                    <input type="password" name="Cvv">
                </div>
            </div>
        </div>
        <div class="second-row">
            <div class="card-number">
                <h3>Card Number</h3>
                <div class="input-field">
                    <input type="text"name="Card_number">
                </div>
            </div>
        </div>
        <div class="third-row">
            <h3>Card Number</h3>
            <div class="selection">
                <div class="date">
                    <select name="months" id="Months">
                        <option value="Jan">Jan</option>
                        <option value="Feb">Feb</option>
                        <option value="Mar">Mar</option>
                        <option value="Apr">Apr</option>
                        <option value="May">May</option>
                        <option value="Jun">Jun</option>
                        <option value="Jul">Jul</option>
                        <option value="Aug">Aug</option>
                        <option value="Sep">Sep</option>
                        <option value="Oct">Oct</option>
                        <option value="Nov">Nov</option>
                        <option value="Dec">Dec</option>
                      </select>
                      <select name="years" id="Years">
                        <option value="2020">2020</option>
                        <option value="2019">2019</option>
                        <option value="2018">2018</option>
                        <option value="2017">2017</option>
                        <option value="2016">2016</option>
                        <option value="2015">2015</option>
                      </select>
                </div>
                <div class="cards">
                    <img src="mc.png" alt="">
                    <img src="vi.png" alt="">
                    <img src="pp.png" alt="">
                </div>
            </div>   
		</div>
        <div>
        <input type="submit" name="confirmbtn" value="Confirm" id="confirm_btn">
		</div>

<h3>Order Details</h3>
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr>
						<th width="40%">Item Name</th>
						<th width="10%">Quantity</th>
						<th width="20%">Price</th>
						<th width="15%">Total</th>
						<th width="5%">Action</th>
					</tr>
					<?php
					if(!empty($_SESSION["shopping_cart"]))
					{
						$total = 0;
						foreach($_SESSION["shopping_cart"] as $keys => $values)
						{
					?>
					<tr>
						<td><?php echo $values["item_name"]; ?></td>
						<td><?php echo $values["item_quantity"]; ?></td>
						<td>$ <?php echo $values["item_price"]; ?></td>
						<td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
						<td><a href="index.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
					</tr>
					<?php
							$total = $total + ($values["item_quantity"] * $values["item_price"]);
						}
					?>
					<tr>
						<td colspan="3" align="right">Total</td>
						<td align="right">$ <?php echo number_format($total, 2); ?></td>
						<td></td>
					</tr>
					<?php
					}
					?>
						
				</table>
			</div>
</form>
</body>
</html>