
<?php
session_start();
if(isset($_SESSION['alogin'])){
	$mail=$_SESSION['alogin'];
	//$pname=$_SESSION['name'];
	//$rid=$_SESSION['rid'];
	
?>



<?php
$con=mysqli_connect("localhost","root","","organic_shop_db")or die ("Couldnt connect");

//$disp="SELECT  *from cart ORDER BY name ASC";

//$disp_result=mysqli_query($con,$disp);
//$prodname="";



$view="SELECT * FROM `tbl_registration` WHERE email='$mail'";

//$viewbrand="Select * from tbl_product where name=$pname ORDER BY name ASC";

$view1=mysqli_query($con,$view);
$rowp1=mysqli_fetch_array($view1);
$rid=$rowp1['rid'];

$viewbrand="Select * from cart inner join tbl_product on cart.pid=tbl_product.pid  inner join tbl_registration on tbl_registration.email=cart.email and cart.email='$mail'";
$d_seller_brand=mysqli_query($con,$viewbrand);




$del_adrs="SELECT * FROM `tbl_customer_delv_address` WHERE email='$mail' and status5='VALID'";

$d_del_adrs=mysqli_query($con,$del_adrs);
?>

<!DOCTYPE html>
<html>
<head>
<title>Organicshoppi | Single </title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!--theme-style-->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />	
<link rel="stylesheet" href="css/etalage.css" type="text/css" media="all" />
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--fonts-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<!--//fonts-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}
* {
  box-sizing: border-box;
}
.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}
.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}
.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}
.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}
.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
  }
 input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}
label {
  margin-bottom: 10px;
  display: block;
}
.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}
.btn {
  background-color: #4CAF50;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}
.btn:hover {
  background-color: #45a049;
}
a {
  color: #2196F3;
}
hr {
  border: 1px solid lightgrey;
}
span.price {
  float: right;
  color: grey;
}
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}

</style>
<script src="js/jquery.min.js"></script>

