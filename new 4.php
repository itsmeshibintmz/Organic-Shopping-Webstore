<?php
session_start();

$mail=$_SESSION['alogin'];

$_SESSION['cart_total']=0;

$con=mysqli_connect("localhost","root","","db_dreams_project")or die ("Couldn't connect");
     
		
		
$viewprod="SELECT * FROM((tbl_seller_stock INNER JOIN tbl_seller_profile_brand ON tbl_seller_stock.seller_profile_brand_id = tbl_seller_profile_brand.seller_profile_brand_id) )INNER JOIN tbl_customer_cart ON tbl_customer_cart.stock_product_id=tbl_seller_stock.stock_product_id WHERE tbl_customer_cart.register_email='$mail' and tbl_seller_profile_brand.status='VALID' AND tbl_seller_stock.status='VALID'  ";

$d_seller_prod=mysqli_query($con,$viewprod);

$subtotal=0;

?>

<!DOCTYPE html>
<html>
<head>
<title>Dreams|Customer Home</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Grocery Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet" type="text/css" media="all" /> 
<!-- //font-awesome icons -->
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-back button disable -->


<style>
	
	
	
	.a_btn{
		
		background-color: #f44336;
  color: white;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
	}
	.errmessage
		{
			color:red;
			}
	</style>

</head>
	
<body>
<!-- header -->
	<div class="agileits_header">
		<div class="w3l_offers">
			<a href="customer_home.php">Dreams!</a>
		</div>
		<div class="w3l_search">
		<form action="search_prod_action.php" method="POST">
				<input type="text" name="product" id="product" placeholder="Search a product..." required>
				<input type="submit" name="search" id="search" value=" ">
			</form>
		</div>
	<div class="product_list_header">  
			
                <form action="view_cart.php" method="post" >
                <fieldset>
                   
                    <input type="submit" name="submit" value="View your cart" class="button" />
                </fieldset>
            </form>
            
		</div>
		
		<div class="w3l_header_right">
		
			<ul>
			
				<li class="dropdown profile_details_drop">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome &nbsp <?php echo $mail ?> &nbsp <i class="fa fa-user" aria-hidden="true"></i><span class="caret"></span></a>
						<div class="w3ls_vegetables">
							<ul class="dropdown-menu drp-mnu">
								<li><a href="customer_profile.php">View profile</a></li> 
								<li><a href="logout.php">Logout</a></li>
							</ul>
						</div>                  
					</div>
				</li>
			</ul>
			<!--	</div>  -->
			
		</div>
		<div class="clearfix"> </div>
	</div>
<!-- script-for sticky-nav -->
	<script>
	$(document).ready(function() {
		 var navoffeset=$(".agileits_header").offset().top;
		 $(window).scroll(function(){
			var scrollpos=$(window).scrollTop(); 
			if(scrollpos >=navoffeset){
				$(".agileits_header").addClass("fixed");
			}else{
				$(".agileits_header").removeClass("fixed");
			}
		 });
		 
	});
	</script>

<!-- //header -->
<!-- products-breadcrumb -->

<!-- //products-breadcrumb -->
<!-- banner -->
</br>
    </br>
	<div class="banner">
	
				<div class="w3l_banner_nav_left">
			<nav class="navbar nav_bottom">
			 <!-- Brand and toggle get grouped for better mobile display -->
			  <div class="navbar-header nav_2">
				  <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				
		
	</br>
    </br>
			   <!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
					<ul class="nav navbar-nav nav_1">
						<li><a href="customer_update_profile.php">Update Profile</a></li>
						<li><a href="customer_prod_view.php">Shop Now</a></li>
						
						<li><a href="customer_home.php">View Orders</a></li>
					
						<li><a href="customer_home.php">About us</a></li>
						<li><a href="customer_home.php">Contact us</a></li>
						
						</br>
						</br>
						
					</ul>
				 </div><!-- /.navbar-collapse -->
				 </div>
			</nav>
		</div>
		
<!-- login -->
	
		
		<div class="w3l_banner_nav_right">
