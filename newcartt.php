
<?php
session_start();
if(isset($_SESSION['alogin'])){
	$mail=$_SESSION['alogin'];
	$id=$_SESSION['pid'];
?>



<?php
$con=mysqli_connect("localhost","root","","organic_shop_db")or die ("Couldnt connect");

$disp="SELECT  *from tbl_product ORDER BY name ASC";

$disp_result=mysqli_query($con,$disp);
$prodname="";

$viewbrand="Select * from tbl_product where pid=$id";

//$viewbrand="Select * from tbl_product where name=$pname ORDER BY name ASC";
$d_seller_brand=mysqli_query($con,$viewbrand);

$qunty=$_SESSION['qun'];
while ($rowp=mysqli_fetch_array($d_seller_brand))
	
					
					{
						$rd=$rowp['rid'];
						$product_category=$rowp['product_category_id'];
					
						$amount =150;
						echo"<script></script>";
						
					}		

	
                        
	 $q_ins1="insert into cart(rid,product_category_id,qunty.amount)values($rd,$product_category,$qunty,$amount)";
	
	$ins=mysqli_query($con,$q_ins1);
		
if($ins==TRUE)
{
	
		echo "<script type='text/javascript'>
				
				alert('New product added successfully'); 
				window.location='addcataction.php';
				</script>";
}
else
{
	
	echo "<script type='text/javascript'>
				
				
				window.location='addcataction.php';				
				</script>";
}
	
					
//alert('Not added');

?>

<!DOCTYPE html>
<html>
<head>
<title>Register</title>
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










<style>
	
	.errmessage
		{
			color:red;
			text-decoration:capitalize;
			text-tranform-capitalize;
			}
	</style>






</head>
<body> 
	<!--header-->

		<div class="bottom-header" style="background-color:palegreen;">
			<div class="container">
				<div class="header-bottom-left">
					<div class="logo">
						<a href="index.html"><img src="images/logo.png" alt=" " /></a>
					</div>
					
				
				</div>
				<div class="header-bottom-right">					
						<div class="account"><a href="login.html"><span> </span><?php echo $mail?></a></div>
							
						<div class="cart"><a href="#"><span> </span>CART</a></div>
						<ul class="login">
								<li><a href="login.php"><span> </span>LOGOUT</a></li> <!--|
								<li ><a href="register.php">SIGNUP</a></li>-->
							</ul>
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>	
			</div>
		</div>
	</div>
	<!---->
	<div class="container"> 
			         
		<div class="register">
		
		<form  action="product.php" method="POST" id="submit1" name="submit1" enctype="multipart/form-data" >
				 <div class="  register-top-grid">
				 
					

<p>No of items</p>
<div class="input-group">
    
      <input type="number" name="qunty" id="qunty" class="form-control" placeholder="no. of items">
      <span id="items_error_message" style="color:red"></span>
    </div>
			

	
					</div>
					<div class="clearfix"> </div>
					<div class="register-but">
				   <center>
					   <input type="submit" value="Add" name="submit2" id="submit2" style="background-color:green;width:150px;height:50px;color:white;font-family:bold;border-radius:10px;border:2px solid white"  >
					   </center>
				  	</form>
					</div>
					
					 </div>
		
		   </div>
		   <div class="sub-cate">
				<div class=" top-nav rsidebar span_1_of_left">
					<h3 class="cate">MENU</h3>
		 <ul class="menu">
		
		
		<li class="item2"><a href="#">Profile<img class="arrow-img " src="images/arrow1.png" alt=""/></a>
			<ul class="cute">
				<li class="subitem1"><a href="seller_profile.php">View Profile </a></li>
				<li class="subitem1"><a href="update_profile.php">Update profile</a></li>
				<li class="subitem1"><a href="admin_update.php">Change Password</a></li>
			</ul>
		</li>
		<ul class="kid-menu ">
				<li><a href="seller_home.php"> Home</a></li>
				<li><a href="product.php">add product</a></li>
				<li><a href="view_products.php">View Products</a></li>
			
				
				
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
					<div class=" chain-grid menu-chain">
	   		     		<a href="single.html"><img class="img-responsive chain" src="images/a.jpg" alt=" " /></a>	   		     		
	   		     		<!--<div class="grid-chain-bottom chain-watch">
		   		     		<!--<span class="actual dolor-left-grid">300$</span>
		   		     		<span class="reducedfrom">500$</span>  
		   		     		<h6>Lorem ipsum dolor</h6>  -->		     			   		     										
	   		     		</div>
	   		     	</div>
	   		     	 	
			</div>      
	</div>
	<!---->
	<div class="footer">
		<!--<div class="footer-top">
			
		</div>
		<div class="footer-bottom">
			<div class="container">
				
				
				
				<div class="footer-bottom-cate cate-bottom">
					<h6>OUR ADDERSS</h6>
					<ul>
						<li>Aliquam metus  dui. </li>
						<li>orci, ornareidquet</li>
						<li> ut,DUI.</li>
						<li >nisi, dignissim</li>
						<li >gravida at.</li>
						<li class="phone">PH : 6985792466</li>
						<li class="temp"> <p class="footer-class">Design by <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p></li>
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>  -->
	

</body>
</html>


<?php
}
else
{
	header('Location:login.php');
}
?>