<script src="js/jquery.etalage.min.js"></script>
<script>
			jQuery(document).ready(function($){

				$('#etalage').etalage({
					thumb_image_width: 300,
					thumb_image_height: 400,
					source_image_width: 900,
					source_image_height: 1200,
					show_hint: true,
					click_callback: function(image_anchor, instance_id){
						alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
					}
				});

			});
		</script>

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
						<li><a href="#"> <span class="live"></span></a></li>
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
					
					<div class="w3l_search" style="margin-top:5px;margin-left:250px">
									<form action="search_prod_action.php" method="POST">
										<input type="text" name="product" id="product" placeholder="Search a product..." required>
										<input type="submit" name="search" id="search" value="search ">
										
									</form>
						</div>
					<!--<div class="search">
						<input type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" >
						<input type="submit"  value="SEARCH">

					</div>-->
					
					<div class="clearfix"> </div>
					
				</div>
				<div class="header-bottom-right">					
						<div class="account"><a href="seller_profile.php"><span> </span></span><?php echo $mail?></a></div>
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
	
	 <div class="container"> 
	 	
	 	<div class=" single_top">
		
	      <div class="single_grid">
		 
				<div class="grid images_3_of_2">
						<ul id="etalage">
							
							
						    
						</ul>
						 <div class="clearfix"> </div>		
				  </div> 
				  <div class="desc1 span_3_of_2">
				  
					
			   
				
				</div>
				 <div>
	  
	  			<h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b></b></span></h4>
	  		<?php

 $ctot=0;
			while ($rowp=mysqli_fetch_array($d_seller_brand))
					{
						
						?>
		
			
							 
      <p><?php echo $rowp['name']?><span class="price"> <?php echo $rowp['amount'] ;
	   $ctot= $ctot+$rowp['amount'];
	  ?></span></p>
  
					<?php } ?>
      <hr>
      <p>Cart  Total <span class="price" style="color:black"><b>Rs.<?php echo $ctot;
		$_SESSION['ctot']=$ctot;

	  ?></b></span></p>
	  </div>
	  <div>
	       
      
        <div class="row">
          <div class="col-50">
		  </br>
		  </br>
             <h4 style="color:green">Select Delivery Address</h4>
			 <table>
				<tr>
					  	<?php
									while($adrs=mysqli_fetch_array($d_del_adrs))
									{
									 
									 ?>
									 <td style="padding:10px;margin:10px">
				<form action="payment.php" method="POST" class="creditly-card-form agileinfo_form" name="sel_adrs" id="sel_adrs">
				
									<input type="text" name="select_del_adrs" id="select_del_adrs" value="<?php  echo $adrs['delv_adres_id'] ?>" hidden>
		
									<label><?php  echo $adrs['fname'] ?></label>
									<?php  echo $adrs['address_line'] ?><br>
									<?php  echo $adrs['landmark'] ?>
									<?php  echo $adrs['town_city'] ?></br>Pin : <?php  echo $adrs['pin_code'] ?><br>
									Mob:<?php  echo $adrs['Mobile number'] ?><br></br>
									
									
									
									<button class="adrs_button" name="select_adrs" id="select_adrs" style="color:blue;">Deliver to this Address </button> &nbsp 
<br></br>
									
									
									
									</form>
									</td>
									<?php } ?>
									</tr>
									</table>
								
									<form action="delvery_address_action.php" method="POST" class="creditly-card-form agileinfo_form" name="d_adrs" id="d_adrs">
									</br><center><label class="control-label" style="color:red">OR </label></br>
									<label class="control-label"style="color:green">ADD NEW ADDRESS AND SELECT </label></center>
									</br>

            <div class="row">
              <div class="col-50">
               <label class="control-label">Name: </label>
													<input class="billing-address-name form-control" type="text" name="fname" id="fname" pattern="^\D*$" id="fname"placeholder="Enter name" onblur="checkLName()"required>
													
													
													
													<p id="errornameL" class="errmessage" >    </p>
						
					<script>
					function checkLName()
										{
										var letters = /^[a-zA-Z][a-zA-Z\\s]+$/;


										if(document.getElementById('name').value==null || checkout.name.value.length==0)
										{
										document.getElementById('errornameL').innerHTML="Mandatory Field!";

										}
										else if(document.getElementById('name').value.match(letters))
										{
										document.getElementById('errornameL').innerHTML=" ";
										
										}

										else
										{
										document.getElementById('errornameL').innerHTML="Information entered is incorrectly formatted!";
										document.getElementById('name').value = ""; 
										}
										}
					
					</script>
              </div>
              <div class="col-50">
                <label class="control-label">Mobile number:</label>
					
					<input class="form-control" type="number_format" placeholder="Mobile number" name="mob" id="mob" onblur="checkMob()" required>
				<p id="errormob" class="errmessage" >    </p>
					 
					 <script>
					
					
					function checkMob() { 
															var mobnum = document.getElementById("mob").value;
													///^([+]\d{2})?\d{10}$/
													//   /^\d{10}$/
													var phoneno =/^(?!(\d)\1{9})(?!0123456789|1234567890|0987654321)\d{10}$/ ;
															if(document.getElementById("mob").value==null ||checkout.mob.value.length==0)
												{
												document.getElementById("errormob").innerHTML="Mandatory Field!";
												
												}


												else if(document.getElementById('mob').value.match(phoneno))
												{
													
													if(document.getElementById("mob").value=='0000000000')
													{
														document.getElementById("errormob").innerHTML="Please enter a valid Mobile number";
														document.getElementById("mob").value="";
													}
													else
													document.getElementById('errormob').innerHTML=" ";
												
												}

												else
												{
												document.getElementById('errormob').innerHTML="Please enter a valid Mobile number";
												document.getElementById("mob").value="";
												}
														}
					
					</script>
              </div>
			  
			  
			  
			     <div class="col-50">
<label class="control-label">Address line 1: </label>
														 <input type="text" class="form-control"  name="address_line" id="address_line" form="d_adrs" placeholder="Address line 1" required>
              </div>
			  
			  
			  
			       <div class="col-50">
<label class="control-label">Landmark: </label>
														 <input class="form-control" type="text" placeholder="Landmark" name="landmark"  id="landmark" required>
              </div>
			  
			       <div class="col-50">
<label class="control-label">Town/City: </label>
												 <input class="form-control" type="text" placeholder="Town/City" name="town" id="town"required>
              </div>
			  
			       <div class="col-50">
