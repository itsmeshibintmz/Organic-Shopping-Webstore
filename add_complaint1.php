<?php
session_start();
if(isset($_SESSION['alogin'])){
	$mail=$_SESSION['alogin'];
	//$pid=$_SESSION['pid'];
	//$pname=$_SESSION['name'];
	//$rid=$_SESSION['rid'];	


	$con=mysqli_connect("localhost","root","","organic_shop_db")or die ("Couldnt connect");
?>
<?php

if(strlen($_SESSION['alogin'])==0){
  header('location:index.php');
}


?>

<?php

$date=date("Y-m-d");
$disp="SELECT  * FROM tbl_customer_order";

$disp_result=mysqli_query($con,$disp);


?>
<?php
	
	$customer_order_id=$_GET['customer_order_id'];
	$_SESSION['customer_order_id']=$customer_order_id;


	
$login_id=$_SESSION['alogin'];
$orderid=$_GET['customer_order_id'];
$disp="select * FROM ((tbl_customer_order INNER JOIN tbl_product on tbl_customer_order.stock_product_id=tbl_product.pid )INNER JOIN tbl_customer_delv_address
 on tbl_customer_order.delv_adres_id=tbl_customer_delv_address.delv_adres_id and tbl_customer_order.email='$mail' and customer_order_id='$orderid')";
    
$disp_result=mysqli_query($con,$disp);
$viewprod="SELECT tbl_customer_order.customer_order_id,tbl_customer_order.email , tbl_customer_order.stock_product_id ,tbl_product.pid ,tbl_product.name,tbl_product.rid, tbl_customer_order.purchase_qty,tbl_customer_order.purchase_price,tbl_customer_order.order_date,tbl_customer_order.status
from tbl_customer_order,tbl_product  WHERE tbl_product.pid=tbl_customer_order.stock_product_id and tbl_customer_order.email='$mail' and tbl_customer_order.customer_order_id='$customer_order_id' ";
$d_seller_prod=mysqli_query($con,$viewprod);



$prod=mysqli_fetch_array($d_seller_prod);

$prod_name=$prod['name'];
$stock_product_id=$prod['stock_product_id'];



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
					
					<div class="w3l_search" style="margin-top:5px;margin-left:250px">
									<form action="search_prod_action.php" method="POST">
										<input type="text" name="product" id="product" placeholder="Search a product..." required>
										<input type="submit" name="search" id="search" value="secarch ">
										
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

  <div id="pdfdiv">
  
	<center>
  <div id="pdfdiv">
     <h3 style="color:green;"> COMPLAINT</h3>
	 <form onsubmit="return validateForm()" action="add_complaint_action.php" method="POST" id="update" name="update" > 
      <?php

 while($array=mysqli_fetch_array($disp_result))
  {
 ?>
   <table  style="width:40%;border:solid black">
<tr><th>Customer Name:</th><td><?php echo $array['fname'] ?></td></tr>
<tr><th>Customer mail id:</th><td><?php echo $array['email']; ?></td></tr>
<tr><th>Product Name:</th><td><?php echo $array['name']; ?></td></tr>


<tr><th>Ordered Quantity:</th><td><?php echo $array['purchase_qty']." Kg" ?></td></tr>
<tr><th>Payid Amount</th><td><?php echo $array['purchase_price']; ?></td></tr>

<input type="text" id="stock_product_id" name="stock_product_id" value="Product id : <?php echo $stock_product_id ;?>" >
<tr><th></th><td><textarea name="complaint" id="complaint" placeholder="Enter your complaint message"  onblur="checkComplaint()"  style="width:320px" required> </textarea></td></tr>
					<span id="errorname" class="errmessage">    </span>	

					<script>
					
							function checkComplaint()
									{
									var letters = /\d{1,5}\s\w.\s(\b\w*\b\s){1,2}\w*\/;
								
									var fnamevalue=document.getElementById("complaint").value;
									//document.getElementById('errorname').innerHTML=fnamevalue;
									
									if (fnamevalue==null || update.complaint.value.length==0)
									{
									document.getElementById('errorname').innerHTML="Mandatory Field!";
	
									}
									else if(document.getElementById("complaint").value.match(letters))
									{
									document.getElementById('errorname').innerHTML=" ";

									}

									else
									{
										
									document.getElementById('errorname').innerHTML="Information entered is incorrectly formatted!";
									document.getElementById('firstname').value = " "; 
									}

									}
					
					</script>
						<tr><th><input type="submit" value="Send Complaint" name="submitd" id="submitd"  ></tr>
<tr><th>Ordered date:</th><td><?php echo $array['order_date'] ?></td></tr>


<tr ><td rowspan="1" colspan="2">&nbsp; </br></td></tr>
      
</br>

       <?php } ?>
	   
      </table>
      </form>
    </center>
</div>


</div>


<div class="sub-cate">
				<div class=" top-nav rsidebar span_1_of_left">
					<h3 class="cate">MENU</h3>
		   <ul class="menu">
		 <ul class="kid-menu">
		<li><a href="seller_home.php"> Home</a></li>
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
				<li><a href="customer_complaints.php">complaints</a></li>
			
				
				
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
</body>
</html>
<?php
}
else
{
	header('Location:login.php');
}
?>
