<?php
session_start();
if(isset($_SESSION['alogin'])){
	$mail=$_SESSION['alogin'];
	//$pid=$_SESSION['pid'];
	//$pname=$_SESSION['name'];
	//$rid=$_SESSION['rid'];	


	$con=mysqli_connect("localhost","root","","organic_shop_db")or die ("Couldnt connect");
		$disp_complaints="SELECT * FROM tbl_complaints,tbl_product,tbl_registration where tbl_complaints.stock_product_id=tbl_product.pid and tbl_complaints.email='$mail'and tbl_product.rid=tbl_registration.rid ";
				
	
$d_complaints=mysqli_query($con,$disp_complaints);

?>
<!DOCTYPE html>
<html>
<head>
<title>organicshoppi| view products</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!--theme-style-->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />	
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--fonts-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<!--//fonts-->
<script src="js/jquery.min.js"></script>


<!--script-->
<style> 
								.imagesize { 
									width:60%; 
									height:150%; 
									max-width:60%; 
									max-height:150%; 
								} 
								.img1 { 
									width:150%; 
									height:60%; 
									max-width:150%;
									max-height:60%; 
								} 
							</style> 
							
							<!-- STYLE FOR SEARCH  PRODUCT -->

							<style>

							.w3l_search{
								float: left;
								width: 57%;
								margin:.1em 0 0em 10em;
							}
							.w3l_search input[type="text"]{
								outline: none;
								padding: 10px;
								color: #212121;
								font-size: 14px;
								width: 85%;
								background: #fff;
								border: 1px solid #999;
								float: left;
							}
							.w3l_search input[type="submit"]{
								outline: none;
								padding: 10px 0 9px;
								width: 15%;
								border: 1px solid;
								position: relative;
								background: #FA1818;
							}
							.w3l_search input[type="submit"]:hover{
								background: url(img-sp.png) no-repeat 14px 5px #84C639;
							}
							</style>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
<style>

button
{

  background-color:#fff;
  border:none;
  cursor:pointer;
}

button:hover
{

  background-color:#fff;
  border:none;
  cursor:pointer;
  color:green;
}

#pdfdiv
{
color:green;
}
</style>

   <script type="text/javascript" src="jspdf.min.js"></script>
  
 <script type="text/javascript" src="jquery-git.js"></script>
    
  <style type="text/css">
    
  </style>

  <title></title>

<script type='text/javascript'>//<![CDATA[
$(window).on('load', function() {
var doc = new jsPDF();
var specialElementHandlers = {
    '#editor': function (element, renderer) {
        return true;
    }
};

$('#pdfview').click(function () {
    doc.fromHTML($('#pdfdiv').html(), 15, 15, {
        'width': 700,
            'elementHandlers': specialElementHandlers
    });
    doc.save('file.pdf');
});
});//]]> 

</script>

</head>

<body>
<div class="header">
		<div class="top-header">
			<div class="container">
				<div class="top-header-left">
					<ul class="support">
						<li><a href="#"><label> </label></a></li>
						<li><a href="#">24x7 live<span class="live"> support</span></a></li>
					</ul>
					<ul class="support">
						<li class="van"><a href="#"><label> </label></a></li>
						<li><a href="#"> <span class="live"></span></a></li>
					</ul>
					<div class="clearfix"> </div>
				</div>
				<div class="top-header-right">
					
					 </div>
					<div class="clearfix"> </div>	
				</div>
				<div class="clearfix"> </div>		
			</div>
		</div>
		<div class="bottom-header">
			<div class="container">
				<div class="header-bottom-left">
					<div class="logo">
						<font size="4"><strong><i> <b><p style="color:red;">ORGANICSHOPPING </p> </b></i></strong></font>
					</div>
					
					<div class="w3l_search" style="margin-top:5px;margin-left:250px">
									<form action="search_prod_action.php" method="POST">
										<input type="text" name="product" id="product" placeholder="Search a product..." required>
										<input type="submit" name="search" id="search" value="search ">
										
									</form>
						</div>
					<div class="clearfix"> </div>
				</div>
				<div class="header-bottom-right">					
						<div class="account"><a href="seller_profile.php"><span> </span><?php echo $mail?></a></div>
							<ul class="login">
								<li><a href="logout.php"><span> </span>LOGOUT</a></li> 
							
							</ul>
						<div class="cart"><a href="cart_view.php"><span> </span>CART</a></div>
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>	
			</div>
		</div>
	</div>
	<!---->
	<!-- start content -->
	
	
	
	
	<div class="container">
		
	<div class="women-product">
		<div class=" w_content">
			<div class="women">
				<a href="view_products.php"><b><h4>Posted Complaints <span></span> </b></h4></a>
				<ul class="w_nav">
					<li>Sort : </li>
					<li><a class="active" href="view_products.php">All</a></li> |
			     	<li><a  href="view_products_fruit.php">Fruits</a></li> |
			     	<li><a href="view_products_vegetables.php">Vegetables </a></li> 
			     	<!--
			     	<li><a href="#">price: Low High </a></li> -->
			     <div class="clearfix"> </div>	
			     </ul>
			     <div class="clearfix"> </div>	
			</div>
		</div>
		<center><h3>Your<span>Posted Complaints</span></h3>
			
	      <div class="checkout-right">
				
					
				<table class="timetable_sub" width="100%">
					<thead>
						<tr>
							
							
							
							<th>Product Name</th>
						<th>Seller's Name</th>
							<th> Complaint message</th>
							<th> Response message</th>
						</tr>
					</thead>
					<tbody>
					
						<?php 
			while ($prod=mysqli_fetch_array($d_complaints))
					{

						
						?>
					<tr class="rem1">
						
						
						
						<td class="invert"><?php echo $prod['name'] ?></td>
						<td class="invert"><?php echo $prod['fname'] ?></td>
						<td class="invert"><?php echo $prod['complaint_message'] ?></td>
						<td class="invert"><?php echo $prod['replay_message'] ?></td>
					
						
					
					</tr>
				
					<?php } ?>
					
					
					
				</tbody>
				
				
				</table>

</div>

</div>


<div class="sub-cate">
				<div class=" top-nav rsidebar span_1_of_left">
					<h3 class="cate">MENU</h3>
		   <ul class="menu">
		 <ul class="kid-menu">
		<li><a href="customer_home.php"> Home</a></li>
		</ul>
		<li class="item2"><a href="#">Profile<img class="arrow-img " src="images/arrow1.png" alt=""/></a>
			<ul class="cute">
				<li class="subitem1"><a href="customer_profile.php">View Profile </a></li>
				<!--<li class="subitem1"><a href="seller_update_profile.php">Update profile</a></li>-->
				<li class="subitem1"><a href="customer_update.php">Change Password</a></li>
			</ul>
		</li>
		
		
			
		<ul class="kid-menu ">
				
				<!--<li><a href="product.php">add product</a></li>-->
				<li><a href="view_products.php">View Products</a></li>
				<li><a href="customer_view_orders1.php">My Orders</a></li>
				<li><a href="customer_complaints.php">My Complaints</a></li>
			
				
				
				<!--<li class="menu-kid-left"><a href="contact.html">Contact us</a></li-->
			</ul>
		
	</ul>
					</div>
				<!--initiate accordion-->
		<script type="text/javascript">
			$(function() {
			    var menu_ul = $('.menu > li > ul'),
			           menu_a  = $('.menu > li > a');
			    menu_ul.hide();
			    menu_a.click(function(e) {
			        e.preventDefault();
			        if(!$(this).hasClass('active')) {
			            menu_a.removeClass('active');
			            menu_ul.filter(':visible').slideUp('normal');
			            $(this).addClass('active').next().stop(true,true).slideDown('normal');
			        } else {
			            $(this).removeClass('active');
			            $(this).next().stop(true,true).slideUp('normal');
			        }
			    });
			
			});
		</script>
				
	   		     		<!--<a href="single.html">--><img class="img-responsive chain" src="images/a.jpg" alt=" " /><!--</a>-->	   		     		
	   		     		
	   		     	<!-- <a class="view-all all-product" href="product.html">VIEW ALL PRODUCTS<span> </span></a> -->	
			</div>
	<div class="clearfix"> </div>




<?php }
else{
header("Location:login.php");
} ?>
