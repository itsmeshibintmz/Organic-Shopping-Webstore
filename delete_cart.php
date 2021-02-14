<?php
session_start();
if(isset($_SESSION['alogin'])){
	$mail=$_SESSION['alogin'];
include 'database.php'; 
 $o=$_REQUEST["pid"];
 
 //$q=$_REQUEST["qunty"];
$action=$_REQUEST["action"];


if($action=="delete")
{  
$sql="DELETE from cart where caid='$o'";
$res=mysqli_query($con,$sql);
if($res){
	?>
	<script>
alert("Successfully Deleted");

	location.href="cart_view.php";
	</script>
<?php
}
	
}
else 
	
{
	?>
	<?php
	$reg="Select rid from tbl_registration WHERE email='$mail'";
$regid=mysqli_query($con,$reg);
$rid_row1=mysqli_fetch_array($regid);
$rid=$rid_row1['rid'];

	$viewbrand="Select * from cart where pid='$o'";


$d_seller_brand=mysqli_query($con,$viewbrand);
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
</head>


<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}
</style>
<body> 
	<!--header-->
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
						<li><a href="#">Free shipping <span class="live">on order over 500</span></a></li>
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
					<div class="clearfix"> </div>
				</div>
				<div class="header-bottom-right">					
						<div class="account"><a href="register.php"><span></span><?php echo $mail?> </span></a></div>
							<ul class="login">
								<li><a href="logout.php"><span> </span>LOGOUT</a></li>
							
							</ul>
						<!--<div class="cart"><a href="viewsingle.php"><span> </span>CART</a></div>-->
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>	
			</div>
		</div>
	</div>
	<div class="container">
		
	<div class="women-product">
		<div class=" w_content">
			<div class="women">
			<h4>MY Cart  </h4></a>
				<ul class="w_nav">
					<li>Sort : </li>
			     	<li><a class="active" href="view_products.php">All</a></li> |
			     	<li><a href="view_products_fruit.php">Fruits</a></li> |
			     	<li><a href="view_products_vegetables.php">Vegetables</a></li> |
			     	<!--<li><a href="#">price: Low High </a></li> -->
			     <div class="clearfix"> </div>	
			     </ul>
			     <div class="clearfix"> </div>
			</div>
		</div>
		<div class="grid-product">
		
		
		
		
		
	<form action="editproduct1.php" method=Post>
	<table>
	
	<?php while ($rowp=mysqli_fetch_array($d_seller_brand))
					{
						
						?>
	<tr><input type="hidden" value="<?php echo $rowp['caid'];?>" name="pid" /></tr>

	

</td><td><input type="hidden" value="<?php echo $rowp['price'];?>" name="price" min="1" class="input input1 form-control"/>
	<tr><input type="hidden" value="<?php echo $rowp['des'];?>" name="des" /></tr>
	<tr><td>quantity<td><input type="number" value="<?php echo $rowp['cart_qunty'];?>" name="qunty" /class="input input1 form-control"></td></tr>
	 &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp 
	<tr><td><center><input type="submit" name="update" value="update" >            </center>      </td></tr>
	
	<?php
}
?>
</table>
	</form>
	<?php
}}

?>







<div class="clearfix"> </div>
		</div>
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
					<div class=" chain-grid menu-chain">
	   		     		<a href="single.html"><img class="img-responsive chain" src="images/a.jpg" alt=" " /></a>	
						</div>
	<div class="clearfix"> </div>
</div>
	<!---->
	<div class="footer">




