<?php
session_start();
if(isset($_SESSION['alogin'])){
	$mail=$_SESSION['alogin'];
	//$x=$_SESSION['rid'];
	
	if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 10;
        $offset = ($pageno-1) * $no_of_records_per_page;

if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 10;
        $offset = ($pageno-1) * $no_of_records_per_page;
		
$con=mysqli_connect("localhost","root","","organic_shop_db")or die ("Couldnt connect");


$reg="Select rid from tbl_registration WHERE email='$mail'";
$regid=mysqli_query($con,$reg);
$rid_row1=mysqli_fetch_array($regid);
$rid=$rid_row1['rid'];
$viewbrand="Select * from tbl_complaints where rid='$rid'";
$d_seller_brand=mysqli_query($con,$viewbrand);
$viewprod="SELECT * FROM tbl_complaints,tbl_customer_order,tbl_product,tbl_registration WHERE tbl_complaints.customer_order=tbl_customer_order.customer_order_id and tbl_complaints.stock_product_id=tbl_product.pid and tbl_product.rid='$rid' and tbl_complaints.status='new'and tbl_customer_order.email=tbl_registration.email LIMIT $offset, $no_of_records_per_page ";
$d_seller_prod=mysqli_query($con,$viewprod);





$disp="SELECT tbl_login.user_type_id, tbl_registration.email,tbl_registration.fname,tbl_registration.lname,tbl_registration.phone_no FROM tbl_login INNER JOIN tbl_registration ON tbl_registration.email=tbl_registration.email WHERE tbl_registration.email=$mail'";

$disp_result=mysqli_query($con,$disp);
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


<style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.div1 {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.inputbx
{
	  width: 90%;
  padding: 12px 20px;
  margin: 8px 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

.space
{
	  margin: 8px 8px 0;
	
}

ul.pagination {
    display: inline-block;
    padding: 0;
    margin: 0;
}

ul.pagination li {display: inline;}

ul.pagination li a {
    color: black;
    float: left;
    padding: 8px 16px;
    text-decoration: none;
}

</style>
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
				<li class="subitem1"><a href="seller_delivered_orders.php">Dispatched Orders</a></li>
				<!--<li class="subitem1"><a href="seller_update_profile.php">Update profile</a></li>
				<li class="subitem1"><a href="seller_update.php">Change Password</a></li>-->
			</ul>
		</li>
		<li class="item2"><a href="#">complaints<img class="arrow-img " src="images/arrow1.png" alt=""/></a>
			<ul class="cute">
				<li class="subitem1"><a href="seller_complaint.php">New Complaints</a></li>
				<li class="subitem1"><a href="seller_replied_complaints.php">Replied Complaints</a></li>
				
				<!--<li class="subitem1"><a href="seller_update_profile.php">Update profile</a></li>
				<li class="subitem1"><a href="seller_update.php">Change Password</a></li>-->
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
					<div class=" chain-grid menu-chain">
<img class="img-responsive chain" src="images/a.jpg" alt=" " />  		     		
	   		     		<!--<div class="grid-chain-bottom chain-watch">
		   		     		<span class="actual dolor-left-grid">300$</span>
		   		     		<span class="reducedfrom">500$</span>  
		   		     		<h6>Lorem ipsum dolor</h6>  		     			   		     										
	   		     		</div>-->
	   		     	</div>
	   		     	<!-- <a class="view-all all-product" href="product.html">VIEW ALL PRODUCTS<span> </span></a> -->	
			</div>
			
			
			  <div class="outer-w3-agile mt-3">
			 <h4 class="tittle-w3-agileits mb-4">New Complaints</h4>
			 </div>
			 <div class="container-fluid"  >
                <div class="row">
                    <!-- Calender ---------NEW ORDER DETAILS-->
                    <div class="outer-w3-agile col-xl mt-3" style="overflow: auto">
					
					
	<table id="recordListing" class="table table-bordered table-striped" style=" overflow: auto">
																	
	<col width="70">
	<col width="190">

					<?php 
					
	
					
					$count=0;
					
					while ($prod=mysqli_fetch_array($d_seller_prod))
					{
						
						$count=$count+1;
						
						?>
						<form action="complaints_replay_action.php?complaintid=<?php echo $prod['complaints_id'] ;?>" method="POST" >

<tr id="<?php echo $prod['stock_product_id'] ?>" >




<tr><th>Product Name</th><td><?php echo $prod['name'] ?></td></tr>

<tr><th>Posted  by</th><td><?php echo $prod['email'] ?></td></tr>

<tr><th>Complaint  message</th><td><?php echo $prod['complaint_message'] ?></td></tr>


<tr><th>Reply message</th><td><input type="text" name="replay_comments" id="replay_comments" placeholder="Enter response message"></td></tr>

<tr><td colspan="2" ><center><input type="submit" name="send_reply" id="send_reply" value="Send Response" class="btn btn-danger btn-sm " style="background-color:green;color:lack ;font-weight:bold" > </center></td>

</tr>

					<?php } ?>

</table>
</form>
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 <ul class="pagination">
		<li><a>«</a></li>
        <li><a href="?pageno=1">First</a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>"><<</a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">>></a>
        </li>
        <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
		 <li><a>»</a></li>
    </ul>	

	
                    <!--// Profile -->
                    <!-- Browser stats -->
                 
                    <!--// Browser stats -->
                </div>
			
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