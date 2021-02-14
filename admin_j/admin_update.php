
<?php

session_start();
$mail=$_SESSION['alogin'];
?>

<!DOCTYPE html>
<html>
<head>
<title>Dreams|Admin View Profile</title>
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

<!-- set data -->

<script>

function setdata(email,user_type_id,fname,lname,mobile_num)
{
	
	document.getElementById('fname').innerHTML="hello";
	//email,user_type_id,fname,lname,mobile_num
	
}


</script>


<style>
	
	.errmessage
		{
			color:red;
			}
	</style>







<!-- start-smoth-scrolling -->
</head>
	
<body>
<!-- header -->
	<div class="agileits_header">
		<div class="w3l_offers">
			<a href="admin_home.php">Dreams!</a>
		</div>
		<div class="w3l_search">
			<form action="#" method="post">
				<input type="text" name="Product" value="Search a product..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search a product...';}" required="">
				<input type="submit" value=" ">
			</form>
		</div>
		<div class="product_list_header">  
			<h4 class="last" style="color:white; margin-top:12px ">Welcome Admin</h4>
                
            
		</div>
		
		<div class="w3l_header_right">
		
			<ul>
			
				<li class="dropdown profile_details_drop">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i><span class="caret"></span></a>
					
						<div class="w3ls_vegetables">
							<ul class="dropdown-menu drp-mnu">
								<li><a href="admin_profile.php">View profile</a></li> 
								<li><a href="logout_admin.php">Logout</a></li>
							</ul>
						</div>                  
					</div>	
				</li>
			</ul>
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
<!-- //script-for sticky-nav -->

	</br>
	</br>
	</br>