<label class="control-label">Pin code:</label>
												 <input class="form-control" type="text" placeholder="pin code" name="pincode" id="pincode"required>
              </div>
			  
			  
			  
			   <div class="col-50">
			  
			  <label class="control-label">Address type: </label>
												     <select  name="atype" id="atype" style="border-color:#E0E0E0; width:100%;" >
																							<option value="">--select --</option>
																							<option value="1">Office</option>
																							<option value="2">Home</option>
																							<option value="3">Commercial</option>
							
																					</select>
			  
			       </div>
				   <button class="btn" name="address" id="address">Add Address</button>
            </div>
          </div>

          <div class="col-50">
           
            
            <div class="row">
              
              <div class="col-50">
                
              </div>
            </div>
          </div>
          
        </div>
      
				
      </form>
	  </div>
	 
          	    <div class="clearfix"> </div>
          	   </div>
          	   <!--<ul id="flexiselDemo1">
			<li><img src="images/pi.jpg" /><div class="grid-flex"><a href="#">Bloch</a><p>Rs 850</p></div></li>
			<li><img src="images/pi1.jpg" /><div class="grid-flex"><a href="#">Capzio</a><p>Rs 850</p></div></li>
			<li><img src="images/pi2.jpg" /><div class="grid-flex"><a href="#">Zumba</a><p>Rs 850</p></div></li>
			<li><img src="images/pi3.jpg" /><div class="grid-flex"><a href="#">Bloch</a><p>Rs 850</p></div></li>
			<li><img src="images/pi4.jpg" /><div class="grid-flex"><a href="#">Capzio</a><p>Rs 850</p></div></li>
		 </ul>-->
	    <script type="text/javascript">
		 $(window).load(function() {
			$("#flexiselDemo1").flexisel({
				visibleItems: 5,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,    		
				pauseOnHover: true,
				enableResponsiveBreakpoints: true,
		    	responsiveBreakpoints: { 
		    		portrait: { 
		    			changePoint:480,
		    			visibleItems: 1
		    		}, 
		    		landscape: { 
		    			changePoint:640,
		    			visibleItems: 2
		    		},
		    		tablet: { 
		    			changePoint:768,
		    			visibleItems: 3
		    		}
		    	}
		    });
		    
		});
	</script>
	<script type="text/javascript" src="js/jquery.flexisel.js"></script>

          	    	
          	   </div>
          	   
          	   <!---->
<div class="sub-cate">
				<div class=" top-nav rsidebar span_1_of_left">
					<h3 class="cate">MENU</h3>
		  <ul class="menu">
		
		
		
		
				<li>
			<ul class="kid-menu">
				<li><a href="customer_home.php">Home</a></li>
				 <ul class="menu">
		 
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
					
	   		     		<img class="img-responsive chain" src="images/a.jpg" alt=" " />	   		     		
	   		     		<div class="grid-chain-bottom chain-watch">
		   		     		<!--<span class="actual dolor-left-grid">300$</span>
		   		     		<span class="reducedfrom">500$</span>  
		   		     		<h6>Lorem ipsum dolor</h6>  	     			   		     										
		   		     		<h6>Lorem ipsum dolor</h6>  -->		     			   		     										
	   		     		</div>
	   	
	   		     	<!-- <a class="view-all all-product" href="product.html">VIEW ALL PRODUCTS<span> </span></a> 	-->
			</div>
<div class="clearfix"> </div>			
		</div>
	<!---->
	<div class="footer">
		<div class="footer-top">
			<div class="container">
				<!--<div class="latter">
					<h6>NEWS-LETTER</h6>
					<div class="sub-left-right">
						<form>
							<input type="text" value="Enter email here"onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter email here';}" />
							<input type="submit" value="SUBSCRIBE" />
						</form>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="latter-right">
					<p>FOLLOW US</p>
					<ul class="face-in-to">
						<li><a href="#"><span> </span></a></li>
						<li><a href="#"><span class="facebook-in"> </span></a></li>
						<div class="clearfix"> </div>
					</ul>
					<div class="clearfix"> </div>
				</div>-->
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="footer-bottom">
			<div class="container">
				
				
				
				
</body>
</html>
<?php
}
else
{
	header('Location:login.php');
}
?>