<?php
session_start();
if(isset($_SESSION['alogin'])){
	$mail=$_SESSION['alogin'];
	$con=mysqli_connect("localhost","root","","organic_shop_db")or die ("Couldn't connect");
	
	$disp="SELECT  tbl_login.email, tbl_login.user_type_id,tbl_registration.fname,tbl_registration.lname,tbl_registration.phone_no FROM tbl_registration INNER JOIN  tbl_login
ON tbl_login.email=tbl_registration.email WHERE  tbl_login.email='$mail'";

$disp_result=mysqli_query($con,$disp);
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
<title>Admin|Home</title>
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
						<a href="index.html"><img src="images/logo.png" alt=" " /></a>
					</div>
					<!--<div class="search">
						<input type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" >
						<input type="submit"  value="SEARCH">

					</div>-->
					<div class="clearfix"> </div>
				</div>
				<div class="header-bottom-right">					
						<div class="account"><a href="admin_profile.php"><span> </span><?php echo $mail?></a></div>
							<ul class="login">
								<li><a href="logout.php"><span> </span>LOGOUT</a></li> 

							</ul>
						
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
			  	<h3>Welcome  Admin to organic world</h3>
				<form onsubmit="return validateForm()" action="admin_update_profile1.php" method="POST" id="update" name="update" > 
			      <h2>Update details</h2>
				<input type="text" name="firstname" id="firstname" placeholder="First Name" value="<?php echo @$fname;?>" onblur="checkFName()"  required>
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
					</br>
			</br>
			 <input type="text" name="lastname" id="lastname" placeholder="Last Name" value="<?php echo @$lname;?>" onblur="checkLName()"required>
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
					  
			</br>
			</br>
			<input type="text" name="phonem" id="phonem" placeholder="Phone number"  value="<?php echo @$mobile_num;?>" onblur="checkMob()"required>
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
					<br><br><input type="submit" value="Update Profile" name="submitd" id="submitd"  >
			</br>
			</br>
			
			   </div>	
			   
			   <div class="clearfix"> </div>
			 </div>
			 <div class="sub-cate">
				<div class=" top-nav rsidebar span_1_of_left">
					<h3 class="cate">MENU</h3>
		 <ul class="menu">
		<li class="item2"><a href="view_users.php">Profile<img class="arrow-img " src="images/arrow1.png" alt=""/></a>
			<ul class="cute">
				<li class="subitem1"><a href="admin_update.php">Update password </a></li>
				<li class="subitem1"><a href="admin_profile.php">View profile </a></li>
			</ul>
		</li>
		<li class="item2"><a href="view_users.php">View users<img class="arrow-img " src="images/arrow1.png" alt=""/></a>
			<ul class="cute">
				<!--<li class="subitem1"><a href="reg_sellers.php">View Sellers </a></li>-->
				<li class="subitem1"><a href="reg_customer.php">View Customers </a></li>
			</ul>
		</li>
		
		
				<li>
			<ul class="kid-menu">
			<li ><a href="admin_home.php">Home</a></li>
				<li><a href="addcat.php">Add category</a></li>
				
				<!--<li ><a href="product.html">Ornared id aliquet</a></li>
			</ul>
		</li>
		<ul class="kid-menu ">
				<li><a href="product.html">Vew reviews</a></li>
				
				
				<li class="menu-kid-left"><a href="contact.html">Contact us</a></li>
			</ul>
		
	</ul>-->
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
	   		     		<div class="grid-chain-bottom chain-watch">
		   		     		<!--<span class="actual dolor-left-grid">300$</span>
		   		     		<span class="reducedfrom">500$</span>  
		   		     		<h6>Lorem ipsum dolor</h6>  		     			   		     										
	   		     		</div>
	   		     	</div>
	   		     	 <a class="view-all all-product" href="product.html">VIEW ALL PRODUCTS<span> </span></a> 	
			</div>
			  <div class="clearfix"> </div>
      	 </div>
	<!---->
	<div class="footer">
		
		<div class="footer-bottom">
			<!--<div class="container">
				<div class="footer-bottom-cate">
					<h6>CATEGORIES</h6>
					
				</div>
				
				<div class="footer-bottom-cate">
					<h6>TOP BRANDS</h6>
					<ul>
						<li><a href="#">Curabitur sapien</a></li>
						<li><a href="#">Dignissim purus</a></li>
						<li><a href="#">Tempus pretium</a></li>
						<li ><a href="#">Dignissim neque</a></li>
						<li ><a href="#">Ornared id aliquet</a></li>
						<li><a href="#">Ultrices id du</a></li>
						<li><a href="#">Commodo sit</a></li>
						<li ><a href="#">Urna ac tortor sc</a></li>
						<li><a href="#">Ornared id aliquet</a></li>
						<li><a href="#">Urna ac tortor sc</a></li>
						<li ><a href="#">Eget nisi laoreet</a></li>
						<li ><a href="#">Faciisis ornare</a></li>
					</ul>
				</div>
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