<!-- about -->
		<div class="privacy about">
			<h3>Your<span>Cart</span></h3>
			
	      <div class="checkout-right">
					<h4>Your shopping cart contains:</h4>
					
				<table class="timetable_sub">
					<thead>
						<tr>
							<th>Brand Name</th>	
							<th>Product</th>
							
							<th>Product Name</th>
						<th>Quantity</th>
							<th>Total Price</th>
							<th>Remove</th>
						</tr>
					</thead>
					<tbody>
					
						<?php 
			while ($prod=mysqli_fetch_array($d_seller_prod))
					{

						
						?>
					<tr class="rem1">
						<td class="invert"><?php echo $prod['brand_name'] ?> </td>
						<td class="invert-image"><a href="view_cart.php"><img src="seller/uploads/products/<?php echo $prod['img1'] ?>" alt="image" class="img-responsive"></a></td>
						
						<td class="invert"><?php echo $prod['product_name'] ?></td>
						<td class="invert">
							 <div class="quantity"> 
							 <form action="update_cart_qty.php" method="POST" > 
								<div class="quantity-select">                           
									
									<div class="entry value" style="background-color:white;border:none">
									<input type="text" value="<?php echo $prod['item_price'] ?>" name="item_price" id="item_price" hidden>
									<input type="text" value="<?php echo $prod['customer_cart_item_id'] ?>" name="item_id" id="item_id" hidden>
									<input  type="number" name="qty" id="qty" min="1" max="<?php echo $prod['stock_item_count'] ?>" style="width: 3em;" value="<?php echo $prod['quantity'] ?>"    required="required"/></div>
									
									<div ><input type="submit" name="add_qty" id="add_qty"  style="background-color:green;border:none; color:white; display: inline-block" Value="Update" ></div>
								</div>
								</form>
							
						
							
							</div>
						</td>
						<td class="invert">Rs.<?php echo $prod['total_price'] ?></td>
						<td class="invert">
							<div class="rem">
								<div class="close1">
								<form action="delete_cart_item.php" method="POST" >
								<input type="text" value="<?php echo $prod['customer_cart_item_id'] ?>" name="item_id" id="item_id" hidden>
								<input type="submit" name="delete_item" id="delete_item" class="btn btn-danger btn-sm" value="" style="background-color: Transparent;border:none">
								</form>
								</div>
							</div>

						</td>
					</tr>
				
					<?php } ?>
					
					
					
				</tbody>
				
				
				</table>
			</div>
			<div class="checkout-left">	
				<div class="col-md-4 checkout-left-basket">
					<h4><a href="checkout_prod.php"> Proceed to Buy</a></h4>
					<ul>
								<?php 
								
										
$viewprice="SELECT * FROM((tbl_seller_stock INNER JOIN tbl_seller_profile_brand ON tbl_seller_stock.seller_profile_brand_id = tbl_seller_profile_brand.seller_profile_brand_id) )INNER JOIN tbl_customer_cart ON tbl_customer_cart.stock_product_id=tbl_seller_stock.stock_product_id WHERE tbl_customer_cart.register_email='$mail' and tbl_seller_profile_brand.status='VALID' AND tbl_seller_stock.status='VALID'  ";

$d_cart_prod=mysqli_query($con,$viewprice);

$subtotal=0;
						$i=1;			
			while ($prod1=mysqli_fetch_array($d_cart_prod))
					{
					
						
						?>
						<li><?php echo $prod1['product_name'] ?> <i>:</i> <span>Rs.<?php $subtotal=$subtotal+$prod1['total_price'];
						echo $prod1['total_price'] ?></span></li>
					<?php  $i=$i+1; }  ?>
						
						<li>Cart Total <i>:</i> <span>Rs.<?php
						echo $subtotal;
						$_SESSION['cart_total']=$subtotal;
						
						?></span></li>
						
					</ul>
					
				</div>
				<div class="col-md-8 address_form_agile">
				
					</div>
			
				<div class="clearfix"> </div>
				
			</div>

		</div>
<!-- //about -->

	
</div>

				<div class="clearfix"> </div>
			</div>
			
