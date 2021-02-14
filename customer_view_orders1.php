
<?php
session_start();
if(isset($_SESSION['alogin'])){
	$mail=$_SESSION['alogin'];
	//$pname=$_SESSION['name'];
	//$_SESSION['rid']=$rid;
	
?>
<?php
$con=mysqli_connect("localhost","root","","organic_shop_db")or die ("Couldnt connect");

$viewprod="select * FROM ((tbl_customer_order INNER JOIN tbl_product on tbl_customer_order.stock_product_id=tbl_product.pid )INNER JOIN tbl_customer_delv_address
 on tbl_customer_order.delv_adres_id=tbl_customer_delv_address.delv_adres_id and tbl_customer_order.email='$mail' )";
 
 
 
 
 
 
 


$d_seller_prod=mysqli_query($con,$viewprod);

$subtotal=0;


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
	
	.errmessage
		{
			color:red;
			}
	</style>

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
</head>
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
					<!--<div class="down-top">		
						  <select class="in-drop">
							  <option value="English" class="in-of">English</option>
							  <option value="Japanese" class="in-of">Japanese</option>
							  <option value="French" class="in-of">French</option>
							  <option value="German" class="in-of">German</option>
							</select>
					 </div>
					<div class="down-top top-down">
						  <select class="in-drop">
						  
						  <option value="Dollar" class="in-of">Dollar</option>
						  <option value="Yen" class="in-of">Yen</option>
						  <option value="Euro" class="in-of">Euro</option>
							</select>-->
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
					<!--<div class="search">
						<input type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" >
						<input type="submit"  value="SEARCH">

					</div>-->
					<div class="w3l_search" style="margin-top:5px;margin-left:250px">
									<form action="search_prod_action.php" method="POST">
										<input type="text" name="product" id="product" placeholder="Search a product..." required>
										<input type="submit" name="search" id="search" value=" search">
									</form>
						</div>
					<div class="clearfix"> </div>
				</div>
				<div class="header-bottom-right">					
						<div class="account"><a href="customer_profile.php"><span> </span><?php echo $mail?></a></div>
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
				<a href="view_products.php"><b><h4>PRODUCTS <span></span> </b></h4></a>
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
		<!-- grids_of_4 -->
		<div class="grid-product">
		
			 
			 
			  <?php while ($rowp=mysqli_fetch_array($d_seller_prod))
					{
						
						?>
		
		
		
		
		  <div class="  product-grid">
		  
		  

		  <form action="viewproduct.php" method="POST" name="prod" id="prod">
			<div class="content_box">
			   	<div class="left-grid-view grid-view-left">
			   	   	 <img src="uploads/products/<?php echo $rowp['image'] ?>"  class="img-responsive watch-right" alt="image"/style="width:300px;height:200px;">
				   	   	<div class="mask">
	                        <div class="info">Quick View</div>
			            </div>
				   	  
				</div>
				   <b> <b>  <?php    ;
					//$_SESSION['pname']=$rowp['name'];
					?></b>
					<br>
					Product Name :<?php   echo $rowp['name'] ?> <br>
				       Quanity of Order :<?php   echo $rowp['purchase_qty'] ?> <br>
					   
				    Date of Order:<style="color:red;">  Rs.<?php   echo $rowp['order_date'] ?> <br>
				    Order Status :<?php   echo $rowp['status'] ?></b><br>
<a href="html to pdf export/index.php ?customer_order_id=<?php echo $rowp['customer_order_id'];?>" class="btn btn-info">Download Order Summary </a><br><br>
<a href="add_comp.php ?customer_order_id=<?php echo $rowp['customer_order_id'];?>" class="btn btn-info">Add Complaint </a><br><br>
				 <input type="text" name="prod_id" id="prod_id" value="<?php   echo $rowp['pid'] ?>" hidden>
				 <br>
			
				
				 <!--<a href="add_complaint.php?pid=<?php echo $rowp['customer_order_id'];?>&action=edit" background="#FF5733 "; style="color:blue;" ><b>Add Review</b></a>-->
				 
                   <!--<input type="submit" name="add_complaint" id="add_complaint" value="Post Complaint" class="button1" style=" background-color: #004CBF;"></ class="button1" ></td>-->
				   
<!--<a href="delete_seller_prod.php?pid=<?php echo $rowp['pid'];?>&action=delete" background="green";  onclick="return (confirm('Are You Sure To Delete The Record?'));" style="color:red;" ><b>complante </b></a>-->

		<!--<Button name="edit" id="edit" class="btn btn-danger btn-sm remove" style="background-color:#FE1104 "> Edit</Button>
	 <!--<Button name="delete" id="delete" class="btn btn-danger btn-sm remove"style="background-color:#FE1104 " > Delete</Button>-->
				 </br>
				 
				 
				 
			   	</div>
              </div>
			  </form>
			  
			  	<?php }
				?>
			<div class="clearfix"> </div>
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
	   		     		<!--<div class="grid-chain-bottom chain-watch">
		   		     		<span class="actual dolor-left-grid">300$</span>
		   		     		<span class="reducedfrom">500$</span>  
		   		     		<h6>Lorem ipsum dolor</h6>  		     			   		     										
	   		     		</div>-->
	   		     
	   		     	<!-- <a class="view-all all-product" href="product.html">VIEW ALL PRODUCTS<span> </span></a> -->	
			</div>
	<div class="clearfix"> </div>
</div>
	<!---->
	<div class="footer">
	<div class="footer-top">
			<div class="container">
				<div class="latter">
					
					
					</div>
					<div class="clearfix"> </div>
				</div>
				 </div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="footer-bottom">
			<div class="container">
				
				
				
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
</body>
</html>













<?php
}
else
{
	header('Location:login.php');
}
?>