<!-- //header -->
<!-- banner -->
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
			   </div> 
			   <!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
					<ul class="nav navbar-nav nav_1">
						<li><a href="admin_update.php">Update Profile</a></li>
							
						<li class="dropdown mega-dropdown active">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">View<span class="caret"></span></a>				
							<div class="dropdown-menu mega-dropdown-menu w3ls_vegetables_menu">
								<div class="w3ls_vegetables">
									<ul>	
										<li></br><a href="reg_customer.php">Registered Customers</a></li>
										<li></br><a href="reg_sellers.php">Registered Sellers</a></li>
										<li></br><a href="view_complaints.php">Complaints</a></li>
									</ul>
								</div>                  
							</div>				
						</li>
						<li><a href="add_product_cat.php">Update Product categories</a></li>
						<li><a href="add_prod_sub_cat.php">Update product subcategories</a></li>
						<li><a href="add_seller_cat.php">Update Seller categories</a></li>
					<!--	<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Beverages<span class="caret"></span></a>
							<div class="dropdown-menu mega-dropdown-menu w3ls_vegetables_menu">
								<div class="w3ls_vegetables">
									<ul>
										<li><a href="drinks.html">Soft Drinks</a></li>
										<li><a href="drinks.html">Juices</a></li>
									</ul>
								</div>                  
							</div>	
						</li>
						-->
						
						</br>
						</br>
						<li><a href="about.php">About us</a></li>
						
						<li><a href="contacts.php">Contact us</a></li>
					</ul>
				 </div><!-- /.navbar-collapse -->
			</nav>
		</div>
		<div class="w3l_banner_nav_right">
		<!--	<section style="margin-left:20px;margin-right:20px ; background-color:lightgrey ; padding:75px ">
			
			<label>First Name : </label> <span id="fname" > hii</span>
			
			</br>
			</br>
			<label>Last Name  : </label> <span id="lname" name="lname"> </span>
			</br>
			</br>
			<label>Mobile No  : </label> <span id="mob" name="mob"> </span>
			</br>
			</br>
			<label>Email ID &nbsp &nbsp  : </label> <span id="email" name="email"> </span>
			</br>
			</br>
			</section>
			-->


			<!-- login -->
		
			<div class="w3_login_module">
			
				<div class="module form-module">
				 
				  <div class="form">
					
				  </div>
				  <div class="form">
					<h2>Update details</h2>
					<form onsubmit="return validateForm()" action="admin_update_profile.php" method="POST" id="update" name="update" >  
								
					  <input type="text" name="firstname" id="firstname" placeholder="First Name" onblur="checkFName()" required>
					<span id="errorname" class="errmessage">    </span>	
					
					
					<script>
					
							function checkFName()
									{
									var letters = /^[a-zA-Z][a-zA-Z\\s]+$/;
								
									var fnamevalue=document.getElementById("firstname").value;
									//document.getElementById('errorname').innerHTML=fnamevalue;
									
									if (fnamevalue==null || update.firstname.value.length==0)
									{
									document.getElementById('errorname').innerHTML="Mandatory Field!";
	
									}
									else if(document.getElementById("firstname").value.match(letters))
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
					  <input type="text" name="lastname" id="lastname" placeholder="Last Name" onblur="checkLName()"required>
					  <span id="errornameL" class="errmessage" >    </span>
					  
					  
					  <script>
					function checkLName()
									{
									var letters = /^[a-zA-Z][a-zA-Z\\s]+$/;


									if(document.getElementById('lastname').value==null || update.lastname.value.length==0)
									{
									document.getElementById('errornameL').innerHTML="Mandatory Field!";

									}
									else if(document.getElementById('lastname').value.match(letters))
									{
									document.getElementById('errornameL').innerHTML=" ";
									
									}

									else
									{
									document.getElementById('errornameL').innerHTML="Information entered is incorrectly formatted!";
									document.getElementById('lastname').value = ""; 
									}
									}
					
					</script>
					  
					  
					  
					  
					 <input type="text" name="phonem" id="phonem" placeholder="Phone number"  onblur="checkMob()"required>
					<span id="errormob" class="errmessage" >    </span>
					<script>
					
							function checkMob() { 
											var mobnum = document.getElementById("phonem").value;
									///^([+]\d{2})?\d{10}$/
									//   /^\d{10}$/
									var phoneno =/^(?!(\d)\1{9})(?!0123456789|1234567890|0987654321)\d{10}$/ ;
											if(document.getElementById("phonem").value==null ||update.phonem.value.length==0)
								{
								document.getElementById("errormob").innerHTML="Mandatory Field!";
								
								}
								else if(document.getElementById('phonem').value.match(phoneno))
								{
									
									if(document.getElementById("phonem").value=='0000000000')
									{
										document.getElementById("errormob").innerHTML="Please enter a valid Mobile number";
										document.getElementById("phonem").value="";
									}
									else
									document.getElementById('errormob').innerHTML=" ";
								
								}

								else
								{
								document.getElementById('errormob').innerHTML="Please enter a valid Mobile number";
								document.getElementById("phonem").value="";
								}
										}
					</script>
					
					
					
					<input type="submit" value="Update Profile" name="submitd" id="submitd"  >
					</form>
					</br>
					</br>
					<h2>Change Password</h2>
					<form onsubmit="return validateForm()" action="admin_update_pass.php" method="POST" id="updatepass" name="updatepass" >  
<script>
							function checkoldpassword()

							{

							var passw=/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;

									
							if(document.getElementById("oldpassword").value==null ||updatepass.oldpassword.value.length==0)
								{
								document.getElementById("errorpswrdold").innerHTML="Mandatory Field!";

								}

							else if(document.getElementById("oldpassword").value.match(passw))
								{
								document.getElementById("errorpswrdold").innerHTML=" ";
								
								}

								else
								{
								document.getElementById('errorpswrdold').innerHTML="Please enter a valid password";
								  
								   document.getElementById("oldpassword").value="";
								   
									}

							}
							
							
							
							function checkpassword()

							{

							var passw=/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;

									
							if(document.getElementById("password").value==null ||updatepass.password.value.length==0)
								{
								document.getElementById("errorpswrd").innerHTML="Mandatory Field!";

								}

							else if(document.getElementById("password").value.match(passw))
								{
								document.getElementById("errorpswrd").innerHTML=" ";
								
								}

								else
								{
								document.getElementById('errorpswrd').innerHTML="Please enter a valid password";
								   alert(' Your password should be 8 to 20 characters which contain at least one lowercase letter, one uppercase letter, one numeric digit, and one special character');
								   document.getElementById("password").value="";
								   
									}

							}

							function checkCpassword()

							{

							var passw=/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
							var passwrd=document.getElementById("password").value;
							var cpasswrd=document.getElementById("cpassword").value;

									
							if(document.getElementById("cpassword").value==null ||updatepass.cpassword.value.length==0)
								{
								document.getElementById("errorCpswrd").innerHTML="Mandatory Field!";

								}

							else if(document.getElementById("cpassword").value.match(passw))
								{
								document.getElementById("errorCpswrd").innerHTML=" ";
								
										if(passwrd==cpasswrd)
													{ 	document.getElementById("errorCpswrd").innerHTML=" ";
													
														}
													else{
													document.getElementById("errorCpswrd").innerHTML="Password and confirm password did not match!";
														document.getElementById("cpassword").value="";
													}
								}

								else
								{
								document.getElementById('errorCpswrd').innerHTML="Password and confirm password should be valid and  same";
								document.getElementById("cpassword").value="";
								 }

							}

	</script>
						
						
						<input type="password" name="oldpassword" id="oldpassword"	placeholder="Old Password"  onblur="checkoldpassword()" required>
						<span id="errorpswrdold" class="errmessage" >    </span>
						
						<input type="password" name="password" id="password"	placeholder="New Password"  onblur="checkpassword()" required>
						<span id="errorpswrd"class="errmessage" >    </span>
					  
						<input type="password"  name="cpassword" id="cpassword"  onblur="checkCpassword()" placeholder="Confirm new Password" required>
						<span id="errorCpswrd"class="errmessage" >    </span>  
					  <input type="submit" value="Change password" name="submitp" id="submitp"  >
				  </div>
				  <div class="cta"></div>
				</div>
			</div>
			<script>
				$('.toggle').click(function(){
				  // Switches the Icon
				  $(this).children('i').toggleClass('fa-pencil');
				  // Switches the forms  
				  $('.form').animate({
					height: "toggle",
					'padding-top': 'toggle',
					'padding-bottom': 'toggle',
					opacity: "toggle"
				  }, "slow");
				});
			</script>
	
<!-- //login -->
			
		</div>
		<div class="clearfix"></div>
	</div>
<!-- banner -->
	<div class="banner_bottom">
			<div class="wthree_banner_bottom_left_grid_sub">
			</div>
			
			<div class="clearfix"> </div>
	</div>
<!-- top-brands -->
<!--
	
	
	-->
<!-- //top-brands -->
<!-- fresh-vegetables -->
<!--
	<div class="fresh-vegetables">
		<div class="container">
			<h3>Top Sellers</h3>
			<div class="w3l_fresh_vegetables_grids">
				<div class="col-md-3 w3l_fresh_vegetables_grid w3l_fresh_vegetables_grid_left">
					<div class="w3l_fresh_vegetables_grid2">
						<ul>
							<li><i class="fa fa-check" aria-hidden="true"></i><a href="products.html">All Sellers</a></li>
							<li><i class="fa fa-check" aria-hidden="true"></i><a href="vegetables.html">Jewellery makers</a></li>
							<li><i class="fa fa-check" aria-hidden="true"></i><a href="vegetables.html">craft makers</a></li>
							<li><i class="fa fa-check" aria-hidden="true"></i><a href="drinks.html">Card makers</a></li>
							<li><i class="fa fa-check" aria-hidden="true"></i><a href="pet.html">Painting sellers</a></li>
							<li><i class="fa fa-check" aria-hidden="true"></i><a href="bread.html">Teddys and toys makers</a></li>
							<li><i class="fa fa-check" aria-hidden="true"></i><a href="household.html">other sellers</a></li>

						</ul>
					</div>
				</div>
				<div class="col-md-9 w3l_fresh_vegetables_grid_right">
					<div class="col-md-4 w3l_fresh_vegetables_grid">
						
					</div>
					
					
					
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	
	-->
<!-- //fresh-vegetables -->
<!-- newsletter -->
	
<!-- //newsletter -->
<!-- footer -->
	<div class="footer">
		<div class="container">
			<div class="col-md-3 w3_footer_grid">
				<h3>information</h3>
				<ul class="w3_footer_grid_list">
					
					<li><a href="about.html">About Us</a></li>
					<li><a href="short-codes.html">Contact us</a></li>
				</ul>
			</div>
			<div class="col-md-3 w3_footer_grid">
				<h3>policy info</h3>
				<ul class="w3_footer_grid_list">
					<li><a href="faqs.html">FAQ</a></li>
					<li><a href="privacy.html">privacy policy</a></li>
					<li><a href="privacy.html">terms of use</a></li>
				</ul>
			</div>
			
			
			
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
				<p>© All rights reserved | Design by <a href="http://w3layouts.com/">Dreams online</a></p>
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


