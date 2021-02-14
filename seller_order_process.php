<?php
session_start();
if(isset($_SESSION['alogin'])){
	$mail=$_SESSION['alogin'];
	//$x=$_SESSION['rid'];
?>

<?php

if(isset($_POST['submit']))
{
	$username=$_POST['email'];
	$password=md5($_POST['password']);
$ret=mysqli_query($con,"SELECT * FROM tbl_login WHERE email='$emil' and password='$password'");

$num=mysqli_fetch_array($ret);



if($num>0)
{
$extra="change-password.php";//
$_SESSION['alogin']=$_POST['email'];
$_SESSION['id']=$num['id'];
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else
{
$_SESSION['errmsg']="Invalid username or password";
$extra="index.php";
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Customer|Home</title>
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
</head>
<body> 
	<!--header-->
	<div class="header">
	
		<div class="bottom-header" style="background-color:palegreen;">
			<div class="container">
				<div class="header-bottom-left">
					<div class="logo">
						<font size="4"><strong><i> <b><p style="color:red;">ORGANICSHOPPING </p> </b></i></strong></font>
					</div>
					<!--<div class="search">
						<input type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" >
						<input type="submit"  value="SEARCH">

					</div>-->
					<div class="clearfix"> </div>
				</div>
				<div class="header-bottom-right">					
						<div class="account"><a href="seller_profile.php"><span> </span><?php echo $mail?></a></div>
							<ul class="login">
								<li><a href="logout.php" <span> </span>LOGOUT</a></li> 

							</ul>
						<div class="cart"><a href="cart_view.php"><span> </span>CART </a></div>
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>	
			</div>
		</div>
	</div>
	<!---->
	
	<div class="container">
		
      	   <div class="account_grid">
			   <div class=" login-right">
			    
			
			  	<h3>Welcome to organic world<br><br>
				
			   </div>	
			    <div class=" login-left">
			 
				
			   </div>
				
				
			   <div class="clearfix"> </div>
			   
			 </div>
			 
			 <div class="sub-cate">
				<div class=" top-nav rsidebar span_1_of_left">
					<h3 class="cate">MENU</h3>
					
		 <ul class="menu">
		<ul class="kid-menu ">
				<li><a href="seller_home.php"> Home</a></li>
				</ul>
		<li class="item2"><a href="#">Profile<img class="arrow-img " src="images/arrow1.png" alt=""/></a>
			<ul class="cute">
				<li class="subitem1"><a href="seller_profile.php">View Profile </a></li>
				<!--<li class="subitem1"><a href="seller_update_profile.php">Update profile</a></li>-->
				<li class="subitem1"><a href="seller_update.php">Change Password</a></li>
			</ul>
		</li>
		
		
			
		<ul class="kid-menu ">
				
				<li><a href="product.php">add product</a></li>
			<li><a href="viewproduct.php">View Products</a></li>
			
			
				
				
				<!--<li class="menu-kid-left"><a href="contact.html">Contact us</a></li-->
			</ul>
			<li class="item2"><a href="#">Orders<img class="arrow-img " src="images/arrow1.png" alt=""/></a>
			<ul class="cute">
				<li class="subitem1"><a href="new_received_orders.php">View new orders</a></li>
				<li class="subitem1"><a href="seller_update_profile.php">Update profile</a></li>
				<li class="subitem1"><a href="seller_update.php">Change Password</a></li>
			</ul>
		</li>
		
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
					<div >
	   		     	<img class="img-responsive chain" src="images/a.jpg" alt=" " />   		     		
	   		     		<!--<div class="grid-chain-bottom chain-watch">
		   		     		<span class="actual dolor-left-grid">300$</span>
		   		     		<span class="reducedfrom">500$</span>  
		   		     		<h6>Lorem ipsum dolor</h6>  		     			   		     										
	   		     		</div>-->
	   		     	</div>
	   		     	<!-- <a class="view-all all-product" href="product.html">VIEW ALL PRODUCTS<span> </span></a> -->	
			</div>
			
			
			<table id="recordListing" class="table table-bordered table-striped" style=" overflow: auto">
																	
	<col width="70">
	<col width="190">

					<?php 
					
	
					
					$count=0;
					
					while ($prod=mysqli_fetch_array($d_seller_prod))
					{
						$count=$count+1;
						
						?>
<form action="disptched_order_action.php?orderid=<?php echo $prod['customer_order_id'] ?>" method="POST" >
<tr id="<?php echo $prod['stock_product_id'] ?>" >

<script>
$(document).ready(function(){
	$("#delivery_date").datepicker({
		minDate:0
	});
});

</script>

<tr><th>Product Name</th><td><?php echo $prod['product_name'] ?></td></tr>

<tr><th>Order by</th><td><?php echo $prod[1] ?></td></tr>

<tr><th>Customization comments:</th><td><?php echo $prod['customize_comments'] ?></td></tr>


<tr><th>Able to deliver on</th><td>

<label for="date"> Choose date </label>
  <input type="date" id="delivery_date" name="delivery_date"  required>

</td></tr>



<tr><th>Additional cost</th><td><input type="text" name="additional_cost" id="additional_cost" value="0"></td></tr>
<tr><th>Additional comments</th><td><input type="text" name="additional_comments" id="additional_coments" value="N/A"></td></tr>
<tr><td colspan="2" ><center><input type="submit" name="dispatch" id="dispatch" value="Dispatch Order" class="btn btn-danger btn-sm " style="background-color:green;color:lack ;font-weight:bold" ></center></td>

</tr>

					<?php } ?>

</table>
</form>
			
				
			  <div class="clearfix"> </div>
      	 </div>
	<!---->
	<div class="footer">
		
		<div class="footer-bottom">
			
</body>
</html>
<?php
}
else
{
	header('Location:login.php');
}
?>