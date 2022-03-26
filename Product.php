<?php
include("dataconnection.php");

if(isset($_POST['addtocart']))
{
  $product_name = $_POST['product_name'];
  $product_price =$_POST['product_price'];
  $product_image =$_POST['product_image'];
  $product_quantity = 1;

$select_cart=mysqli_query($connect,"SELECT * FROM cart WHERE product_name = '$product_name'");
echo mysqli_num_rows($select_cart);
		if(mysqli_num_rows($select_cart)>0)
		{
		$message[]='product already added to cart';
		}
		else
		{
			$insert_product = mysqli_query($connect,"INSERT INTO cart
			(product_name,product_price,product_quantity) VALUES
			('$product_name',$product_price,$product_quantity)");
			$message[] ='product added to cart succesful!';
			echo mysqli_error($connect);
		}
}		
?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


    <title>Electronic Gadget Store</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/tooplate-main.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/flex-slider.css">
	
	<!--Font style from google-->
	<link href="https://fonts.googleapis.com/css2?family=Aguafina+Script&family=Alex+Brush&family=Architects+Daughter&family=Birthstone&family=Birthstone+Bounce&family=Roboto&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100&family=Roboto&display=swap" rel="stylesheet">
	
	

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
  <?php
    if(isset($message))
	{
		foreach($message as $message)
		{
			echo '<div class="message"><span>'.$message.'</span><i class="fas fa-times" onclick="this.
			parentElement.style.display = `none`;"></i></div>';	
		};
	};
	?>
    <!-- Pre Header -->
    <div id="pre-header">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <span>Official Webside Electronic Gadget Store</span>
          </div>
        </div>
      </div>
    </div>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
      <div class="container">
       <a class="navbar-brand" href="#"><p style="font-family: 'Birthstone', cursive; color:darkslategray; font-size:3.25em;">Electronic Gadget Store</p></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
               <a class="nav-link" href="index_logged_in.html">Home</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="Product list.php">Products
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.html">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.html">Contact Us</a>
            </li>
			<li class="nav-item">
			  <a href="Shopping Cart.html" > <i class="fas fa-shopping-cart" title="Shopping Cart" ></i> </a>
			  </li>
			  
			  <li class="nav-item">
			  <div class="dropdown">
			  <button class="dropbtn">
			  <a href="#.html" > <i class="far fa-user" title="User Account"></i> </a>
			  </button>
			  <div class="dropdown-content">
			   <a class="nav-link" href="user edit.html">My Account</a> 
              <a class="nav-link" href="login_form.html">Logout</a>
				</div>
			  
			  </div>
			  </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <!-- Single Starts Here -->
	<form action="" method="POST">
	 <div class="single-product">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <div class="line-dec"></div>
              <h1><?php echo $row["product_name"];?></h1>
            </div>
          </div>
          <div class="col-md-6">
            <div class="product-slider">
              <div id="slider" class="flexslider">
                <ul class="slides">
                  <li>
                    <input type="hidden" name="product_image" value='<?php echo $row["product_image"]?>'><?php echo "<img style='width:100%; height:55%; float:left; margin-right:10px;' src='assets/images/".$row['product_image']."' >";  ?>
				</li>
                  <!-- items mirrored twice, total of 12 -->
                </ul>
              </div>
         
            </div>
          </div>
          <div class="col-md-6">
            <div class="right-content">
              <h4><input type="hidden" name="product_name" value='<?php echo $row["product_name"]?>'><?php echo $row["product_name"];?></h4>
              <h6><input type="hidden" name="product_price" value='<?php echo $row["product_price"]?>'>Price  :  RM<?php echo $row["product_price"];?></h6>
			  <h6>Brand  :  <?php echo $row["product_brand"];?></h6>
			  <h6>Availability	In Stock</h6>
			  <span><?php echo $row["prorduct_qty"];?> left on stock</span>
			  <br>Description<br>
              <p><?php echo $row["product_description"];?> </p>
                <input type="submit" class="button" name="addtocart" value="Add to cart"onclick="payment()">
    </form>
              <div class="down-content">
                <div class="share">
                  <h6>Share: <span><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-linkedin"></i></a><a href="#"><i class="fa fa-twitter"></i></a></span></h6>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Single Page Ends Here -->


    <!-- Similar Starts Here -->
   <div class="featured-items">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <div class="line-dec"></div>
              <h1>You May Also Like</h1>
            </div>
          </div>
          <div class="col-md-12">
            <div class="owl-carousel owl-theme">
			<?php
	
			while($row=mysqli_fetch_assoc($product_list))
			{
			?>
              <a href="Product.php?view_product&id=<?php echo $row["product_id"];?>">
                <div class="featured-item">
                <?php echo "<img style='width:100%; height:55%; float:left; margin-right:10px;' src='assets/images/".$row['product_image']."' >";  ?>
                  <h4><?php echo $row["product_name"]; ?></h4>
                  <h6>RM<?php echo $row["product_price"];?></h6>
                </div>
              </a>
			  <?php
			}
			?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Similar Ends Here -->


 <!-- Subscribe Form Starts Here -->
    <div class="subscribe-form">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <div class="line-dec"></div>
              <h1>Subscribe on Electronic Gadget Store now!</h1>
            </div>
          </div>
          <div class="col-md-8 offset-md-2">
            <div class="main-content">
              <p>Subscribe us now! We will notify you when our newest arrived product and we will giveaway the reward up to 45% discount ! </p>
              <div class="container">
                <form id="subscribe" action="" method="get">
                  <div class="row">
                    <div class="col-md-7">
                      <fieldset>
                        <input name="email" type="text" class="form-control" id="email" 
                        onfocus="if(this.value == 'Your Email...') { this.value = ''; }" 
                    	onBlur="if(this.value == '') { this.value = 'Your Email...';}"
                    	value="Your Email..." required="">
                      </fieldset>
                    </div>
                    <div class="col-md-5">
                      <fieldset>
                        <button type="submit" id="form-submit" class="button">Subscribe Now!</button>
                      </fieldset>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Subscribe Form Ends Here -->


    
    <!-- Footer Starts Here -->
    <div class="footer">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
          </div>
          <div class="col-md-12">
            <div class="footer-menu">
              <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Help</a></li>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">How It Works ?</a></li>
                <li><a href="#">Contact Us</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-12">
            <div class="social-icons">
              <ul>
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa fa-rss"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Footer Ends Here -->


    <!-- Sub Footer Starts Here -->
    <div class="sub-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="copyright-text">
              <p>Copyright &copy; 2021 Electronic Gadget Store(MLK) SDN.BHD. 
                
          
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Sub Footer Ends Here -->


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/flex-slider.js"></script>


    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>


  </body>

</html>