<!-- banner -->
		</div>
	</div>
<!-- //top-brands -->
<!-- fresh-vegetables -->
	<div class="fresh-vegetables">
	
	</div>
<!-- //fresh-vegetables -->
<!-- newsletter -->
	<!--
	<div class="newsletter">
		<div class="container">
			<div class="w3agile_newsletter_left">
				<h3>sign up for our newsletter</h3>
			</div>
			<div class="w3agile_newsletter_right">
				<form action="#" method="post">
					<input type="email" name="Email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
					<input type="submit" value="subscribe now">
				</form>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	-->
<!-- //newsletter -->
<!-- footer -->
	<div class="footer">
		<div class="container">
			<div class="col-md-3 w3_footer_grid">
				<h3>information</h3>
				<ul class="w3_footer_grid_list">
					
					<li><a href="customer_home.php">About Us</a></li>
					<li><a href="customer_home.php">Contact us</a></li>
				</ul>
			</div>
			<div class="col-md-3 w3_footer_grid">
				<h3>policy info</h3>
				<ul class="w3_footer_grid_list">
					<li><a href="customer_home.php">FAQ</a></li>
					<li><a href="customer_home.php">privacy policy</a></li>
					<li><a href="customer_home.php">terms of use</a></li>
				</ul>
			</div>
			<div class="col-md-3 w3_footer_grid">
				<h3>what in stores</h3>
				<ul class="w3_footer_grid_list">
						<li><a href="customer_home.php">Jewellery</a></li>
						<li><a href="customer_home.php">Gift cards</a></li>
						<li><a href="customer_home.php">Teddys and Toys</a></li>
						<li><a href="customer_home.php">Paintings</a></li>
						<li><a href="customer_home.php">Handy crafts</a></li>
				</ul>
			</div>
			
			<!--<div class="col-md-3 w3_footer_grid">
				<h3>twitter posts</h3>
				<ul class="w3_footer_grid_list1">
					<li><label class="fa fa-twitter" aria-hidden="true"></label><i>01 day ago</i><span>Non numquam <a href="#">http://sd.ds/13jklf#</a>
						eius modi tempora incidunt ut labore et
						<a href="#">http://sd.ds/1389kjklf#</a>quo nulla.</span></li>
					<li><label class="fa fa-twitter" aria-hidden="true"></label><i>02 day ago</i><span>Con numquam <a href="#">http://fd.uf/56hfg#</a>
						eius modi tempora incidunt ut labore et
						<a href="#">http://fd.uf/56hfg#</a>quo nulla.</span></li>
				</ul>
			</div>
			-->
			<div class="clearfix"> </div>
			<div class="agile_footer_grids">
				<div class="col-md-3 w3_footer_grid agile_footer_grids_w3_footer">
					<div class="w3_footer_grid_bottom">
						<h4>100% secure payments</h4>
						<img src="images/card.png" alt=" " class="img-responsive" />
					</div>
				</div>
				<div class="col-md-3 w3_footer_grid agile_footer_grids_w3_footer">
					<div class="w3_footer_grid_bottom">
						<h5>connect with us</h5>
						<ul class="agileits_social_icons">
							<li><a href="#" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
							<li><a href="#" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
							<li><a href="#" class="google"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
							<li><a href="#" class="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
							<li><a href="#" class="dribbble"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="wthree_footer_copy">
				<p>© All rights reserved | Design by <a href="customer_home.php">Dreams online</a></p>
			</div>
		</div>
	</div>
<!-- //footer -->
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
    );
});
</script>
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->
<script src="js/minicart.js"></script>
<script>
		paypal.minicart.render();

		paypal.minicart.cart.on('checkout', function (evt) {
			var items = this.items(),
				len = items.length,
				total = 0,
				i;

			// Count the number of each item in the cart
			for (i = 0; i < len; i++) {
				total += items[i].get('quantity');
			}

			if (total < 3) {
				alert('The minimum order quantity is 3. Please add more to your shopping cart before checking out');
				evt.preventDefault();
			}
		});

	</script>
</body>
</html>
