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
$ret=mysqli_query($con,"SELECT * FROM tbl_login WHERE email='$username' and password='$password'");
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
<title>customer|Profile</title>
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
							
							}
							.w3l_search input[type="submit"]:hover{
								background: url(img-sp.png) no-repeat 14px 5px #84C639;
							}
							</style>
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}
</style>
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
			  	<h3>Welcome  to organic world</h3>
			<?php 	
			$con=mysqli_connect("localhost","root","","organic_shop_db")or die ("Couldn't connect");
	
			$disp="SELECT  tbl_login.email, tbl_login.user_type_id,tbl_registration.fname,tbl_registration.lname,tbl_registration.phone_no ,tbl_registration.images FROM tbl_registration INNER JOIN  tbl_login
			ON tbl_login.email=tbl_registration.email WHERE  tbl_login.email='$mail'";

			$ret=mysqli_query($con,$disp);
			$num=mysqli_fetch_array($ret);	
			$fname=$num['fname'];
			$lname=$num['lname'];
			$ph=$num['phone_no'];
			$imgs=$num['images'];
			?>
			<div class="card">
  <img src="uploads/profile/<?php echo $imgs; ?>"   alt="John" style="width:50%">
  <h1><?php echo $fname; ?><?php echo $lname; ?></h1>
  <p class="title"><?php echo $ph; ?></p>
  <p><?php echo $_SESSION['alogin']; ?></p>
     
 
 
</div>
			
				
			   </div>	
			   <div>
			  
			   <form onsubmit="return validateForm()" action="customer_update_profile1.php" method="POST" id="update" name="update" > 
			   <h2 style "text-color:red";> Update details</h2>
			   <input type="text" name="firstname" id="firstname" placeholder="First Name" value="<?php echo @$fname;?>" onblur="checkFName()"class="input input1 form-control"  required>
		
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
			 <input type="text" name="lastname" id="lastname" placeholder="Last Name" value="<?php echo @$lname;?>"class="input input1 form-control" onblur="checkLName()"required>
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
			<input type="text" name="phonem" id="phonem" placeholder="Phone number"  value="<?php echo @$mobile_num;?>" class="input input1 form-control"onblur="checkMob()"required>
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
					<br><br><input type="submit" value="Update Profile" name="submitd" id="submitd" style="background-color:green;width:150px;height:50px;color:white;font-family:bold;border-radius:10px;border:2px solid white"  >
			</br>
			</br>
			
			   </div>
			   
			   <?php
			while($row=mysqli_fetch_array($disp_result))
	{
	
	$email=$row['email'];
	$user_type_id=$row['user_type_id'];
	$fname=$row['fname'];
	$lname=$row['lname'];
	$phone_no=$row['phone_no'];
	
			if($user_type_id==2)
			{
				
				echo "<script type='text/javascript'>
				document.getElementById('fname').innerHTML='$fname';
				document.getElementById('lname').innerHTML='$lname';
				document.getElementById('phone_no').innerHTML='$phone_no';
				document.getElementById('email').innerHTML='$email';
																
				</script>";
				//alert('$fname'+'$lname'+'$email'); 
				//window.location='seller_home.php';
				break;
			}
	
 }
			?>
			    
			   <div class="clearfix"> </div>
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
			
				
				
				<!--<li class="menu-kid-left"><a href="contact.html">Contact us</a></li-->
			</ul>		</div>
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
	</div>-->
	
	
</body>
</html>
<?php
}
else
{
	header('Location:login.php');
}
?>