<?php
session_start();
if(isset($_SESSION['alogin'])){
	$mail=$_SESSION['alogin'];
?>
<?php


$con=mysqli_connect("localhost","root","","organic_shop_db")or die ("Couldn't connect");

$disp="SELECT * FROM `tbl_customer_order` ";

$disp_result=mysqli_query($con,$disp);


?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Add|Category</title>
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


<!-- internal javascrpt code -->
   <script>
   
   $('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});
   
		function loginValid(mail,passwrd)

		{
                    	var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
			var passw=/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
			
		   if(mail.value.match(mailformat))
			{
				
				//document.login.email.focus();
				if(passwrd.value.match(passw)) 
					{ 
			
					//window.location="succ_login.php";
					//window.location="succes_login.php";
					
					return true;
	
					}
					else
					{ 
				
					//alert('Wrong password.Please enter a valid password...!');
					
					window.location="login.php";
					
					
					
					
					}
			}
		  else
			{
			//alert("Please enter a valid Email-id and password !");
			document.login.email.focus();
			
			}


		}
	</script>

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
<div class="account"><a href="admin_profile.php"><span> </span><?php echo $mail?></a></div>				
						<div class="account"><a href="index.htmln> </span> logout</a></div>
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
			  	<h3>PAYMENT REPORT</h3>
		
				<section style="margin-left:20px;margin-right:20px ;  padding:75px ">
<table  id="designs">
		
<tr>
<th> first name</th>
<th>last name</th>
<th>Place </th>
<th>Email</th>
<th>Date </th>
<th> Amount </th>
<!--<th> Action </th>-->
<!--<th>status </th>-->
 </tr>
 
<?php

 while($array=mysqli_fetch_array($disp_result))
	{
 ?>
 <tr>
<td>

<?php 

$email=$array[];

echo $email;?></td>
<td>
<?php 
	echo $array[1];
?></td>
<td>

<?php 
echo $array[2];
?></td>
<td><?php echo $array[3];?></td>
<td><?php echo $array[4];?></td>
<!--td><input type="button" name="" id="" value="REJECT"></td>-->




</tr>
 
<?php } ?>
 

</table>
</br>
</br>
	</section>
		<!--<p style="color:red">Update Product category</p>	
		
		<table id="designs">
		
		<tr>
		<th> Select Product category </th>
		<th>Enter prod category name to update</th>
		</tr>
		
		<tr>
		<form action="addcat.php" method="POST" name="add_prod_cat" id="add_prod_cat">
						<td>
						
						
						
						</select>
									
						</td>
					<td>
					<input type="text" name="prod_cat_name" id="prod_cat_name" onblur="checkProdCat()" placeholder="Enter category name" required>
					
					
					
					<span id="errorname" class="errmessage">    </span>	
					
					
					
					
					
					
					
					<script>
					function dispProd()
					{
						add_prod_cat.prod_cat_name.value=add_prod_cat.prod_cat.value;
						
						
					}
					
					
							function checkProdCat()
									{
									var letters = /^[a-zA-Z][a-zA-Z\\s]+$/;
								
									var fnamevalue=document.getElementById("prod_cat_name").value;
									//document.getElementById('errorname').innerHTML=fnamevalue;
									
									if (fnamevalue==null || add_prod_cat.prod_cat_name.value.length==0)
									{
									document.getElementById('errorname').innerHTML="Mandatory Field!";
	
									}
									else if(document.getElementById("prod_cat_name").value.match(letters))
									{
									document.getElementById('errorname').innerHTML=" ";

									}

									else
									{
										
									document.getElementById('errorname').innerHTML="Information entered is incorrectly formatted!";
									
									document.getElementById('prod_cat_name').value = ""; 
									add_prod_cat.prod_cat_name.value ="";
									}

									}
					
					</script>
					
					
					
					
					
					<input type="submit" name="uprod_cat" id="uprod_cat" value="Update">
					</form>


					</td>
		</tr>


		</table>


</br>-->

		

</br>

			   </div>	
		
			   <div class="clearfix"> </div>
			 </div>
			 <div class="sub-cate">
				<div class=" top-nav rsidebar span_1_of_left">
					
		 
		

		<!--<li class="item1"><a href="#">Curabitur sapien<img class="arrow-img" src="images/arrow1.png" alt=""/> </a>
			<ul class="cute">
				<li class="subitem1"><a href="product.html">Cute Kittens </a></li>
				<li class="subitem2"><a href="product.html">Strange Stuff </a></li>
				<li class="subitem3"><a href="product.html">Automatic Fails </a></li>
			</ul>
		</li>-->
		
		
		<h3 class="cate">MENU</h3>
					
		 <ul class="menu">
		 <ul class="kid-menu">
		<li ><a href="admin_home.php">Home</a></li>
		</ul>
		<li class="item2"><a href="view_users.php">Profile<img class="arrow-img " src="images/arrow1.png" alt=""/></a>
			<ul class="cute">
				<li class="subitem1"><a href="admin_update.php">Update password </a></li>
				<li class="subitem1"><a href="admin_profile.php">View profile </a></li>
			</ul>
		</li>
		<li class="item2"><a href="view_users.php">View users<img class="arrow-img " src="images/arrow1.png" alt=""/></a>
			<ul class="cute">
				<li class="subitem1"><a href="reg_sellers.php">View Sellers </a></li>
				<li class="subitem1"><a href="reg_customer.php">View Customers </a></li>
			</ul>
		</li>
		
		
				<li>
						
			<ul class="kid-menu">
			<!--<li ><a href="admin_home.php">Home</a></li>-->
				<li><a href="addcat.php">Add category</a></li>
				<!--<li ><a href="admin_update.php">change password</a></li>-->
				
			</ul>
		</li>
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
	   		     		</div>
	   		     	</div>
	   		     	 <a class="view-all all-product" href="product.html">VIEW ALL PRODUCTS<span> </span></a> 	
			</div>
			  <div class="clearfix"> </div>
      	 </div>
	<!---->
	<div class="footer">
		
		<!--<div class="footer-bottom">
			<div class="container">
				<div class="footer-bottom-cate">
					<h6>CATEGORIES</h6>
					<ul>
						<li><a href="#">Curabitur sapien</a></li>
						<li><a href="#">Dignissim purus</a></li>
						<li><a href="#">Tempus pretium</a></li>
						<li ><a href="#">Dignissim neque</a></li>
						<li ><a href="#">Ornared id aliquet</a></li>
						<li><a href="#">Ultrices id du</a></li>
						<li><a href="#">Commodo sit</a></li>
						<li ><a href="#">Urna ac tortor sc</a></li>
					
					</ul>
				</div>
				<div class="footer-bottom-cate bottom-grid-cat">
					<h6>FEATURE PROJECTS</h6>
					<ul>
						<li><a href="#">Curabitur sapien</a></li>
						<li><a href="#">Dignissim purus</a></li>
						<li><a href="#">Tempus pretium</a></li>
						<li ><a href="#">Dignissim neque</a></li>
						<li ><a href="#">Ornared id aliquet</a></li>
						<li><a href="#">Ultrices id du</a></li>
						<li><a href="#">Commodo sit</a></li>
					</ul>
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

<?php
session_start();
if(isset($_SESSION['alogin'])){
	$mail=$_SESSION['alogin'];
?>
<?php


$con=mysqli_connect("localhost","root","","organic_shop_db")or die ("Couldn't connect");

$disp="SELECT  tbl_registration.fname, tbl_registration.lname,tbl_registration.phone_no,tbl_registration.email,tbl_registration.place FROM tbl_registration INNER JOIN  tbl_login
ON tbl_login.email=tbl_registration.email WHERE  tbl_login.user_type_id=3  ORDER BY tbl_registration.email ASC";

$disp_result=mysqli_query($con,$disp);


?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Add|Category</title>
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


<!-- internal javascrpt code -->
   <script>
   
   $('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});
   
		function loginValid(mail,passwrd)

		{
                    	var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
			var passw=/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
			
		   if(mail.value.match(mailformat))
			{
				
				//document.login.email.focus();
				if(passwrd.value.match(passw)) 
					{ 
			
					//window.location="succ_login.php";
					//window.location="succes_login.php";
					
					return true;
	
					}
					else
					{ 
				
					//alert('Wrong password.Please enter a valid password...!');
					
					window.location="login.php";
					
					
					
					
					}
			}
		  else
			{
			//alert("Please enter a valid Email-id and password !");
			document.login.email.focus();
			
			}


		}
	</script>

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
<div class="account"><a href="admin_profile.php"><span> </span><?php echo $mail?></a></div>				
						<div class="account"><a href="index.htmln> </span> logout</a></div>
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
			  	<h3>REGISTERD SELLERS</h3>
		
				<section style="margin-left:20px;margin-right:20px ;  padding:75px ">
<table  id="designs">
		
<tr>
<th> first name</th>
<th>last name</th>
<th>phone no </th>
<th>email </th>
<th> place </th>
<!--<th> Action </th>-->
<!--<th>status </th>-->
 </tr>
 
<?php

 while($array=mysqli_fetch_array($disp_result))
	{
 ?>
 <tr>
<td>

<?php 

$fname=$array[0];

echo $fname;?></td>
<td>
<?php 
	echo $array[1];
?></td>
<td>

<?php 
echo $array[2];
?></td>
<td><?php echo $array[3];?></td>
<td><?php echo $array[4];?></td>
<!--td><input type="button" name="" id="" value="REJECT"></td>-->




</tr>
 
<?php } ?>
 

</table>
</br>
</br>
	</section>
		<!--<p style="color:red">Update Product category</p>	
		
		<table id="designs">
		
		<tr>
		<th> Select Product category </th>
		<th>Enter prod category name to update</th>
		</tr>
		
		<tr>
		<form action="addcat.php" method="POST" name="add_prod_cat" id="add_prod_cat">
						<td>
						
						
						
						</select>
									
						</td>
					<td>
					<input type="text" name="prod_cat_name" id="prod_cat_name" onblur="checkProdCat()" placeholder="Enter category name" required>
					
					
					
					<span id="errorname" class="errmessage">    </span>	
					
					
					
					
					
					
					
					<script>
					function dispProd()
					{
						add_prod_cat.prod_cat_name.value=add_prod_cat.prod_cat.value;
						
						
					}
					
					
							function checkProdCat()
									{
									var letters = /^[a-zA-Z][a-zA-Z\\s]+$/;
								
									var fnamevalue=document.getElementById("prod_cat_name").value;
									//document.getElementById('errorname').innerHTML=fnamevalue;
									
									if (fnamevalue==null || add_prod_cat.prod_cat_name.value.length==0)
									{
									document.getElementById('errorname').innerHTML="Mandatory Field!";
	
									}
									else if(document.getElementById("prod_cat_name").value.match(letters))
									{
									document.getElementById('errorname').innerHTML=" ";

									}

									else
									{
										
									document.getElementById('errorname').innerHTML="Information entered is incorrectly formatted!";
									
									document.getElementById('prod_cat_name').value = ""; 
									add_prod_cat.prod_cat_name.value ="";
									}

									}
					
					</script>
					
					
					
					
					
					<input type="submit" name="uprod_cat" id="uprod_cat" value="Update">
					</form>


					</td>
		</tr>


		</table>


</br>-->

		

</br>

			   </div>	
		
			   <div class="clearfix"> </div>
			 </div>
			 <div class="sub-cate">
				<div class=" top-nav rsidebar span_1_of_left">
					
		 
		

		<!--<li class="item1"><a href="#">Curabitur sapien<img class="arrow-img" src="images/arrow1.png" alt=""/> </a>
			<ul class="cute">
				<li class="subitem1"><a href="product.html">Cute Kittens </a></li>
				<li class="subitem2"><a href="product.html">Strange Stuff </a></li>
				<li class="subitem3"><a href="product.html">Automatic Fails </a></li>
			</ul>
		</li>-->
		
		
		<h3 class="cate">MENU</h3>
					
		 <ul class="menu">
		 <ul class="kid-menu">
		<li ><a href="admin_home.php">Home</a></li>
		</ul>
		<li class="item2"><a href="view_users.php">Profile<img class="arrow-img " src="images/arrow1.png" alt=""/></a>
			<ul class="cute">
				<li class="subitem1"><a href="admin_update.php">Update password </a></li>
				<li class="subitem1"><a href="admin_profile.php">View profile </a></li>
			</ul>
		</li>
		<li class="item2"><a href="view_users.php">View users<img class="arrow-img " src="images/arrow1.png" alt=""/></a>
			<ul class="cute">
				<li class="subitem1"><a href="reg_sellers.php">View Sellers </a></li>
				<li class="subitem1"><a href="reg_customer.php">View Customers </a></li>
			</ul>
		</li>
		
		
				<li>
						
			<ul class="kid-menu">
			<!--<li ><a href="admin_home.php">Home</a></li>-->
				<li><a href="addcat.php">Add category</a></li>
				<!--<li ><a href="admin_update.php">change password</a></li>-->
				
			</ul>
		</li>
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
	   		     		</div>
	   		     	</div>
	   		     	 <a class="view-all all-product" href="product.html">VIEW ALL PRODUCTS<span> </span></a> 	
			</div>
			  <div class="clearfix"> </div>
      	 </div>
	<!---->
	<div class="footer">
		
		<!--<div class="footer-bottom">
			<div class="container">
				<div class="footer-bottom-cate">
					<h6>CATEGORIES</h6>
					<ul>
						<li><a href="#">Curabitur sapien</a></li>
						<li><a href="#">Dignissim purus</a></li>
						<li><a href="#">Tempus pretium</a></li>
						<li ><a href="#">Dignissim neque</a></li>
						<li ><a href="#">Ornared id aliquet</a></li>
						<li><a href="#">Ultrices id du</a></li>
						<li><a href="#">Commodo sit</a></li>
						<li ><a href="#">Urna ac tortor sc</a></li>
					
					</ul>
				</div>
				<div class="footer-bottom-cate bottom-grid-cat">
					<h6>FEATURE PROJECTS</h6>
					<ul>
						<li><a href="#">Curabitur sapien</a></li>
						<li><a href="#">Dignissim purus</a></li>
						<li><a href="#">Tempus pretium</a></li>
						<li ><a href="#">Dignissim neque</a></li>
						<li ><a href="#">Ornared id aliquet</a></li>
						<li><a href="#">Ultrices id du</a></li>
						<li><a href="#">Commodo sit</a></li>
					</ul>
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

<?php
session_start();
if(isset($_SESSION['alogin'])){
	$mail=$_SESSION['alogin'];
?>
<?php


$con=mysqli_connect("localhost","root","","organic_shop_db")or die ("Couldn't connect");

$disp="SELECT  tbl_registration.fname, tbl_registration.lname,tbl_registration.phone_no,tbl_registration.email,tbl_registration.place FROM tbl_registration INNER JOIN  tbl_login
ON tbl_login.email=tbl_registration.email WHERE  tbl_login.user_type_id=3  ORDER BY tbl_registration.email ASC";

$disp_result=mysqli_query($con,$disp);


?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Add|Category</title>
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


<!-- internal javascrpt code -->
   <script>
   
   $('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});
   
		function loginValid(mail,passwrd)

		{
                    	var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
			var passw=/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
			
		   if(mail.value.match(mailformat))
			{
				
				//document.login.email.focus();
				if(passwrd.value.match(passw)) 
					{ 
			
					//window.location="succ_login.php";
					//window.location="succes_login.php";
					
					return true;
	
					}
					else
					{ 
				
					//alert('Wrong password.Please enter a valid password...!');
					
					window.location="login.php";
					
					
					
					
					}
			}
		  else
			{
			//alert("Please enter a valid Email-id and password !");
			document.login.email.focus();
			
			}


		}
	</script>

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
<div class="account"><a href="admin_profile.php"><span> </span><?php echo $mail?></a></div>				
						<div class="account"><a href="index.htmln> </span> logout</a></div>
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
			  	<h3>REGISTERD SELLERS</h3>
		
				<section style="margin-left:20px;margin-right:20px ;  padding:75px ">
<table  id="designs">
		
<tr>
<th> first name</th>
<th>last name</th>
<th>phone no </th>
<th>email </th>
<th> place </th>
<!--<th> Action </th>-->
<!--<th>status </th>-->
 </tr>
 
<?php

 while($array=mysqli_fetch_array($disp_result))
	{
 ?>
 <tr>
<td>

<?php 

$fname=$array[0];

echo $fname;?></td>
<td>
<?php 
	echo $array[1];
?></td>
<td>

<?php 
echo $array[2];
?></td>
<td><?php echo $array[3];?></td>
<td><?php echo $array[4];?></td>
<!--td><input type="button" name="" id="" value="REJECT"></td>-->




</tr>
 
<?php } ?>
 

</table>
</br>
</br>
	</section>
		<!--<p style="color:red">Update Product category</p>	
		
		<table id="designs">
		
		<tr>
		<th> Select Product category </th>
		<th>Enter prod category name to update</th>
		</tr>
		
		<tr>
		<form action="addcat.php" method="POST" name="add_prod_cat" id="add_prod_cat">
						<td>
						
						
						
						</select>
									
						</td>
					<td>
					<input type="text" name="prod_cat_name" id="prod_cat_name" onblur="checkProdCat()" placeholder="Enter category name" required>
					
					
					
					<span id="errorname" class="errmessage">    </span>	
					
					
					
					
					
					
					
					<script>
					function dispProd()
					{
						add_prod_cat.prod_cat_name.value=add_prod_cat.prod_cat.value;
						
						
					}
					
					
							function checkProdCat()
									{
									var letters = /^[a-zA-Z][a-zA-Z\\s]+$/;
								
									var fnamevalue=document.getElementById("prod_cat_name").value;
									//document.getElementById('errorname').innerHTML=fnamevalue;
									
									if (fnamevalue==null || add_prod_cat.prod_cat_name.value.length==0)
									{
									document.getElementById('errorname').innerHTML="Mandatory Field!";
	
									}
									else if(document.getElementById("prod_cat_name").value.match(letters))
									{
									document.getElementById('errorname').innerHTML=" ";

									}

									else
									{
										
									document.getElementById('errorname').innerHTML="Information entered is incorrectly formatted!";
									
									document.getElementById('prod_cat_name').value = ""; 
									add_prod_cat.prod_cat_name.value ="";
									}

									}
					
					</script>
					
					
					
					
					
					<input type="submit" name="uprod_cat" id="uprod_cat" value="Update">
					</form>


					</td>
		</tr>


		</table>


</br>-->

		

</br>

			   </div>	
		
			   <div class="clearfix"> </div>
			 </div>
			 <div class="sub-cate">
				<div class=" top-nav rsidebar span_1_of_left">
					
		 
		

		<!--<li class="item1"><a href="#">Curabitur sapien<img class="arrow-img" src="images/arrow1.png" alt=""/> </a>
			<ul class="cute">
				<li class="subitem1"><a href="product.html">Cute Kittens </a></li>
				<li class="subitem2"><a href="product.html">Strange Stuff </a></li>
				<li class="subitem3"><a href="product.html">Automatic Fails </a></li>
			</ul>
		</li>-->
		
		
		<h3 class="cate">MENU</h3>
					
		 <ul class="menu">
		 <ul class="kid-menu">
		<li ><a href="admin_home.php">Home</a></li>
		</ul>
		<li class="item2"><a href="view_users.php">Profile<img class="arrow-img " src="images/arrow1.png" alt=""/></a>
			<ul class="cute">
				<li class="subitem1"><a href="admin_update.php">Update password </a></li>
				<li class="subitem1"><a href="admin_profile.php">View profile </a></li>
			</ul>
		</li>
		<li class="item2"><a href="view_users.php">View users<img class="arrow-img " src="images/arrow1.png" alt=""/></a>
			<ul class="cute">
				<li class="subitem1"><a href="reg_sellers.php">View Sellers </a></li>
				<li class="subitem1"><a href="reg_customer.php">View Customers </a></li>
			</ul>
		</li>
		
		
				<li>
						
			<ul class="kid-menu">
			<!--<li ><a href="admin_home.php">Home</a></li>-->
				<li><a href="addcat.php">Add category</a></li>
				<!--<li ><a href="admin_update.php">change password</a></li>-->
				
			</ul>
		</li>
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
	   		     		</div>
	   		     	</div>
	   		     	 <a class="view-all all-product" href="product.html">VIEW ALL PRODUCTS<span> </span></a> 	
			</div>
			  <div class="clearfix"> </div>
      	 </div>
	<!---->
	<div class="footer">
		
		<!--<div class="footer-bottom">
			<div class="container">
				<div class="footer-bottom-cate">
					<h6>CATEGORIES</h6>
					<ul>
						<li><a href="#">Curabitur sapien</a></li>
						<li><a href="#">Dignissim purus</a></li>
						<li><a href="#">Tempus pretium</a></li>
						<li ><a href="#">Dignissim neque</a></li>
						<li ><a href="#">Ornared id aliquet</a></li>
						<li><a href="#">Ultrices id du</a></li>
						<li><a href="#">Commodo sit</a></li>
						<li ><a href="#">Urna ac tortor sc</a></li>
					
					</ul>
				</div>
				<div class="footer-bottom-cate bottom-grid-cat">
					<h6>FEATURE PROJECTS</h6>
					<ul>
						<li><a href="#">Curabitur sapien</a></li>
						<li><a href="#">Dignissim purus</a></li>
						<li><a href="#">Tempus pretium</a></li>
						<li ><a href="#">Dignissim neque</a></li>
						<li ><a href="#">Ornared id aliquet</a></li>
						<li><a href="#">Ultrices id du</a></li>
						<li><a href="#">Commodo sit</a></li>
					</ul>
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

